<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::with('genres')->latest()->paginate(10);
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('poster')) {
            $path = $request->file('poster')->store('posters', 'public');
            $data['poster_path'] = $path;
        } else {
            $data['poster_path'] = 'posters/default.jpg';
        }

        $data['is_published'] = false;

        $movie = Movie::create($data);
        $movie->genres()->sync($data['genres']);

        return redirect()->route('movies.index')->with('success', 'Movie created');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $data = $request->validated();

        if ($request->hasFile('poster')) {
            if ($movie->poster_path && $movie->poster_path !== 'posters/default.jpg') {
                Storage::disk('public')->delete($movie->poster_path);
            }

            $data['poster_path'] = $request->file('poster')->store('posters', 'public');
        }

        $movie->update([
            'title' => $data['title'],
            'poster_path' => $data['poster_path'] ?? $movie->poster_path ?? 'posters/default.jpg',
            'is_published' => $data['is_published'] ?? false,
        ]);

        $movie->genres()->sync($data['genres']);

        return redirect()->route('movies.index')->with('success', 'Movie updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {

        if ($movie->poster_path && $movie->poster_path !== 'posters/default.jpg') {
            Storage::disk('public')->delete($movie->poster_path);
        }

        $movie->genres()->detach();

        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted');
    }



    public function publish(Movie $movie)
    {
        $movie->update(['is_published' => true]);

        return redirect()->back()->with('success', 'Movie published');

    }
}
