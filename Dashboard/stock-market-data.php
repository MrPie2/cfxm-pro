<?php
/**
 * Same-origin featured stock quote proxy for dashboard stock cards.
 * Configure FINNHUB_API_KEY in the PHP/server environment; never expose it in JavaScript.
 */
session_start();
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, max-age=0');

if (empty($_SESSION['User_id'])) {
    http_response_code(401);
    echo json_encode(array('error' => 'Authentication required.'));
    exit;
}

$apiKey = "d7tisapr01qugn0ap8lgd7tisapr01qugn0ap8m0";
if (!$apiKey) {
    http_response_code(503);
    echo json_encode(array('error' => 'Stock data is not configured yet. Set FINNHUB_API_KEY on the server.'));
    exit;
}
if (!function_exists('curl_init') || !function_exists('curl_multi_init')) {
    http_response_code(503);
    echo json_encode(array('error' => 'The PHP cURL extension is required for stock data.'));
    exit;
}

$stocks = array(
    array('symbol' => 'AAPL', 'name' => 'Apple'),
    array('symbol' => 'MSFT', 'name' => 'Microsoft'),
    array('symbol' => 'NVDA', 'name' => 'NVIDIA'),
    array('symbol' => 'GOOGL', 'name' => 'Alphabet (Google)'),
    array('symbol' => 'TSLA', 'name' => 'Tesla'),
    array('symbol' => 'BYDDY', 'name' => 'BYD Company'),
    array('symbol' => 'TM', 'name' => 'Toyota Motor'),
    array('symbol' => 'SONY', 'name' => 'Sony Group'),
    array('symbol' => 'HMC', 'name' => 'Honda Motor'),
    array('symbol' => 'BRK.B', 'name' => 'Berkshire Hathaway'),
    array('symbol' => 'JPM', 'name' => 'JPMorgan Chase'),
    array('symbol' => 'AVGO', 'name' => 'Broadcom'),
    array('symbol' => 'LLY', 'name' => 'Eli Lilly')
);

$cacheFile = rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'cfxm-stock-cards-cache.json';
$cacheTtl = 120;
if (is_file($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTtl) {
    $cached = file_get_contents($cacheFile);
    if ($cached !== false && $cached !== '') {
        echo $cached;
        exit;
    }
}

$requests = array();
foreach ($stocks as $stock) {
    $symbol = rawurlencode($stock['symbol']);
    $requests[] = array(
        'symbol' => $stock['symbol'],
        'kind' => 'quote',
        'url' => 'https://finnhub.io/api/v1/quote?symbol=' . $symbol . '&token=' . rawurlencode($apiKey)
    );
}

$multi = curl_multi_init();
$handles = array();
foreach ($requests as $index => $request) {
    $handle = curl_init($request['url']);
    curl_setopt_array($handle, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_TIMEOUT => 12,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_HTTPHEADER => array('Accept: application/json', 'User-Agent: CFXM-StockMarquee/1.0')
    ));
    curl_multi_add_handle($multi, $handle);
    $handles[$index] = $handle;
}

$running = null;
do {
    $status = curl_multi_exec($multi, $running);
    if ($running && $status === CURLM_OK) {
        $selected = curl_multi_select($multi, 1.0);
        if ($selected === -1) { usleep(100000); }
    }
} while ($running && $status === CURLM_OK);

$raw = array();
foreach ($handles as $index => $handle) {
    $body = curl_multi_getcontent($handle);
    $statusCode = (int) curl_getinfo($handle, CURLINFO_HTTP_CODE);
    $decoded = json_decode((string) $body, true);
    $raw[$index] = ($statusCode >= 200 && $statusCode < 300 && is_array($decoded)) ? $decoded : null;
    curl_multi_remove_handle($multi, $handle);
    curl_close($handle);
}
curl_multi_close($multi);

$bySymbol = array();
foreach ($stocks as $stock) {
    $bySymbol[$stock['symbol']] = array('quote' => null, 'meta' => $stock);
}
foreach ($requests as $index => $request) {
    if (isset($bySymbol[$request['symbol']])) {
        $bySymbol[$request['symbol']]['quote'] = $raw[$index];
    }
}

$result = array();
foreach ($bySymbol as $symbol => $data) {
    $quote = $data['quote'];
    if (!is_array($quote) || !isset($quote['c'], $quote['dp']) || !is_numeric($quote['c']) || !is_numeric($quote['dp']) || (float)$quote['c'] <= 0) {
        continue;
    }
    $changeAmount = isset($quote['d']) && is_numeric($quote['d'])
        ? (float)$quote['d']
        : ((isset($quote['pc']) && is_numeric($quote['pc'])) ? (float)$quote['c'] - (float)$quote['pc'] : 0);
    $result[] = array(
        'symbol' => $symbol,
        'name' => $data['meta']['name'],
        'price' => (float)$quote['c'],
        'changeAmount' => $changeAmount,
        'change' => (float)$quote['dp']
    );
}

if (!$result) {
    http_response_code(502);
    echo json_encode(array('error' => 'The stock provider returned no usable quotes. Check the API key, plan access, and server connectivity.'));
    exit;
}

$output = json_encode(array('stocks' => $result, 'updatedAt' => time()), JSON_UNESCAPED_SLASHES);
if ($output === false) {
    http_response_code(500);
    echo json_encode(array('error' => 'Could not encode stock data.'));
    exit;
}
file_put_contents($cacheFile, $output, LOCK_EX);
echo $output;
