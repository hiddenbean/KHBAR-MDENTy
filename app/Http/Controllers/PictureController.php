<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;
use App\Picture;
use App\MealComponent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // la liste des images
        $listpicture = Picture::all();
        return view('pictures.index',['pictures' => $listpicture]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pictures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_image' => 'required',
        ]);
       // validation des données de image
       $picture = new Picture();      
       if($request->hasFile('path')) {
           $picture->name = $request->input('nom_image');
           $picture->tag = "tag_picture";
           $picture->path = $request->file('path')->store('images/pictures', 'public');
           $picture->extension = $request->file('path')->extension();
        }
       $picture->save();
       return redirect('images');
    }
    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($picture)
    {
        $picture = Picture::findOrFail($picture);
        // lien d'image
        $photos = Storage::url($picture->path);
        return view('pictures.show', [
            'name' => $picture->name,
            'picture' => $photos,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function edit($picture)
    {
        $picture = Picture::findOrFail($picture);
        // lien d'image
        $photos = Storage::url($picture->path);
        return view('pictures.edit' ,['picture' => $picture, 'photo' => $photos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $picture)
    {
        $request->validate([
            'nom_image' => 'required',
        ]);
        // récupérer photo
        $picture = Picture::findOrFail($picture);
        // la modification de nom des images
        $picture->name = $request->input('nom_image');
        // la modification des images
        $picture->name = $request->input('nom_image');
        if($request->hasFile('path')) {
           $picture->path = $request->file('path')->store('images/pictures', 'public');
           $picture->extension = $request->file('path')->extension();
        }
        $picture->save();
        return redirect('images/'.$picture->id);
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $picture)
    {
       // récupérer photo
       $picture = Picture::findOrFail($picture);
       // la suppression des images
       $picture->delete();
       return redirect('images');
    }
}


