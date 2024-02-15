@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h2>Create</h2>

            <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="featured_image" class="form-label">Featured Image</label>
                    <input type="file" class="form-control" id="featured_image" name="featured_image" required
                        onchange="previewImage()">
                    <img id="featured_image_preview" class="mt-3 rounded-3" style="max-width: 40%;">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('galeri.index') }}" type="button" class="btn btn-warning">Kembali</a>

            </form>

            <script>
                document.getElementById('featured_image').onchange = function (evt) {
                    const [file] = this.files
                    if (file) {
                        document.getElementById('featured_image_preview').src = URL.createObjectURL(file)
                    }
                }
            </script>
        </div>
    </div>
</div>
@endsection