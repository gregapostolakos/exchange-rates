<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Currency Details - {{ $currency->currency_to }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="mb-4">
        <a href="{{ url('api/currencies') }}" class="btn btn-secondary">&larr; Back to list</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Currency Details: {{ $currency->currency_to }}</h4>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Currency From</dt>
                <dd class="col-sm-9">{{ $currency->currency_from }}</dd>

                <dt class="col-sm-3">Currency To</dt>
                <dd class="col-sm-9">{{ $currency->currency_to }}</dd>

                <dt class="col-sm-3">Exchange Rate</dt>
                <dd class="col-sm-9">{{ number_format($currency->exchange_rate, 6) }}</dd>

                <dt class="col-sm-3">Retrieved At</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($currency->retrieved_at)->format('Y-m-d H:i') }}</dd>
            </dl>
        </div>
    </div>
</div>

</body>
</html>
