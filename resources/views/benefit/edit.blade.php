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
    <h1>Edit</h1>

    <form method="POST" action="{{ route('benefit.update', $benefitItem) }}">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="nama_benefit">Nama : </label>
            <input type="text" name="nama_benefit" id="nama_benefit" class="form-control" value="{{ $benefitItem->benefit }}" required>
        </div>

        <div class="form-group">
            <label for="nominal_persentase">Nominal / Persentase:</label>
            <input type="number" name="nominal_persentase" id="nominal_persentase" class="form-control" value="{{ $benefitItem->nominal_persentase }}" step="any" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <a href="{{ route('benefit.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
    </div>
</body>
</html>
