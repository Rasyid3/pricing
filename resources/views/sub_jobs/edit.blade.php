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
<h1>Edit SubJob</h1>

    <form method="POST" action="{{ route('sub_jobs.update', $subJob) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="subtitle">Subtitle:</label>
            <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ $subJob->subtitle }}" required>
        </div>

        <div class="form-group">
            <label for="job_id">Job ID:</label>
            <input type="number" name="job_id" id="job_id" class="form-control" value="{{ $subJob->job_id }}" required>
        </div>

        <div class="form-group">
            <label for="additional_wage">Additional Wage:</label>
            <input type="number" name="additional_wage" id="additional_wage" class="form-control" value="{{ $subJob->additional_wage }}" required>
        </div>

        <div class="form-group">
            <label for="tunjangan_jabatan">Tunjangan Jabatan:</label>
            <input type="number" name="tunjangan_jabatan" id="tunjangan_jabatan" class="form-control" value="{{ $subJob->tunjangan_jabatan }}" required>
        </div>

        <div class="form-group">
            <label for="tunjangan_komunikasi">Tunjangan Komunikasi:</label>
            <input type="number" name="tunjangan_komunikasi" id="tunjangan_komunikasi" class="form-control" value="{{ $subJob->tunjangan_komunikasi }}" required>
        </div>

        <div class="form-group">
            <label for="tunjangan_transportasi">Tunjangan Transportasi:</label>
            <input type="number" name="tunjangan_transportasi" id="tunjangan_transportasi" class="form-control" value="{{ $subJob->tunjangan_transportasi }}" required>
        </div>

        <div class="form-group">
            <label for="tunjangan_makan">Tunjangan Makan:</label>
            <input type="number" name="tunjangan_makan" id="tunjangan_makan" class="form-control" value="{{ $subJob->tunjangan_makan }}" required>
        </div>

        <div class="form-group">
            <label for="tunjangan_lembur">Tunjangan Lembur:</label>
            <input type="number" name="tunjangan_lembur" id="tunjangan_lembur" class="form-control" value="{{ $subJob->tunjangan_lembur }}" required>
        </div>

        <div class="form-group">
            <label for="tunjangan_shift">Tunjangan Shift:</label>
            <input type="number" name="tunjangan_shift" id="tunjangan_shift" class="form-control" value="{{ $subJob->tunjangan_shift }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update SubJob</button>
    </form>

    <a href="{{ route('sub_jobs.index') }}" class="btn btn-secondary">Back to SubJob List</a>
    </div>
    </div>
</body>
</html>
