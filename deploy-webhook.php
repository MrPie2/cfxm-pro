<?php
declare(strict_types=1);

/**
 * GitHub push webhook for deploying the production checkout in this directory.
 *
 * Security requirements:
 * - Keep the webhook secret in the account home directory, outside public_html.
 * - Configure GitHub to send push events only.
 * - Only the MrPie2/cfxm-pro main branch is allowed to deploy.
 */

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

function respond(int $status, array $payload): never
{
    http_response_code($status);
    echo json_encode($payload, JSON_UNESCAPED_SLASHES);
    exit;
}

function deployLog(string $message): void
{
    $home = dirname(__DIR__);
    $logFile = $home . '/.cfxm-pro-deploy.log';
    $line = '[' . gmdate('Y-m-d\TH:i:s\Z') . '] ' . $message . PHP_EOL;
    @file_put_contents($logFile, $line, FILE_APPEND | LOCK_EX);
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    header('Allow: POST');
    respond(405, ['ok' => false, 'message' => 'POST only']);
}

$payload = file_get_contents('php://input');
if (!is_string($payload) || $payload === '' || strlen($payload) > 1048576) {
    respond(400, ['ok' => false, 'message' => 'Invalid or oversized payload']);
}

$home = dirname(__DIR__);
$secretFile = $home . '/.cfxm-pro-deploy-secret';
if (!is_file($secretFile) || !is_readable($secretFile)) {
    deployLog('ERROR: webhook secret file is missing or unreadable');
    respond(503, ['ok' => false, 'message' => 'Deployment is not configured']);
}

$secret = trim((string) file_get_contents($secretFile));
$signature = (string) ($_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '');
if ($secret === '' || !preg_match('/^sha256=[a-f0-9]{64}$/i', $signature)) {
    respond(401, ['ok' => false, 'message' => 'Invalid signature']);
}

$expected = 'sha256=' . hash_hmac('sha256', $payload, $secret);
if (!hash_equals($expected, $signature)) {
    deployLog('WARN: rejected request with an invalid GitHub signature');
    respond(401, ['ok' => false, 'message' => 'Invalid signature']);
}

if (($_SERVER['HTTP_X_GITHUB_EVENT'] ?? '') !== 'push') {
    respond(202, ['ok' => true, 'message' => 'Event ignored']);
}

$event = json_decode($payload, true);
if (!is_array($event)) {
    respond(400, ['ok' => false, 'message' => 'Invalid JSON payload']);
}

if (($event['repository']['full_name'] ?? '') !== 'MrPie2/cfxm-pro') {
    respond(403, ['ok' => false, 'message' => 'Repository not allowed']);
}

if (($event['ref'] ?? '') !== 'refs/heads/main') {
    respond(202, ['ok' => true, 'message' => 'Only pushes to main trigger deployment']);
}

if (!function_exists('proc_open')) {
    deployLog('ERROR: proc_open is disabled; cannot run git pull');
    respond(503, ['ok' => false, 'message' => 'Server PHP cannot run deployment commands']);
}

$lockFile = $home . '/.cfxm-pro-deploy.lock';
$lock = @fopen($lockFile, 'c');
if ($lock === false) {
    deployLog('ERROR: unable to open deployment lock');
    respond(500, ['ok' => false, 'message' => 'Could not start deployment']);
}
if (!flock($lock, LOCK_EX | LOCK_NB)) {
    fclose($lock);
    respond(409, ['ok' => false, 'message' => 'A deployment is already running']);
}

$command = ['git', '-C', __DIR__, 'pull', '--ff-only', 'origin', 'main'];
$descriptors = [
    0 => ['pipe', 'r'],
    1 => ['pipe', 'w'],
    2 => ['pipe', 'w'],
];
$environment = [
    'HOME' => $home,
    'PATH' => '/usr/local/bin:/usr/bin:/bin',
    'GIT_TERMINAL_PROMPT' => '0',
];

$process = @proc_open($command, $descriptors, $pipes, __DIR__, $environment);
if (!is_resource($process)) {
    flock($lock, LOCK_UN);
    fclose($lock);
    deployLog('ERROR: proc_open could not start git');
    respond(500, ['ok' => false, 'message' => 'Could not start git']);
}

fclose($pipes[0]);
$stdout = stream_get_contents($pipes[1]);
fclose($pipes[1]);
$stderr = stream_get_contents($pipes[2]);
fclose($pipes[2]);
$exitCode = proc_close($process);

$output = trim((string) $stdout . PHP_EOL . (string) $stderr);
$output = preg_replace('/[\r\n]+/', ' | ', $output ?? '');
deployLog('git pull exit=' . $exitCode . '; ' . ($output !== '' ? $output : 'no output'));

flock($lock, LOCK_UN);
fclose($lock);

if ($exitCode !== 0) {
    respond(500, ['ok' => false, 'message' => 'Git pull failed; check the private deployment log']);
}

respond(200, ['ok' => true, 'message' => 'Production updated from main']);
