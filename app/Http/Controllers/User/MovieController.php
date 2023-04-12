<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Cinema;
use App\Models\Screening;
use App\Models\Order;

class MovieController extends Controller
{
    public function index()
    {
        // Definition of Movies and Genres
        $movies = Movie::paginate(5);
        $genres = Genre::all();

        return view('user.movies.index')->with('movies', $movies)->with('genres', $genres);
    }

    public function show(Movie $movie)
    {
        // Definition of Variables        
        $cinemas = Cinema::all();
        $screenings = Screening::all();
        $genres = Genre::where("id", $movie->genre_id)->firstOrFail();

        return view('user.movies.show')->with('movie', $movie)->with('cinemas', $cinemas)->with('screenings', $screenings)->with('genres', $genres);
    }
}

