<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use App\Models\Actor;
use URL;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $movies = Movie::with('actors')->get();

        return view('view-movies', [
            'title' => 'Movies',
            'movies' => $movies
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('add-movie', [
            'title' => 'Add Movie'
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MovieRequest;  $request
     * @return \Illuminate\Http\Response
     */

    public function store(MovieRequest $request)
    {
        $movie = new Movie;
        $movie->title = $request->title;
        $movie->release = $request->release;
        $movie->rating = $request->rating;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = strtolower(str_replace(' ', '_', $request->name));
            $image_time = time();
            $image_extension = '.' . $image->getClientOriginalExtension();
            $full_image_name = $image_name . '_' . $image_time . $image_extension;
            $image_path = date('Y/m/d');
            $destination_path = public_path('/images/' . $image_path);
            $image->move($destination_path, $full_image_name);
            $movie->image = $image_path . '/' . $full_image_name;
        }

        $movie->save();

        return redirect('/')->with('success', 'New Movie, "' . $movie->title . '" added successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $movie = Movie::with('actors')->find($id);

        return view('show-movie', [
            'movie' => $movie,
            'title' => $movie->title
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $movie = Movie::with('actors')->find($id);

        return view('edit-movie', [
            'movie' => $movie,
            'title' => 'Edit ' . $movie->title
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\MovieRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(MovieRequest $request, $id)
    {
        $movie = Movie::find($id);
        $movie->title = $request->title;
        $movie->release = $request->release;
        $movie->rating = $request->rating;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = strtolower(str_replace(' ', '_', $request->name));
            $image_time = time();
            $image_extension = '.' . $image->getClientOriginalExtension();
            $full_image_name = $image_name . '_' . $image_time . $image_extension;
            $image_path = date('Y/m/d');
            $destination_path = public_path('/images/' . $image_path);
            $image->move($destination_path, $full_image_name);
            $movie->image = $image_path . '/' . $full_image_name;
        }
        else{
            $movie->image = $request->old_image;
        }

        $movie->save();

        return redirect(URL::previous())->with('success', 'The movie, "' . $movie->title . '" was updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();

        return redirect(URL::previous())->with('success', 'The movie, "' . $movie->title . '" was deleted successfully!');
    }
}