<?php

namespace App\Http\Controllers;

use App\Region;
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
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
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
    public function destroy(Region $region)
    {
        //
    }
}
