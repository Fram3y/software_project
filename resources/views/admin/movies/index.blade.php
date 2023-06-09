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

    {{-- Advert Carousel --}}
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://i.imgur.com/ZLPqCjU.jpg" class="d-block w-100" height="300px" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://i.imgur.com/QZEW1iH.jpg" class="d-block w-100" height="300px" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://i.imgur.com/VCd6Gqz.jpg" class="d-block w-100" height="300px" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- End of Advert Carousel --}}

    {{-- Screening in your area --}}
    <div class="bg-primary">
        <div class="container p-0 bg-primary">
            <div class="bg-primary">
                <h2 class="d-flex justify-content-center text-light py-4">Screening in your area</h2>
            </div>

            <div class="d-flex justify-content-evenly">
                @forelse ($movies as $movie)
                    <a href="{{ route('admin.movies.show', $movie) }}">
                        <div>
                            <img src="{{ asset('storage/images/' . $movie->movie_image) }}" width="200" height="300"
                                alt="movieImage">
                            <p class="d-flex justify-content-center text-light text-decoration-underline">{{ $movie->title }}</p>
                        </div>
                    </a>
                @empty
            </div>
            @endforelse
        </div>
    </div>
    {{-- End of Screening in your area --}}

    {{-- Advert --}}
    <div class="pt-4">
        <img src="https://i.imgur.com/8hfZPol.jpg"
            class="d-block w-100" height="300px" alt="advert-1">
    </div>
    {{-- End of Advert --}}

    {{-- Special Offers --}}
    <div class="bg-primary">
        <h2 class="d-flex justify-content-center text-light py-4">Special Offers</h2>
    </div>

    <div class="container p-0 py-4 pb-5">
        <div class="row grid gap-2 justify-content-center">

            {{-- Card 1 --}}
            <div class="col-lg p-0">
                <div class="bg-light offer-width rounded border border-dark border-2">
                    <img src="https://drogheda.arccinema.ie/articleimages/rsz_sweet_cinema_sunday_original_artwork.jpg"
                        alt="special-offer-image" class="img-fluid rounded">
                    <h4 class="ps-1 pt-3">Special Offer</h4>
                    <p class="ps-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea molestias voluptatibus
                        temporibus
                        non modi cupiditate omnis aperiam, ad provident nisi maxime hic, excepturi dolore ipsa incidunt
                        debitis
                        reprehenderit, quibusdam harum.
                    </p>
                </div>
            </div>
            {{-- End of Card 1 --}}

            {{-- Card 2 --}}
            <div class="col-lg p-0">
                <div class="bg-light offer-width rounded border border-dark border-2">
                    <img src="https://drogheda.arccinema.ie/articleimages/rsz_sweet_cinema_sunday_original_artwork.jpg"
                        alt="special-offer-image" class="img-fluid rounded">
                    <h4 class="ps-1 pt-3">Special Offer</h4>
                    <p class="ps-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea molestias voluptatibus
                        temporibus
                        non modi cupiditate omnis aperiam, ad provident nisi maxime hic, excepturi dolore ipsa incidunt
                        debitis
                        reprehenderit, quibusdam harum.
                    </p>
                </div>
            </div>
            {{-- End of Card 2 --}}

            {{-- Card 3 --}}
            <div class="col-lg p-0">
                <div class="bg-light offer-width rounded border border-dark border-2">
                    <img src="https://drogheda.arccinema.ie/articleimages/rsz_sweet_cinema_sunday_original_artwork.jpg"
                        alt="special-offer-image" class="img-fluid rounded">
                    <h4 class="ps-1 pt-3">Special Offer</h4>
                    <p class="ps-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea molestias voluptatibus
                        temporibus
                        non modi cupiditate omnis aperiam, ad provident nisi maxime hic, excepturi dolore ipsa incidunt
                        debitis
                        reprehenderit, quibusdam harum.
                    </p>
                </div>
            </div>
            {{-- End of Card 3 --}}

            {{-- Card 4 --}}
            <div class="col-lg p-0">
                <div class="bg-light offer-width rounded border border-dark border-2">
                    <img src="https://drogheda.arccinema.ie/articleimages/rsz_sweet_cinema_sunday_original_artwork.jpg"
                        alt="special-offer-image" class="img-fluid rounded">
                    <h4 class="ps-1 pt-3">Special Offer</h4>
                    <p class="ps-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea molestias voluptatibus
                        temporibus
                        non modi cupiditate omnis aperiam, ad provident nisi maxime hic, excepturi dolore ipsa incidunt
                        debitis
                        reprehenderit, quibusdam harum.
                    </p>
                </div>
            </div>
            {{-- End of Card 4 --}}
        </div>

    </div>
    {{-- End of Special Offers --}}

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
