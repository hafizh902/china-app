<?php

// ===== CONFIG =====
$SECRET = 'sikret'; // sama dengan GitHub
$BRANCH = 'refs/heads/testing';
$PROJECT_PATH = '/home/kgtiqtfd/repositories/china-app';
// ==================

// ambil payload
$payload = file_get_contents('php://input');
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';

// validasi signature
if (!$signature) {
    return response('No signature', 403);
}

$hash = 'sha256=' . hash_hmac('sha256', $payload, $SECRET);
if (!hash_equals($hash, $signature)) {
    return response('Invalid signature', 403);
}

// decode payload
$data = json_decode($payload, true);
if (($data['ref'] ?? '') !== $BRANCH) {
    return response('Not testing branch', 200);
}

// lock file (shared hosting safe)
$lockFile = fopen($PROJECT_PATH . '/storage/deploy_testing.lock', 'w+');
if (!flock($lockFile, LOCK_EX | LOCK_NB)) {
    return response('Deploy already running', 200);
}

// commands
$commands = [
    "cd {$PROJECT_PATH}",
    "git checkout testing",
    "git pull origin testing",
    // COMMENT dulu kalau composer belum siap
    "composer install --no-dev --optimize-autoloader",
    "php artisan optimize:clear",
];

// run
$output = [];
foreach ($commands as $cmd) {
    $output[] = "> {$cmd}";
    $output[] = shell_exec($cmd . " 2>&1");
}

// log
file_put_contents(
    $PROJECT_PATH . '/storage/logs/deploy-testing.log',
    date('Y-m-d H:i:s') . PHP_EOL .
    implode(PHP_EOL, $output) . PHP_EOL .
    str_repeat('-', 40) . PHP_EOL,
    FILE_APPEND
);

return response(implode(PHP_EOL, $output), 200);
