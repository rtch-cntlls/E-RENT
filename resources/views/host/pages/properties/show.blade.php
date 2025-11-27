@extends('layouts.host')
@section('title', 'Property Details • E-Rent')
@section('content')
@include('components.sweetAlert')
<div class="container">
    <div class="mb-2 d-flex justify-content-between align-items-center">
        <a href="{{ route('host.properties') }}" class="text-decoration-none text-dark d-flex align-items-center">
            <i class="fas fa-arrow-left me-2"></i> Back to My Properties
        </a>
        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editPropertyModal">
            <i class="fas fa-edit me-1"></i> Edit Property
        </button>
        @include('host.pages.properties.edit')
    </div>
    <div class="row mb-5">
        <div class="col-12">
            <div class="">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start mb-3">
                    <div>
                        <h3 class="fw-bold mb-2">{{ ucfirst($property->type) }} <span class="text-muted fs-6">• ₱{{ number_format($property->price, 2) }}</span></h3>
                        <p class="mb-1"><span class="fw-medium">Address:</span> {{ $property->address }}</p>
                        @if($property->fixed_days)
                            <p class="mb-1"><span class="fw-medium">Minimum Stay:</span> {{ $property->fixed_days }} days</p>
                        @endif
                        <p class="mb-1"><span class="fw-medium">Listed At:</span> {{ $property->created_at->format('M d, Y') }}</p>
                        <div class="mt-3">
                            <h6 class="fw-semibold mb-2">Property Capacity</h6>                 
                            <div class="d-flex flex-wrap gap-3">
                                <span class="badge bg-light text-dark border px-3 py-2">
                                    <i class="fas fa-users me-1"></i>
                                    Max Guests: <strong>{{ $property->max_guests ?? 0 }}</strong>
                                </span>
                                <span class="badge bg-light text-dark border px-3 py-2">
                                    <i class="fas fa-bed me-1"></i>
                                    Bedrooms: <strong>{{ $property->bedrooms ?? 0 }}</strong>
                                </span>
                                <span class="badge bg-light text-dark border px-3 py-2">
                                    <i class="fas fa-bath me-1"></i>
                                    Bathrooms: <strong>{{ $property->bathrooms ?? 0 }}</strong>
                                </span>
                                <span class="badge bg-light text-dark border px-3 py-2">
                                    <i class="fas fa-bed-pulse me-1"></i>
                                    Beds: <strong>{{ $property->beds ?? 0 }}</strong>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="small mb-3">{{ $property->description ?? 'No Description Available' }}</p>
                @if($property->amenities)
                    <div class="mb-2">
                        <h6 class="fw-semibold mb-2">Amenities</h6>
                        @foreach(explode(',', $property->amenities) as $amenity)
                            <span class="badge bg-primary bg-opacity-10 text-primary me-1 mb-1" style="font-size: 0.85rem;">
                                {{ $amenity }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    @if($property->images->isNotEmpty())
        <div class="row g-3">
            @foreach($property->images as $index => $image)
                <div class="col-6 col-md-4 {{ $index % 3 == 0 ? 'col-lg-6' : 'col-lg-3' }}">
                    <img src="{{ asset($image->image_path) }}" class="img-fluid rounded-3 shadow-sm w-100" style="object-fit: cover; height: 250px;" alt="Property Image">
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-light rounded-3 shadow-sm d-flex align-items-center justify-content-center" style="height: 400px;">
            <i class="fas fa-home fa-5x text-muted"></i>
        </div>
    @endif
</div>
@endsection
