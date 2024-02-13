@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('asset.bs')
    <style>

    </style>
    </head>
<body>
<div class="container">
    <div class="font-monospace">
    <h1>Details</h1>

    <p>Perlengkapan : {{ $benefitItem->nama_bpjs }}</p>
    <p>Nominal / Persentase : {{ $benefitItem->nominal_persentase }}</p>

    <a href="{{ route('benefit.index') }}">Back to List</a>
</div>
</div>
</body>

</html>

