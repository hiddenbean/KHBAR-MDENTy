<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Reaction;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function validateRequestReaction(Request $request)
    {
    $request->validate([
        'khbar_id' => 'required',
        ]);
    }
    public function validateRequest(Request $request)
    {
    $request->validate([
        'comment' => 'required',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subdomaine)
    {
        //
    }

 
    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
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
        return view('reactions.comments.create',['khbar'=>$khbar,'reaction' =>$reaction ]);
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
        
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->save();
    
        $reaction = new Reaction();
        if($request->reaction_id!=0)$reaction->reaction_id = $request->reaction_id;

        $reaction->khbar_id = $request->khbar_id;
        $reaction->userable_id = Auth::guard('partner-account')->user()->partner_id;
        $reaction->userable_type = 'partner';
        $reaction->reactionable_id = $comment->id;
        $reaction->reactionable_type = 'comment';
        $reaction->save();
        return redirect('khbarat/'.$request->khbar_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
