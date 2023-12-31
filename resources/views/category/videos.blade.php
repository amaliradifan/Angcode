@extends('layouts.main')
@section('container')
    <main style="min-height:50vh;background-color: #081b29; margin-top:140px !important; margin-bottom:100px !important;">
        <div style="margin-top: -34px" id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img style="opacity: 0.6" src="{{ asset('/img/allslide4.png') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 style="color: #00abf0">Explore a World of Knowledge</h3>
                        <p>Discover a diverse collection of coding tutorials, from HTML to JavaScript.
                            <br>Start your coding journey with our comprehensive video library.
                        </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img style="opacity: 0.6" src="{{ asset('/img/allslide5.png') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 style="color: #00abf0">Your Journey Starts Here</h5>
                            <p>Your coding journey begins with our comprehensive video library. <br> Start from the basics
                                and work your way up to advanced topics.
                            </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img style="opacity: 0.6" src="{{ asset('/img/allslide6.png') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 style="color: #00abf0">Empower Your Skills</h3>
                        <p>Empower your skills with structured video courses. Enhance your coding <br> expertise in the
                            world of web development.
                        </p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="col-10 mt-4 mb-5" style="margin-left:8%">
            <form action="/categories/{{ $category->slug}}">
                <div class="input-group offset-3" style="width:50%">
                    <input type="text" class="form-control" placeholder="Search Video" name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i
                            class='bx bx-search-alt-2 me-1'></i>Search</button>
                </div>
            </form>
            <h1 class="mt-3" style="color: white; font-weight:600">{{ $category->category_name }} Videos</h1>
            <div class="card border-info my-4 p-4" style="background: transparent; justify-content:center;">
                <div class="card-body">
                    @if ($videos->isEmpty())
                        <h1 class="text-center p-5 text-light">No Videos Available</h1>
                    @else
                        @foreach ($videos as $key => $video)
                            <a class="vid-link" href="/videos/{{ $video->id }}">
                                <div class="mb-4 m row">
                                    <img class="col-6" src="{{ $thumbnails[$key] }}" style="width: 30%;border-radius:8%">
                                    <div class="col-6 mt-4">
                                        <h4 class="text-decoration-none">{{ $video->title }}</h4>
                                        <h6 class="text-decoration-none mb-5" style="color: gray">{{ $video->maker }}</h6>
                                        <p class="text-decoration-none mt-5" style="color: gray">
                                            {{ Str::limit($video->created_at, $limit = 10, ' ') }}</p>
                                    </div>
                                </div>
                            </a>
                            <hr style="color:aqua; height:2px">
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="row mt-3">
                <div class="col d-flex align-items-center justify-content-center">
                    {{ $videos->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection
