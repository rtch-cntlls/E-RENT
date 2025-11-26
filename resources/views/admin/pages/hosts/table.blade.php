<div class="container" style="font-size: 14px;">
    <h4 class="fw-bold mb-4">{{ $pageTitle }}</h4>
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light text-uppercase small">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Properties</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($hosts as $host)
                    <tr>
                        <td>{{ $host->id }}</td>
                        <td>{{ $host->name }}</td>
                        <td>{{ $host->email }}</td>
                        <td>{{ $host->hostProfile->phone ?? '-' }}</td>
                        <td>
                            <span class="badge 
                                @if($host->hostProfile->status === 'approved') bg-success
                                @elseif($host->hostProfile->status === 'pending') bg-info
                                @elseif($host->hostProfile->status === 'rejected') bg-danger
                                @else bg-secondary @endif ">
                                {{ ucfirst($host->hostProfile->status) }}
                            </span>
                        </td>
                        <td>-</td>
                        <td>{{ $host->created_at->format('M d, Y') }}</td>
                        <td class="d-flex gap-2">
                            @if($host->hostProfile->status === 'pending')
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#approveModal{{ $host->id }}">
                                    Approve
                                </button>
                            @endif
                        </td>
                    </tr>
                    @if($host->hostProfile->status === 'pending')
                        <div class="modal fade" id="approveModal{{ $host->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow-sm">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold text-primary">
                                            <i class="fas fa-check-circle me-2"></i>Approve Hosting Request
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body pt-0">
                                        <p class="text-muted mb-3">
                                            Are you sure you want to approve this host? Below are the details:
                                        </p>
                                        <div class="p-3 mb-3 bg-light rounded shadow-sm">
                                            <div class="d-flex flex-column gap-1">
                                                <span class="fw-semibold">Host Name: {{ $host->name }}</span>
                                                <span class="text-muted"><i class="fas fa-envelope me-1"></i>{{ $host->email }}</span>
                                                <span class="text-muted"><i class="fas fa-phone me-1"></i>{{ $host->hostProfile->phone }}</span>
                                                <span class="text-muted text-uppercase">
                                                    <i class="fas fa-map-marker-alt me-1"></i>{{ $host->hostProfile->address }}
                                                </span>
                                                @if($host->hostProfile->id_document)
                                                    <div class="mt-2">
                                                        <span class="fw-semibold">Requirement:</span>
                                                        @php
                                                            $fileExt = pathinfo($host->hostProfile->id_document, PATHINFO_EXTENSION);
                                                        @endphp

                                                        @if(in_array(strtolower($fileExt), ['jpg','jpeg','png','gif']))
                                                            <img src="{{ asset($host->hostProfile->id_document) }}" 
                                                                alt="Requirement Image" class="img-fluid rounded mt-1">
                                                        @elseif(strtolower($fileExt) === 'pdf')
                                                            <a href="{{ asset($host->hostProfile->id_document) }}" 
                                                            target="_blank" class="d-block mt-1">
                                                            <i class="fas fa-file-pdf text-danger me-1"></i> View PDF
                                                            </a>
                                                        @else
                                                            <span class="text-muted d-block mt-1">File cannot be previewed</span>
                                                        @endif
                                                    </div>
                                                @endif                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0 pt-0">
                                        <button class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('admin.hosts.approve', $host->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-sm btn-primary d-flex align-items-center gap-2">
                                                <i class="fas fa-check"></i> Confirm Approve
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            No hosts found for this status.
                        </td>
                    </tr>
                @endforelse
            </tbody>
            
        </table>
    </div>
</div>
