<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/movieDetails/{movieId}', [MovieController::class, 'show'])->name('movie.details');
