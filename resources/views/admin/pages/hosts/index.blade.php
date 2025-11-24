@extends('layouts.admin')
@section('title', 'Hosts Page')
@section('content')
<div class="container-fluid px-5 mb-5">
    <h4 class="fw-bold mb-4">Host Management</h4>
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hosts as $host)
                    <tr>
                        <td>{{ $host->id }}</td>
                        <td>{{ $host->name }}</td>
                        <td>{{ $host->email }}</td>
                        <td>{{ $host->hostProfile->phone ?? '-' }}</td>
                        <td>
                            @if($host->hostProfile && $host->hostProfile->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.hosts.show', $host->id) }}" class="btn btn-sm btn-primary">
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
