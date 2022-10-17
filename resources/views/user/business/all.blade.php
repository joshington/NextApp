@extends('layouts.main')
@section('title','Businesses')
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
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
                <h5 class="modal-title" style="font-weight: bold;">New business</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div>
                <div class="modal-body p-2" style="margin-left: 50px;">
                    <form  method="post" action="route{{'upload'}}" style="margin-bottom: 15px;">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="font-weight: bold;">
                                Business Name</label>
                            <input type="text" id="name" name="business_name"
                                style="width:70%;"
                                class="@error('name') is-invalid @enderror form-control">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="font-weight: bold;">
                                Business Address</label>
                            <input type="address" id="address"
                                style="width:70%;"
                                name="business_address"
                                class="@error('address') is-invalid @enderror form-control"
                            >
                            @error('address')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"
                                style="font-weight: bold;"
                            >Business Phone</label>
                            <input type="number" id="phone" name="business_phone"
                                style="width:70%;"
                                class="@error('phone') is-invalid @enderror form-control"
                            >
                            @error('phone')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"
                                style="font-weight: bold;"
                            >National ID</label>
                            <input type="file" id="nid" name="nid"
                                style="width:40%;"
                                class="
                                    @error('nid')
                                        is-invalid
                                     @enderror
                                    form-control
                                    bg-green-50 border border-gray-300 text-black
                                "
                            >
                            @error('nid')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1"
                                style="font-weight: bold;"
                            >Certificate of Inc</label>
                            <input type="file" id="cic" name="cic"
                                style="width:40%;"
                                class="
                                    @error('cic')
                                        is-invalid
                                     @enderror
                                    form-control
                                    bg-green-50 border border-gray-300 text-black
                                "
                            >
                            @error('cic')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                            {{-- display the success message --}}
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="modal-footer p-2">
                            <a href='route('upload')'>
                                <button class="btn btn-success btn-sm" type="submit">
                                    Save Business
                                </button>
                            </a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
