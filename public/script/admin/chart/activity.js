document.addEventListener('DOMContentLoaded', function () {
    const canvas = document.getElementById('hostActivityChart');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');

    const months = window.hostChartData?.months || [];
    const joinedTrend = window.hostChartData?.joinedTrend || [];

    const barGradient = ctx.createLinearGradient(0, 0, 0, 300);
    barGradient.addColorStop(0, 'rgba(33, 150, 243, 0.7)');
    barGradient.addColorStop(1, 'rgba(33, 150, 243, 0.2)');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'hosts Joined',
                data: joinedTrend,
                backgroundColor: barGradient,
                borderRadius: 8,
                barThickness: 25
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    enabled: true,
                    backgroundColor: '#111827',
                    titleColor: '#fff',
                    bodyColor: '#d1d5db',
                    borderWidth: 0,
                    cornerRadius: 6,
                    padding: 10,
                    callbacks: {
                        label: function(context) {
                            return `${context.dataset.label}: ${context.raw}`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: "rgba(0,0,0,0.05)", drawBorder: false },
                    ticks: { stepSize: 2, font: { size: 13 } }
                },
                x: { grid: { display: false }, ticks: { font: { size: 13 } } }
            }
        }
    });
});
