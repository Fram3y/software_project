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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
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

    /**
     * Store a newly created resource in storage.
     */
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

        // Create Movie (Had a werid error with schema)
        $order = new Order;
        $order->tickets = $request->tickets;
        $order->cinema_id = $request->cinema_id;
        $order->screening_id = $request->screening_id;
        $order->movie_id = $request->movie_id;
        $order->save();

        // Re-Route Back to Homepage
        return to_route('admin.movies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
