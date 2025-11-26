@extends('layouts.host')
@section('title', 'My Properties • E-Rent')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="mb-4">My Properties</h4>
        <a href="{{ route('host.properties.create')}}" class="btn btn-sm btn-primary mb-3">
            <i class="fas fa-plus"></i> Add New Property
        </a>
    </div>
    @if($properties->isEmpty())
        <div class="alert alert-info">You have no properties yet.</div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($properties as $property)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $property->description }}</h5>
                            <p class="card-text">
                                <strong>Type:</strong> {{ ucfirst($property->type) }} <br>
                                <strong>Price:</strong> ₱{{ number_format($property->price, 2) }} <br>
                                <strong>Address:</strong> {{ $property->address }}
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
