<?php

namespace App\Http\Controllers;
use Auth;
use App\Khbar;
use App\Partner;
use App\Region;
use Illuminate\Http\Request;
use App\Http\Controller\RegionController;

class KhbarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Khbar  $khbar
     * @return \Illuminate\Http\Response
     */
    public function show(Khbar $khbar)
    {
        //
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
        
        $khbarat = Khbar::all();
        $khbarat_partner = [];
        $test = 0;
        foreach($khbarat as $khbar)
        {
            $point = $this->pointStringToCoordinates($khbar->coordinate->latitude , $khbar->coordinate->longitude);
            $test++;
            if($this->checkBelonging($point, $regions) == 'inside')
            {
                $khbarat_partner[] = $khbar;
            }
        }
        return $khbarat_partner;
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
                return "inside";
            } 
            else 
            {
                return "outside";
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
