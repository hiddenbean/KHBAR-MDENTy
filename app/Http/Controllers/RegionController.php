<?php

namespace App\Http\Controllers;

use App\Region;
use App\PartnerAccount;
use App\Partner;
use App\Topic;
use Auth;
use Illuminate\Http\Request;

class RegionController extends Controller
{

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
        return view('system.regions.index',$data);
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
    public function subjectShow($name,$region)
    {
        $data['topics'] = Topic::all();
        $data['region'] = $region;
        // return $data['topics'][0]->regions()->where('region_id',$region)->first();
        return view('system.topics.index',$data);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function subjectDestroy($name,$region,$subject)
    {
        $region = Region::find($region);
        $region->subjects()->detach($subject);
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        //
    }
}
