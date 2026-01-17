<?php

// config
$FLAG = base_path('storage/deploy_testing.flag');

// tulis flag
file_put_contents(
    $FLAG,
    now()->toDateTimeString()
);

// response ke GitHub
return response('FLAG SET', 200);
