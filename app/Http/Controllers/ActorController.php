<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\Movie;
use URL;


class ActorController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $actors = Actor::with('movie')->get();

        return view('view-actors', [
            'title' => 'Actors',
            'actors' => $actors
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $movies = Movie::get();

        return view('add-actor', [
            'title' => 'Add Actor',
            'movies' => $movies,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $actor = new Actor;
        $actor->name = $request->name;
        $actor->movie_id = $request->movie_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = strtolower(str_replace(' ', '_', $request->name));
            $image_time = time();
            $image_extension = '.' . $image->getClientOriginalExtension();
            $full_image_name = $image_name . '_' . $image_time . $image_extension;
            $image_path = date('Y/m/d');
            $destination_path = public_path('/images/' . $image_path); 
            $image->move($destination_path, $full_image_name);
            $actor->image = $image_path . '/' . $full_image_name;
        }

        $actor->save();

        return redirect('/actors')->with(
            'success',
            'New actor, "' . $actor->name . '" added successfully!'
        );
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
    
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $actor = Actor::with('movie')->find($id);
        $movies = Movie::get();

        return view('edit-actor', [
            'actor' => $actor,
            'title' => 'Edit ' . $actor->name,
            'movies' => $movies
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $actor = Actor::find($id);
        $actor->name = $request->name;
        $actor->movie_id = $request->movie_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = strtolower(str_replace(' ', '_', $request->name));
            $image_time = time();
            $image_extension = '.' . $image->getClientOriginalExtension();
            $full_image_name = $image_name . '_' . $image_time . $image_extension;
            $image_path = date('Y/m/d');
            $destination_path = public_path('/images/' . $image_path); 
            $image->move($destination_path, $full_image_name);
            $actor->image = $image_path . '/' . $full_image_name;
        } 
        else {
            $actor->image = $request->old_image;
        }

        $actor->save();

        return redirect(URL::previous())->with(
            'success',
            'The actor, "' . $actor->name . '" was updated successfully!'
        );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $actor = Actor::find($id);
        $actor->delete();

        return redirect(URL::previous())->with(
            'success',
            'The actor, "' . $actor->name . '" was deleted successfully!'
        );
    }
}