<?php

namespace App\Http\Controllers;

use App\Reaction;
use App\PartnerAccount;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ReactionController extends Controller
{
    public function validateRequest(Request $request)
    {
    $request->validate([
        'khbar_id' => 'required',
        ]);
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name,$khbar)
    {
        $data['reactions'] = Reaction::where('khbar_id',$khbar)->get();
        // return $data['reactions'];
        return view('test',$data);
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
     * @param  \App\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function show(Reaction $reaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Reaction $reaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reaction $reaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reaction $reaction)
    {
        //
    }
}
