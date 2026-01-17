<?php

$output = shell_exec('whoami 2>&1');

file_put_contents(
    base_path('storage/logs/webhook-debug.log'),
    "WHOAMI: ".$output.PHP_EOL,
    FILE_APPEND
);

return response('SHELL OK', 200);
