@extends('layouts.admin')
@section('title', 'Hosts Page')
@section('content')
<div class="container" style="font-size: 14px;">
    <h4 class="fw-bold mb-4">Host Management</h4>
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
                            <span class="badge {{ $host->hostProfile && $host->hostProfile->status ? 'bg-success' : 'bg-secondary' }}">
                                {{ $host->hostProfile && $host->hostProfile->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>{{ $host->properties_count ?? 0 }}</td>
                        <td>{{ $host->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('admin.hosts.show', $host->id) }}" class="btn btn-sm btn-outline-primary">
                                View
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted py-4">
                            No hosts available
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
