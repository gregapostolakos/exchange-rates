<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CurrencyApiController;

Route::get('/currencies', [CurrencyApiController::class, 'index']);
Route::get('/currencies/{currency_to}', [CurrencyApiController::class, 'show']);