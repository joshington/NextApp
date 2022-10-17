@if (session()->has('error'))
<div class="alert alert-danger alert-icon" role="alert">
    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    <div class="alert-icon-aside">
        <i data-feather="feather"></i>
    </div>
    <div class="alert-icon-content">
        {{ session()->get('error') }}
    </div>
</div>
@endif

@if (session()->has('message'))
<div class="alert alert-primary alert-icon" role="alert">
    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    <div class="alert-icon-aside">
        <i class="far fa-flag"></i>
    </div>
    <div class="alert-icon-content">
        {{ session()->get('message') }}
    </div>
</div>
@endif

@if (session()->has('success'))
<div class="alert alert-success alert-icon" role="alert">
    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    <div class="alert-icon-aside">
        <i data-feather="check"></i>
    </div>
    <div class="alert-icon-content">
        {{ session()->get('success') }}
    </div>
</div>
@endif

{{-- @if ($errors->any())
<div class="alert alert-danger alert-icon" role="alert">
    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    <div class="alert-icon-aside">
        <i data-feather="feather"></i>
    </div>
    <div class="alert-icon-content">
        <h5>Errors:</h5>
        <ol>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ol>
    </div>
</div>
@endif --}}
