@extends('layouts.app')

@section('content')
<div class="container mt-5">

    @if(session('success'))
    <div id="successAlert" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body d-flex justify-content-between align-items-center">
            <strong>Galeri</strong>

            <div>
                <div class="d-flex">
                    <a href="{{ route('galeri.create') }}" type="button" class="btn btn-primary mx-2">
                        Create
                    </a>
                    @auth
                    <form action="{{ route('logout') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        @foreach($data as $item)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">

                    <a href="{{ route('galeri.show', ['id' => $item->id] ) }}" data-lightbox="galeri">
                        <img src="{{ asset('images/' . $item->featured_image ) }}" alt="{{ $item->title }}"
                            class="card-img-top img-fluid">
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('#successAlert').fadeOut('slow');
        }, 2000);
    });
</script>
@endsection