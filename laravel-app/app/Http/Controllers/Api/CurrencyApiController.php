<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CurrencyModel;
use Illuminate\Http\Request;

class CurrencyApiController extends Controller
{
    public function index(Request $request)
    {
        $query = CurrencyModel::query();

        if ($request->filled('currency_to')) {
            $query->where('currency_to', strtoupper($request->input('currency_to')));
        }

        $currencies = $query->orderBy('retrieved_at', 'desc')->paginate(10);
        
        return view('currencies.index', compact('currencies'));
    }

    public function show($currency_to)
    {
        $currency = CurrencyModel::where('currency_to', strtoupper($currency_to))->first();

        return view('currencies.show', compact('currency'));
    }
}
