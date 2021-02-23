<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::latest()->paginate(4);
        return view('movies.index', compact('movies'))->with('i', (request()->input('page', 1) - 1) * 4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = ['Amour', 'Animaux', 'Restaurant', 'Joie', 'Echange'];

        return view('movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['title' => 'required',
            'genre' => 'required',
            'credits' => 'required',
            'photo_produit'=>'required',
            'photo_humain'=>'required',
            'type' => 'required',
            'format'=>'required',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = '';
        if ($request->poster) {
            $imageName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('uploads'), $imageName);
        }

        $data = new Movie;
        $data->title = $request->title;
        $data->credits = $request->credits;
        $data->photo_produit = $request->photo_produit;
        $data->photo_humain = $request->photo_humain;
        $data->type = $request->type;
        $data->format = $request->format;
        $data->genre = $request->genre;
        $data->release_year = $request->release_year;
        $data->poster = $imageName;
        $data->save();
        return redirect()->route('movies.index')->with('success', 'Image ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {

        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $genres = ['Amour', 'Animaux', 'Restaurant', 'Joie', 'Echange'];
        return view('movies.edit', compact('movie', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required',
            'credits' => 'required',
            'type' => 'required',
            'format' => 'required',
            'genre' => 'required',
        ]);

        $imageName = '';
        if ($request->poster) {
            $imageName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('uploads'), $imageName);
            $movie->poster = $imageName;
        }

        $movie->title = $request->title;
        $movie->credits = $request->credits;
        $movie->photo_produit = $request->photo_produit;
        $movie->photo_humain = $request->photo_humain;
        $movie->type = $request->type;
        $movie->format = $request->format;
        $movie->genre = $request->genre;
        $movie->release_year = $request->release_year;
        $movie->update();
        return redirect()->route('movies.index')->with('success', 'Image modifié avec succè.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Image supprimé !.');
    }
}
