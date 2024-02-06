@include('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('asset.bs')
    <style>
        .gradient-background {
    background: linear-gradient(to right, #ff7e5f, #feb47b); /* You can adjust the colors as needed */
}

        .titel-kanan{
            left:90%;
        }

        .label {
            font-family:'Handel Gothic ITC W05 Bold';
            font-size: 20px;
            text-align: center;
            font-weight: bold;
            color: Black;
        }

        /* body {
            height: 100%;
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
            z-index: -3;
        }

        .containerPrice {
            position: relative;
            display: grid;
            left:10%;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 10px;
        }

        .containerData{
            position: relative;
            display: grid;
            left:10%;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 10px;

        }

        .card {
            position: relative;
            background-color: #1770ff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .img1 {
            text-align: center;
        }

        .img1 img {
            width: 100%;
            height: auto;
        }

        .card-body {
            padding: 20px;
        }

        .label {
            font-family: monospace;
            font-size: 20px;
            text-align: center;
            font-weight: bold;
            color: white;
        } */

    </style>
</head>

<body>
    @if(auth()->check())
<div class="container-md justify-content-center gradient-background titel-kanan">
        <h1> Selamat Datang </h1>



    </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-4 ">
        <div class="card  p-4 justify-content-center align-items-center " style="width: 18rem;">
            <div class="text-center">
                <a href="{{ route('security_pricing') }}">
                    <img src="{{ asset('images/secure.JPG') }}" alt="Logo" class="img-fluid">
            </div>
            <div class="card-body font-monospace">
                <div class="label">Pricing</div>
            </div>
            </a>
        </div>
    </div>
    </div>
    </div>

        <div class="col">
        <div class="col-sm">
        <div class="card sm-1">
            <div class="img1">
                <a href="{{ route('bpjsp.index') }}">
                    <img src="https://garudapratama.com/assets/images/gdps_white_logo.png" alt="Logo" class="img-fluid">
            </div>
    </div>
            <div class="card-body">
                <div class="label">BPJS</div>
            </div>
            </a>
        </div>

        <div class="card">
            <div class="img1">
                <a href="{{ route('benefit.index') }}">
                    <img src="https://garudapratama.com/assets/images/gdps_white_logo.png" alt="Logo" class="img-fluid">

            </div>
            <div class="card-body">
                <div class="label">Additional Benefit</div>
            </div>
            </a>
        </div>
        <div class="card">
            <div class="img1">
                <a href="{{ route('umks.index') }}">
                    <img src="https://garudapratama.com/assets/images/gdps_white_logo.png" alt="Logo" class="img-fluid">

            </div>
            <div class="card-body">
                <div class="label">UMK</div>
            </div>
            </a>
        </div>

        <div class="card">
            <div class="img1">
                <a href="{{ route('jobs.index') }}">
                    <img src="https://garudapratama.com/assets/images/gdps_white_logo.png" alt="Logo" class="img-fluid">
            </div>
            <div class="card-body">
                <div class="label">Job</div>
            </div>
            </a>
        </div>

    <div class="card">
            <div class="img1">
                <a href="{{ route('sub_jobs.index') }}">
                    <img src="https://garudapratama.com/assets/images/gdps_white_logo.png" alt="Logo" class="img-fluid">
            </div>
            <div class="card-body">
                <div class="label">SubJob</div>
            </div>
            </a>
        </div>

        <div class="card">
            <div class="img1">
                <a href="{{ route('persons.index') }}">
                    <img src="https://garudapratama.com/assets/images/gdps_white_logo.png" alt="Logo" class="img-fluid">
            </div>
            <div class="card-body">
                <div class="label">Person</div>
            </div>
            </a>
        </div>

    <div class="card">
            <div class="img1">
                <a href="{{ route('perlengkapan.index') }}">
                    <img src="https://garudapratama.com/assets/images/gdps_white_logo.png" alt="Logo" class="img-fluid">
            </div>
            <div class="card-body">
                <div class="label">Perlengkapan</div>
            </div>
            </a>
        </div>
    </div>



    @livewire('example')

    @else
    <p>Please log in to access the dashboard.</p>
    @endif
</body>
</html>
