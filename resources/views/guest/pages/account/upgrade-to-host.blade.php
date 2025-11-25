@extends('layouts.guest')
@section('title', 'Upgrade to Host')
@section('content')
@include('components.sweetAlert')
<div class="container my-5">
    <a href="{{ route('guest.landing') }}" class="text-decoration-none text-dark d-flex align-items-center mb-3">
        <i class="fas fa-arrow-left fa-lg me-2"></i>
    </a>    
    <div class="row justify-content-center">
        <h2 class="fw-bold text-center">Become a Property Owner</h2>
        <p class="text-center text-muted">
            Fill out the form below to upgrade your account and start listing your properties.
        </p>
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-5">
                    @if(!$hasPendingRequest)
                        <form class="upgrade" action="{{ route('guest.upgrade.submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="full_name" class="form-label fw-semibold small">Full Name</label>
                                <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                    id="full_name" name="full_name" value="{{ old('full_name', auth()->user()->name) }}" required>
                                <small class="text-muted">Use your legal full name as it appears on your ID.</small>
                                @error('full_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label fw-semibold small">Phone Number</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone') }}" required>
                                <small class="text-muted">We may contact you via this number for verification.</small>
                                @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="full_address" class="form-label fw-semibold small">Full Address</label>
                                <textarea class="form-control @error('full_address') is-invalid @enderror" 
                                        id="full_address" name="full_address" rows="2" required>{{ old('full_address') }}</textarea>
                                <small class="text-muted">Provide your complete address including street, city, and postal code.</small>
                                @error('full_address')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="id_document" class="form-label fw-semibold small">Valid ID</label>
                                <input type="file" class="form-control @error('id_document') is-invalid @enderror"
                                    id="id_document" name="id_document" required>
                                <small class="text-muted">Accepted formats: JPG, PNG, PDF. Max size: 5MB.</small>
                                @error('id_document')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input @error('agreement') is-invalid @enderror"
                                    id="agreement" name="agreement" required>
                                <label class="form-check-label" for="agreement">
                                    I agree to the <a href="#" class="text-decoration-underline">platform’s terms & policies</a>
                                </label>
                                @error('agreement')
                                    <span class="text-danger d-block mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger fw-semibold small">
                                    Submit Request
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="card border-0 shadow-sm text-center p-4 mb-4" style="background-color: #f0f4f8;">
                            <div class="mb-2">
                                <i class="fas fa-info-circle fa-2x text-primary"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Request Already Submitted</h5>
                            <p class="text-muted mb-0">
                                You have already submitted a request to become a property owner. Our admin team is reviewing it. 
                                You will be notified once your request is approved.
                            </p>
                        </div>
                    @endif                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
