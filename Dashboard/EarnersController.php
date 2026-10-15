<?php
/**
 * Public earners activity controller.
 * Only real withdrawal records are shown; no simulated payouts are created.
 * Names are shortened to protect account holders' financial privacy.
 */
if (!isset($Conn) || !($Conn instanceof mysqli)) {
    require_once '../Connect.php';
}

$earnersEscape = static function ($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
};

$earnersMaskName = static function ($firstName): string {
    $firstName = trim((string)$firstName);
    return $firstName !== '' ? $firstName : 'Platform member';
};

$earnersFetchByStatus = static function (int $status) use ($Conn, $earnersMaskName): array {
    $rows = [];
    $sql = "SELECT w.id, w.Investor_id, w.Amount_Withdrawn, w.Date, w.Status,
                   i.First_Name
            FROM withdrawals AS w
            LEFT JOIN investors AS i ON i.Investor_id = w.Investor_id
            WHERE w.Status = ?
            ORDER BY w.id DESC
            LIMIT 20";
    $stmt = mysqli_prepare($Conn, $sql);
    if (!$stmt) {
        // Keep the public page available if the database schema differs; log details server-side.
        error_log('CFXM Earners: withdrawal query prepare failed: ' . mysqli_error($Conn));
        return $rows;
    }

    mysqli_stmt_bind_param($stmt, 'i', $status);
    if (mysqli_stmt_execute($stmt)) {
        // Use bind_result rather than mysqli_stmt_get_result so mysqlnd is not required.
        mysqli_stmt_bind_result(
            $stmt,
            $withdrawalId,
            $investorId,
            $amountWithdrawn,
            $withdrawalDate,
            $withdrawalStatus,
            $firstName
        );
        while (mysqli_stmt_fetch($stmt)) {
            $rows[] = [
                'id' => $withdrawalId,
                'Investor_id' => $investorId,
                'Amount_Withdrawn' => $amountWithdrawn,
                'Date' => $withdrawalDate,
                'Status' => $withdrawalStatus,
                'Public_Name' => $earnersMaskName($firstName),
            ];
        }
    } else {
        error_log('CFXM Earners: withdrawal query execute failed: ' . mysqli_stmt_error($stmt));
    }
    mysqli_stmt_close($stmt);
    return $rows;
};

$earnersCompleted = $earnersFetchByStatus(2);
$earnersPending = $earnersFetchByStatus(0);
$earnersSortByDate = static function (array &$rows): void {
    usort($rows, static function ($a, $b) {
        $aTime = strtotime((string)($a['Date'] ?? '')) ?: 0;
        $bTime = strtotime((string)($b['Date'] ?? '')) ?: 0;
        if ($aTime === $bTime) return ((int)$b['id']) <=> ((int)$a['id']);
        return $bTime <=> $aTime;
    });
};
$earnersSortByDate($earnersCompleted);
$earnersSortByDate($earnersPending);
$earnersCompletedCount = count($earnersCompleted);
$earnersPendingCount = count($earnersPending);
$earnersCurrency = '$';
$earnersRate = 1.0;

// Public view uses the platform's base withdrawal amount, not any one member's display currency.
