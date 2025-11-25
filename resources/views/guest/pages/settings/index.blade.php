@extends('layouts.guest')
@section('title', 'Settings • E-Rent')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-primary fw-bold"><i class="fas fa-cog me-2"></i>Settings</h2>
            </div>

            <!-- Profile Info Card -->
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-semibold mb-3"><i class="fas fa-user me-2"></i>Profile Information</h5>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <p><strong>Phone:</strong> {{ auth()->user()->phone ?? 'Not set' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Verification:</strong> 
                                @if(auth()->user()->is_verified)
                                    <span class="badge bg-success">Verified</span>
                                @else
                                    <span class="badge bg-warning text-dark">Not Verified</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Member Since:</strong> {{ auth()->user()->created_at->format('M d, Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Last Login:</strong> {{ auth()->user()->last_login_at ? auth()->user()->last_login_at->diffForHumans() : 'Never' }}</p>
                        </div>
                    </div>
                    <a href="" class="btn btn-outline-primary btn-sm mt-3">
                        <i class="fas fa-edit me-1"></i> Edit Profile
                    </a>
                </div>
            </div>

            <!-- Account Settings Card -->
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-semibold mb-3"><i class="fas fa-lock me-2"></i>Account Settings</h5>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-key me-1"></i> Change Password
                        </a>
                        <a href="" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-bell me-1"></i> Notification Preferences
                        </a>
                        <a href="" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-desktop me-1"></i> Active Sessions
                        </a>
                        <a href="" class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-trash-alt me-1"></i> Delete Account
                        </a>
                    </div>
                </div>
            </div>

            <!-- Upgrade to Property Owner Card -->
            <div class="card mb-4 shadow-sm border-primary">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-building me-2"></i>Become a Property Owner</h5>
                </div>
                <div class="card-body">
                    <p>List your property on <strong>E-rent</strong> and start earning. Upgrade your account to a Property Owner to gain full access to listing features, manage your properties, and track bookings.</p>
                    <a href="" class="btn btn-primary">
                        <i class="fas fa-arrow-up me-1"></i> Upgrade Now
                    </a>
                </div>
            </div>

            <!-- Help & Support Card -->
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-semibold mb-3"><i class="fas fa-question-circle me-2"></i>Help & Support</h5>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="" class="btn btn-outline-info btn-sm">
                            <i class="fas fa-info-circle me-1"></i> FAQs
                        </a>
                        <a href="" class="btn btn-outline-info btn-sm">
                            <i class="fas fa-envelope me-1"></i> Contact Support
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
