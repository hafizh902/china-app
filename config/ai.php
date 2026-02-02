<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default AI Provider
    |--------------------------------------------------------------------------
    | Saat ini kita pakai LM Studio (OpenAI-compatible).
    | Nanti bisa ditambah provider lain (OpenAI, Claude, dll).
    */
    'driver' => env('AI_DRIVER', 'lmstudio'),

    /*
    |--------------------------------------------------------------------------
    | AI Providers
    |--------------------------------------------------------------------------
    */
    'providers' => [

        'lmstudio' => [
            'endpoint' => env('AI_LM_ENDPOINT'),
            'model' => env('AI_LM_MODEL'),
            'timeout' => env('AI_LM_TIMEOUT', 60),
        ],

        // Contoh future provider
        /*
        'openai' => [
            'endpoint' => 'https://api.openai.com/v1/chat/completions',
            'model' => env('OPENAI_MODEL', 'gpt-4o-mini'),
            'key' => env('OPENAI_API_KEY'),
        ],
        */
    ],

    /*
    |--------------------------------------------------------------------------
    | Chat Defaults
    |--------------------------------------------------------------------------
    */
    'chat' => [
        'temperature' => 0.6,
        'max_tokens' => 800,
    ],

];
