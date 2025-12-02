Chart.defaults.font.family = "'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif";
Chart.defaults.color = '#64748b';

function initDailySalesChart() {
    const dailyCtx = document.getElementById('dailySalesChart');
    if (!dailyCtx) return;

    const dailyLabels = JSON.parse(dailyCtx.dataset.labels || '[]');
    const dailyData = JSON.parse(dailyCtx.dataset.data || '[]');

    new Chart(dailyCtx, {
        type: 'line',
        data: {
            labels: dailyLabels,
            datasets: [{
                label: 'Total Penjualan (Rp)',
                data: dailyData,
                borderColor: '#6366f1',
                backgroundColor: 'rgba(99, 102, 241, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#6366f1',
                pointBorderColor: '#fff',
                pointBorderWidth: 3,
                pointRadius: 5,
                pointHoverRadius: 8,
                pointHoverBackgroundColor: '#4f46e5',
                pointHoverBorderWidth: 3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        padding: 15,
                        font: {
                            size: 13,
                            weight: '600'
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(30, 41, 59, 0.95)',
                    titleColor: '#fff',
                    bodyColor: '#e2e8f0',
                    borderColor: '#6366f1',
                    borderWidth: 2,
                    padding: 12,
                    displayColors: false,
                    titleFont: {
                        size: 13,
                        weight: '600'
                    },
                    bodyFont: {
                        size: 14,
                        weight: '700'
                    },
                    callbacks: {
                        label: function(context) {
                            return 'Total: Rp ' + context.parsed.y.toLocaleString('id-ID');
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 11,
                            weight: '500'
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#f1f5f9',
                        drawBorder: false
                    },
                    ticks: {
                        font: {
                            size: 11,
                            weight: '500'
                        },
                        callback: function(value) {
                            if (value >= 1000000) {
                                return 'Rp ' + (value / 1000000).toFixed(1) + 'jt';
                            } else if (value >= 1000) {
                                return 'Rp ' + (value / 1000).toFixed(0) + 'rb';
                            }
                            return 'Rp ' + value;
                        }
                    }
                }
            },
            animation: {
                duration: 1500,
                easing: 'easeInOutQuart'
            }
        }
    });
}

function initTopProductsChart() {
    const topProductsCtx = document.getElementById('topProductsChart');
    if (!topProductsCtx) return;

    const topProductsData = JSON.parse(topProductsCtx.dataset.products || '[]');

    const gradient1 = topProductsCtx.getContext('2d').createLinearGradient(0, 0, 0, 300);
    gradient1.addColorStop(0, '#6366f1');
    gradient1.addColorStop(1, '#8b5cf6');

    const gradient2 = topProductsCtx.getContext('2d').createLinearGradient(0, 0, 0, 300);
    gradient2.addColorStop(0, '#10b981');
    gradient2.addColorStop(1, '#059669');

    const gradient3 = topProductsCtx.getContext('2d').createLinearGradient(0, 0, 0, 300);
    gradient3.addColorStop(0, '#06b6d4');
    gradient3.addColorStop(1, '#0891b2');

    const gradient4 = topProductsCtx.getContext('2d').createLinearGradient(0, 0, 0, 300);
    gradient4.addColorStop(0, '#f59e0b');
    gradient4.addColorStop(1, '#d97706');

    const gradient5 = topProductsCtx.getContext('2d').createLinearGradient(0, 0, 0, 300);
    gradient5.addColorStop(0, '#ef4444');
    gradient5.addColorStop(1, '#dc2626');

    new Chart(topProductsCtx, {
        type: 'doughnut',
        data: {
            labels: topProductsData.map(p => p.product.name),
            datasets: [{
                data: topProductsData.map(p => p.total_revenue),
                backgroundColor: [
                    gradient1,
                    gradient2,
                    gradient3,
                    gradient4,
                    gradient5
                ],
                borderWidth: 4,
                borderColor: '#fff',
                hoverBorderWidth: 6,
                hoverBorderColor: '#fff',
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '65%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 15,
                        boxHeight: 15,
                        padding: 15,
                        usePointStyle: true,
                        pointStyle: 'circle',
                        font: {
                            size: 12,
                            weight: '600'
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(30, 41, 59, 0.95)',
                    titleColor: '#fff',
                    bodyColor: '#e2e8f0',
                    borderColor: '#6366f1',
                    borderWidth: 2,
                    padding: 12,
                    displayColors: true,
                    titleFont: {
                        size: 13,
                        weight: '600'
                    },
                    bodyFont: {
                        size: 14,
                        weight: '700'
                    },
                    callbacks: {
                        label: function(context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((context.parsed / total) * 100).toFixed(1);
                            return context.label + ': Rp ' + context.parsed.toLocaleString('id-ID') + ' (' + percentage + '%)';
                        }
                    }
                }
            },
            animation: {
                animateRotate: true,
                animateScale: true,
                duration: 1500,
                easing: 'easeInOutQuart'
            }
        }
    });
}

function initMonthlySalesChart() {
    const monthlyCtx = document.getElementById('monthlySalesChart');
    if (!monthlyCtx) return;

    const monthlyLabels = JSON.parse(monthlyCtx.dataset.labels || '[]');
    const monthlyData = JSON.parse(monthlyCtx.dataset.data || '[]');

    const gradient = monthlyCtx.getContext('2d').createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, '#10b981');
    gradient.addColorStop(1, '#059669');

    new Chart(monthlyCtx, {
        type: 'bar',
        data: {
            labels: monthlyLabels,
            datasets: [{
                label: 'Penjualan Bulanan (Rp)',
                data: monthlyData,
                backgroundColor: gradient,
                borderColor: '#10b981',
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
                hoverBackgroundColor: '#059669',
                hoverBorderWidth: 3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        padding: 15,
                        font: {
                            size: 13,
                            weight: '600'
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(30, 41, 59, 0.95)',
                    titleColor: '#fff',
                    bodyColor: '#e2e8f0',
                    borderColor: '#10b981',
                    borderWidth: 2,
                    padding: 12,
                    displayColors: false,
                    titleFont: {
                        size: 13,
                        weight: '600'
                    },
                    bodyFont: {
                        size: 14,
                        weight: '700'
                    },
                    callbacks: {
                        label: function(context) {
                            return 'Total: Rp ' + context.parsed.y.toLocaleString('id-ID');
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 11,
                            weight: '500'
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#f1f5f9',
                        drawBorder: false
                    },
                    ticks: {
                        font: {
                            size: 11,
                            weight: '500'
                        },
                        callback: function(value) {
                            if (value >= 1000000) {
                                return 'Rp ' + (value / 1000000).toFixed(1) + 'jt';
                            } else if (value >= 1000) {
                                return 'Rp ' + (value / 1000).toFixed(0) + 'rb';
                            }
                            return 'Rp ' + value;
                        }
                    }
                }
            },
            animation: {
                duration: 1500,
                easing: 'easeInOutQuart'
            }
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        initDailySalesChart();
        initTopProductsChart();
        initMonthlySalesChart();
    }, 100);
    
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.card').forEach(card => {
        observer.observe(card);
    });
});