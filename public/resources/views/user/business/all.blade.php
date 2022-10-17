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
                        My Account Businesses
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">
                    <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#paymentLinkModal"><b><i
                                data-feather="plus"></i></b> Create New Business</button>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main page content-->
<div class="container-xl px-4 mt-4">
    @include('includes.messages')

    <div class="card">
        <div class="card-header">My Businesses</div>
        <div class="card-body table-responsive p-0 px-2">
            <table id="datatablesSimple" class="table table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Business Name</th>
                        <th>Business Address</th>
                        <th>Business Phone</th>
                        <th>Business Email</th>
                        <th>Business Logo</th>
                        <th>Status</th>
                    </tr>
                </thead>
                @forelse ($businesses as $business)
                {{-- TODO: List all businesses --}}
                @empty
                <tr>
                    <td colspan="8" class="text-center"><small class="text-danger">No businesses to show</small></td>
                </tr>
                @endforelse
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- modal --}}
<div class="modal fade" id="paymentLinkModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New businesses</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-2">
                <p>coming soon...</p>
            </div>
            <div class="modal-footer p-2"><button class="btn btn-success btn-sm" type="button">Save Businesses</button>
            </div>
        </div>
    </div>
</div>

@endsection
