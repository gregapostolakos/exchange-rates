<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exchange Rates</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .card {
            border-radius: 10px;
        }
        .table thead {
            background-color: #0d6efd;
            color: white;
        }
        .btn-view {
            background-color: #0d6efd;
            color: white;
        }
        .btn-view:hover {
            background-color: #084298;
            color: white;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Exchange Rates</h1>
        <form method="GET" class="d-flex gap-2">
            <input type="text" name="currency_to" class="form-control" placeholder="Filter by currency (e.g. USD)" value="{{ request('currency_to') }}">
            <button class="btn btn-primary">Search</button>
            @if(request()->filled('currency_to'))
                <a href="{{ url('api/currencies') }}" class="btn btn-outline-secondary">Clear</a>
            @endif
        </form>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Currency From</th>
                        <th>Currency To</th>
                        <th>Exchange Rate</th>
                        <th>Retrieved At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($currencies as $currency)
                        <tr>
                            <td>{{ $currency->currency_from }}</td>
                            <td>{{ $currency->currency_to }}</td>
                            <td>{{ number_format($currency->exchange_rate, 6) }}</td>
                            <td>{{ \Carbon\Carbon::parse($currency->retrieved_at)->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ url('/api/currencies/' . $currency->currency_to) }}" class="btn btn-sm btn-view">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-4 text-center align-items-center">
        <div class="col text-start">
            {!! $currencies->withQueryString()->onEachSide(1)->previousPageUrl()
                ? '<a href="' . $currencies->previousPageUrl() . '" class="btn btn-outline-primary">&laquo; Previous</a>'
                : '' !!}
        </div>
        <div class="col text-center text-muted small">
            Showing {{ $currencies->firstItem() }} to {{ $currencies->lastItem() }} of {{ $currencies->total() }} results
        </div>
        <div class="col text-end">
            {!! $currencies->withQueryString()->nextPageUrl()
                ? '<a href="' . $currencies->nextPageUrl() . '" class="btn btn-outline-primary">Next &raquo;</a>'
                : '' !!}
        </div>
    </div>
</div>

</body>
</html>
