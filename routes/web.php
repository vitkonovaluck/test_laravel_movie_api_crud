<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('movies.index'));
});

Route::resource('movies', MovieController::class);
Route::post('movies/{movie}/publish', [MovieController::class, 'publish']);

Route::resource('genres', GenreController::class);
