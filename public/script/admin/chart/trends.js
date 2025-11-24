document.addEventListener('DOMContentLoaded', function () {
    const canvas = document.getElementById('verificationTrendChart');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');

    const months = JSON.parse(canvas.dataset.months);
    const verifiedTrend = JSON.parse(canvas.dataset.verifiedTrend);
    const unverifiedTrend = JSON.parse(canvas.dataset.unverifiedTrend);

    const verifiedGradient = ctx.createLinearGradient(0, 0, 0, 150);
    verifiedGradient.addColorStop(0, 'rgba(59, 130, 246, 0.3)');
    verifiedGradient.addColorStop(1, 'rgba(59, 130, 246, 0)');

    const unverifiedGradient = ctx.createLinearGradient(0, 0, 0, 150);
    unverifiedGradient.addColorStop(0, 'rgba(239, 68, 68, 0.3)');
    unverifiedGradient.addColorStop(1, 'rgba(239, 68, 68, 0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [
                {
                    label: 'Verified',
                    data: verifiedTrend,
                    borderColor: '#3B82F6',
                    backgroundColor: verifiedGradient,
                    borderWidth: 3,
                    fill: true,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    pointBackgroundColor: '#3B82F6',
                    tension: 0.4
                },
                {
                    label: 'Unverified',
                    data: unverifiedTrend,
                    borderColor: '#EF4444',
                    backgroundColor: unverifiedGradient,
                    borderWidth: 3,
                    fill: true,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    pointBackgroundColor: '#EF4444',
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: { mode: 'index', intersect: false },
            layout: { padding: { bottom: 20 } },
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        usePointStyle: true,
                        pointStyle: 'circle',
                        padding: 20,
                        font: { size: 13, weight: '500' }
                    }
                },
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
                            const value = context.raw;
                            const total = value + (context.dataset.label === 'Verified'
                                ? unverifiedTrend[context.dataIndex]
                                : verifiedTrend[context.dataIndex]);
                            const percent = ((value / total) * 100).toFixed(1);
                            return `${context.dataset.label}: ${value} (${percent}%)`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: "rgba(0,0,0,0.05)", drawBorder: false },
                    ticks: { stepSize: 10 }
                },
                x: { grid: { display: false }, ticks: { font: { size: 13 } } }
            }
        }
    });
});
