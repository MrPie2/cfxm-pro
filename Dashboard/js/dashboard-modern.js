(function () {
    'use strict';
    var dataNode = document.getElementById('vhDashboardChartData');
    if (!dataNode || typeof window.Chart === 'undefined') return;

    var data;
    try { data = JSON.parse(dataNode.textContent || '{}'); } catch (error) { return; }

    var textColor = getComputedStyle(document.documentElement).getPropertyValue('--text-color').trim() || '#70818d';
    var gridColor = 'rgba(125, 148, 162, .16)';
    var brand = '#49247e';
    var green = '#0e6937';
    var purple = '#7748bc';
    var colors = [brand, purple, green, '#e5a13d', '#4384d6', '#d96c8b', '#5b9e8a', '#8b7bb8'];
    var charts = [];
    function refreshChartTheme() {
        var dark = document.documentElement.getAttribute('data-theme') === 'dark';
        var foreground = getComputedStyle(document.documentElement).getPropertyValue('--text-color').trim() || (dark ? '#DFD0B8' : '#222');
        charts.forEach(function (chart) {
            chart.options.scales && Object.keys(chart.options.scales).forEach(function (key) {
                var scale = chart.options.scales[key];
                if (scale.ticks) scale.ticks.color = foreground;
                if (scale.grid && key === 'y') scale.grid.color = dark ? 'rgba(255,255,255,.10)' : 'rgba(125,148,162,.16)';
            });
            chart.data.datasets.forEach(function (dataset) {
                if (chart.config.type === 'line') {
                    dataset.borderColor = dark ? '#b99be8' : brand;
                    dataset.backgroundColor = dark ? 'rgba(185,155,232,.16)' : 'rgba(73,36,126,.12)';
                } else if (chart.config.type === 'doughnut') {
                    dataset.backgroundColor = dark
                        ? ['#b99be8', '#7748bc', '#0e6937', '#e5a13d', '#4384d6', '#d96c8b', '#5b9e8a', '#8b7bb8']
                        : colors;
                }
            });
            chart.update('none');
        });
    }
    var currency = data.currency || '';

    var performanceCanvas = document.getElementById('vhPerformanceChart');
    var performanceEmpty = document.getElementById('vhPerformanceEmpty');
    if (performanceCanvas && Array.isArray(data.timelineLabels) && data.timelineLabels.length) {
        performanceCanvas.style.display = 'block';
        if (performanceEmpty) performanceEmpty.hidden = true;
        charts.push(new Chart(performanceCanvas, {
            type: 'line',
            data: {
                labels: data.timelineLabels,
                datasets: [{
                    label: 'Cumulative invested',
                    data: data.timelineValues || [],
                    borderColor: brand,
                    backgroundColor: 'rgba(73,36,126,.12)',
                    fill: true,
                    tension: .35,
                    borderWidth: 2.5,
                    pointRadius: data.timelineLabels.length > 20 ? 0 : 3,
                    pointHoverRadius: 5,
                    pointBackgroundColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: { intersect: false, mode: 'index' },
                plugins: {
                    legend: { display: false },
                    tooltip: { displayColors: false, callbacks: { label: function (ctx) { return ' ' + currency + Number(ctx.parsed.y || 0).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}); } } }
                },
                scales: {
                    x: { grid: { display: false }, ticks: { color: textColor, maxTicksLimit: 7, maxRotation: 0 } },
                    y: { beginAtZero: true, grid: { color: gridColor }, ticks: { color: textColor, callback: function (value) { return currency + Number(value).toLocaleString(); } } }
                }
            }
        }));
    } else if (performanceCanvas) {
        performanceCanvas.style.display = 'none';
    }

    var themeToggle = document.querySelector('.switch-dark');
    if (themeToggle) themeToggle.addEventListener('click', function () {
        window.setTimeout(refreshChartTheme, 0);
    });
})();