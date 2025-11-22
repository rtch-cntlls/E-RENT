@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid px-5">
    <h5 class="mb-3 fw-bold">Admin Dashboard</h5>

    @include('admin.pages.dashboard.includes.cards')
    @include('admin.pages.dashboard.includes.table')

    <div class="card mt-4 shadow-sm border-0">
        <div class="card-body">
            <h6 class="card-title fw-semibold">Monthly User Growth</h6>
            <canvas id="userGrowthChart" height="120"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('userGrowthChart').getContext('2d');
const gradient = ctx.createLinearGradient(0, 0, 0, 200);
gradient.addColorStop(0, 'rgba(54, 162, 235, 0.4)');
gradient.addColorStop(1, 'rgba(54, 162, 235, 0)');

const userGrowthChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: {!! json_encode($months) !!},
        datasets: [{
            label: '',
            data: {!! json_encode($userCounts) !!},
            fill: true,
            backgroundColor: gradient,
            borderColor: '#36A2EB',
            borderWidth: 2,
            tension: 0.4,
            pointBackgroundColor: '#36A2EB',
            pointBorderColor: '#fff',
            pointRadius: 5,
            pointHoverRadius: 7,
            pointHoverBackgroundColor: '#36A2EB',
            pointHoverBorderColor: '#fff',
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false },
            tooltip: {
                enabled: true,
                backgroundColor: '#1f2937',
                titleColor: '#f3f4f6',
                bodyColor: '#f3f4f6',
                titleFont: { weight: 'bold' },
                callbacks: {
                    title: (tooltipItems) => {
                        return tooltipItems[0].label; 
                    },
                    label: (tooltipItem) => {
                        return `Users: ${tooltipItem.formattedValue}`;
                    }
                }
            }
        },
        scales: {
            x: {
                grid: { display: false },
                ticks: { color: '#6b7280', font: { size: 13 } }
            },
            y: {
                beginAtZero: true,
                grid: { color: 'rgba(0,0,0,0.05)' },
                ticks: { color: '#6b7280', stepSize: 1 }
            }
        }
    }
});
</script>

@endsection
