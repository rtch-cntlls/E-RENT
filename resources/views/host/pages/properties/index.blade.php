@extends('layouts.host')
@section('title', 'My Properties • E-Rent')
@section('content')
@include('components.sweetAlert')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-semibold">My Properties</h4>
        <a href="{{ route('host.properties.create') }}" class="btn btn-primary btn-sm d-flex align-items-center gap-2">
            <i class="fas fa-plus"></i> Add New Property
        </a>
    </div>
    @if($properties->isEmpty())
        <div class="alert alert-info text-center">
            <i class="fas fa-info-circle me-2"></i> You have no properties yet.
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($properties as $property)
                <div class="col">
                    <div class="card shadow-sm border-0 h-100 hover-shadow">
                        @if($property->images->isNotEmpty())
                            <img src="{{ asset($property->images->first()->image_path) }}" 
                                 class="card-img-top" 
                                 style="height: 180px; object-fit: cover;" 
                                 alt="Property Image">
                        @else
                            <div class="card-img-top d-flex align-items-center justify-content-center bg-light" style="height: 180px;">
                                <i class="fas fa-home fa-3x text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <ul class="list-unstyled small text-muted mb-2">
                                <li><strong>Type:</strong> {{ ucfirst($property->type) }}</li>
                                <li><strong>Price:</strong> ₱{{ number_format($property->price, 2) }}</li>
                                @if($property->fixed_days)
                                    <li><strong>Stay In:</strong> {{ $property->fixed_days }} days</li>
                                @endif
                                <li><strong>Address:</strong> {{ $property->address }}</li>
                            </ul>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <a href="{{ route('host.properties.show', $property->id) }}" 
                                    class="btn btn-outline-success w-100 btn-sm gap-1">
                                     <i class="fas fa-eye"></i> View
                                 </a>                                 
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
