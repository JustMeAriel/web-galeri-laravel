<!-- resources/views/sesi/login.blade.php -->
@extends('layouts.app')
@section('scripts')
@section('content')
    <div class="container mt-5">
        <div class="card shadow mx-5">
            <div class="card-body">
                @if(session('success'))
                    <div id="successAlert" class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <h2>Login</h2>

                <form action="{{ route('login') }}" method="POST">
                    
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                            {{ __('Registered?') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#successAlert').fadeOut('slow');
            }, 2000);
        });
    </script>
@endsection
