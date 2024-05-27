@extends('layouts.app')
@section('content')
    <div class="p-5 mb-4 bg-light d-flex align-items-center" style="height: calc(100vh - 25px)">
        <div class="container py-5">
            <h1 class="display-5 fw-bold">Enter inside of Portofolio</h1>
            <p class="col-md-8 fs-4">
                This portfolio contains all my projects that I have done during my journey with Boolean, and future ones. If
                you want to see them you must first register and then log in
            </p>
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">{{ __('Login') }}</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-light btn-lg border-black">{{ __('Register') }}</a>
            @endif

        </div>
    </div>
@endsection
