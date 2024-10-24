@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh; background: linear-gradient(to bottom right, #6a00f4, #ff009e);">
    <div class="register-box" style="background-color: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); border-radius: 15px; padding: 40px; width: 400px; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.37);">
        <h2 class="text-center text-white mb-4">Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label text-white">Name</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label text-white">Email Address</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label text-white">Password</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="password-confirm" class="form-label text-white">Confirm Password</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-light" style="border-radius: 30px;">Register</button>
            </div>
            <p class="text-center text-white mt-3">Already have an account? <a href="{{ route('login') }}" class="text-decoration-none text-white"><strong>Login here</strong></a></p>
        </form>
    </div>
</div>
@endsection
