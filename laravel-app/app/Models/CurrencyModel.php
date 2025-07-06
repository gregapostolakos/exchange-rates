<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencyModel extends Model
{
    protected $table = 'exchange_rates';

    protected $fillable = [
        'currency_from',
        'currency_to',
        'exchange_rate',
        'retrieved_at'
    ];
}