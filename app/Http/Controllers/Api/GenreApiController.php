<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GenreResource;
use App\Http\Resources\MovieResource;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreApiController extends Controller
{

    public function index()
    {
       return  GenreResource::collection(Genre::all());
    }

    public function movies($id)
    {
        $genre = Genre::findOrFail($id);

        $movies = $genre->movies()->with('genres')->paginate(10);

        return response()->json([
            'genre'  => $genre->name,
            'movies' => MovieResource::collection($movies),
        ]);
    }
}
