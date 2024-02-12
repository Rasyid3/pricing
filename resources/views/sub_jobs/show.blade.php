@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('asset.bs')

<style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: fixed;
            justify-content: center;
            align-items: center;
            height: 100%;
            max-height: 500%;

        }

        .container {
            position: fixed;
            align-items: center;
            left:10%;
            top:0%;
            height: 100%;
            max-height: 1000%;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 10%;
            z-index: 0;
            overflow-y: scroll;
            scrollbar-width: none;
        }

        .container::-webkit-scrollbar {
            display: none;
        }

        .font{
            font-family: monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="font">
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




