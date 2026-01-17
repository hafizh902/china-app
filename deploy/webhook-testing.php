<?php

// ================= CONFIG =================
$SECRET = 'sikret'; // HARUS sama dengan secret di GitHub webhook
$BRANCH = 'refs/heads/testing';
$PROJECT_PATH = dirname(__DIR__); // root Laravel (china-app)
// =========================================

// Ambil payload & signature
$payload   = file_get_contents('php://input');
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';

if (!$signature) {
    http_response_code(403);
    exit('No signature');
}

// Validasi signature GitHub
$hash = 'sha256=' . hash_hmac('sha256', $payload, $SECRET);
if (!hash_equals($hash, $signature)) {
    http_response_code(403);
    exit('Invalid signature');
}

// Decode payload
$data = json_decode($payload, true);
if (($data['ref'] ?? '') !== $BRANCH) {
    exit('Not testing branch');
}

// Lock deploy (hindari double deploy)
$lockFile = fopen(sys_get_temp_dir() . '/deploy_testing.lock', 'w+');
if (!flock($lockFile, LOCK_EX | LOCK_NB)) {
    exit('Deploy already running');
}

// Perintah deploy
$commands = [
    "cd {$PROJECT_PATH}",
    "git checkout testing",
    "git pull origin testing",
    "composer install --no-dev --optimize-autoloader",
    "php artisan migrate --force",
    "php artisan optimize:clear",
];

// Eksekusi
$output = [];
foreach ($commands as $cmd) {
    $output[] = "> $cmd";
    $output[] = shell_exec($cmd . " 2>&1");
}

// Logging
$logPath = $PROJECT_PATH . '/storage/logs/deploy-testing.log';
file_put_contents(
    $logPath,
    date('Y-m-d H:i:s') . PHP_EOL .
    implode(PHP_EOL, $output) . PHP_EOL .
    str_repeat('-', 40) . PHP_EOL,
    FILE_APPEND
);

// Response ke GitHub
echo "<pre>" . htmlspecialchars(implode(PHP_EOL, $output)) . "</pre>";
