@extends('layouts.host')
@section('title', 'Host Dashboard')
@section('page-title', 'Dashboard')
@section('content')
<div class="row g-4">
    <div class="col-md-3">
        <div class="card shadow-sm p-3 text-center">
            <i class="fas fa-building fa-2x text-primary mb-2"></i>
            <h6 class="mb-1">Total Properties</h6>
            <h4>{{ $properties_count ?? 0 }}</h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm p-3 text-center">
            <i class="fas fa-calendar-check fa-2x text-success mb-2"></i>
            <h6 class="mb-1">Total Bookings</h6>
            <h4>{{ $bookings_count ?? 0 }}</h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm p-3 text-center">
            <i class="fas fa-hourglass-half fa-2x text-warning mb-2"></i>
            <h6 class="mb-1">Pending Requests</h6>
            <h4>{{ $pending_requests ?? 0 }}</h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm p-3 text-center">
            <i class="fas fa-coins fa-2x text-secondary mb-2"></i>
            <h6 class="mb-1 text-muted">Total Revenue</h6>
            <h4>₱{{ number_format($revenue ?? 0, 2) }}</h4>
        </div>
    </div>
</div>
<div class="mt-4">
    <h5 class="mb-3 fw-semibold">Recent Bookings</h5>
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light small text-uppercase">
                <tr>
                    <th>Booking ID</th>
                    <th>Property</th>
                    <th>Guest Name</th>
                    <th>Status</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recent_bookings as $booking)
                    <tr>
                        <td>#{{ $booking->id }}</td>
                        <td>{{ $booking->property->title }}</td>
                        <td>{{ $booking->guest->name }}</td>
                        <td>
                            <span class="badge 
                                @if($booking->status === 'approved') bg-success
                                @elseif($booking->status === 'pending') bg-warning
                                @elseif($booking->status === 'rejected') bg-danger
                                @else bg-secondary @endif">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td>{{ $booking->check_in->format('M d, Y') }}</td>
                        <td>{{ $booking->check_out->format('M d, Y') }}</td>
                        <td>${{ number_format($booking->amount, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No recent bookings found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-6">
        <div class="card shadow-sm p-3">
            <h6 class="fw-semibold mb-3">Bookings Over Time</h6>
            <canvas id="bookingsChart" height="200"></canvas>
        </div>
    </div>
    {{-- <div class="col-md-6">
        <div class="card shadow-sm p-3">
            <h6 class="fw-semibold mb-3">Revenue Distribution</h6>
            <canvas id="revenueChart" height="200"></canvas>
        </div>
    </div> --}}
</div>
<script>
    const bookingsChart = new Chart(document.getElementById('bookingsChart'), {
        type: 'line',
        data: {
            labels: {!! json_encode($bookings_over_time['labels'] ?? []) !!},
            datasets: [{
                label: 'Bookings',
                data: {!! json_encode($bookings_over_time['data'] ?? []) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        }
    });

    const revenueChart = new Chart(document.getElementById('revenueChart'), {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($revenue_distribution['labels'] ?? []) !!},
            datasets: [{
                data: {!! json_encode($revenue_distribution['data'] ?? []) !!},
                backgroundColor: [
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(255, 99, 132, 0.7)'
                ]
            }]
        }
    });
</script>
@endsection



