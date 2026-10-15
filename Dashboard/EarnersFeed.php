<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

try {
    require_once __DIR__ . '/EarnersController.php';

    echo json_encode([
        'ok' => true,
        'completed' => $earnersCompleted,
        'count' => count($earnersCompleted),
        'updated_at' => date(DATE_ATOM),
    ], JSON_UNESCAPED_SLASHES | JSON_INVALID_UTF8_SUBSTITUTE);
} catch (Throwable $e) {
    error_log('CFXM Earners feed error: ' . $e->getMessage());
    http_response_code(200);
    echo json_encode([
        'ok' => false,
        'message' => 'Activity refresh is temporarily unavailable.',
    ]);
}
