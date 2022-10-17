@extends('layouts.main')
@section('title','Account Profile')


@section('content')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="file-text"></i></div>
                        My Account Profile
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main page content-->
<div class="container-xl px-4 mt-4">
    @include('includes.messages')

    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2"
                        src="{{ asset('assets/img/demo/user-placeholder.svg') }}" alt="" />
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <button class="btn btn-primary btn-sm" type="button">Upload new image</button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form action="{{ route('account') }}" method="POST">
                        @csrf
                        <div class="gx-3 mb-3">
                            <label class="small mb-1" for="password">Username (System  Genarated)</label>
                            <input class="form-control" readonly disabled type="text" value="{{ auth()->user()->username }}" />
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">First name</label>
                                <input class="form-control" id="inputFirstName" type="text"
                                    placeholder="Enter first name" required name="first_name" value="{{ auth()->user()->first_name }}" />
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" id="inputLastName" type="text"
                                    placeholder="Enter last name" name="last_name" value="{{ auth()->user()->last_name }}" />
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email"
                                    placeholder="Enter email address" name="email" value="{{ auth()->user()->email }}" />
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="phoneNumber">Phone Number</label>
                                <input class="form-control" name="phoneNumber" id="phone" type="number"
                                    placeholder="Enter phone number." value="0{{ auth()->user()->phone }}" />
                            </div>
                        </div>
                        <!-- Submit button-->
                        <button class="btn btn-success btn-sm" type="submit">Update Details</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
