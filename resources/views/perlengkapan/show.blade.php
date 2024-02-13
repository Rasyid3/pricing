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

    <p>Perlengkapan : {{ $perlengkapanItem->perlengkapan }}</p>
    <p>Nominal / Persentase : {{ $perlengkapanItem->nominal_persentase }}</p>


    <a href="{{ route('perlengkapan.index') }}">Back to List</a>
    </div>
    </div>
</body>
</html>

