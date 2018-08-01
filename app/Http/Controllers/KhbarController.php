<?php

namespace App\Http\Controllers;
use Auth;
use DateTime;
use App\Khbar;
use App\Partner;
use App\Region;
use App\Citizen;
use App\Bubble;
use App\Radius;
use App\Coordinate;
use Illuminate\Http\Request;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\BubbleController;
use App\Notifications\PartnerNewFeed;
use App\Notifications\CitizenNewFeed;

class KhbarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subdomaine)
    {
        $citizen = Citizen::find(2);
        $khbarat = Khbar::all();
        $bubble = new BubbleController();
        $citizen_khbarat = [];
        foreach($khbarat as $khbar)
        {
            $khbar_distance = $bubble->circleDistance($citizen->coordinate, $khbar->bubble->coordinate);
            if($khbar_distance < $khbar->bubble->radius->radius)
            {
                array_push($citizen_khbarat, $khbar);
                array_push($citizen_khbarat, $khbar_distance);
                continue;
            }
            //return $bubble->circleDistance($citizen->coordinate, $khbar->reactions[0]->bubble->coordinate);
            foreach($khbar->reactions as $reaction)
            {
                $reaction_bubble = $reaction->bubble;
                $distance = $bubble->circleDistance($citizen->coordinate, $reaction_bubble->coordinate);
                if($distance < $khbar->bubble->radius->radius)
                {
                    array_push($citizen_khbarat, $khbar);
                    
                }
            }
        }
        return $citizen_khbarat;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('khbars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $radius = Radius::findOrFail(1);
        $citizen = Citizen::find(2);
        $bubble = new BubbleController();
        $citizen_distance = $bubble->circleDistance($citizen->coordinate, $request->only('latitude', 'longitude'));
        if($citizen_distance > $radius->radius)
        {
            return 'you are too far from the position,in orer to create a khbar you need to be within 100m';
        }
        $citizen_coordinates = $this->pointStringToCoordinates($citizen->coordinate->latitude , $citizen->coordinate->longitude);
        $regions = Region::all();
        $partner_id = null;
        if($regions)
        {
            $region = $this->checkBelonging($citizen_coordinates, $regions);
            if($region)
            {
                $partner_id = $region->partner->id;
            }
        }
        $name = $request->title;
        while(Khbar::where('name', $name)->first())
        {
            $name = $name.'_'.rand(0,9);
        }
        $khbar = Khbar::create([
            'name' => $name,
            'title' => $request->title,
            'subject_id' => $request->subject_id,
            'topic_id' => $request->topic,
            'partner_id' => $partner_id,
        ]);
        
        $coordinate = Coordinate::create([
            'longitude' => $citizen_coordinates['y'],
            'latitude' => $citizen_coordinates['x'],
        ]);
        
        $bubble = Bubble::create([
            'coordinate_id' => $coordinate->id,
            'radius_id' => $radius->id,
            'bubbleable_id' => $khbar->id,
            'bubbleable_type' => 'khbar',
        ]);
        $citizens = Citizen::all();
         $this->notifyCitizens($coordinate, $khbar, $radius->radius, $citizens);
         return redirect('khbars');
    }

    public function notifyCitizens($coordinate, $khbar, $radius, $citizens)
    {
        $bubble = new BubbleController();
        $bubble_citizens = [];
        foreach($citizens as $citizen)
        {
            $distance = $bubble->circleDistance($citizen->coordinate, $khbar->bubble->coordinate);
            if($distance < $radius)
            {
                array_push($bubble_citizens, $citizen);
                $citizen->notify(new CitizenNewFeed());
            }
        }
        return $bubble_citizens;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Khbar  $khbar
     * @return \Illuminate\Http\Response
     */
    public function show($subdomaine, $khbar)
    {
        $khbar = Khbar::findOrFail($khbar);
        return view('', compact('khbar'));
    }


    public function getBubbles($subdmaine, $khbar)
    {
        $khbar = Khbar::findOrFail($khbar);
        $bubbles = [];
        foreach($khbar->reactions as $reaction)
        {
            array_push($bubbles, $reaction->bubble);
        }
        return $bubbles;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Khbar  $khbar
     * @return \Illuminate\Http\Response
     */
    public function edit(Khbar $khbar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Khbar  $khbar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Khbar $khbar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Khbar  $khbar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Khbar $khbar)
    {
        //
    }

    public $pointOnVertex = true;

    public function partnerFeed($pointOnVertex = true)
    {
        $this->pointOnVertex = $pointOnVertex;
        $partner_account = Auth::guard('partner-account')->user();
        $partner_name = $partner_account->partner->name;
        $partner = Partner::where('name',$partner_name)->firstOrFail();
        $regions = Region::where('partner_id', $partner->id)->get();
        
        $khbarat = $partner->khbars()->get();
        $khbarat_partner = [];
        
        foreach($khbarat as $khbar)
        {
            $point = $this->pointStringToCoordinates($khbar->bubble->coordinate->latitude , $khbar->bubble->coordinate->longitude);
            if($this->checkBelonging($point, $regions))
            {
                $khbarat_partner[] = $khbar;;
            }
        }
        if(count($khbarat_partner) > 1)
        {
            return $this->sortKhbarat($khbarat_partner);
        }
        return count($khbarat_partner);
    }

    public function sortKhbarat($khbarat)
    {
        $date = new DateTime();
        for($i = 0; $i<count($khbarat); $i++)
        {
            for($j=0; $j<count($khbarat)-1; $j++)
            {
                $khbar1_trendance = $this->calculeTrendance($khbarat[$j]);
                $khbar2_trendance = $this->calculeTrendance($khbarat[$j+1]);
                if($khbar2_trendance > $khbar1_trendance)
                {
                    $var = $khbarat[$j];
                    $khbarat[$j] = $khbarat[$j-1];
                    $khbarat[$j-1] = $var;
                    $j--;
                }
            }
            if($j == count($khbarat) )
            {
                break;
            }
        }
        return $khbarat;
    }

    public function calculeTrendance($khbar)
    {
        $khbar_trendance = 0;
        if($khbar->reactions)
        {
            $date = date('Y-m-d H:i:s', strtotime(date_format(new DateTime(), 'Y-m-d')));
            $diff = date(strtotime($date)-strtotime(date_format($khbar->created_at, 'Y-m-d')));
            $years = floor($diff / (365*60*60*24));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            $khbar_trendance = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        }
        return $khbar_trendance;
    }
    
    public function checkBelonging($point, $regions)
    {
        $vertices = array();
        foreach($regions as $region)
        {
            foreach ($region->regionPoints as $region_point) 
            {
                $vertices[] = $this->pointStringToCoordinates($region_point->latitude, $region_point->longitude); 
            }
            // Check if the point sits exactly on a vertex
            if ($this->pointOnVertex == true and $this->pointOnVertex($point, $vertices) == true) 
            {
                return "vertex";
            }

            // Check if the point is inside the polygon or on the boundary
            $intersections = 0; 
            $vertices_count = count($vertices);

            for ($i=1; $i < $vertices_count; $i++) 
            {
                $vertex1 = $vertices[$i-1]; 
                $vertex2 = $vertices[$i];
                // Check if point is on an horizontal polygon boundary
                if ($vertex1['y'] == $vertex2['y'] and $vertex1['y'] == $point['y'] and $point['x'] > min($vertex1['x'], $vertex2['x']) and $point['x'] < max($vertex1['x'], $vertex2['x'])) 
                { 
                    return "boundary";
                }
                if ($point['y'] > min($vertex1['y'], $vertex2['y']) and $point['y'] <= max($vertex1['y'], $vertex2['y']) and $point['x'] <= max($vertex1['x'], $vertex2['x']) and $vertex1['y'] != $vertex2['y']) 
                { 
                    $xinters = ($point['y'] - $vertex1['y']) * ($vertex2['x'] - $vertex1['x']) / ($vertex2['y'] - $vertex1['y']) + $vertex1['x']; 
                    // Check if point is on the polygon boundary (other than horizontal)
                    if ($xinters == $point['x']) 
                    { 
                        return "boundary";
                    }
                    if ($vertex1['x'] == $vertex2['x'] || $point['x'] <= $xinters) 
                    {
                        $intersections++; 
                    }
                } 
            } 
            
            // If the number of edges we passed through is odd, then it's in the polygon. 
            if ($intersections % 2 != 0) 
            {
                return $region;
            } 
            else 
            {
                return false;
            }
            
        }
    }


    function pointOnVertex($point, $vertices) {
        foreach($vertices as $vertex) 
        {
            if ($point == $vertex) 
            {
                return true;
            }
        }
 
    }

    function pointStringToCoordinates($latitude , $longitude) 
    {
        return array("x" => $latitude, "y" => $longitude);
    }
}
