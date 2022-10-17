@extends('layouts.main')
@section('title','Businesses')


@section('content')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="file-text"></i></div>
                        Developer Options
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main page content-->
<div class="container-xl px-4 mt-4">
    @include('includes.messages')

    <nav class="nav nav-borders">
        <a class="nav-link ms-0" href="{{ route('api_home') }}">API Status</a>
        <a class="nav-link" href="{{ route('api_settings') }}">API Keys</a>
        <a class="nav-link active" href="{{ route('api_webhook') }}">Webhook Settings</a>
    </nav>
    <hr class="mt-0 mb-4" />

    <div class="card">
        <div class="card-header">Let the API send you updates</div>
        <div class="card-body">
            Coming soon...
        </div>
    </div>
</div>

@endsection
