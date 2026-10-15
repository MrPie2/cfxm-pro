<?php
/**
 * Public earners activity controller.
 * Only real withdrawal records are shown; no simulated payouts are created.
 * Names are shortened to protect account holders' financial privacy.
 */
if (!isset($Conn) || !($Conn instanceof mysqli)) {
    require_once __DIR__ . '/../Connect.php';
}

$earnersEscape = static function ($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
};

$earnersMaskName = static function ($firstName, $lastName): string {
    $firstName = trim((string)$firstName);
    $lastName = trim((string)$lastName);
    if ($firstName === '' && $lastName === '') {
        return 'Platform member';
    }
    if ($firstName === '') {
        return mb_substr($lastName, 0, 1) . '.';
    }
    $first = mb_substr($firstName, 0, 1);
    $lastInitial = $lastName !== '' ? ' ' . mb_substr($lastName, 0, 1) . '.' : '';
    return $firstName . $lastInitial;
};

$earnersFetchByStatus = static function (int $status) use ($Conn): array {
    $rows = [];
    $sql = "SELECT w.id, w.Investor_id, w.Amount_Withdrawn, w.Date, w.Status,
                   i.First_Name, i.Last_Name
            FROM withdrawals AS w
            LEFT JOIN investors AS i ON i.Investor_id = w.Investor_id
            WHERE w.Status = ?
            ORDER BY w.id DESC
            LIMIT 20";
    $stmt = mysqli_prepare($Conn, $sql);
    if (!$stmt) {
        return $rows;
    }
    mysqli_stmt_bind_param($stmt, 'i', $status);
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $row['Public_Name'] = $GLOBALS['earnersMaskName'](
                    $row['First_Name'] ?? '',
                    $row['Last_Name'] ?? ''
                );
                $rows[] = $row;
            }
        }
    }
    mysqli_stmt_close($stmt);
    return $rows;
};

$earnersCompleted = $earnersFetchByStatus(2);
$earnersPending = $earnersFetchByStatus(0);
$earnersCompletedCount = count($earnersCompleted);
$earnersPendingCount = count($earnersPending);
$earnersCurrency = '$';
$earnersRate = 1.0;

// Public view uses the platform's base withdrawal amount, not any one member's display currency.
