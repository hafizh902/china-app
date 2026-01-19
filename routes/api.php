<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\XenditWebhookController;

Route::post('/xendit/webhook', XenditWebhookController::class);
