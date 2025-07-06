<?php

namespace App\Http\Controllers;

use App\Services\CurrencyService;

class CurrencyController extends Controller {

    public function getCurrencyRates(CurrencyService $currencyService) {

        $url = 'https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';
        $response = file_get_contents($url);

        if ($response === false) {
            return response()->json(['error' => 'Failed to fetch currency rates'], 500);
        }

        try {
            $rates = $currencyService->processRates($response);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json($rates);
    }
}