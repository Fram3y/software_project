@extends('layouts.app')

@section('content')
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/8c4bde81e2.js" crossorigin="anonymous"></script>

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
                        <a class="nav-link active text-light" aria-current="page"
                            href="{{ route('user.movies.index') }}">Home</a>
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
                            <li><a class="dropdown-item" href="{{ route('user.orders.index') }}">My Orders</a></li>
                            <li>
                                @auth
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @endauth
                            </li>
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
    <form action="{{ route('user.orders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Movies --}}
        <div class="container my-4">
            <label class="form-label" for="movies">Movies :</label>
            <select name="movie_id">
                @foreach ($movies as $movie)
                    <option value="{{ $movie->id }}" {{ old('movie_id') == $movie->id ? 'selected' : '' }}>
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
            <label class="form-label" for="cinema_id">Cinema :</label>
            <select name="cinema_id">
                @foreach ($cinemas as $cinema)
                    <option value="{{ $cinema->id }}">
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
            <label class="form-label" for="screening_id">Screenings :</label>
            <select name="screening_id">
                @foreach ($screenings as $screening)
                    <option value="{{ $screening->id }}">
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
            <input type="number" placeholder="Tickets" name="tickets" field="tickets" class="form-control mt-1"
                autocomplete="off" :value="@old('tickets')">
        </div>

        {{-- Tickets Error --}}
        <div class="container">
            @error('tickets')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="container my-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="container mt-5">
            <h3>Billing Information</h3>
        </div>

        <div class="container my-3">
            <label class="form-label">Card Number</label>
            <input type="text" class="form-control" id="exampleFormControlInput1">
        </div>

        <div class="container d-flex my-3">
            <!-- Date -->
            <div class="mb-4 me-4">
                <label class="form-label">Expiry Date</label>
                <input type="date" class="form-control" id="exampleFormControlInput1">
            </div>
            <!-- CCV -->
            <div class="mb-4">
                <label class="form-label">CCV</label>
                <input type="text" class="form-control" id="exampleFormControlInput1">
            </div>
        </div>


        <div class="container mt-5">
            <h3>Alternate Methods</h3>
        </div>

        <div class="container border border-1 rounded">
            <div class="d-flex align-items-center justify-content-between py-3 ps-2">
                <div class="d-flex align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    </div>
                    <h5 class="m-0">PayPal</h5>
                </div>
                <i class="fa-brands fa-paypal fs-1 me-4"></i>
            </div>
        </div>

        <div class="container border border-1 rounded mt-3 mb-4">
            <div class="d-flex align-items-center justify-content-between py-3 ps-2">
                <div class="d-flex align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    </div>
                    <h5 class="m-0">Google Pay</h5>
                </div>
                <i class="fa-brands fa-google-wallet fs-1 me-4"></i>
            </div>
        </div>
        {{-- End of Alternate Methods --}}

        {{-- Seat Selection --}}
        <div class="container mt-5">
            <h3>Choose Your Seats</h3>
        </div>
    
        {{-- Seat Legend --}}
        <div class="container bg-secondary text-light d-flex justify-content-evenly py-4">
            <div class="text-center">
                <h1 class="m-0"><i class="fa-solid fa-couch text-warning"></i></h1>
                <h5 class="m-0 pt-1">Selected</h5>
            </div>
            
            <div class="text-center">
                <h1 class="m-0"><i class="fa-solid fa-couch text-primary"></i></h1>
                <h5 class="m-0 pt-1">Unavailable</h5>
            </div>
    
            <div class="text-center">
                <h1 class="m-0"><i class="fa-solid fa-couch text-access"></i></h1>
                <h5 class="m-0 pt-1">Accessibility Seating</h5>
            </div>
        </div>
        {{-- End of Seat Legend --}}
    
        {{-- Seat Selection --}}
        <div class="container">
            {{-- Row F --}}
            <div class="d-flex justify-content-evenly text-dark mx-5 mt-4">
                <h2>F</h2>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
            </div>
            {{-- End of Row F --}}
    
            {{-- Row E --}}
            <div class="d-flex justify-content-evenly text-dark mx-5 mt-4">
                <h2>E</h2>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
            </div>
            {{-- End of Row E --}}
    
            {{-- Row D --}}
            <div class="d-flex justify-content-evenly text-dark mx-5 mt-4">
                <h2>D</h2>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
            </div>
            {{-- End of Row D --}}
    
            {{-- Row C --}}
            <div class="d-flex justify-content-evenly text-dark mx-5 mt-4">
                <h2>C</h2>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
            </div>
            {{-- End of Row C --}}
    
            {{-- Row B --}}
            <div class="d-flex justify-content-evenly text-dark mx-5 mt-4">
                <h2>B</h2>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
                <h1><i class="fa-solid fa-couch"></i></h1>
            </div>
            {{-- End of Row B --}}
    
            {{-- Number Row --}}
            <div class="d-flex justify-content-evenly text-dark mx-5 mt-4">
                <h2>A</h2>
    
                <div class="text-center">
                    <h1><i class="fa-solid fa-couch"></i></h1>
                    <h3>1</h3>
                </div>
                
                <div class="text-center">
                    <h1><i class="fa-solid fa-couch"></i></h1>
                    <h3>2</h3>
                </div>
                <div class="text-center">
                    <h1><i class="fa-solid fa-couch"></i></h1>
                    <h3>3</h3>
                </div>
                <div class="text-center">
                    <h1><i class="fa-solid fa-couch"></i></h1>
                    <h3>4</h3>
                </div>
                <div class="text-center">
                    <h1><i class="fa-solid fa-couch"></i></h1>
                    <h3>5</h3>
                </div>
                <div class="text-center">
                    <h1><i class="fa-solid fa-couch"></i></h1>
                    <h3>6</h3>
                </div>
                <div class="text-center">
                    <h1><i class="fa-solid fa-couch"></i></h1>
                    <h3>7</h3>
                </div>
            </div>
            {{-- End of Number Row --}}
        </div>
        {{-- End of Seat Selection --}}

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
