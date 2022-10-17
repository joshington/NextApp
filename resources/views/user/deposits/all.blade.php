@extends('layouts.main')
@section('title','Collections')


@section('content')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="file-text"></i></div>
                        My Account Collections (Deposits)
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">
                    <a href="{{ route('new_collections') }}" class="btn btn-sm btn-dark"><b><i
                                data-feather="plus"></i></b> New Deposit</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main page content-->
<div class="container-xl px-4 mt-4">
    @include('includes.messages')

    <div class="card">
        <div class="card-header">Transactions History</div>
        <div class="card-body table-responsive p-0 px-2">
            <table id="datatablesSimple" class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"><strong>Transaction ID</strong></th>
                        <th><strong>Phone</strong></th>
                        <th scope="col"><strong>Amount</strong></th>
                        <th scope="col"><strong>Mode</strong></th>
                        <th scope="col"><strong>Date</strong></th>
                        <th scope="col"><strong>Status</strong></th>
                        <th><strong>Actions</strong></th>
                    </tr>
                </thead>
                @forelse ($collections as $item)
                    {{-- TODO: List all transaction --}}
                @empty
                    <tr>
                        <td colspan="8" class="text-center"><small class="text-danger">No transactions to show</small></td>
                    </tr>
                @endforelse
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
