@extends('layouts.guest')
@section('title', 'Home')
@section('content')
<section  id="home"
    class="text-white d-flex align-items-center" 
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
   
</section>
@endsection
