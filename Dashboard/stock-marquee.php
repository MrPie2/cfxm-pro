<?php
/**
 * US stock cards. Data is fetched through a same-origin PHP proxy,
 * which keeps the Finnhub API key on the server rather than exposing it in the browser.
 */
?>
<section class="vh-stock-marquee" aria-label="US stock market prices">
    <div class="vh-stock-marquee-head">
        <div>
            <span class="vh-stock-live-dot" aria-hidden="true"></span>
            <strong>US STOCKS</strong>
            <span class="vh-stock-market-caption">Live market prices</span>
        </div>
        <span class="vh-stock-updated" id="vhStockUpdated" aria-live="polite">Loading US stock quotes…</span>
    </div>
    <div class="vh-stock-marquee-viewport" tabindex="0" role="region" aria-label="Scroll horizontally to view more stock cards">
        <div class="vh-stock-marquee-track" id="vhStockTrack">
            <div class="vh-stock-loading">Connecting to US market data…</div>
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
    const maxStocks = 10;
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
        const percent = (changePercent > 0 ? '+' : '') + changePercent.toFixed(2) + '%';
        return '<article class="vh-stock-ticker '+cls+'" title="'+esc(stock.name)+' ('+esc(stock.symbol)+')">'
            + '<div class="vh-stock-ticker-top"><span class="vh-stock-symbol">'+esc(stock.symbol)+'</span></div>'
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
            updated.textContent = stocks.length + ' US stocks · Updated ' +
                new Date((Number(payload.updatedAt) || Math.floor(Date.now() / 1000)) * 1000)
                    .toLocaleTimeString([], {hour:'2-digit', minute:'2-digit'});
            track.setAttribute('aria-label', 'Up to 10 US stock prices. Scroll horizontally to see each card.');
        } catch (error) {
            if (!track.classList.contains('is-ready')) {
                track.innerHTML = '<div class="vh-stock-loading">US stock quotes are temporarily unavailable. Please check the server API configuration.</div>';
            }
            updated.textContent = 'Quotes unavailable';
        }
    }
    load();
    window.setInterval(load, 120000);
})();
</script>
