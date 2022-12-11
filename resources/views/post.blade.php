@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-6 mt-2">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                            aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            @if ($post->image)
                                <div style="max-height: 350px; overflow:hidden;">
                                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-3"
                                        alt="{{ $post->category->name }}" class="img-fluid rounded">
                                </div>
                            @else
                                <img src="https://source.unsplash.com/1200x600?{{ $post->category->name }}"
                                    class="card-img-top mt-3" alt="{{ $post->category->name }}" class="img-fluid rounded">
                            @endif

                        </div>
                        <div class="carousel-item">
                            @if ($post->image1)
                                <div style="max-height: 350px; overflow:hidden;">
                                    <img src="{{ asset('storage/' . $post->image1) }}" class="card-img-top mt-3"
                                        alt="{{ $post->category->name }}" class="img-fluid rounded">
                                </div>
                            @else
                                <img src="https://source.unsplash.com/1200x600?{{ $post->category->name }}"
                                    class="card-img-top mt-3" alt="{{ $post->category->name }}" class="img-fluid rounded">
                            @endif
                        </div>
                        <div class="carousel-item">
                            @if ($post->image2)
                                <div style="max-height: 350px; overflow:hidden;">
                                    <img src="{{ asset('storage/' . $post->image2) }}" class="card-img-top mt-3"
                                        alt="{{ $post->category->name }}" class="img-fluid rounded">
                                </div>
                            @else
                                <img src="https://source.unsplash.com/1200x600?{{ $post->category->name }}"
                                    class="card-img-top mt-3" alt="{{ $post->category->name }}" class="img-fluid rounded">
                            @endif
                        </div>
                        <div class="carousel-item">
                            @if ($post->image3)
                                <div style="max-height: 350px; overflow:hidden;">
                                    <img src="{{ asset('storage/' . $post->image3) }}" class="card-img-top mt-3"
                                        alt="{{ $post->category->name }}" class="img-fluid rounded">
                                </div>
                            @else
                                <img src="https://source.unsplash.com/1200x600?{{ $post->category->name }}"
                                    class="card-img-top mt-3" alt="{{ $post->category->name }}" class="img-fluid rounded">
                            @endif
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                {{-- from --}}
                @include('contactemail.contactForm')

            </div>
            <div class="col-md-6 mt-2">
                <div>
                    <h3 class="card-title">{{ $post['title'] }}</h3>

                    <h5 class="text-muted mt-2">Rp. {{ $post->harga }}</h5>

                    <p>By.
                        <a href="/authors/{{ $post->author->username }}"
                        class="text-decoration-none">{{ $post->author->name }}</a> in
                    <a href="/categories/{{ $post->category->slug }}"
                        class="text-decoration-none">{{ $post->category->name }}</a>
                </p>

                    <article class="my-3 fs-5">
                        {!! $post->body !!}
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection
