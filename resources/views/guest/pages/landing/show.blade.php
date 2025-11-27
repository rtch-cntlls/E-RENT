@extends('layouts.guestShow')
@section('title', 'Property Details')
@section('content')
<div class="container py-5">
    @if($property->images->isNotEmpty())
        <div class="row g-2 mb-4">
            <div class="col-lg-6">
                <img src="{{ asset($property->images[0]->image_path) }}" class="img-fluid rounded-3 shadow-sm w-100" 
                    style="object-fit: cover; height: 300px;" alt="">
            </div>
            <div class="col-lg-6">
                <div class="row g-2 h-100">
                    @foreach($property->images->slice(1, 4) as $image)
                        <div class="col-6">
                            <img src="{{ asset($image->image_path) }}" class="img-fluid rounded-3 shadow-sm w-100"
                                style="object-fit: cover; height: 146px;" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="bg-light rounded-3 shadow-sm d-flex align-items-center justify-content-center mb-4" style="height: 500px;">
            <i class="fas fa-home fa-5x text-muted"></i>
        </div>
    @endif
    <div class="p-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start mb-3">
            <div>
                <div class="d-flex flex-wrap align-items-center gap-1 mb-2">
                    <small class="fw-medium">{{ ucfirst($property->type) }}</small>
                    <small class="fw-medium">in</small>
                    <small class="fw-medium text-truncate d-inline-block" style="max-width: 300px;" title="{{ $property->address }}">
                        {{ $property->address }}
                    </small>
                </div>
                <h3 class="text-primary fw-bold mb-2">
                    ₱{{ number_format($property->price, 2) }}
                    @if($property->fixed_days) / {{ $property->fixed_days }} days @endif
                </h3>
                <p class="text-muted mb-2">Listed on {{ $property->created_at->format('M d, Y') }}</p>
                <div class="mt-3">
                    <h5 class="mb-2">Property Capacity</h5>
                    <div class="d-flex flex-wrap gap-2">

                        <span class="badge bg-light text-dark border px-3 py-2">
                            <i class="fas fa-users me-1"></i>
                            Max Guests: <strong>{{ $property->max_guests }}</strong>
                        </span>

                        <span class="badge bg-light text-dark border px-3 py-2">
                            <i class="fas fa-bed me-1"></i>
                            Bedrooms: <strong>{{ $property->bedrooms }}</strong>
                        </span>

                        <span class="badge bg-light text-dark border px-3 py-2">
                            <i class="fas fa-bath me-1"></i>
                            Bathrooms: <strong>{{ $property->bathrooms }}</strong>
                        </span>

                        <span class="badge bg-light text-dark border px-3 py-2">
                            <i class="fas fa-bed-pulse me-1"></i>
                            Beds: <strong>{{ $property->beds }}</strong>
                        </span>

                    </div>
                </div>
            </div>
        </div>
        @if($property->description)
            <p class="mb-3">{{ $property->description }}</p>
        @endif
        @if($property->amenities)
            <h5 class="mb-2">Amenities</h5>
            <div class="mb-3">
                @foreach(explode(',', $property->amenities) as $amenity)
                    <span class="badge bg-primary bg-opacity-10 text-primary me-1 mb-1" style="font-size: 0.85rem;">
                        {{ $amenity }}
                    </span>
                @endforeach
            </div>
        @endif
        <a href="#" class="btn btn-danger">
            <i class="fas fa-calendar-check me-1"></i> Book Now
        </a>
    </div>
</div>
@endsection
