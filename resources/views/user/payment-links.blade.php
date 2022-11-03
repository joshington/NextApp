@extends('layouts.main')
@section('title','Payement Links')


@section('content')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="file-text"></i></div>
                        My Account payment links
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">
                    <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#paymentLinkModal"><b><i
                                data-feather="plus"></i></b> Create New Link</button>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main page content-->
<div class="container-xl px-4 mt-4">
    @include('includes.messages')

    <div class="card">
        <div class="card-header">Payment Links</div>
        <div class="card-body table-responsive p-0 px-2">
            <table id="datatablesSimple" class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                    <th>Link name</th>
                    <th scope="col">Type</th>
                    <th>Business</th>
                    <th>Amount</th>
                    <th scope="col">Created</th>
                    <th>View link</th>
                    </tr>
                </thead>
                @forelse ($links as $link)
                    {{-- TODO: List all links --}}
                @empty
                    <tr>
                        <td colspan="8" class="text-center"><small class="text-danger">No payment links to show</small></td>
                    </tr>
                @endforelse
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- modal --}}
<div class="modal fade" id="paymentLinkModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="text-align: center;">New Payment Link</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-2">
                <p>coming soon...</p>
            </div>
            <div class="modal-footer p-2"><button class="btn btn-success btn-sm" type="button">Save Payment Link</button></div>
        </div>
    </div>
</div>

@endsection
