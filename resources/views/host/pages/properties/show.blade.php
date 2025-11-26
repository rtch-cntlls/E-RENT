@extends('layouts.host')
@section('title', 'Property Details • E-Rent')
@section('content')
<div class="container">
    <div class="mb-4">
        <a href="{{ route('host.properties') }}" class="text-decoration-none text-dark d-flex align-items-center">
            <i class="fas fa-arrow-left me-2"></i> Back to My Properties
        </a>
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
                        <p class="mb-1"><span class="fw-medium">Total Bookings:</span> </p>
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
