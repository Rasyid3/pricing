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
<div class="container mt-4">
    <div class="font-monospace">
    <h1>Details</h1>

    <p>Nama User : {{ $userItem->name }}</p>
    <p>Role : {{ $userItem->role }}</p>

    <a href="{{ route('userm.index') }}">Back to List</a>
    </div>
    </div>
</body>
</html>
