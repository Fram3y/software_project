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
        <h2 class="form-label">Update Movie</h2>
    </div>
    {{-- End of Form Title --}}

    {{-- Update Form --}}
    <form action="{{ route('admin.movies.update', $movie) }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf

        {{-- Title --}}
        <div class="container my-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input 
            type="text"
            name = "title"
            field = "title"
            class="form-control mt-1" 
            autocomplete= "off"
            :value = "{{ $movie->title }}"
            >
        </div>

        {{-- Title error --}}
        @error('title')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        {{-- Synopsis --}}
        <div class="container mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Synopsis</label>
            <textarea 
            class="form-control" 
            type = "text"
            name = "synopsis"
            field = "synopsis"
            :value = "{{ $movie->synopsis }}"
            rows="3">
            </textarea>
        </div>

        {{-- Synopsis Error --}}
        @error('synopsis')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        {{-- Director Error --}}
        <div class="container my-3">
            <label for="exampleFormControlInput1" class="form-label">Director</label>
            <input 
            type="text"
            name = "director"
            field = "director"
            class="form-control mt-1" 
            autocomplete= "off"
            :value = "{{ $movie->director }}"
            >
        </div>

        {{-- Director Error --}}
        @error('director')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        {{-- Starring --}}
        <div class="container my-3">
            <label for="exampleFormControlInput1" class="form-label">Starring</label>
            <input 
            type="text"
            name = "starring"
            field = "starring"
            class="form-control mt-1" 
            autocomplete= "off"
            :value = "{{ $movie->starring }}"
            >
        </div>

        {{-- Starring Error --}}
        @error('starring')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        {{-- Release Date --}}
        <div class="container my-4">
            <label for="release_date">Release Date:</label>
            <input 
            type="date" 
            name="release_date"
            value="{{ $movie->release_date }}">
        </div>

        {{-- Release Date Error --}}
        @error('release_date')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        {{-- Genres --}}
        <div class="container my-4">
            <label for="genres">Genres:</label>
            <select name="genre_id">
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ (old('genre_id') == $genre->id) ? "selected" : ""}}>
                    {{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Genres Error --}}
        @error('genres')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        {{-- Movie Image --}}
        <div class="container my-4">
            <input 
            class="mt-2" 
            name="movie_image"
            field="movie_image"
            type="file" 
            placeholder="Block"
            value="{{ asset('storage/images/' . $movie->movie_image)}}"
            >
        </div>
            
        {{-- Movie Image Error --}}
        @error('movie_image')
            <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror

        <div class="container my-4">
            <button type="submit" class="btn btn-secondary px-4">Update Movie</button>
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