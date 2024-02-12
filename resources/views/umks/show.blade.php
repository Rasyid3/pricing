
@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('asset.bs')

    <style>
    </style>
</head>
<body>
    <div class= "container">
        <div class="font">
     <h1>UMK Details</h1>

    <p>Regency: {{ $umk->regency }}</p>
    <p>Wage: Rp. {{ $umk->wage }}</p>

    <a href="{{ route('umks.index') }}">Back to UMK List</a>
    </div>
</body>
</html>
