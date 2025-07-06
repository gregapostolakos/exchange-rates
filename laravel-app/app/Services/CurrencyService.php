<?php 

namespace App\Services;

use App\Models\CurrencyModel;

class CurrencyService
{
    public function processRates(string $xmlString): array
    {
        $xml = simplexml_load_string($xmlString);

        if ($xml === false) {
            throw new \Exception('Failed to parse XML');
        }

        $rates = [];

        foreach ($xml->Cube->Cube->Cube as $rate) {
            $currency = (string) $rate['currency'];
            $value = (float) $rate['rate'];

            $rates[] = CurrencyModel::updateOrCreate(
            [
                'currency_to' => $currency
            ],
            [
                'currency_from' => 'EUR',
                'rate' => $value,
                'exchange_rate' => $value,    
                'retrieved_at' => now()->toDateTimeString()
            ],

        );
            
        }

        return $rates;
    }
}