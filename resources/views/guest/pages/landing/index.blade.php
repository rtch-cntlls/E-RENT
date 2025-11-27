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
<section class="py-5" style="
    background: linear-gradient(135deg, #1f2937, #111827);
    color: #fff;">
    <div class="container text-center py-5">
        <div class="mx-auto mb-4" style="max-width: 650px;">
            <h3 class="fw-bold mb-3">Become a Host. Earn with E-Rent.</h3>
            <p class="text-light mb-4">
                Turn your extra space into income. List your property, manage bookings effortlessly, and
                welcome guests with confidence using our streamlined hosting tools.
            </p>
        </div>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <div class="p-3 px-4 rounded-3 bg-dark bg-opacity-25 border border-secondary small">
                ✔ Easy Property Listing
            </div>
            <div class="p-3 px-4 rounded-3 bg-dark bg-opacity-25 border border-secondary small">
                ✔ Secure Booking System
            </div>
            <div class="p-3 px-4 rounded-3 bg-dark bg-opacity-25 border border-secondary small">
                ✔ Manage Guests & Payments
            </div>
        </div>
        <a href="{{ route('guest.upgrade.form') }}" 
           class="btn btn-light mt-4 px-5 fw-semibold shadow-sm">
            Upgrade to Host
        </a>
    </div>
</section>
<section id="about" class="py-5" style="background: #f9fafb;">
    <div class="container">

        <div class="text-center mb-5" style="max-width: 700px; margin: auto;">
            <h3 class="fw-bold mb-3">About E-Rent</h3>
            <p class="text-muted" style="font-size: 15px;">
                E-Rent is your trusted rental platform designed to make property searching and hosting
                simple, secure, and convenient. Whether you’re looking for a place to stay or a way to earn,
                E-Rent helps you make smart rental decisions with ease.
            </p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100 border border-light">
                    <div class="mb-3">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle"
                              style="width: 48px; height: 48px; background:#e8f0ff;">
                            <i class="fas fa-search text-primary"></i>
                        </span>
                    </div>
                    <h5 class="fw-semibold mb-2">Smart Property Search</h5>
                    <p class="text-muted small">
                        Discover rentals faster using intuitive filters for location, property type, budget,
                        and more—ensuring you find the perfect match effortlessly.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100 border border-light">
                    <div class="mb-3">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle"
                              style="width: 48px; height: 48px; background:#e8fff1;">
                            <i class="fas fa-shield-alt text-success"></i>
                        </span>
                    </div>
                    <h5 class="fw-semibold mb-2">Safe & Verified Listings</h5>
                    <p class="text-muted small">
                        Every property is uploaded and managed by verified hosts, providing renters with
                        security, transparency, and peace of mind throughout their stay.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100 border border-light">
                    <div class="mb-3">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle"
                              style="width: 48px; height: 48px; background:#fff4e5;">
                            <i class="fas fa-mobile-alt text-warning"></i>
                        </span>
                    </div>
                    <h5 class="fw-semibold mb-2">Seamless Booking</h5>
                    <p class="text-muted small">
                        Manage reservations, communicate with hosts, and track your stay all in one clean,
                        easy-to-use platform available on any device.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section><hr>
@endsection
