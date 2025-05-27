<?php

use App\Http\Controllers\Api\GenreApiController;
use App\Http\Controllers\Api\MovieApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/genres', [GenreApiController::class, 'index']);
Route::get('/genres/{id}', [GenreApiController::class, 'movies']);

Route::get('/movies', [MovieApiController::class, 'index']);
Route::get('/movies/{id}', [MovieApiController::class, 'show']);
