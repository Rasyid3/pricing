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
    <h1>Create SubJob</h1>

    <form method="POST" action="{{ route('sub_jobs.store') }}">
        @csrf
        <div class="container">
        <div class="font-monospace">
        <div class="form-group">
            <label for="subtitle">Subtitle:</label>
            <input type="text" name="subtitle" id="subtitle" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="job_id">Job ID:</label>
            <input type="number" name="job_id" id="job_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="additional_wage">Additional Wage:</label>
            <input type="number" name="additional_wage" id="additional_wage" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tunjangan_jabatan">Tunjangan Jabatan:</label>
            <input type="number" name="tunjangan_jabatan" id="tunjangan_jabatan" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tunjangan_komunikasi">Tunjangan Komunikasi:</label>
            <input type="number" name="tunjangan_komunikasi" id="tunjangan_komunikasi" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tunjangan_transportasi">Tunjangan Transportasi:</label>
            <input type="number" name="tunjangan_transportasi" id="tunjangan_transportasi" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tunjangan_makan">Tunjangan Makan:</label>
            <input type="number" name="tunjangan_makan" id="tunjangan_makan" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tunjangan_lembur">Tunjangan Lembur:</label>
            <input type="number" name="tunjangan_lembur" id="tunjangan_lembur" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tunjangan_shift">Tunjangan Shift:</label>
            <input type="number" name="tunjangan_shift" id="tunjangan_shift" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create SubJob</button>
    </form>
    <a href="{{ route('sub_jobs.index') }}" class="btn btn-secondary">Back to SubJob List</a>
    </div>
    </div>
</body>
</html>
