<?php
/**
 * Cryptocurrency market overview for the customer dashboard.
 * Live public market data is fetched from CoinGecko in the browser.
 */
?>
<section class="vh-panel vh-crypto-panel" aria-labelledby="vhCryptoTitle">
    <div class="vh-panel-heading vh-crypto-heading">
        <div>
            <span class="vh-crypto-eyebrow"><i class="fas fa-globe" aria-hidden="true"></i> LIVE MARKET SNAPSHOT</span>
            <h2 id="vhCryptoTitle">Cryptocurrency market</h2>
            <p>Top 20 crypto assets by market capitalisation, with current USD prices and 24-hour movement.</p>
        </div>
        <button type="button" class="vh-crypto-refresh" id="vhCryptoRefresh"><i class="fas fa-sync-alt" aria-hidden="true"></i> Refresh</button>
    </div>
    <div class="vh-crypto-summary" aria-live="polite"><span class="vh-crypto-status-dot"></span><span id="vhCryptoStatus">Loading market data…</span><span class="vh-crypto-updated" id="vhCryptoUpdated"></span></div>
    <div class="vh-crypto-table-wrap">
        <table class="vh-crypto-table">
            <thead><tr><th scope="col">#</th><th scope="col">Asset</th><th scope="col" class="vh-crypto-number">Price (USD)</th><th scope="col" class="vh-crypto-number">24h change</th><th scope="col" class="vh-crypto-market-cap">Market cap</th></tr></thead>
            <tbody id="vhCryptoRows"><tr><td colspan="5" class="vh-crypto-message">Fetching the latest cryptocurrency prices…</td></tr></tbody>
        </table>
    </div>
    <p class="vh-crypto-disclaimer">Market data provided by CoinGecko. Prices are informational and may be delayed. This display does not change CFXM-PRO account balances.</p>
</section>
<style>
.vh-crypto-panel{margin:0 0 24px;min-width:0;overflow:hidden}.vh-crypto-heading{align-items:center;gap:18px;flex-wrap:wrap}.vh-crypto-heading h2{margin:7px 0 5px}.vh-crypto-heading p{margin:0}.vh-crypto-eyebrow{display:inline-flex;align-items:center;gap:7px;color:var(--cfxm-purple-2,#a98be8);font-size:10px;font-weight:800;letter-spacing:.13em}.vh-crypto-refresh{flex:0 0 auto;border:1px solid var(--cfxm-line,rgba(223,208,184,.18));border-radius:11px;padding:10px 13px;background:var(--cfxm-surface-raised,#27313b);color:var(--cfxm-text,#DFD0B8);font:inherit;font-size:12px;font-weight:700;cursor:pointer;transition:border-color .2s,transform .2s}.vh-crypto-refresh:hover{border-color:var(--cfxm-purple-2,#7748bc);transform:translateY(-1px)}.vh-crypto-refresh:disabled{cursor:wait;opacity:.65;transform:none}.vh-crypto-summary{display:flex;align-items:center;flex-wrap:wrap;gap:8px;margin:18px 0 12px;color:var(--cfxm-muted,#a5b1ba);font-size:11px}.vh-crypto-status-dot{width:7px;height:7px;flex:0 0 7px;border-radius:50%;background:#e5ad4e}.vh-crypto-status-dot.is-live{background:#26c281;box-shadow:0 0 0 4px rgba(38,194,129,.12)}.vh-crypto-status-dot.is-error{background:#ef6464}.vh-crypto-updated{margin-left:auto}.vh-crypto-table-wrap{width:100%;overflow-x:auto;border:1px solid var(--cfxm-line,rgba(223,208,184,.14));border-radius:13px}.vh-crypto-table{width:100%;min-width:580px;border-collapse:collapse;color:var(--cfxm-text,#DFD0B8);font-size:12px}.vh-crypto-table thead{background:var(--cfxm-surface-raised,#27313b)}.vh-crypto-table th{padding:12px 14px;color:var(--cfxm-muted,#a5b1ba);font-size:10px;font-weight:700;letter-spacing:.04em;text-align:left;white-space:nowrap}.vh-crypto-table td{padding:11px 14px;border-top:1px solid var(--cfxm-line,rgba(223,208,184,.1));white-space:nowrap}.vh-crypto-table tbody tr{transition:background .15s}.vh-crypto-table tbody tr:hover{background:rgba(119,72,188,.08)}.vh-crypto-number{text-align:right!important;font-variant-numeric:tabular-nums}.vh-crypto-market-cap{text-align:right!important}.vh-crypto-rank{color:var(--cfxm-muted,#a5b1ba);width:32px}.vh-crypto-asset{display:flex;align-items:center;gap:10px;min-width:160px}.vh-crypto-asset img{width:27px;height:27px;flex:0 0 27px;border-radius:50%;object-fit:contain;background:rgba(255,255,255,.06)}.vh-crypto-asset-name{display:flex;flex-direction:column;gap:3px;min-width:0}.vh-crypto-asset-name strong{color:var(--cfxm-text,#DFD0B8);font-size:12px;font-weight:750}.vh-crypto-asset-name span{color:var(--cfxm-muted,#a5b1ba);font-size:10px;text-transform:uppercase}.vh-crypto-price{font-weight:750;font-variant-numeric:tabular-nums}.vh-crypto-change{display:inline-flex;align-items:center;justify-content:flex-end;gap:5px;min-width:78px;font-size:11px;font-weight:750;font-variant-numeric:tabular-nums}.vh-crypto-change.is-up{color:#27c281}.vh-crypto-change.is-down{color:#f06b75}.vh-crypto-change.is-flat{color:var(--cfxm-muted,#a5b1ba)}.vh-crypto-message{padding:28px 16px!important;color:var(--cfxm-muted,#a5b1ba);text-align:center;white-space:normal!important}.vh-crypto-disclaimer{margin:12px 2px 0;color:var(--cfxm-muted,#a5b1ba);font-size:10px;line-height:1.6}@media(max-width:600px){.vh-crypto-panel{padding:16px!important}.vh-crypto-heading{align-items:flex-start}.vh-crypto-refresh{padding:9px 10px}.vh-crypto-updated{width:100%;margin-left:15px}}
</style>
<script>
(function(){
'use strict';
const endpoint='https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=20&page=1&sparkline=false&price_change_percentage=24h';
const rows=document.getElementById('vhCryptoRows'),status=document.getElementById('vhCryptoStatus'),updated=document.getElementById('vhCryptoUpdated'),refresh=document.getElementById('vhCryptoRefresh'),dot=document.querySelector('.vh-crypto-status-dot');
if(!rows||!status||!refresh)return;
const money=new Intl.NumberFormat('en-US',{style:'currency',currency:'USD',maximumFractionDigits:8});
const compactMoney=new Intl.NumberFormat('en-US',{style:'currency',currency:'USD',notation:'compact',maximumFractionDigits:2});
function esc(value){return String(value==null?'':value).replace(/[&<>"']/g,ch=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[ch]));}
function price(value){return typeof value==='number'&&Number.isFinite(value)?money.format(value):'—';}
function render(assets){
rows.innerHTML=assets.map((a,i)=>{
const v=a.price_change_percentage_24h_in_currency!=null?a.price_change_percentage_24h_in_currency:a.price_change_percentage_24h;
const positive=typeof v==='number'&&v>0,negative=typeof v==='number'&&v<0;
const css=positive?'is-up':negative?'is-down':'is-flat',icon=positive?'fa-arrow-up':negative?'fa-arrow-down':'fa-minus';
const label=typeof v==='number'&&Number.isFinite(v)?(positive?'+':'')+v.toFixed(2)+'%':'—';
const image=a.image?'<img src="'+esc(a.image)+'" alt="" loading="lazy" referrerpolicy="no-referrer" onerror="this.style.visibility=\'hidden\'">':'';
return '<tr data-loaded="true"><td class="vh-crypto-rank">'+(a.market_cap_rank||i+1)+'</td><td><div class="vh-crypto-asset">'+image+'<div class="vh-crypto-asset-name"><strong>'+esc(a.name)+'</strong><span>'+esc(a.symbol)+'</span></div></div></td><td class="vh-crypto-number vh-crypto-price">'+price(a.current_price)+'</td><td class="vh-crypto-number"><span class="vh-crypto-change '+css+'"><i class="fas '+icon+'" aria-hidden="true"></i>'+label+'</span></td><td class="vh-crypto-market-cap vh-crypto-number">'+(typeof a.market_cap==='number'?compactMoney.format(a.market_cap):'—')+'</td></tr>';
}).join('');
status.textContent=assets.length+' assets · 24-hour price movement';dot.className='vh-crypto-status-dot is-live';updated.textContent='Updated '+new Date().toLocaleTimeString([],{hour:'2-digit',minute:'2-digit'});
}
async function load(){
refresh.disabled=true;refresh.innerHTML='<i class="fas fa-spinner fa-spin" aria-hidden="true"></i> Loading';status.textContent='Fetching latest prices…';dot.className='vh-crypto-status-dot';
try{
const response=await fetch(endpoint,{headers:{accept:'application/json'},cache:'no-store'});
if(!response.ok)throw new Error('Market provider returned HTTP '+response.status);
const assets=await response.json();if(!Array.isArray(assets)||!assets.length)throw new Error('No market data was returned.');
render(assets.slice(0,20));
}catch(error){
dot.className='vh-crypto-status-dot is-error';status.textContent='Market data is temporarily unavailable.';
if(!rows.querySelector('tr[data-loaded="true"]'))rows.innerHTML='<tr><td colspan="5" class="vh-crypto-message">Unable to load cryptocurrency prices right now. Please try again shortly.</td></tr>';
console.error('Cryptocurrency market load failed:',error);
}finally{refresh.disabled=false;refresh.innerHTML='<i class="fas fa-sync-alt" aria-hidden="true"></i> Refresh';}
}
refresh.addEventListener('click',load);load();window.setInterval(load,120000);
})();
</script>
