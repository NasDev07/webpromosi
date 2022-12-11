@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
    </div>


    <div class="col-lg-8">
        <form method="POST" action="/dashboard/posts" enctype="multipart/form-data" class="mt-5">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" required autofocus value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    value="{{ old('slug') }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                    name="harga" value="{{ old('harga') }}">
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
                        @if (old('category_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                <img class="img-preview img-fluid my-3 col-md-3">
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
                <label for="image1" class="form-label">Post Image</label>
                <img class="img-preview1 img-fluid my-3 col-md-3">
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
                <label for="image2" class="form-label">Post Image</label>
                <img class="img-preview2 img-fluid my-3 col-md-3">
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
                <label for="image3" class="form-label">Post Image</label>
                <img class="img-preview3 img-fluid my-3 col-md-3">
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
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Create Post</button>
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

        function proviewImage1() {
            const image1 = document.querySelector('#image1');
            const imgPreview1 = document.querySelector('.img-preview1');

            imgPreview1.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image1.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview1.src = oFREvent.target.result;
            };
        }

        function proviewImage2() {
            const image2 = document.querySelector('#image2');
            const imgPreview2 = document.querySelector('.img-preview2');

            imgPreview2.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image2.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview2.src = oFREvent.target.result;
            };
        }

        function proviewImage3() {
            const image3 = document.querySelector('#image3');
            const imgPreview3 = document.querySelector('.img-preview3');

            imgPreview3.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image3.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview3.src = oFREvent.target.result;
            };
        }
    </script>
@endsection
