<?php

namespace App\Http\Controllers;

use App\Intervention;
use App\PartnerAccount;
use App\Comment;
use App\ReactionPicture;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class InterventionController extends Controller
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
     * show a  created view for a comment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createComment($name,$khbar)
    {
        return view('interventions.comments.create',['khbar'=>$khbar]);
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
    
        $intervention = new Intervention();
        $intervention->partner_id = Auth::guard('partner-account')->user()->partner_id;
        $intervention->khbar_id = $request->khbar_id;
        $intervention->interventionable_id = $comment->id;
        $intervention->interventionable_type = 'comment';
        $intervention->save();
        return redirect('khbarat/'.$request->khbar_id);
    }

        /**
     * show a  created view for a comment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createPicture($name,$khbar)
    {
        return view('interventions.pictures.create',['khbar'=>$khbar]);
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
    
        $intervention = new Intervention();
        $intervention->partner_id = Auth::guard('partner-account')->user()->partner_id;
        $intervention->khbar_id = $request->khbar_id;
        $intervention->interventionable_id = $picture->id;
        $intervention->interventionable_type = 'reaction_picture';
        $intervention->save();
        return redirect('khbarat/'.$request->khbar_id);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeVideo(Request $request)
    {
        $this->validateRequest($request);


        $video = new Video();
        $video->video = $request->video;
        $video->save();
    
        $intervention = new Intervention();
        $intervention->partner_id = Auth::guard('partner-account')->user()->partner_id;
        $intervention->khbar_id = $request->khbar_id;
        $intervention->interventionable_id = $comment->id;
        $intervention->interventionable_type = 'comment';
        $intervention->save();
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Intervention  $intervention
     * @return \Illuminate\Http\Response
     */
    public function show(Intervention $intervention)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Intervention  $intervention
     * @return \Illuminate\Http\Response
     */
    public function edit(Intervention $intervention)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Intervention  $intervention
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Intervention $intervention)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Intervention  $intervention
     * @return \Illuminate\Http\Response
     */
    public function destroy(Intervention $intervention)
    {
        //
    }
}