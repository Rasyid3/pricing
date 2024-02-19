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
    <h1>Sub Job Details</h1>

    <p>Subtitle: {{ $subJob->subtitle }}</p>
    <p>Job ID: {{ $subJob->job_id }}</p>
    <p>Additional Wage: Rp. {{ $subJob->additional_wage }}</p>
    <p>Tunjangan Jabatan: Rp. {{ $subJob->tunjangan_jabatan }}</p>
    <p>Tunjangan Komunikasi: Rp. {{ $subJob->tunjangan_komunikasi }}</p>
    <p>Tunjangan Transportasi: Rp. {{ $subJob->tunjangan_transportasi }}</p>
    <p>Tunjangan Makan: Rp. {{ $subJob->tunjangan_makan }}</p>
    <p>Tunjangan Lembur: Rp. {{ $subJob->tunjangan_lembur }}</p>
    <p>Tunjangan Shift: Rp. {{ $subJob->tunjangan_shift }}</p>

    <a href="{{ route('sub_jobs.index') }}">Back to Sub Jobs List</a>

    </div>
    </div>
</body>
</html>




