<div class="row g-4">
    @foreach($cards as $card)
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="{{ $card['icon'] }} fa-2x {{ $card['color'] }}"></i>
                    </div>
                    <div>
                        <h6 class="card-title mb-1 text-muted">{{ $card['title'] }}</h6>
                        <h4 class="mb-0">{{ $card['value'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
