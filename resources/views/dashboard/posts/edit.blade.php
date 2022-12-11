@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
    </div>


    <div class="col-lg-8">
        <form method="POST" action="/dashboard/posts/{{ $post->slug }}" class="mt-5" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" required autofocus value="{{ old('title', $post->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    value="{{ old('slug', $post->slug) }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga"
                    value="{{ old('harga', $post->harga) }}">
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $category)
                        @if (old('category_id', $post->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                <input type="hidden" name="oldImage" value="{{ $post->image }}">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid my-3 col-md-3 d-block">
                @else
                    <img class="img-preview img-fluid my-3 col-md-3">
                @endif
                <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" value="{{ old('image') }}" onchange="proviewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- image 1 --}}
            <div class="mb-3">
                <label for="image1" class="form-label">Post Image1</label>
                <input type="hidden" name="oldImage" value="{{ $post->image1 }}">
                @if ($post->image1)
                    <img src="{{ asset('storage/' . $post->image1) }}" class="img-preview1 img-fluid my-3 col-md-3 d-block">
                @else
                    <img class="img-preview1 img-fluid my-3 col-md-3">
                @endif
                <input class="form-control  @error('image1') is-invalid @enderror" type="file" id="image1"
                    name="image1" value="{{ old('image1') }}" onchange="proviewImage1()">
                @error('image1')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- image 2 --}}
            <div class="mb-3">
                <label for="image2" class="form-label">Post Image2</label>
                <input type="hidden" name="oldImage" value="{{ $post->image2 }}">
                @if ($post->image2)
                    <img src="{{ asset('storage/' . $post->image2) }}" class="img-preview2 img-fluid my-3 col-md-3 d-block">
                @else
                    <img class="img-preview2 img-fluid my-3 col-md-3">
                @endif
                <input class="form-control  @error('image2') is-invalid @enderror" type="file" id="image2"
                    name="image2" value="{{ old('image2') }}" onchange="proviewImage2()">
                @error('image2')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- image 3 --}}
            <div class="mb-3">
                <label for="image3" class="form-label">Post Image3</label>
                <input type="hidden" name="oldImage" value="{{ $post->image3 }}">
                @if ($post->image3)
                    <img src="{{ asset('storage/' . $post->image3) }}" class="img-preview3 img-fluid my-3 col-md-3 d-block">
                @else
                    <img class="img-preview3 img-fluid my-3 col-md-3">
                @endif
                <input class="form-control  @error('image3') is-invalid @enderror" type="file" id="image3"
                    name="image3" value="{{ old('image3') }}" onchange="proviewImage3()">
                @error('image3')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="body"></trix-editor>
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Update Post</button>
            <br><br>
        </form>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', () => {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug);
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });


        function proviewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            };
        }
    </script>
@endsection
