@extends('layouts.auth')
@section('title','Account Login')

@section('content')

<!-- Basic login form-->
<div class="card shadow-lg border-2 rounded-lg mt-5">
    <div class="card-header justify-content-center text-center">
        <h3 class="fw-light my-4">Account Login</h3>
    </div>
    <div class="card-body">
        @include('includes.messages')
        <!-- Login form-->
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <!-- Form Group (email address)-->
            <div class="mb-3">
                <label class="small mb-1" for="inputEmailAddress">Email or Username</label>
                <input class="form-control @error('email') is-invalid @enderror" id="inputEmailAddress" name="username"
                    value="{{ old('email') }}" type="text" placeholder="Enter username or email address" />
                @error('email')
                <span class="text-danger text-small">{{ $message }}</span>
                @enderror
            </div>
            <!-- Form Group (password)-->
            <div class="mb-3">
                <label class="small mb-1" for="inputPassword">Password</label>
                <input class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password"
                    type="password" placeholder="Enter your password" />
                @error('password')
                <span class="text-danger text-small">{{ $message }}</span>
                @enderror
            </div>
            <!-- Form Group (remember password checkbox)-->
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" name="remember_me" id="rememberPasswordCheck" type="checkbox" />
                    <label class="form-check-label" for="rememberPasswordCheck">Remember password</label>
                </div>
            </div>
            <!-- Form Group (login box)-->
            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                <a class="small" href="#">Forgot Password?</a>
                <button class="btn btn-primary" type="submit">Login Now</button>
            </div>
        </form>
    </div>
    <div class="card-footer text-center">
        <div class="small"><a href="{{ route('register') }}">Need an account? Sign up!</a></div>
    </div>
</div>

@endsection
