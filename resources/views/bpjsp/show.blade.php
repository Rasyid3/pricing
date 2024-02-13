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

    <p>Perlengkapan : {{ $bpjsItem->nama_bpjs }}</p>
    <p>Nominal / Persentase : {{ $bpjsItem->nominal_persentase * 100 }}%</p>

    <a href="{{ route('bpjsp.index') }}">Back to List</a>
    </div>
    </div>
</body>
</html>
