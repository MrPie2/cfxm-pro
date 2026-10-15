<?php
/**
 * Read-only account analytics for the AccountInsight.php page.
 * Uses the existing CFXM-Pro account tables; does not alter balances or investment records.
 */
$insightInvestorId = mysqli_real_escape_string($Conn, (string)($_SESSION['User_id'] ?? ''));
$insightCurrency = (string)($curAbbr ?? '$');
$insightRate = isset($exchangerate) && (float)$exchangerate > 0 ? (float)$exchangerate : 1;
$insightEscape = function ($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
};
$insightMoney = function ($amount) use ($insightCurrency, $insightRate) {
    return htmlspecialchars($insightCurrency, ENT_QUOTES, 'UTF-8') . number_format((float)$amount * $insightRate, 2, '.', ',');
};

$insight = array(
    'wallet' => (float)($userDetails['Fin_Asset'] ?? 0),
    'deposits' => 0.0, 'withdrawals' => 0.0, 'invested' => 0.0,
    'roi' => 0.0, 'referrals' => 0.0, 'stockValue' => 0.0,
    'depositCount' => 0, 'withdrawalCount' => 0, 'activePlans' => 0,
    'completedPlans' => 0, 'stockPositions' => 0, 'activity' => array(),
    'monthly' => array(), 'statuses' => array('Completed' => 0, 'Pending' => 0, 'Failed' => 0)
);

$insightDepositQuery = mysqli_query($Conn, "SELECT Amount_Deposited, Status, Date FROM deposits WHERE Investor_id='$insightInvestorId' ORDER BY Date DESC");
if ($insightDepositQuery) {
    while ($row = mysqli_fetch_assoc($insightDepositQuery)) {
        $amount = (float)($row['Amount_Deposited'] ?? 0);
        $statusCode = (string)($row['Status'] ?? '');
        $status = $statusCode === '1' ? 'Completed' : ($statusCode === '0' ? 'Failed' : 'Pending');
        if ($status === 'Completed') $insight['deposits'] += $amount;
        $insight['depositCount']++;
        $insight['statuses'][$status]++;
        $date = (string)($row['Date'] ?? '');
        $month = $date !== '' ? date('M Y', strtotime($date)) : 'Undated';
        if (!isset($insight['monthly'][$month])) $insight['monthly'][$month] = array('deposits' => 0, 'withdrawals' => 0, 'investments' => 0);
        if ($status === 'Completed') $insight['monthly'][$month]['deposits'] += $amount;
        $insight['activity'][] = array('date'=>$date, 'type'=>'Deposit', 'description'=>'Wallet funding', 'amount'=>$amount, 'status'=>$status, 'direction'=>'in');
    }
}

$insightWithdrawalQuery = mysqli_query($Conn, "SELECT Amount_Withdrawn, Status, Date, Destination FROM withdrawals WHERE Investor_id='$insightInvestorId' ORDER BY Date DESC");
if ($insightWithdrawalQuery) {
    while ($row = mysqli_fetch_assoc($insightWithdrawalQuery)) {
        $amount = (float)($row['Amount_Withdrawn'] ?? 0);
        $statusCode = (string)($row['Status'] ?? '');
        $status = $statusCode === '2' ? 'Completed' : ($statusCode === '0' ? 'Pending' : 'Failed');
        if ($status === 'Completed') $insight['withdrawals'] += $amount;
        $insight['withdrawalCount']++;
        $insight['statuses'][$status]++;
        $date = (string)($row['Date'] ?? '');
        $month = $date !== '' ? date('M Y', strtotime($date)) : 'Undated';
        if (!isset($insight['monthly'][$month])) $insight['monthly'][$month] = array('deposits' => 0, 'withdrawals' => 0, 'investments' => 0);
        if ($status === 'Completed') $insight['monthly'][$month]['withdrawals'] += $amount;
        $destination = trim((string)($row['Destination'] ?? ''));
        $insight['activity'][] = array('date'=>$date, 'type'=>'Withdrawal', 'description'=>'Withdrawal request' . ($destination !== '' ? ' · '.$destination : ''), 'amount'=>$amount, 'status'=>$status, 'direction'=>'out');
    }
}

$insightContractQuery = mysqli_query($Conn, "SELECT Plan_Type, Amount, ROI, Date_Entered, Status FROM contracts WHERE Investor_id='$insightInvestorId' ORDER BY Date_Entered DESC");
if ($insightContractQuery) {
    while ($row = mysqli_fetch_assoc($insightContractQuery)) {
        $amount = (float)($row['Amount'] ?? 0);
        $statusCode = (string)($row['Status'] ?? '');
        $status = $statusCode === '1' ? 'Active' : ($statusCode === '2' ? 'Completed' : 'Pending');
        $insight['invested'] += $amount;
        $insight['roi'] += (float)($row['ROI'] ?? 0);
        if ($status === 'Active') $insight['activePlans']++;
        if ($status === 'Completed') $insight['completedPlans']++;
        $date = (string)($row['Date_Entered'] ?? '');
        $month = $date !== '' ? date('M Y', strtotime($date)) : 'Undated';
        if (!isset($insight['monthly'][$month])) $insight['monthly'][$month] = array('deposits' => 0, 'withdrawals' => 0, 'investments' => 0);
        $insight['monthly'][$month]['investments'] += $amount;
        $insight['activity'][] = array('date'=>$date, 'type'=>'Investment', 'description'=>(string)($row['Plan_Type'] ?? 'Investment').' plan', 'amount'=>$amount, 'status'=>$status, 'direction'=>'invest');
    }
}

$insightStockQuery = mysqli_query($Conn, "SELECT Buy_Price, Margin, Total_Units FROM stockcontracts WHERE Investor_id='$insightInvestorId'");
if ($insightStockQuery) {
    while ($row = mysqli_fetch_assoc($insightStockQuery)) {
        $insight['stockValue'] += (float)($row['Buy_Price'] ?? 0) * (float)($row['Margin'] ?? 0) * (float)($row['Total_Units'] ?? 0);
        $insight['stockPositions']++;
    }
}
$insightReferralQuery = mysqli_query($Conn, "SELECT Refferal_Earnings FROM refferals WHERE Refferer='$insightInvestorId' AND Status='1'");
if ($insightReferralQuery) {
    while ($row = mysqli_fetch_assoc($insightReferralQuery)) $insight['referrals'] += (float)($row['Refferal_Earnings'] ?? 0);
}

usort($insight['activity'], function ($a, $b) { return strtotime((string)$b['date']) <=> strtotime((string)$a['date']); });
$insight['activity'] = array_slice($insight['activity'], 0, 7);
$insight['monthly'] = array_slice($insight['monthly'], -6, 6, true);
uksort($insight['monthly'], function ($a, $b) { return strtotime('01 '.$a) <=> strtotime('01 '.$b); });
$insightTotalAssets = max(0, $insight['wallet']) + max(0, $insight['invested']) + max(0, $insight['stockValue']);
$insightAllocation = array(
    'wallet' => $insightTotalAssets > 0 ? round(max(0, $insight['wallet']) / $insightTotalAssets * 100) : 0,
    'investments' => $insightTotalAssets > 0 ? round(max(0, $insight['invested']) / $insightTotalAssets * 100) : 0,
    'stocks' => $insightTotalAssets > 0 ? round(max(0, $insight['stockValue']) / $insightTotalAssets * 100) : 0
);
