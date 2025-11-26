@extends('layouts.guest')
@section('title', 'Create Account • E-Rent')
@section('content')
@include('components.sweetAlert')
<div class="min-vh-100 d-flex align-items-center justify-content-center bg-light page-fade">
    <div class="container mt-5 mb-4">
        <div class="row justify-content-center shadow-sm overflow-hidden bg-white">
            <div class="col-lg-5 col-md-8 p-5">
                <div class="text-center mb-3">
                    <p class="text-muted mb-0">Join E-Rent and start your rental journey</p>
                </div>
                <h5 class="text-center fw-semibold mb-4 text-dark">Create your account</h5>
                <div class="mb-3">
                    <a href="{{ route('login.google') }}" 
                       class="btn btn-dark w-100 d-flex align-items-center justify-content-center gap-2 rounded-pill">
                        <img src="https://www.google.com/favicon.ico" alt="Google" width="18">
                        Sign up with Google
                    </a>
                </div>
                <div class="d-flex align-items-center my-3">
                    <hr class="flex-grow-1 border-muted">
                    <span class="px-2 text-muted small">OR</span>
                    <hr class="flex-grow-1 border-muted">
                </div>
                <form id="registerForm" method="POST" action="{{ route('guest.register.submit') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-dark" for="name">Full Name</label>
                        <input type="text" name="name" id="name"
                               class="form-control rounded-pill @error('name') is-invalid @enderror"
                               placeholder="Juan Dela Cruz" value="{{ old('name') }}" autofocus>
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark" for="email">Email Address</label>
                        <input type="email" name="email" id="email"
                               class="form-control rounded-pill @error('email') is-invalid @enderror"
                               placeholder="you@example.com" value="{{ old('email') }}">
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark" for="password">Password</label>
                        <input type="password" name="password" id="password"
                               class="form-control rounded-pill @error('password') is-invalid @enderror"
                               placeholder="Create a strong password">
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-dark" for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="form-control rounded-pill"
                               placeholder="Repeat your password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 rounded-pill fw-semibold" id="registerBtn">
                        <span class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true" id="registerSpinner"></span>
                        Create Account
                    </button>                                      
                </form>
                <p class="text-center mt-4 mb-0 text-muted small">
                    Already have an account? 
                    <a href="{{ route('guest.login') }}" class="text-primary fw-semibold">Sign in</a>
                </p>
            </div>
            <div class="col-lg-7 d-none d-lg-block p-0">
                <img src="{{ asset('images/signup.avif') }}" alt="Signup illustration"
                     class="img-fluid h-100 w-100 object-fit-cover">
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('script/guestloader.js')}}"></script>
@endsection
