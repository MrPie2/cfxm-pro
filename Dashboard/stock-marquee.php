<?php
/**
 * Live financial-stock marquee. Quotes and intraday sparkline data are requested
 * from Yahoo Finance's public chart endpoint; values are not fabricated.
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

    const symbols = [
        ['AAPL', 'Apple'], ['MSFT', 'Microsoft'], ['NVDA', 'NVIDIA'],
        ['AMZN', 'Amazon'], ['GOOGL', 'Alphabet'], ['META', 'Meta'],
        ['BRK-B', 'Berkshire Hathaway'], ['JPM', 'JPMorgan Chase'],
        ['AVGO', 'Broadcom'], ['LLY', 'Eli Lilly'], ['WMT', 'Walmart'],
        ['V', 'Visa'], ['XOM', 'Exxon Mobil'], ['MA', 'Mastercard'],
        ['COST', 'Costco'], ['ORCL', 'Oracle'], ['NFLX', 'Netflix'],
        ['JNJ', 'Johnson & Johnson'], ['PG', 'Procter & Gamble'], ['TSLA', 'Tesla']
    ];
    const endpoint = 'https://query1.finance.yahoo.com/v8/finance/chart/';
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
    async function quote(item) {
        const response = await fetch(endpoint + encodeURIComponent(item[0]) + '?range=1d&interval=5m', {
            headers: { accept: 'application/json' }, cache: 'no-store'
        });
        if (!response.ok) throw new Error('Quote request failed for ' + item[0]);
        const json = await response.json();
        const result = json && json.chart && json.chart.result && json.chart.result[0];
        if (!result || !result.meta) throw new Error('No quote data for ' + item[0]);
        const meta = result.meta;
        const closes = result.indicators && result.indicators.quote && result.indicators.quote[0]
            ? result.indicators.quote[0].close : [];
        const values = (closes || []).filter(v => typeof v === 'number' && Number.isFinite(v));
        const price = typeof meta.regularMarketPrice === 'number' ? meta.regularMarketPrice : values[values.length - 1];
        const previous = typeof meta.chartPreviousClose === 'number' ? meta.chartPreviousClose : meta.previousClose;
        if (typeof price !== 'number' || typeof previous !== 'number' || !previous) throw new Error('Incomplete quote for ' + item[0]);
        const change = ((price - previous) / previous) * 100;
        return { symbol: item[0], name: item[1], price, change, values };
    }
    function card(stock) {
        const up = stock.change >= 0;
        const cls = up ? 'is-up' : 'is-down';
        const icon = up ? 'fa-arrow-up' : 'fa-arrow-down';
        const pct = (up ? '+' : '') + stock.change.toFixed(2) + '%';
        return '<article class="vh-stock-ticker '+cls+'" title="'+esc(stock.name)+' ('+esc(stock.symbol)+')">'
            + '<div class="vh-stock-ticker-top"><span class="vh-stock-symbol">'+esc(stock.symbol)+'</span>'
            + '<span class="vh-stock-change '+cls+'"><i class="fas '+icon+'" aria-hidden="true"></i>'+pct+'</span></div>'
            + '<strong class="vh-stock-price">'+money(stock.price)+'</strong>'
            + '<div class="vh-stock-ticker-bottom">'+sparkline(stock.values, up)
            + '<span class="vh-stock-company">'+esc(stock.name)+'</span></div></article>';
    }
    async function load() {
        const results = [];
        let next = 0;
        async function worker() {
            while (next < symbols.length) {
                const index = next++;
                try { results[index] = await quote(symbols[index]); }
                catch (error) { results[index] = null; }
            }
        }
        await Promise.all([worker(), worker(), worker(), worker(), worker()]);
        const stocks = results.filter(Boolean);
        if (!stocks.length) {
            track.innerHTML = '<div class="vh-stock-loading">Live stock quotes are temporarily unavailable. Please try again shortly.</div>';
            updated.textContent = 'Quotes unavailable';
            return;
        }
        const cards = stocks.map(card).join('');
        track.innerHTML = cards + cards;
        track.classList.add('is-ready');
        updated.textContent = stocks.length + ' of ' + symbols.length + ' stocks · Updated ' + new Date().toLocaleTimeString([], {hour:'2-digit',minute:'2-digit'});
        track.setAttribute('aria-label', 'Live stock prices. The ticker repeats for continuous scrolling.');
        track.style.setProperty('--vh-stock-scroll-duration', Math.max(55, stocks.length * 5.5) + 's');
    }
    load();
    window.setInterval(load, 60000);
})();
</script>
