@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid px-5">
    <h5 class="mb-3 fw-bold">Admin Dashboard</h5>
    @include('admin.pages.dashboard.includes.cards')
    @include('admin.pages.dashboard.includes.table')
    <div class="row mt-4 g-4">
        <div class="col-12 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="card-title mb-3 text-muted">Total Listers Over Time</h6>
                    <canvas id="listersLineChart" height="100"></canvas>
                </div>
            </div>
        </div>

        <!-- Properties by Type (Bar Chart) -->
        <div class="col-12 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="card-title mb-3 text-muted">Properties by Type</h6>
                    <canvas id="propertiesBarChart" height="100"></canvas>
                </div>
            </div>
        </div>

        <!-- Active vs Inactive Listings (Pie Chart) -->
   <!-- Active vs Inactive Listings (Pie Chart) -->
        <div class="col-12 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-body" style="height:300px;"> <!-- fixed height -->
                    <h6 class="card-title mb-3 text-muted">Active vs Inactive Listings</h6>
                    <canvas id="listingsPieChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Registered Users Over Time (Line Chart) -->
        <div class="col-12 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="card-title mb-3 text-muted">Registered Users Over Time</h6>
                    <canvas id="usersLineChart" height="100"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Total Listers Over Time (Line)
const listersCtx = document.getElementById('listersLineChart').getContext('2d');
new Chart(listersCtx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Listers',
            data: [20, 35, 50, 65, 90, 128],
            borderColor: 'rgba(37, 99, 235, 1)',
            backgroundColor: 'rgba(37, 99, 235, 0.2)',
            fill: true,
            tension: 0.4
        }]
    },
    options: { responsive: true, plugins: { legend: { position: 'top' } } }
});

// Properties by Type (Bar)
const propertiesCtx = document.getElementById('propertiesBarChart').getContext('2d');
new Chart(propertiesCtx, {
    type: 'bar',
    data: {
        labels: ['Apartments', 'Houses', 'Villas', 'Studios'],
        datasets: [{
            label: 'Properties',
            data: [18, 12, 8, 16],
            backgroundColor: [
                'rgba(37, 99, 235, 0.7)',
                'rgba(16, 185, 129, 0.7)',
                'rgba(251, 191, 36, 0.7)',
                'rgba(239, 68, 68, 0.7)'
            ]
        }]
    },
    options: { responsive: true, plugins: { legend: { display: false } } }
});

// Active vs Inactive Listings (Pie)
// Active vs Inactive Listings (Pie)
const listingsCtx = document.getElementById('listingsPieChart').getContext('2d');
new Chart(listingsCtx, {
    type: 'pie',
    data: {
        labels: ['Active', 'Inactive'],
        datasets: [{
            data: [42, 12],
            backgroundColor: ['rgba(16, 185, 129, 0.7)', 'rgba(239, 68, 68, 0.7)']
        }]
    },
    options: { 
        responsive: true,
        maintainAspectRatio: false, // allow height to control size
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});


// Registered Users Over Time (Line)
const usersCtx = document.getElementById('usersLineChart').getContext('2d');
new Chart(usersCtx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Users',
            data: [50, 90, 120, 180, 210, 245],
            borderColor: 'rgba(239, 68, 68, 1)',
            backgroundColor: 'rgba(239, 68, 68, 0.2)',
            fill: true,
            tension: 0.4
        }]
    },
    options: { responsive: true, plugins: { legend: { position: 'top' } } }
});
</script>
@endsection
