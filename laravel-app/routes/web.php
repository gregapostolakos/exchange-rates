<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\Api\CurrencyApiController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/currency-rates', [CurrencyController::class, 'getCurrencyRates']);