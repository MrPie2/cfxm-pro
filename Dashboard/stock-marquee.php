<?php
/**
 * Live financial-stock marquee. Data is fetched through a same-origin PHP proxy,
 * which keeps the Finnhub API key on the server rather than exposing it in the browser.
 */
?>
<section class="vh-stock-marquee" aria-label="Live stock market prices">
    <div class="vh-stock-marquee-head">
        <div>
            <span class="vh-stock-live-dot" aria-hidden="true"></span>
            <strong>MARKET WATCH</strong>
            <span class="vh-stock-market-caption">US equities · intraday</span>
        </div>
        <span class="vh-stock-updated" id="vhStockUpdated" aria-live="polite">Loading live quotes…</span>
    </div>
    <div class="vh-stock-marquee-viewport">
        <div class="vh-stock-marquee-track" id="vhStockTrack">
            <div class="vh-stock-loading">Connecting to live market data…</div>
        </div>
    </div>
    <div class="vh-stock-marquee-note">Market prices may be delayed depending on the data provider.</div>
</section>
<script>
(function () {
    'use strict';
    const track = document.getElementById('vhStockTrack');
    const updated = document.getElementById('vhStockUpdated');
    if (!track || track.dataset.initialized) return;
    track.dataset.initialized = 'true';

    const endpoint = 'stock-market-data.php';
    const expectedCount = 20;
    const esc = value => String(value == null ? '' : value).replace(/[&<>"']/g, ch => ({
        '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
    }[ch]));
    const money = value => new Intl.NumberFormat('en-US', {
        style: 'currency', currency: 'USD',
        minimumFractionDigits: value < 1 ? 3 : 2,
        maximumFractionDigits: value < 1 ? 4 : 2
    }).format(value);
    function sparkline(values, up) {
        if (!values || values.length < 2) return '<span class="vh-stock-no-chart" aria-label="Intraday chart unavailable">—</span>';
        const width = 86, height = 28, pad = 2;
        const low = Math.min.apply(null, values), high = Math.max.apply(null, values);
        const range = high - low || 1;
        const points = values.map((v, i) => {
            const x = pad + i * (width - pad * 2) / (values.length - 1);
            const y = height - pad - ((v - low) / range) * (height - pad * 2);
            return x.toFixed(1) + ',' + y.toFixed(1);
        }).join(' ');
        const color = up ? '#27c281' : '#f06b75';
        return '<svg class="vh-stock-sparkline" viewBox="0 0 '+width+' '+height+'" role="img" aria-label="Intraday price trend" focusable="false"><polyline points="'+points+'" fill="none" stroke="'+color+'" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    }
    function card(stock) {
        const up = Number(stock.change) >= 0;
        const cls = up ? 'is-up' : 'is-down';
        const icon = up ? 'fa-arrow-up' : 'fa-arrow-down';
        const change = Number(stock.change);
        const pct = (up ? '+' : '') + change.toFixed(2) + '%';
        return '<article class="vh-stock-ticker '+cls+'" title="'+esc(stock.name)+' ('+esc(stock.symbol)+')">'
            + '<div class="vh-stock-ticker-top"><span class="vh-stock-symbol">'+esc(stock.symbol)+'</span>'
            + '<span class="vh-stock-change '+cls+'"><i class="fas '+icon+'" aria-hidden="true"></i>'+pct+'</span></div>'
            + '<strong class="vh-stock-price">'+money(Number(stock.price))+'</strong>'
            + '<div class="vh-stock-ticker-bottom">'+sparkline(stock.values, up)
            + '<span class="vh-stock-company">'+esc(stock.name)+'</span></div></article>';
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
            const stocks = Array.isArray(payload.stocks) ? payload.stocks.filter(stock =>
                stock && typeof stock.symbol === 'string' &&
                Number.isFinite(Number(stock.price)) &&
                Number.isFinite(Number(stock.change))
            ) : [];
            if (!stocks.length) throw new Error('No stock quotes are available right now.');
            const cards = stocks.map(card).join('');
            track.innerHTML = cards + cards;
            track.classList.add('is-ready');
            updated.textContent = stocks.length + ' of ' + expectedCount + ' stocks · Updated ' +
                new Date((Number(payload.updatedAt) || Math.floor(Date.now() / 1000)) * 1000)
                    .toLocaleTimeString([], {hour:'2-digit', minute:'2-digit'});
            track.setAttribute('aria-label', 'Live stock prices. The ticker repeats for continuous scrolling.');
            track.style.setProperty('--vh-stock-scroll-duration', Math.max(55, stocks.length * 5.5) + 's');
        } catch (error) {
            if (!track.classList.contains('is-ready')) {
                track.innerHTML = '<div class="vh-stock-loading">Live stock quotes are temporarily unavailable. Please check the server API configuration.</div>';
            }
            updated.textContent = 'Quotes unavailable';
        }
    }
    load();
    window.setInterval(load, 120000);
})();
</script>
