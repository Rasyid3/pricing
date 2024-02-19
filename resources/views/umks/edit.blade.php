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

    <form method="POST" action="{{ route('umks.update', $umk) }}">
        @csrf
        @method('PUT')
        <div class="container mt-4">
        <div class="font-monospace">
        <h1>Edit UMK</h1>
        <div class="form-group">
            <label for="regency">Regency:</label>
            <input type="text" name="regency" id="regency" class="form-control" value="{{ $umk->regency }}" required>
        </div>

        <div class="form-group">
            <label for="wage">Wage:</label>
            <input type="number" name="wage" id="wage" class="form-control" value="{{ $umk->wage }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update UMK</button>
    </form>
    <a href="{{route('umks.index') }}" class="btn btn-secondary">Back to UMK List</a>
    </div>
    </div>

</body>
</html>
