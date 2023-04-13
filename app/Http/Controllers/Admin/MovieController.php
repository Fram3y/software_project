<?php

namespace App\Http\Controllers\Admin;

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
        // User Authentication
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // Definintion of Movies
        $movies = Movie::all();

        $movies = Movie::paginate(6);

        // Route to home page
        return view('admin.movies.index')->with('movies', $movies);
    }

    public function create()
    {
        // User Authentication
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // Definition of Movies And Genres
        $movies = Movie::all();
        $genres = Genre::all();

        // Re-Route to Create Page
        return view('admin.movies.create')->with('movies', $movies)->with('genres', $genres);
    }

    public function store(Request $request)
    {
        // User Authentication
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // Movie Validation
        $request->validate([
            'title' => 'required|max:255',
            'movie_image' => 'required',
            'movie_image_wide' => 'required',
            'synopsis' => 'required|max:255',
            'director' => 'required|max:255',
            'starring' => 'required|max:255',
            'release_date' => 'required',
            'genre_id' => 'required'
        ]);

        // Creating Variable For Movie Image And Extension
        $movie_image = $request->file('movie_image');
        $movie_image_wide = $request->file('movie_image_wide');
        $extension = $movie_image->getClientOriginalExtension();

        // Creating Unique File Name to Database
        $filename = date('Y-m-d-his') . '_' . $request->input('title') . '.' . $extension;
        $filename_wide = date('Y-m-d-his') . '_' . $request->input('title') . '.' . $extension;

        // Pushing File With New Name to Images Folder
        $path = $movie_image->storeAs('public/images', $filename);
        $path = $movie_image_wide->storeAs('public/images', $filename_wide);

        // Create Movie (Had a werid error with schema)
        $movie = new Movie;
        $movie->title = $request->title;
        $movie->synopsis = $request->synopsis;
        $movie->director = $request->director;
        $movie->starring = $request->starring;
        $movie->release_date = $request->release_date;
        $movie->movie_image = $filename;
        $movie->movie_image_wide = $filename_wide;
        $movie->genre_id = $request->genre_id;
        $movie->save();

        // Re-Route Back to Homepage
        return to_route('admin.movies.index');
    }

    public function show(Movie $movie)
    {
        // Definition of Variables        
        $cinemas = Cinema::all();
        $screenings = Screening::all();
        $genres = Genre::where("id", $movie->genre_id)->firstOrFail();
        
        // Route to The Show Movie Page
        return view('admin.movies.show')->with('movie', $movie)->with('cinemas', $cinemas)->with('screenings', $screenings)->with('genres', $genres);
    }

    public function edit(Movie $movie)
    {
        // User Authentication
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // Definition of Movies and Genres
        $genres = Genre::all();

        // Route to Edit Page
        return view('admin.movies.edit')->with('movie', $movie)->with('genres', $genres);
    }

    public function update(Request $request, Movie $movie)
    {
        // Movie Update Validation
        $request->validate([
            'title' => 'required|max:255',
            'movie_image' => 'required',
            'movie_image_wide' => 'required',
            'synopsis' => 'required|max:255',
            'director' => 'required|max:255',
            'starring' => 'required|max:255',
            'release_date' => 'required',
            'genre_id' => 'required'
        ]);

        // Definition of Genres
        $genres = Genre::all();

        // Creating Variable For Movie Image And Extension
        $movie_image = $request->file('movie_image');
        $movie_image_wide = $request->file('movie_image_wide');
        $extension = $movie_image->getClientOriginalExtension();
        $extension_wide = $movie_image_wide->getClientOriginalExtension();

        // Creating Unique File Name to Database
        $filename = date('Y-m-d-his') . '_' . $request->input('title') . '.' . $extension;
        $filename_wide = date('Y-m-d-his') . '_' . $request->input('title') . '.' . $extension_wide;

        // Pushing File With New Name to Images Folder
        $path = $movie_image->storeAs('public/images', $filename);
        $path_wide = $movie_image_wide->storeAs('public/images_wide', $filename_wide);

        // Update Movie Function (Ran Into Schema Error)
        $movie->title = $request->title;
        $movie->synopsis = $request->synopsis;
        $movie->director = $request->director;
        $movie->starring = $request->starring;
        $movie->release_date = $request->release_date;
        $movie->movie_image = $filename;
        $movie->movie_image_wide = $filename_wide;
        $movie->genre_id = $request->genre_id;
        $movie->save();

        // Re-Route Back to Homepage
        return to_route('admin.movies.index', $movie);
    }

    public function destroy(Movie $movie)
    {
        // User Authentication
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // Deletes Movie (Pretty Self Explanitory)
        $movie->delete();

        // Re-Routes Back to Homepage
        return to_route('admin.movies.index');
    }


}
