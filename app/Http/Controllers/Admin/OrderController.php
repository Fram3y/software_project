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

class OrderController extends Controller
{

    public function index()
    {
        // User Authentication
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // Definintion of Movies
        $orders = Order::all();
        $movies = Movie::all();
        $genres = Genre::all();
        $cinemas = Cinema::all();
        $screenings = Screening::all();

        $orders = Order::paginate(5);

        // Route to home page
        return view('admin.orders.index')->with('orders', $orders)->with('movies', $movies)->with('genres', $genres)->with('cinemas', $cinemas)->with('screenings', $screenings);
    }

    public function create()
    {
        // User Authentication
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // Definition of Movies And Genres
        $movies = Movie::all();
        $genres = Genre::all();
        $cinemas = Cinema::all();
        $screenings = Screening::all();

        // Re-Route to Create Page
        return view('admin.orders.create')->with('movies', $movies)->with('genres', $genres)->with('cinemas', $cinemas)->with('screenings', $screenings);
    }

    public function store(Request $request)
    {
        // User Authentication
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // Movie Validation
        $request -> validate([
            'tickets' => 'required|max:2',
            'cinema_id' => 'required',
            'screening_id' => 'required',
            'movie_id' => 'required'
        ]);

        // Create Order (Had a werid error with schema)
        $order = new Order;
        $order->tickets = $request->tickets;
        $order->cinema_id = $request->cinema_id;
        $order->screening_id = $request->screening_id;
        $order->movie_id = $request->movie_id;
        $order->save();

        // Re-Route Back to Homepage
        return to_route('admin.movies.index');
    }

    public function show(Order $order)
    {
        $cinema = Cinema::where("id", $order->cinema_id)->firstOrFail();
        $screening = Screening::where("id", $order->screening_id)->firstOrFail();
        $movie = Movie::where("id", $order->movie_id)->firstOrFail();
        
        // Route to The Show Movie Page
        return view('admin.movies.show')->with('order', $order)->with('cinema', $cinema)->with('screening', $screening)->with('movie', $movie);
    }

    public function edit(Order $order)
    {
        // Won't be needed for the project
    }

    public function update(Request $request, Order $order)
    {
        // Won't be needed for the project
    }

    public function destroy(Order $order)
    {
        // User Authentication
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // Deletes Order (Pretty Self Explanitory)
        $order->delete();

        // Re-Routes Back to Homepage
        return to_route('admin.movies.index');
    }
}
