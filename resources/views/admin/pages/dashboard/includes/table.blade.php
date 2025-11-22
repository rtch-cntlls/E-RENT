<div class="row mt-4 g-4">
    <div class="col-12 col-lg-6">
        <div class="card shadow-sm border-0 ">
            <div class="card-body">
                <h6 class="card-title mb-3 text-secondary fw-semibold">Recent Listers</h6>
                <div class="table-responsive">
                    @if(!empty($recentListers) && $recentListers->count())
                        <table class="table align-middle mb-0">
                            <thead class="table-light text-uppercase text-muted small">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Registered Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentListers as $lister)
                                <tr class="align-middle hover-shadow">
                                    <td class="fw-medium">{{ $lister->name }}</td>
                                    <td>{{ $lister->email }}</td>
                                    <td>{{ $lister->created_at->format('M d, Y') }}</td>
                                    <td>
                                        @if($lister->is_verified)
                                            <span class="badge rounded-pill text-bg-success">Verified</span>
                                        @else
                                            <span class="badge rounded-pill text-bg-warning text-dark">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-center text-muted py-3">
                            No recent listers found.
                        </div>
                    @endif
                </div>
            </div>
        </div>        
    </div>
    <div class="col-12 col-lg-6">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6 class="card-title mb-3 text-secondary fw-semibold">Most Common Properties Listed</h6>
                <div class="table-responsive">
                    @if(!empty($commonProperties) && $commonProperties->count())
                        <table class="table align-middle mb-0">
                            <thead class="table-light text-uppercase text-muted small">
                                <tr>
                                    <th>Property Type</th>
                                    <th>Number of Listings</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($commonProperties as $property)
                                <tr class="align-middle hover-shadow">
                                    <td class="fw-medium">{{ $property->type }}</td>
                                    <td>{{ $property->count }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-center text-muted py-3">
                            No properties found.
                        </div>
                    @endif
                </div>
            </div>            
        </div>
    </div>
</div>
