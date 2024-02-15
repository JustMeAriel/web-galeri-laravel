@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-body">
        <h5 class="card-title">{{ $galeri->title }}</h5>
        <p class="card-text">{{ $galeri->content }}</p>
        <img src="{{ asset('images/' . $galeri->featured_image) }}" alt="{{ $galeri->title }}" style="max-width: 50%;" class="">
        
        {{-- Delete Button --}}
        <form action="{{ route('galeri.destroy', ['id' => $galeri->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-3">Delete</button>

            {{-- Update Button --}}
            <a href="{{ route('galeri.edit', ['id' => $galeri->id] ) }}" class="btn btn-warning mt-3">Edit</a>
        </form>
    </div>
</div>
<a href="{{ route('galeri.index') }}" class="btn btn-secondary mt-3">Back to Galeri</a>
@endsection
