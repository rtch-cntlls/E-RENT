@extends('layouts.admin')
@section('title', 'Host Profile - Admin Panel')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Host Profile: {{ $host->name }}</h3>
        <a href="{{ route('admin.hosts.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to Hosts
        </a>
    </div>
    <div class="card shadow-sm mb-4 border-0">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('images/default.png') }}" alt="Test" class="img-fluid">

                    
                    <div class="mt-3">
                        <span class="badge {{ $host->hostProfile && $host->hostProfile->status ? 'bg-success' : 'bg-secondary' }}">
                            {{ $host->hostProfile && $host->hostProfile->status ? 'Active' : 'Inactive' }}
                        </span>
                        <span class="badge {{ $host->email_verified_at ? 'bg-primary' : 'bg-warning text-dark' }}">
                            {{ $host->email_verified_at ? 'Email Verified' : 'Email Not Verified' }}
                        </span>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <h5 class="fw-semibold"><i class="fas fa-user me-2"></i>Personal Info</h5>
                        <p><strong>Name:</strong> {{ $host->name }}</p>
                        <p><strong>Email:</strong> {{ $host->email }}</p>
                        <p><strong>Phone:</strong> {{ $host->hostProfile->phone ?? '-' }}</p>
                        <p><strong>Address:</strong> {{ $host->hostProfile->address ?? '-' }}</p>
                        <p><strong>Requirements Completed:</strong> 
                            {{ $host->hostProfile && $host->hostProfile->requirements_completed ? 'Yes' : 'No' }}
                        </p>
                    </div>

                    <div>
                        <h5 class="fw-semibold"><i class="fas fa-home me-2"></i>Host Stats</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-info text-dark">
                                Total Properties: {{ $host->properties_count ?? 0 }}
                            </span>
                            <span class="badge bg-secondary">
                                Listings Active: {{ $host->activeListingsCount ?? 0 }}
                            </span>
                            <span class="badge bg-light text-dark">
                                Joined: {{ $host->created_at->format('M d, Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
