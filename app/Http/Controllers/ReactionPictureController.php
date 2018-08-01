<?php

namespace App\Http\Controllers;

use App\ReactionPicture;
use App\Reaction;
use Auth;
use Illuminate\Http\Request;

class ReactionPictureController extends Controller
{
    public function validateRequest(Request $request)
    {
        $request->validate([
            'picture' => 'required',
            'description' => 'required',
            ]);
    }
    public function validateRequestReaction(Request $request)
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
    public function index()
    {
        //
    }

         /**
     * show a  created view for a comment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create($name,$khbar,$reaction)
    {
        return view('reactions.pictures.create',['khbar'=>$khbar,'reaction' =>$reaction ]);
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
        $this->validateRequestReaction($request);
        $this->validateRequestPicture($request); 
        $picture = new ReactionPicture();      
        if($request->hasFile('picture')) {
            $picture->name = Auth::guard('partner-account')->user()->first_name.' '.Auth::guard('partner-account')->user()->last_name;
            $picture->tag = "tag_picture";
            $picture->description = $request->description;
            $picture->path = $request->file('picture')->store('images/pictures', 'public');
            $picture->extension = $request->file('picture')->extension();
         }

         $picture->save();
    
        $reaction = new Reaction();
        if($request->reaction_id!=0)$reaction->reaction_id = $request->reaction_id;

        $reaction->khbar_id = $request->khbar_id;
        $reaction->userable_id = Auth::guard('partner-account')->user()->partner_id;
        $reaction->userable_type = 'partner';
        $reaction->reactionable_id = $picture->id;
        $reaction->reactionable_type = 'reaction_picture';
        $reaction->save();
        return redirect('khbarat/'.$request->khbar_id);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\ReactionPicture  $reactionPicture
     * @return \Illuminate\Http\Response
     */
    public function show(ReactionPicture $reactionPicture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReactionPicture  $reactionPicture
     * @return \Illuminate\Http\Response
     */
    public function edit(ReactionPicture $reactionPicture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReactionPicture  $reactionPicture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReactionPicture $reactionPicture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReactionPicture  $reactionPicture
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReactionPicture $reactionPicture)
    {
        //
    }
}
