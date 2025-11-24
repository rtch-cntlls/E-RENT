document.addEventListener('DOMContentLoaded', function () {
    const canvas = document.getElementById('tophostChart');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');

    const topListerNames = JSON.parse(canvas.dataset.names);
    const topListerCounts = JSON.parse(canvas.dataset.counts);

    const gradient = ctx.createLinearGradient(0, 0, 300, 0);
    gradient.addColorStop(0, 'rgba(156, 39, 176, 0.8)');
    gradient.addColorStop(1, 'rgba(156, 39, 176, 0.4)');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: topListerNames,
            datasets: [{
                label: 'Total Properties Listed',
                data: topListerCounts,
                backgroundColor: gradient,
                borderRadius: 10,
                barThickness: 20,
                hoverBackgroundColor: 'rgba(156, 39, 176, 1)'
            }]
        },
        options: {
            indexAxis: 'y',
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
                            const value = context.raw;
                            const total = topListerCounts.reduce((a,b)=>a+b,0);
                            const percent = ((value/total)*100).toFixed(1);
                            return `${context.label}: ${value} (${percent}%)`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    grid: { color: "rgba(0,0,0,0.05)" },
                    ticks: { font: { size: 13 } }
                },
                y: {
                    grid: { display: false },
                    ticks: { font: { size: 13 } }
                }
            }
        }
    });
});
