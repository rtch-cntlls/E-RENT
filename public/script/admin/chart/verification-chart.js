document.addEventListener('DOMContentLoaded', function () {
    const verified = parseInt(document.getElementById('verificationChart').dataset.verified);
    const unverified = parseInt(document.getElementById('verificationChart').dataset.unverified);
    const total = verified + unverified;

    const ctx = document.getElementById('verificationChart').getContext('2d');

    const shadowPlugin = {
        id: 'shadow',
        beforeDraw: (chart) => {
            const { ctx } = chart;
            ctx.save();
            ctx.shadowColor = 'rgba(0,0,0,0.07)';
            ctx.shadowBlur = 15;
            ctx.shadowOffsetX = 0;
            ctx.shadowOffsetY = 4;
        },
        afterDraw: (chart) => chart.ctx.restore()
    };

    new Chart(ctx, {
        type: 'doughnut',
        plugins: [shadowPlugin],
        data: {
            labels: ['Verified', 'Unverified'],
            datasets: [{
                data: [verified, unverified],
                backgroundColor: ['#3B82F6', '#EF4444'],
                borderWidth: 0,
                hoverOffset: 10
            }]
        },
        options: {
            cutout: "72%",
            animation: {
                animateRotate: true,
                duration: 1100,
                easing: 'easeOutQuad'
            },
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        usePointStyle: true,
                        pointStyle: "circle"
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            const value = context.raw;
                            const percent = ((value / total) * 100).toFixed(1);
                            return `${context.label}: ${value} (${percent}%)`;
                        }
                    }
                }
            }
        }
    });
});
