<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\Api\CurrencyApiController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/currency-rates', [CurrencyController::class, 'getCurrencyRates']);
Route::get('/currencies', [CurrencyApiController::class, 'index']);
Route::get('/currencies/{currency_to}', [CurrencyApiController::class, 'show']);