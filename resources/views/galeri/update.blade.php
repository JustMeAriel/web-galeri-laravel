@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h2>Update</h2>

            <form action="{{ route('galeri.update', ['id' => $galeri->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $galeri->title }}" required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="3" required>{{ $galeri->content }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="featured_image" class="form-label">New Featured Image</label>
                    <input type="file" class="form-control" id="featured_image" name="featured_image">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('galeri.index') }}" class="btn btn-warning">Kembali</a>

            </form>
        </div>
    </div>
</div>
@endsection
