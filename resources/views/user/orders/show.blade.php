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

{{-- Main Content --}}
<div class="bg-primary">
    <div class="container">

        <h1 class="text-light py-4">Your Order</h1>

        <h1 class="text-light py-2">{{ $movie->title }}</h1>
        <h3 class="text-light py-2">{{ $screening->time}}</h3>
        <h3 class="text-light py-2">{{ $cinema->name }}</h3>
        <h3 class="text-light py-2 pb-3 m-0">Tickets : {{ $order->tickets }}</h3>
    </div>

    <div class="container">
        <div>
            <form action="{{ route('user.orders.destroy', $order) }}" method="POST">
            @method('delete')
            @csrf
            <p class="m-0 py-4"><button type="submit" class="btn btn-secondary" onclick="return confirm('Are you sure you wish to cancel your order?')">Cancel Order</button></p>
            </form>
        </div>
    </div>
</div>
{{-- End of Main Content --}}

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