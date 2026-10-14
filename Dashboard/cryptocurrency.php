<?php
/**
 * Compact cryptocurrency prices table for the customer dashboard.
 * Live public market data is fetched from CoinGecko in the browser.
 */
?>
<div class="vh-crypto-table-wrap" aria-label="Cryptocurrency market prices">
    <table class="vh-crypto-table">
        <thead><tr><th scope="col">#</th><th scope="col">Asset</th><th scope="col" class="vh-crypto-number">Price (USD)</th><th scope="col" class="vh-crypto-number">24h change</th></tr></thead>
        <tbody id="vhCryptoRows"><tr><td colspan="4" class="vh-crypto-message">Fetching cryptocurrency prices…</td></tr></tbody>
    </table>
</div>
<style>
.vh-crypto-table-wrap{width:100%;min-width:0;overflow-x:auto;margin:0 0 24px}
.vh-crypto-table{width:100%;min-width:480px;border-collapse:collapse;color:var(--cfxm-text,#DFD0B8);font-size:12px}
.vh-crypto-table thead{background:var(--cfxm-surface-raised,#27313b)}
.vh-crypto-table th{padding:12px 14px;color:var(--cfxm-muted,#a5b1ba);font-size:10px;font-weight:700;letter-spacing:.04em;text-align:left;white-space:nowrap}
.vh-crypto-table td{padding:11px 14px;border-top:1px solid var(--cfxm-line,rgba(223,208,184,.1));white-space:nowrap}
.vh-crypto-table tbody tr{transition:background .15s}
.vh-crypto-table tbody tr:hover{background:rgba(119,72,188,.08)}
.vh-crypto-number{text-align:right!important;font-variant-numeric:tabular-nums}
.vh-crypto-rank{color:var(--cfxm-muted,#a5b1ba);width:32px}
.vh-crypto-asset{display:flex;align-items:center;gap:10px;min-width:160px}
.vh-crypto-asset img{width:27px;height:27px;flex:0 0 27px;border-radius:50%;object-fit:contain;background:rgba(255,255,255,.06)}
.vh-crypto-asset-name{display:flex;flex-direction:column;gap:3px;min-width:0}
.vh-crypto-asset-name strong{color:var(--cfxm-text,#DFD0B8);font-size:12px;font-weight:750}
.vh-crypto-asset-name span{color:var(--cfxm-muted,#a5b1ba);font-size:10px;text-transform:uppercase}
.vh-crypto-price{font-weight:750;font-variant-numeric:tabular-nums}
.vh-crypto-change{display:inline-flex;align-items:center;justify-content:flex-end;gap:5px;min-width:78px;font-size:11px;font-weight:750;font-variant-numeric:tabular-nums}
.vh-crypto-change.is-up{color:#27c281}
.vh-crypto-change.is-down{color:#f06b75}
.vh-crypto-change.is-flat{color:var(--cfxm-muted,#a5b1ba)}
.vh-crypto-message{padding:28px 16px!important;color:var(--cfxm-muted,#a5b1ba);text-align:center;white-space:normal!important}
@media(max-width:600px){.vh-crypto-table th,.vh-crypto-table td{padding:10px 11px}}
</style>
<script>
(function(){
'use strict';
const endpoint='https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=7&page=1&sparkline=false&price_change_percentage=24h';
const rows=document.getElementById('vhCryptoRows');
if(!rows)return;
const money=new Intl.NumberFormat('en-US',{style:'currency',currency:'USD',maximumFractionDigits:8});
function esc(value){return String(value==null?'':value).replace(/[&<>"']/g,ch=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[ch]));}
function price(value){return typeof value==='number'&&Number.isFinite(value)?money.format(value):'—';}
function render(assets){
rows.innerHTML=assets.slice(0,7).map((a,i)=>{
const v=a.price_change_percentage_24h_in_currency!=null?a.price_change_percentage_24h_in_currency:a.price_change_percentage_24h;
const positive=typeof v==='number'&&v>0,negative=typeof v==='number'&&v<0;
const css=positive?'is-up':negative?'is-down':'is-flat',icon=positive?'fa-arrow-up':negative?'fa-arrow-down':'fa-minus';
const label=typeof v==='number'&&Number.isFinite(v)?(positive?'+':'')+v.toFixed(2)+'%':'—';
const image=a.image?'<img src="'+esc(a.image)+'" alt="" loading="lazy" referrerpolicy="no-referrer" onerror="this.style.visibility=\'hidden\'">':'';
return '<tr><td class="vh-crypto-rank">'+(a.market_cap_rank||i+1)+'</td><td><div class="vh-crypto-asset">'+image+'<div class="vh-crypto-asset-name"><strong>'+esc(a.name)+'</strong><span>'+esc(a.symbol)+'</span></div></div></td><td class="vh-crypto-number vh-crypto-price">'+price(a.current_price)+'</td><td class="vh-crypto-number"><span class="vh-crypto-change '+css+'"><i class="fas '+icon+'" aria-hidden="true"></i>'+label+'</span></td></tr>';
}).join('');
}
async function load(){
try{
const response=await fetch(endpoint,{headers:{accept:'application/json'},cache:'no-store'});
if(!response.ok)throw new Error('Market provider returned HTTP '+response.status);
const assets=await response.json();
if(!Array.isArray(assets)||!assets.length)throw new Error('No market data was returned.');
render(assets);
}catch(error){
if(!rows.querySelector('tr[data-loaded="true"]'))rows.innerHTML='<tr><td colspan="4" class="vh-crypto-message">Cryptocurrency prices are temporarily unavailable.</td></tr>';
console.error('Cryptocurrency market load failed:',error);
}
}
load();
window.setInterval(load,120000);
})();
</script>
