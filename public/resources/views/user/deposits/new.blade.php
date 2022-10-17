@extends('layouts.main')
@section('title','New Collection')


@section('content')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="smartphone"></i></div>
                        Make A Deposit Request
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">
                    <a href="{{ route('new_collections') }}" class="btn btn-sm btn-primary"><b><i
                                data-feather="arrow-left"></i></b> All Deposit</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main page content-->
<div class="container-xl px-4 mt-4">
    @include('includes.messages')

    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">Provide Details Below</div>
                <div class="card-body">
                    Coming soon...
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">Instructions</div>
                <div class="card-body">
                    Coming soon...
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
