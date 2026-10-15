<?php
/**
 * Session-scoped illustrative transactions for UI previews.
 * These are synthetic and must never be treated as actual withdrawals or used
 * for balances, payments, reporting, or financial decisions.
 */
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!function_exists('cfxmGetDemoTransactions')) {
    function cfxmGetDemoTransactions(): array
    {
        if (isset($_SESSION['cfxm_demo_transactions']) && is_array($_SESSION['cfxm_demo_transactions'])) {
            return $_SESSION['cfxm_demo_transactions'];
        }

        $firstNames = ['Maya', 'Daniel', 'Amara', 'Noah', 'Zara', 'Ethan', 'Ada', 'Samuel', 'Nia', 'David', 'Imani', 'Leo', 'Chika', 'Elena', 'Tobi', 'Amina'];
        $lastNames = ['Rivers', 'Okoro', 'Bennett', 'Cole', 'James', 'Morgan', 'Reed', 'Mensah', 'Brooks', 'Adeyemi', 'Parker', 'Gray', 'Santos', 'Woods', 'Taylor', 'Nwosu'];
        $usedNames = [];
        $records = [];
        $count = 8;

        for ($i = 0; $i < $count; $i++) {
            $attempts = 0;
            do {
                $name = $firstNames[random_int(0, count($firstNames) - 1)] . ' ' .
                        $lastNames[random_int(0, count($lastNames) - 1)];
                $attempts++;
            } while (in_array($name, $usedNames, true) && $attempts < 30);

            $usedNames[] = $name;
            $amount = random_int(2500, 850000) / 100;
            $daysAgo = random_int(0, 6);
            $date = (new DateTimeImmutable('today'))->modify('-' . $daysAgo . ' days');

            $records[] = [
                'id' => 'demo-' . ($i + 1),
                'name' => $name,
                'amount' => $amount,
                'date' => $date->format('Y-m-d'),
                'status' => 2,
                'demo' => true,
            ];
        }

        $_SESSION['cfxm_demo_transactions'] = $records;
        return $records;
    }
}
