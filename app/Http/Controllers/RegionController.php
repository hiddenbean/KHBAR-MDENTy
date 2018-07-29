<?php

namespace App\Http\Controllers;

use App\Region;
use Auth;
use App\Partner;
use App\PartnerAccount;
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
        isset($request->partner) ? $partner = $request->partner : $partner = Auth::guard('partner-account')->user()->partner_id;
        $partner = Partner::where('name',$partner)->firstOrFail();
        $data['regions'] = PartnerAccount::find();
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
    public function store(Request $request)
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

        return redirect(url('/regions/'.$region->name));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        
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
    public function update(Request $request, $region_name)
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
}
