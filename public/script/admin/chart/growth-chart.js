document.addEventListener("DOMContentLoaded", () => {
    const ctx = document.getElementById('userGrowthChart').getContext('2d');

    const gradient = ctx.createLinearGradient(0, 0, 0, 200);
    gradient.addColorStop(0, 'rgba(54, 162, 235, 0.4)');
    gradient.addColorStop(1, 'rgba(54, 162, 235, 0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: window.userGrowthData.months,
            datasets: [{
                label: '',
                data: window.userGrowthData.counts,
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
                        title: (tooltipItems) => tooltipItems[0].label,
                        label: (item) => `Users: ${item.formattedValue}`
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
});
