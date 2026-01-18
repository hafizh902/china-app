<?php

return [
    'secret_key' => env('XENDIT_SECRET_KEY'),
    'callback_token' => env('XENDIT_CALLBACK_TOKEN'),
    'mode' => env('XENDIT_MODE', 'test'),
];
