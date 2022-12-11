@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8">
                <h2 class="my-3">{{ $post['title'] }}</h2>

                <a href="/dashboard/posts" class="btn btn-success btn-sm"> <i class="bi bi-arrow-left"></i> Back to my post</a>

                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning btn-sm"><i
                        class="bi bi-pencil-square"></i> Edit</a>

                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm border-0" onclick="return confirm('Are you sure?')"><i
                            class="bi bi-x-circle-fill"></i> Delete</button>
                </form>

                @if ($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-3"
                    alt="{{ $post->category->name }}" class="img-fluid ">
                </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top mt-3"
                        alt="{{ $post->category->name }}" class="img-fluid ">
                @endif

                <article>
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
@endsection
