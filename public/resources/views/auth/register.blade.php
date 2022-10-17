@extends('layouts.auth')
@section('title','Create Free Account')

@section('content')

<!-- Basic login form-->
<div class="card shadow-lg border-2 rounded-lg mt-5">
    <div class="card-header justify-content-center text-center">
        <h3 class="fw-light my-4">Create Free Account</h3>
    </div>
    <div class="card-body">
        @include('includes.messages')
        <!-- register form-->
        @section('auth-7','col-lg-8')

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <!-- Form Row-->
            <div class="row gx-3">
                <div class="col-md-6">
                    <!-- Form Group (first name)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputFirstName">First Name</label>
                        <input class="form-control @error('first_name') is-invalid @enderror" id="inputFirstName" type="text" name='first_name'
                            placeholder="Enter first name" value="{{ old('first_name') }}" />
                        @error('first_name')
                        <span class="text-danger text-small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Form Group (last name)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputLastName">Last Name</label>
                        <input class="form-control @error('last_name') is-invalid @enderror" id="inputLastName" type="text" name="last_name" value="{{ old('last_name') }}"
                            placeholder="Enter last name" />
                        @error('last_name')
                        <span class="text-danger text-small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- Form Group (email address)            -->
            <div class="row gx-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" id="inputEmailAddress" type="email" name="email" aria-describedby="emailHelp"
                        value="{{ old('email') }}" placeholder="Enter email address" />
                        @error('email') 
                        <span class="text-danger text-small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="small mb-1" for="inputPhoneAddress">Phone Number</label>
                        <input class="form-control @error('phone') is-invalid @enderror" id="inputPhoneAddress" type="number" value="{{ old('phone') }}" name="phone" placeholder="Enter phone number" />
                        @error('phone')
                        <span class="text-danger text-small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- Form Row    -->
            <div class="row gx-3">
                <div class="col-md-6">
                    <!-- Form Group (password)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputPassword">Password</label>
                        <input class="form-control @error('password') is-invalid @enderror" id="inputPassword" type="password" name="password" placeholder="Enter password" />

                        @error('password')
                        <span class="text-danger text-small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Form Group (confirm password)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                        <input class="form-control" id="inputConfirmPassword" type="password"
                            name="password_confirmation" placeholder="Confirm password" />
                    </div>
                </div>
            </div>
            <!-- Form Group (create account submit)-->
            <div class="align-items-right text-right">
                <button class="btn btn-primary text-right" type="submit"><i class="fa fa-user-plus"></i> &nbsp; Create
                    Account </button>
            </div>
        </form>

    </div>
    <div class="card-footer text-center">
        <div class="small"><a href="{{ route('login') }}">Have an account already? Sign In!</a></div>
    </div>
</div>

@endsection
