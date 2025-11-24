document.addEventListener("DOMContentLoaded", function () {
    const canvas = document.getElementById('propertyTypesChart');
    if (!canvas) return;

    const labels = JSON.parse(canvas.dataset.labels);
    const dataCounts = JSON.parse(canvas.dataset.values);

    new Chart(canvas, {
        type: 'radar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Number of Listings',
                data: dataCounts,
                fill: true,
                backgroundColor: 'rgba(59, 130, 246, 0.15)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 2,
                pointBackgroundColor: 'rgba(59, 130, 246, 1)',
                pointRadius: 5,
                pointHoverRadius: 7,
                pointBorderColor: '#fff',
                pointHoverBorderColor: 'rgba(59, 130, 246, 1)',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                r: {
                    angleLines: { color: 'rgba(0,0,0,0.05)' },
                    grid: { color: 'rgba(0,0,0,0.03)' },
                    suggestedMin: 0,
                    suggestedMax: Math.max(...dataCounts) + 5,
                    ticks: {
                        stepSize: 1,
                        backdropColor: 'transparent',
                        color: '#6c757d',
                        font: { size: 12 }
                    },
                    pointLabels: {
                        color: '#495057',
                        font: { size: 13, weight: '500' }
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        font: { size: 13 },
                        usePointStyle: true,
                        padding: 20
                    }
                },
                tooltip: {
                    enabled: true,
                    callbacks: {
                        label: function(context) {
                            return `${context.label}: ${context.raw} listings`;
                        }
                    },
                    padding: 10,
                    bodyFont: { size: 13 },
                    cornerRadius: 6
                }
            },
            animation: {
                duration: 1000,
                easing: 'easeOutQuart'
            }
        }
    });
});
