<?php

namespace App\Http\Controllers;

use App\Reaction;
use App\PartnerAccount;
use App\Comment;
use App\ReactionPicture;
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
    public function validateRequestComment(Request $request)
    {
    $request->validate([
        'comment' => 'required',
        ]);
    }
    public function validateRequestPicture(Request $request)
    {
        $request->validate([
            'picture' => 'required',
            'description' => 'required',
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
        // return $data;
        return view('test',$data);
    }
    /**
     * show a  created view for a comment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createComment($name,$khbar,$reaction)
    {
        return view('reactions.comments.create',['khbar'=>$khbar,'reaction' =>$reaction ]);
    }
    

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeComment(Request $request)
    {
        $this->validateRequest($request);
        $this->validateRequestComment($request);
        
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
     * show a  created view for a comment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createPicture($name,$khbar,$reaction)
    {
        return view('reactions.pictures.create',['khbar'=>$khbar,'reaction' =>$reaction ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePicture(Request $request)
    {
        $this->validateRequest($request);
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
