@extends('layouts.admin')
@section('title', 'Host Profile - Admin Panel')
@section('content')
<div class="container py-4">
    <div class="bg-light p-4 mb-4">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('images/default.png') }}" 
                         alt="Host Image" 
                         class="img-fluid rounded-4 shadow-sm mb-3" 
                         style="max-height: 250px; object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <div class="mb-4">
                        <h5 class="fw-semibold mb-3 text-primary"><i class="fas fa-user me-2"></i>Personal Info</h5>
                        <div class="row g-2">
                            <div class="col-6">
                                <p class="mb-1"><strong>Name:</strong> {{ $host->name }}</p>
                                <p class="mb-1"><strong>Email:</strong> {{ $host->email }}</p>
                                <p class="mb-1"><strong>Phone:</strong> {{ $host->hostProfile->phone ?? '-' }}</p>
                            </div>
                            <div class="col-6">
                                <p class="mb-1"><strong>Address:</strong> {{ $host->hostProfile->address ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h5 class="fw-semibold mb-3 text-primary"><i class="fas fa-home me-2"></i>Host Stats</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge rounded-pill bg-info text-dark px-3 py-2">
                                Total Properties: {{ $host->properties_count ?? 0 }}
                            </span>
                            <span class="badge rounded-pill bg-light text-dark px-3 py-2">
                                Joined: {{ $host->created_at->format('M d, Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow-sm rounded mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-list me-2"></i>Properties Listed by {{ $host->name }}</h5>
        </div>
        <div class="card-body p-0">
            @if($host->properties->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="table-light text-uppercase small">
                            <tr>
                                <th>ID</th>
                                <th>Description</th>
                                <th>Address</th>
                                <th>Type</th>
                                <th>Price (₱)</th>
                                <th>Guests</th>
                                <th>Bedrooms</th>
                                <th>Bathrooms</th>
                                <th>Beds</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($host->properties as $property)
                                <tr>
                                    <td>{{ $property->id }}</td>
                                    <td>{{ $property->description ?? '-' }}</td>
                                    <td>{{ $property->address }}</td>
                                    <td>{{ $property->type }}</td>
                                    <td>{{ number_format($property->price, 2) }}</td>
                                    <td>{{ $property->max_guests }}</td>
                                    <td>{{ $property->bedrooms }}</td>
                                    <td>{{ $property->bathrooms }}</td>
                                    <td>{{ $property->beds }}</td>
                                    <td>{{ $property->created_at->format('M d, Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="p-3 text-center text-muted">
                    This host has not listed any properties yet.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
