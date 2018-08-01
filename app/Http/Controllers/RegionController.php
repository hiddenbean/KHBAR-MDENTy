<?php

namespace App\Http\Controllers;

use App\Region;
use App\RegionPoint;
use App\Services\Ajax\Ajax;
use Auth;
use App\Topic;
use App\Partner;
use App\PartnerAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\RegionPointController;


class RegionController extends Controller
{
    /**
     * Create a new partner register controller instance.
     * Call te auth middleware and specify the partner guard.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:partner-account');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  \Illuminate\Http\Request.
     * @return void.
     */
    public function validateRequest(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // Retrieve the partner concerned.
        isset($request->partner) ? $partner = Partner::where('name',$request->partner)->firstOrFail() : $partner = Partner::find(Auth::guard('partner-account')->user()->partner_id);
        $data['partner'] = $partner;
        $data['regions'] = $partner->regions;
        // return $data;
        // return view('system.regions.index',$data);
        return view('regions.index',$data);
    }
    public function regionForAttach()
    {
        
        // Retrieve the partner concerned.
        isset($request->partner) ? $partner = Partner::where('name',$request->partner)->firstOrFail() : $partner = Partner::find(Auth::guard('partner-account')->user()->partner_id);
        $data['regions'] = $partner->regions;
        // return $data;
        // return view('system.regions.index',$data);
        return view('regions.regions',$data);
    }

    public function showPoints()
    {
        
        // Retrieve the partner concerned.
        isset($request->partner) ? $partner = Partner::where('name',$request->partner)->firstOrFail() : $partner = Partner::find(Auth::guard('partner-account')->user()->partner_id);
        // return $data;
        // return view('system.regions.index',$data); 
        $regions = $partner->regions;
        $regions1 = [];
        $points = [];
        foreach ($regions as $key => $region) 
        {
            $regions1 [$key]['name'] = $region->name;
            foreach($region->regionPoints as $key_point => $point)
            {
                $regions1[$key]['points'][$key_point] = $point;
            }
        }
        
        return $regions1;
    }
   

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     $partner_account = Auth::guard('partner-account')->user();
    //     $partner_name = $partner_account->partner->name;
    //     $partner = Partner::where('name',$partner_name)->firstOrFail();
    //     return view('regions.create', [
    //         'partner' => $partner,
    //         'partner_account' => $partner_account,
    //     ]);
    // }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Ajax $ajax)
    {
        $partner_account = Auth::guard('partner-account')->user();
        $partner_name = $partner_account->partner->name;
        $partner = Partner::where('name',$partner_name)->firstOrFail();
        // return view('regions.create', [
        //     'partner' => $partner,
        //     'partner_account' => $partner_account,
        // ]);
        $ajax->redrawView('container_create_region');
       return $ajax->view('regions.shows.create');
    }

    public function regionDetails(Ajax $ajax, Request $request)
    { 
        $name = $request->input('name');
        $ajax->redrawView('container_create_region');
        return $ajax->view('regions.shows.store', ['name'=>$name]); 
    }
    /**
     * Store region for a partner.
     * Define regions points.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($subdomaine, Request $request)
    {
        $this->validateRequest($request);
        $RegionPointController = new RegionPointController();
        $RegionPointController->validateRequest($request);
        
        /* Retrieve the partner account concerned.
        isset($request->partner) ? $partner = $request->partner : $partner = Auth::guard('partner-account')->user()->partner->first()->name;
        $partner = Partner::where('name',$partner)->firstOrFail();
        */
        $partner_account = Auth::guard('partner-account')->user();
        $partner_name = $partner_account->partner->name;
        $partner = Partner::where('name',$partner_name)->firstOrFail();
        $region = Region::create([
            'name' => $request->name,
            'partner_id' => $partner->id,
        ]);
        foreach($request->region_points as $region_point)
        {
            if($region_point)
            {$point = explode(',', $region_point);
                RegionPoint::create([
                    'longitude' => $point[0],
                    'latitude' => $point[1],
                    'region_id' => $region->id,
                ]);
            }
        }
        $regions = $partner->regions;
        return redirect('regions');
        $ajax->redrawView('container_create_region');
        return $ajax->view('regions.shows.regions', ['regions'=> $regions]);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subjectStore(Request $request)
    {
        $region = Region::find($request->region);
        $region->subjects()->detach();
        foreach($request->subjects as $subject)
        {
            $region->subjects()->attach($subject);

        }
        return redirect()->back();
    }
         /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subjectDetach($name,$region,$subject)
    {
        $region = Region::find($region);
        $region->subjects()->detach($subject);
        return redirect()->back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subjectShow($name,$region)
    {
        $data['topics'] = Topic::all();
        $data['region'] =  Region::find($region);
        // return $data['topics'][0]->regions()->where('region_id',$region)->first();
        return view('regions.show',$data);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Ajax $ajax,$subdomain, $region)
    {
        
        $region = Region::findOrFail($region);
        $ajax->redrawView('container_show_region_'.$region->id);
        return $ajax->view('regions.shows.show', ['region'=> $region]);
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        $partner_account = Auth::guard('partner-account')->user();
        $partner_name = $partner_account->partner->name;
        $partner = Partner::where('name',$partner_name)->firstOrFail();
        return view('regions.edit', [
            'partner' => $partner,
            'partner_account' => $partner_account,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update($subdomaine ,Ajax $ajax, Request $request, $region_name)
    {
        $this->validateRequest($request);

        $RegionPointController = new RegionPointController();
        $RegionPointController->validateRequest($request);

        /* Retrieve the partner account concerned.
        isset($request->partner) ? $partner = $request->partner : $partner = Auth::guard('partner-account')->user()->partner->first()->name;
        $partner = Partner::where('name',$partner)->firstOrFail();
        */
        $partner_account = Auth::guard('partner-account')->user();
        $partner_name = $partner_account->partner->name;
        $partner = Partner::where('name',$partner_name)->firstOrFail();
        $region = $partner->regions()->where("name", $region_name)->first();
        if($region->name != $request->input('zone'))
        {
            $region->title = $request->input('zone');
            while(Region::where('name', $region_name)->first()){
                $name = $name.'_'.rand(0,9);
            }
            $region->name = $name;
        }
        $region->save();
        $region->regionPoints->delete();
        foreach($request->region_points as $region_point)
        {
            if($region_point)
            {$point = explode(',', $region_point);
                RegionPoint::create([
                    'longitude' => $point[0],
                    'latitude' => $point[1],
                    'region_id' => $region->id,
                ]);
            }
        }
        $ajax->redrawView();
        return $ajax->view('');
        return redirect(url('/regions/'.$region->name));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        /* Retrieve the partner account concerned.
        isset($request->partner) ? $partner = $request->partner : $partner = Auth::guard('partner-account')->user()->partner->first()->name;
        $partner = Partner::where('name',$partner)->firstOrFail();
        */
        $partner_account = Auth::guard('partner-account')->user();
        $partner_name = $partner_account->partner->name;
        $partner = Partner::where('name',$partner_name)->firstOrFail();
        $region = $partner->regions()->where("name", $region_name)->first();
        $region->delete();
    }
    public $pointOnVertex = true;

    function test(Request $request, $pointOnVertex = true) {
        $this->pointOnVertex = $pointOnVertex;
        
        $point = '33.5207622325163,-6.614384468750018';
        // Transform string coordinates into arrays with x and y values
        $point = $this->pointStringToCoordinates($point);
        $vertices = array(); 
        foreach ($request->region_points as $vertex) {
            $vertices[] = $this->pointStringToCoordinates($vertex); 
        }
 
        // Check if the point sits exactly on a vertex
        if ($this->pointOnVertex == true and $this->pointOnVertex($point, $vertices) == true) {
            return "vertex";
        }
 
        // Check if the point is inside the polygon or on the boundary
        $intersections = 0; 
        $vertices_count = count($vertices);
 
        for ($i=1; $i < $vertices_count; $i++) {
            $vertex1 = $vertices[$i-1]; 
            $vertex2 = $vertices[$i];
            if ($vertex1['y'] == $vertex2['y'] and $vertex1['y'] == $point['y'] and $point['x'] > min($vertex1['x'], $vertex2['x']) and $point['x'] < max($vertex1['x'], $vertex2['x'])) { // Check if point is on an horizontal polygon boundary
                return "boundary";
            }
            if ($point['y'] > min($vertex1['y'], $vertex2['y']) and $point['y'] <= max($vertex1['y'], $vertex2['y']) and $point['x'] <= max($vertex1['x'], $vertex2['x']) and $vertex1['y'] != $vertex2['y']) { 
                $xinters = ($point['y'] - $vertex1['y']) * ($vertex2['x'] - $vertex1['x']) / ($vertex2['y'] - $vertex1['y']) + $vertex1['x']; 
                if ($xinters == $point['x']) { // Check if point is on the polygon boundary (other than horizontal)
                    return "boundary";
                }
                if ($vertex1['x'] == $vertex2['x'] || $point['x'] <= $xinters) {
                    $intersections++; 
                }
            } 
        } 
        // If the number of edges we passed through is odd, then it's in the polygon. 
        if ($intersections % 2 != 0) {
            return "inside";
        } else {
            return "outside";
        }
    }
 
    function pointOnVertex($point, $vertices) {
        foreach($vertices as $vertex) {
            if ($point == $vertex) {
                return true;
            }
        }
 
    }
 
    function pointStringToCoordinates($pointString) {
        $coordinates = explode(",", $pointString);
        return array("x" => $coordinates[0], "y" => $coordinates[1]);
    }
}
