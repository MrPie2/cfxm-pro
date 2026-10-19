<?php
/**
 * US stock cards. Data is fetched through a same-origin PHP proxy,
 * which keeps the Finnhub API key on the server rather than exposing it in the browser.
 */
?>
<section class="vh-stock-marquee" aria-label="Featured stock market prices">
    <div class="vh-stock-marquee-head">
        <div>
            <span class="vh-stock-live-dot" aria-hidden="true"></span>
            <strong>FEATURED STOCKS</strong>
            <span class="vh-stock-market-caption">Live market prices</span>
        </div>
        <span class="vh-stock-updated" id="vhStockUpdated" aria-live="polite">Loading stock quotes…</span>
    </div>
    <div class="vh-stock-marquee-viewport" tabindex="0" role="region" aria-label="Scroll horizontally to view more stock cards">
        <div class="vh-stock-marquee-track" id="vhStockTrack">
            <div class="vh-stock-loading">Connecting to market data…</div>
        </div>
    </div>
    <div class="vh-stock-marquee-note">Shows current quote and daily price movement. Quotes may be delayed by the data provider.</div>
</section>
<script>
(function () {
    'use strict';
    const track = document.getElementById('vhStockTrack');
    const updated = document.getElementById('vhStockUpdated');
    if (!track || track.dataset.initialized) return;
    track.dataset.initialized = 'true';

    const endpoint = 'stock-market-data.php';
    const maxStocks = 13;
    const esc = value => String(value == null ? '' : value).replace(/[&<>"']/g, ch => ({
        '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
    }[ch]));
    const money = value => new Intl.NumberFormat('en-US', {
        style: 'currency', currency: 'USD',
        minimumFractionDigits: 2, maximumFractionDigits: 2
    }).format(value);
    const signedMoney = value => (Number(value) > 0 ? '+' : Number(value) < 0 ? '−' : '') + money(Math.abs(Number(value) || 0));
    function card(stock) {
        const changeAmount = Number(stock.changeAmount) || 0;
        const changePercent = Number(stock.change) || 0;
        const up = changeAmount >= 0;
        const cls = up ? 'is-up' : 'is-down';
        const icon = up ? 'fa-arrow-up' : 'fa-arrow-down';
        const companyIcons = {
            'NVDA': 'fas fa-microchip', 'TM': 'fas fa-car', 'SONY': 'fas fa-tv',
            'HMC': 'fas fa-car-side', 'BRK.B': 'fas fa-landmark',
            'JPM': 'fas fa-university', 'AVGO': 'fas fa-microchip', 'LLY': 'fas fa-flask'
        };
        const companyLogos = {
            'AAPL': 'https://cdn.simpleicons.org/apple/000000',
            'MSFT': 'https://cdn.simpleicons.org/microsoft/5E5E5E',
            'GOOGL': 'https://cdn.simpleicons.org/google/4285F4',
            'TSLA': 'https://cdn.simpleicons.org/tesla/E82127',
            'BYDDY': 'https://cdn.simpleicons.org/byd/ED1C24',
            'NVDA': 'https://cdn.simpleicons.org/nvidia/76B900',
            'TM': 'https://cdn.simpleicons.org/toyota/EB0A1E',
            'SONY': 'https://cdn.simpleicons.org/sony/000000',
            'HMC': 'https://cdn.simpleicons.org/honda/E40521'
        };
        const companyIcon = companyIcons[stock.symbol] || 'fas fa-chart-line';
        const companyLogo = companyLogos[stock.symbol];
        const percent = (changePercent > 0 ? '+' : '') + changePercent.toFixed(2) + '%';
        return '<article class="vh-stock-ticker '+cls+'" title="'+esc(stock.name)+' ('+esc(stock.symbol)+')">'
            + '<div class="vh-stock-ticker-top"><span class="vh-stock-company-icon" aria-hidden="true">'+(companyLogo ? '<img src="'+companyLogo+'" alt="" loading="lazy" style="width:24px;height:24px;object-fit:contain" onerror="this.style.display=\'none\'">' : '<i class="'+companyIcon+'"></i>')+'</span><span class="vh-stock-symbol">'+esc(stock.symbol)+'</span></div>'
            + '<strong class="vh-stock-price">'+money(Number(stock.price))+'</strong>'
            + '<div class="vh-stock-ticker-bottom"><span class="vh-stock-change-amount '+cls+'"><i class="fas '+icon+'" aria-hidden="true"></i>'+signedMoney(changeAmount)+'</span>'
            + '<span class="vh-stock-change-percent '+cls+'">'+percent+'</span></div>'
            + '<span class="vh-stock-company">'+esc(stock.name)+'</span></article>';
    }
    async function load() {
        try {
            const response = await fetch(endpoint, {
                headers: { accept: 'application/json' },
                credentials: 'same-origin',
                cache: 'no-store'
            });
            const payload = await response.json().catch(() => ({}));
            if (!response.ok) throw new Error(payload.error || 'Stock quotes are temporarily unavailable.');
            const stocks = (Array.isArray(payload.stocks) ? payload.stocks : []).filter(stock =>
                stock && typeof stock.symbol === 'string' &&
                Number.isFinite(Number(stock.price)) &&
                Number.isFinite(Number(stock.change)) &&
                Number.isFinite(Number(stock.changeAmount))
            ).slice(0, maxStocks);
            if (!stocks.length) throw new Error('No stock quotes are available right now.');
            track.innerHTML = stocks.map(card).join('');
            track.classList.add('is-ready');
            updated.textContent = stocks.length + ' featured stocks · Updated ' +
                new Date((Number(payload.updatedAt) || Math.floor(Date.now() / 1000)) * 1000)
                    .toLocaleTimeString([], {hour:'2-digit', minute:'2-digit'});
            track.setAttribute('aria-label', 'Up to 10 featured stock prices. Scroll horizontally to see each card.');
        } catch (error) {
            if (!track.classList.contains('is-ready')) {
                const message = error && typeof error.message === 'string' && error.message.trim()
                    ? error.message
                    : 'Stock quotes are temporarily unavailable. Please check the server API configuration.';
                track.innerHTML = '<div class="vh-stock-loading">' + esc(message) + '</div>';
            }
            updated.textContent = 'Quotes unavailable';
        }
    }
    load();
    window.setInterval(load, 120000);
})();
</script>
