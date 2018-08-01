<?php

namespace App\Http\Controllers;

use App\Bubble;
use Illuminate\Http\Request;

class BubbleController extends Controller
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
     * @param  \App\Bubble  $bubble
     * @return \Illuminate\Http\Response
     */
    public function show(Bubble $bubble)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bubble  $bubble
     * @return \Illuminate\Http\Response
     */
    public function edit(Bubble $bubble)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bubble  $bubble
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bubble $bubble)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bubble  $bubble
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bubble $bubble)
    {
        //
    }

    function circleDistance($from,$to ,$earthRadius = 6371000)
      {
        // convert from degrees to radians
        $latFrom = deg2rad($to['latitude']);
        $lonFrom = deg2rad($to['longitude']);
        $latTo = deg2rad($from['latitude']);
        $lonTo = deg2rad($from['longitude']);
      
        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;
        
        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
          cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return ($angle * 6371000);
      }
}
