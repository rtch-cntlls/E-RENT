document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('listerVerificationChart');
    if (!ctx) return;

    const verified = parseInt(ctx.dataset.verified);
    const unverified = parseInt(ctx.dataset.unverified);

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Verified', 'Unverified'],
            datasets: [{
                data: [verified, unverified],
                backgroundColor: [
                    'rgba(34, 197, 94, 0.6)',
                    'rgba(239, 68, 68, 0.6)'
                ],
                borderColor: [
                    'rgba(34, 197, 94, 1)',
                    'rgba(239, 68, 68, 1)'
                ],
                borderWidth: 2,
                hoverOffset: 15
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        font: { size: 13 },
                        boxWidth: 15,
                        boxHeight: 15,
                        usePointStyle: true
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            let value = context.raw;
                            let total = context.chart._metasets[context.datasetIndex].total;
                            let percentage = ((value / total) * 100).toFixed(1);
                            return `${label}: ${value} (${percentage}%)`;
                        }
                    },
                    padding: 10,
                    bodyFont: { size: 13 },
                    cornerRadius: 6
                }
            }
        }
    });
});
