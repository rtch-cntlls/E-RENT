@extends('layouts.guest')
@section('title', 'Login • E-Rent')
@section('content')
@include('components.sweetAlert')
<div class="min-vh-100 d-flex align-items-center justify-content-center bg-light page-fade">
    <div class="container mt-5">
        <div class="row justify-content-center shadow-sm overflow-hidden bg-white">
            <div class="col-lg-5 col-md-8 p-5">
                <div class="text-center mb-3">
                    <p class="text-muted mb-0">Find your perfect rental home</p>
                </div>
                <h5 class="text-center fw-semibold mb-4 text-dark">Welcome back</h5>
                <div class="mb-3">
                    <a href="{{ route('login.google') }}" 
                        class="btn btn-dark w-100 d-flex align-items-center justify-content-center gap-2 rounded-pill">
                        <img src="https://www.google.com/favicon.ico" alt="Google" width="18">
                        Continue with Google
                    </a>                 
                </div>
                <div class="d-flex align-items-center my-3">
                    <hr class="flex-grow-1 border-muted">
                    <span class="px-2 text-muted small">OR</span>
                    <hr class="flex-grow-1 border-muted">
                </div>
                <form id="loginForm" method="POST" action="{{ route('guest.login.submit') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label text-dark">Email Address</label>
                        <input type="email" name="email" id="email" 
                               class="form-control rounded-pill @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" placeholder="you@example.com" autofocus>
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label text-dark">Password</label>
                        <input type="password" name="password" id="password"
                               class="form-control rounded-pill pe-5 @error('password') is-invalid @enderror"
                               placeholder="••••••••">
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label text-muted" for="remember">
                                Remember me
                            </label>
                        </div>
                        <a href="" class="text-primary small">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 rounded-pill fw-semibold" id="loginBtn">
                        <span class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true" id="loginSpinner"></span>
                        Sign In
                    </button>
                </form>
                <p class="text-center mt-4 mb-0 text-muted small">
                    New to {{ config('app.name', 'E-Rent') }}? 
                    <a href="{{ route('guest.register') }}" class="text-primary fw-semibold">Create an account</a>
                </p>
            </div>
            <div class="col-lg-7 d-none d-lg-block p-0">
                <img src="{{ asset('images/login.avif')}}" alt=""
                     class="img-fluid h-100 w-100 object-fit-cover">
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('script/guestloader.js')}}"></script>
@endsection
