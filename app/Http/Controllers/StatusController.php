<?php

namespace App\Http\Controllers;

use App\Status;
use App\Partner;
use App\Reason;
use Illuminate\Http\Request;

class StatusController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    protected function validateRequest(Request $request)
    {
        $request->validate([
            'reasons' => 'required',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    /**
     * approve a status.
     *
     * @return \Illuminate\Http\Response
     */
    public function approve($partner)
    {
        $status = new Status();
        $status->is_approved = 1;
        $status->partner_id = $partner;
        $status->staff_id =  auth()->guard('staff')->user()->id;

        $status->save();
        return redirect('partners');

    }

    /**
     * approve a status.
     *
     * @return \Illuminate\Http\Response
     */
    public function notApprove($partner)
    {
        $data['reasons'] = Reason::all();
        $data['partner'] = $partner;
        return view('statuses.show',$data);

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
        $this->validateRequest($request);
        $status = new Status();
        $status->is_approved = 0;
        $status->partner_id = $request['partner_id'];
        $status->staff_id =  auth()->guard('staff')->user()->id;
        $status->save();

        foreach($request->reasons as $reason)
        {
            $status->reasons()->attach($reason);
        }

        return redirect('partners');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\status  $status
     * @return \Illuminate\Http\Response
     */
    public function show($partner)
    {
    
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\status  $status
     * @return \Illuminate\Http\Response
     */
    public function check($partner)
    {
        $data['partner']=Partner::find($partner);
        return view('partners.check',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, status $status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(status $status)
    {
        //
    }
}
