@extends('admin.layouts.app')
@section('title', 'Host Profile - Admin Panel')

@section('content')
<div class="container">
    <h1 class="mb-4">host Profile: {{ $host->name }}</h1>

    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="{{ $host->hostProfile->profile_picture ?? asset('images/default-profile.png') }}" 
                         alt="Profile Picture" class="img-fluid rounded-circle mb-3" style="max-width: 150px;">
                </div>
                <div class="col-md-8">
                    <p><strong>Name:</strong> {{ $host->name }}</p>
                    <p><strong>Email:</strong> {{ $host->email }}</p>
                    <p><strong>Phone:</strong> {{ $host->hostProfile->phone ?? '-' }}</p>
                    <p><strong>Address:</strong> {{ $host->hostProfile->address ?? '-' }}</p>
                    <p><strong>Status:</strong> 
                        @if($host->hostProfile && $host->hostProfile->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </p>
                    <p><strong>Requirements Completed:</strong> 
                        {{ $host->hostProfile && $host->hostProfile->requirements_completed ? 'Yes' : 'No' }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('admin.hosts.index') }}" class="btn btn-secondary">Back to hosts</a>
</div>
@endsection
