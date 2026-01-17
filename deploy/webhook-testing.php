<?php

$log = base_path('storage/logs/webhook-debug.log');
file_put_contents($log, now().' HIT'.PHP_EOL, FILE_APPEND);

return response('LOG OK', 200);
