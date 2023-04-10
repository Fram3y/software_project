@extends('layouts.app')

@section('content')

{{-- Nav Bar --}}
<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="#">Presto Films</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="{{route('admin.movies.index')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="#">Films</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="#">Cinemas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="#">Offers & Gifts</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active text-light dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Account
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.movies.create') }}">Add Movie</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.orders.index') }}">My Orders</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
{{-- End of Nav Bar --}}

{{-- Form Title --}}
<div class="container my-4">
    <h2 class="form-label">Create New Order</h2>
</div>
{{-- End of Form Title --}}

{{-- Create Form --}}
<form action="{{ route('admin.orders.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Movies --}}
    <div class="container my-4">
        <label class="form-label" for="movies">Movies :</label>
        <select name="movie_id">
            @foreach ($movies as $movie)
                <option value="{{ $movie->id }}" {{ (old('movie_id') == $movie->id) ? "selected" : ""}}>
                {{ $movie->title }}</option>
            @endforeach
        </select>
    </div>

    {{-- Movie error --}}
    @error('movies')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    {{-- Cinemas --}}
    <div class="container my-4">
        <label class="form-label" for="movies">Cinema :</label>
        <select name="movie_id">
            @foreach ($cinemas as $cinema)
                <option value="{{ $cinema->id }}" {{ (old('cinema_id') == $cinema->id) ? "selected" : ""}}>
                {{ $cinema->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Cinemas error --}}
    @error('cinemas')
        <div class="text-danger">{{ $message }}</div>
    @enderror


    {{-- Screenings --}}
    <div class="container my-4">
        <label class="form-label" for="movies">Screenings :</label>
        <select name="movie_id">
            @foreach ($screenings as $screening)
                <option value="{{ $screening->id }}" {{ (old('screening_id') == $screening->id) ? "selected" : ""}}>
                {{ $screening->time }}</option>
            @endforeach
        </select>
    </div>

    {{-- Screenings error --}}
    @error('screenings')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    {{-- Tickets --}}
    <div class="container my-3">
        <input 
        type="number"
        placeholder="Tickets"
        name = "tickets"
        field = "tickets"
        class="form-control mt-1" 
        autocomplete= "off"
        :value = "@old('tickets')"
        >
    </div>

    {{-- Tickets Error --}}
    <div class="container">
        @error('tickets')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>
    
    <div class="container my-4">
        <button type="submit" class="btn btn-secondary px-4">Create New Order</button>
    </div>
</form>
{{-- End of Create Form --}}

{{-- Footer --}}
<div class="bg-secondary">
    <div class="container d-flex justify-content-evenly p-0 pt-5">
        <ul class="text-light">
            <h5>Cookie Policy</h5>
            <h5>Privacy and Legal</h5>
            <h5>Corporate Responsibility</h5>
            <h5>Professional Rizzemé</h5>
        </ul>
        <ul class="text-light">
            <h5>Contact Us</h5>
            <h5>Help</h5>
            <h5>Accessibility</h5>
            <h5>Allergen Information</h5>
        </ul>
        <ul class="text-light">
            <h5>About Us</h5>
            <h5>Careers</h5>
            <h5>Corporate Events</h5>
            <h5>Presto Scene</h5>
        </ul>
        <ul class="text-light">
            <h5>iOS App</h5>
            <h5>Android App</h5>
            <h5>Employee Applications</h5>
            <h5>Licensing Agreements</h5>
        </ul>
    </div>
</div>
{{-- End of Footer --}}
@endsection