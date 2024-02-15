@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-body d-flex justify-content-between align-items-center">
        <strong>Galeri</strong>
        <a href="{{ route('galeri.create') }}" type="button" class="btn btn-primary ms-auto">
            Create
        </a>
    </div>
</div>

<div class="row mt-3">
    @foreach($data as $item)
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                {{-- Image --}}
                <a href="{{ route('galeri.show', ['id' => $item->id] ) }}" data-lightbox="galeri">
                <img src="{{ asset('images/' . $item->featured_image ) }}" alt="{{ $item->title }}" class="card-img-top img-fluid">
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection