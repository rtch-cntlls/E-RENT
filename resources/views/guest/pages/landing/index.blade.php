@extends('layouts.guest')
@section('title', 'Home')
@section('content')
@include('components.sweetAlert')
<section  id="home" class="text-white d-flex align-items-center" 
    style="min-height: 100vh; 
          background: url('https://images.unsplash.com/photo-1586105251261-72a756497a11?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
           position: relative;">
    <div style="position:absolute; inset:0; background:rgba(0,0,0,0.5);"></div>
    <div class="container text-center position-relative" style="z-index: 2;">
        <h1 class="display-4 fw-bold mb-4">Find Your Dream Rental Home</h1>
        <p class="lead mb-4">Discover modern apartments, houses, and condos in the best locations. Your perfect home is just one click away.</p>
        <form class="row g-2 justify-content-center">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="City, neighborhood or address">
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option value="">Any Type</option>
                    @foreach($allTypes as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <input type="number" class="form-control" placeholder="Max Price">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-dark w-100">Search Properties</button>
            </div>
        </form>        
    </div>
</section>
<section id="properties" class="py-5 bg-light">
    <div class="container">
        <h3 class="mb-4">Latest Properties</h3>
        @if($properties->isEmpty())
            <div class="alert alert-info text-center">No properties available at the moment.</div>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5 g-4">
                @foreach($properties->take(10) as $property)
                    <div class="col">
                        <a href="{{ route('guest.property.show', $property->id) }}" class="text-decoration-none text-dark">
                            <div class="card h-100 shadow-sm border-0 hover-shadow">
                                @if($property->images->isNotEmpty())
                                    <img src="{{ asset($property->images->first()->image_path) }}" 
                                        class="card-img-top" 
                                        style="height: 150px; object-fit: cover;" 
                                        alt="Property Image">
                                @else
                                    <div class="card-img-top d-flex align-items-center justify-content-center bg-light" style="height: 150px;">
                                        <i class="fas fa-home fa-2x text-muted"></i>
                                    </div>
                                @endif
                                <div class="card-body p-2 d-flex flex-column">
                                    <div class="d-flex align-items-center gap-1">
                                        <small class="fw-medium text-truncate d-inline-block">
                                            {{ ucfirst($property->type) }} in {{ $property->address }}
                                        </small>
                                    </div>                                
                                    <small class="mb-1">₱{{ number_format($property->price, 2) }} 
                                        @if($property->fixed_days) for {{ $property->fixed_days }} days @endif
                                    </small>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>        
        @endif
    </div>
</section>
@endsection
