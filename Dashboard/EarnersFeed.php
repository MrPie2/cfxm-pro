<?php
declare(strict_types=1);

session_start();
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

if (!isset($_SESSION['User_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Your session has expired. Please sign in again.']);
    exit;
}

require_once __DIR__ . '/../Connect.php';
require_once __DIR__ . '/EarnersController.php';

$formatRows = static function (array $rows): array {
    return array_map(static function (array $row): array {
        return [
            'id' => (int)($row['id'] ?? 0),
            'name' => (string)($row['Public_Name'] ?? 'Platform member'),
            'amount' => (float)($row['Amount_Withdrawn'] ?? 0),
            'date' => (string)($row['Date'] ?? ''),
            'status' => (int)($row['Status'] ?? 0),
        ];
    }, $rows);
};

echo json_encode([
    'success' => true,
    'updatedAt' => gmdate('c'),
    'completedCount' => (int)$earnersCompletedCount,
    'pendingCount' => (int)$earnersPendingCount,
    'completed' => $formatRows($earnersCompleted),
    'pending' => $formatRows($earnersPending),
], JSON_UNESCAPED_SLASHES | JSON_INVALID_UTF8_SUBSTITUTE);
