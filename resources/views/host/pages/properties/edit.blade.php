<div class="modal fade" id="editPropertyModal" tabindex="-1" aria-labelledby="editPropertyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-sm border-0">
            <form action="{{ route('host.properties.update', $property->id) }}" method="POST" class="create-property">
            @csrf
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold" id="editPropertyModalLabel">Edit Property Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-3">
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="price" class="form-label fw-semibold">Price (₱)</label>
                        <input type="number" step="0.01" name="price" id="price" 
                            class="form-control rounded-3 @error('price') is-invalid @enderror" 
                            value="{{ old('price', $property->price) }}">
                        <small class="text-muted">Set the nightly or per-stay price</small>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="fixed_days" class="form-label fw-semibold">Minimum Stay (days)</label>
                        <input type="number" min="1" name="fixed_days" id="fixed_days" 
                            class="form-control rounded-3 @error('fixed_days') is-invalid @enderror" 
                            value="{{ old('fixed_days', $property->fixed_days) }}">
                        <small class="text-muted">Set the minimum number of days a guest can book</small>
                        @error('fixed_days')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <h6 class="fw-semibold mb-3">Property Capacity</h6>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="max_guests" class="form-label fw-semibold">Max Guests</label>
                        <input type="number" min="1" name="max_guests" id="max_guests" 
                            class="form-control rounded-3 @error('max_guests') is-invalid @enderror" 
                            value="{{ old('max_guests', $property->max_guests) }}">
                        <small class="text-muted">Maximum guests allowed</small>
                        @error('max_guests')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="bedrooms" class="form-label fw-semibold">Bedrooms</label>
                        <input type="number" min="0" name="bedrooms" id="bedrooms" 
                            class="form-control rounded-3 @error('bedrooms') is-invalid @enderror" 
                            value="{{ old('bedrooms', $property->bedrooms) }}">
                        <small class="text-muted">Number of bedrooms</small>
                        @error('bedrooms')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="bathrooms" class="form-label fw-semibold">Bathrooms</label>
                        <input type="number" min="0" name="bathrooms" id="bathrooms" 
                            class="form-control rounded-3 @error('bathrooms') is-invalid @enderror" 
                            value="{{ old('bathrooms', $property->bathrooms) }}">
                        <small class="text-muted">Number of bathrooms</small>
                        @error('bathrooms')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="beds" class="form-label fw-semibold">Beds</label>
                        <input type="number" min="0" name="beds" id="beds" 
                            class="form-control rounded-3 @error('beds') is-invalid @enderror" 
                            value="{{ old('beds', $property->beds) }}">
                        <small class="text-muted">Number of beds</small>
                        @error('beds')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary rounded-pill px-4">Save Changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
