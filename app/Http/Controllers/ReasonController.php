<?php

namespace App\Http\Controllers;

use App\Reason;
use Illuminate\Http\Request;

class ReasonController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    protected function validateRequest(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:reasons,title',
            'description' => 'required',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['reasons'] = Reason::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);
        $reason = new Reason();
        $reason->title = $request->title;
        $reason->description = $request->description;
        $reason->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reason  $reason
     * @return \Illuminate\Http\Response
     */
    public function show(Reason $reason)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reason  $reason
     * @return \Illuminate\Http\Response
     */
    public function edit(Reason $reason)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reason  $reason
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $reason)
    {
        $this->validateRequest($request);

        $reason = Reason::findOrfail($reason);
        $reason->title = $request->title;
        $reason->description = $request->description;
        $reason->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reason  $reason
     * @return \Illuminate\Http\Response
     */
    public function destroy($reason)
    {
        $reason = Reason::findOrfail($reason);
        $reason->delete();
    }
}
