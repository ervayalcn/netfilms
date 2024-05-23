<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function show($movieId)
    {
        return view('movieDetails', ['movieId' => $movieId]);
    }
}
