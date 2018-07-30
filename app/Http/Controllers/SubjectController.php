<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Topic;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    protected function validateRequest(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'topic' => 'required',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($topic)
    {
        $data['topic'] = Topic::findOrfail($topic);
        return view('staffs.subjects.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($topic)
    {
        return view('staffs.subjects.create',['topic' => $topic]);
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

        $subject = new Subject();
        $subject->title = $request->title;
        $subject->description = $request->description;
        $subject->topic_id = $request->topic;
        $subject->save();
        return redirect('sujets/'.$request->topic.'/détail');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($topic,$subject)
    {
        $data['subject'] = Subject::find($subject);
        return view('staffs.subjects.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$topic,$subject)
    {
        $this->validateRequest($request);
        
        $subject = Subject::find($subject);
        $subject->title = $request->title;
        $subject->description = $request->description;
        $subject->save();
        return redirect('sujets/'.$request->topic.'/détail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($topic,$subject)
    {
        $subject = Subject::findOrfail($subject);
        $subject->delete();
        return redirect()->back();
    }
}
