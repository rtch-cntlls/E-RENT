@extends('layouts.host')
@section('title', 'Add Property • E-Rent')
@section('content')
<div class="container create-property">
    <div class="card shadow-sm border-0 p-4">
        <form action="{{ route('host.properties.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-between aling-items-center">
                <h4 class="mb-4 fw-semibold text-primary">
                    <i class="fas fa-plus-circle me-2"></i> Add New Property
                </h4>
                <div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus fa-sm me-2"></i><span class="text-uppercase fw-semibold small">Add Property</span>
                    </button>
                    <a href="{{ route('host.properties') }}" class="btn btn-outline-secondary btn-sm">
                        <span class="text-uppercase fw-semibold small">Cancel</span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-2">
                        <label for="description" class="form-label fw-semibold small">Description</label>
                        <textarea name="description" id="description" class="form-control form-control-lg rounded-3 @error('description') is-invalid @enderror" rows="4" placeholder="Write a brief description about your property">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-2">
                        <label for="type" class="form-label fw-semibold small">Property Type</label>
                        <select name="type" id="type" class="form-select rounded-3 @error('type') is-invalid @enderror">
                            <option value="" selected disabled>Select a property type</option>
                            @foreach($propertyTypes as $category => $types)
                                <optgroup label="{{ ucfirst($category) }}">
                                    @foreach($types as $type)
                                        <option value="{{ $type }}" {{ old('type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label for="address" class="form-label fw-semibold small">Address</label>
                        <div class="input-group rounded-3">
                            <span class="input-group-text bg-light"><i class="fas fa-map-marker-alt"></i></span>
                            <input type="text" name="address" id="address" class="form-control rounded-end @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Property Address">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label for="price" class="form-label fw-semibold small">Price (₱)</label>
                        <div class="input-group rounded-3">
                            <span class="input-group-text bg-light">₱</span>
                            <input type="number" step="0.01" name="price" id="price" class="form-control rounded-end @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="0.00">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label for="fixed_days" class="form-label fw-semibold small">Fixed Days <small class="text-muted">(optional)</small></label>
                        <div class="input-group rounded-3">
                            <span class="input-group-text bg-light"><i class="fas fa-calendar-days"></i></span>
                            <input type="number" name="fixed_days" id="fixed_days" class="form-control rounded-end @error('fixed_days') is-invalid @enderror" value="{{ old('fixed_days') }}" placeholder="Enter minimum/fixed days" min="1">
                            @error('fixed_days')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>    
                <div class="col-md-6">
                    <div class="mb-2">
                        <label for="images" class="form-label fw-semibold small">Property Images</label>
                        <input type="file" name="images[]" id="images" class="form-control @error('images.*') is-invalid @enderror" multiple accept="image/*">
                        <small class="text-muted">You can select multiple images</small>
                        @error('images.*')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>                            
                <div class="mb-2">
                    <label class="form-label fw-semibold small">Amenities</label>
                    <div id="amenities-container" class="d-flex flex-wrap gap-2"></div>
                    <input type="hidden" name="amenities" id="amenities-input" value="{{ old('amenities', '') }}">
                    @error('amenities')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const amenitiesData = @json($propertyAmenities);

    const typeSelect = document.getElementById('type');
    const amenitiesContainer = document.getElementById('amenities-container');
    const amenitiesInput = document.getElementById('amenities-input');

    function renderAmenities(selectedType) {
        amenitiesContainer.innerHTML = '';
        if (!amenitiesData[selectedType]) return;

        amenitiesData[selectedType].forEach(amenity => {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'btn btn-outline-secondary btn-sm';
            button.textContent = amenity;

            button.addEventListener('click', function() {
                this.classList.toggle('btn-success');
                this.classList.toggle('btn-outline-secondary');

                const selected = Array.from(amenitiesContainer.querySelectorAll('.btn-success'))
                    .map(btn => btn.textContent);
                amenitiesInput.value = selected.join(',');
            });

            const oldAmenities = amenitiesInput.value.split(',');
            if (oldAmenities.includes(amenity)) {
                button.classList.remove('btn-outline-secondary');
                button.classList.add('btn-success');
            }

            amenitiesContainer.appendChild(button);
        });
    }

    typeSelect.addEventListener('change', function() {
        renderAmenities(this.value);
    });

    if (typeSelect.value) {
        renderAmenities(typeSelect.value);
    }
</script>

@endsection
