<?php

namespace App\Http\Controllers;

use App\Region;
use Auth;
use App\Topic;
use App\Partner;
use App\PartnerAccount;
use Illuminate\Http\Request;

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
            'name' => 'required|unique:regions,name',
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
        // return $data;
        // return view('system.regions.index',$data);
        return view('regions.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partner_account = Auth::guard('partner-account')->user();
        $partner_name = $partner_account->partner->name;
        $partner = Partner::where('name',$partner_name)->firstOrFail();
        return view('regions.create', [
            'partner' => $partner,
            'partner_account' => $partner_account,
        ]);
    }

    /**
     * Store region for a partner.
     * Define regions points.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($subdomaine ,Ajax $ajax, Request $request)
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
            'name' => $request->zone,
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
        $ajax->redrawView();
        return $ajax->view('');
        return redirect(url('/regions/'.$region->name));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show($name,$region)
    {
       $data['region'] = Region::find($region);
       $data['topics'] = Topic::all();
       // return $data['topics'][0]->regions()->where('region_id',$region)->first();
       return view('system.topics.index',$data);
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
