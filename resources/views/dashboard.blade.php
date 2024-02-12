@include('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('asset.bs')
    <style>
        .gradient-background {

    background: linear-gradient(to right, #ff7e5f, #feb47b);
}
        .titel-kanan{
            left:90%;
        }


        .card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        .card-body {
            padding: 20px;
        }

    </style>
</head>

<body>
    @if(auth()->check())
<!-- <div class="container-md justify-content-center gradient-background titel-kanan">
        <h1> Selamat Datang </h1> -->



    <div class="container ">
        <div class="row justify-content-center mb-3">
            <div class="col-6 col-sm-8 col-md-10 col-lg-12">
                <div class="card justify-content-center align-items-center " >
                    <a href="{{ route('security_pricing') }}">
                        <img src="{{ asset('images/secure.JPG') }}" alt="Logo" class="img-fluid">
                        <div class="card-body font-monospace">
                            <div class="fs-sm-4 font-monospace">Pricing</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @if(session('role') === 'admin')
        <div class="row">
            <div class="col-5 col-md-4 mb-3 ">
                <div class="card p-4 justify-content-center align-items-center" >
                    <a href="{{ route('bpjsp.index') }}">
                        <img src="{{ asset('images/secure.JPG') }}" alt="Logo" class="img-fluid">
                        <div class="card-body">
                            <div class="fs-sm-4 font-monospace">BPJS</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-4 col-md-4 mb-3">
                <div class="card p-4" >
                    <a href="{{ route('benefit.index') }}">
                        <img src="{{ asset('images/secure.JPG') }}" alt="Logo" class="img-fluid">
                        <div class="card-body">
                            <div class="fs-sm-4 font-monospace">Benefit</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-4 col-md-4 mb-3">
                <div class="card p-4" >
                    <a href="{{ route('umks.index') }}">
                        <img src="{{ asset('images/secure.JPG') }}" alt="Logo" class="img-fluid">
                        <div class="card-body">
                            <div class="fs-sm-4 font-monospace">UMK</div>
                        </div>
                    </a>
                </div>
            </div>


            <div class="col-4 col-md-4 mb-3">
                <div class="card p-4">
                    <a href="{{ route('jobs.index') }}">
                        <img src="{{ asset('images/secure.JPG') }}" alt="Logo" class="img-fluid">
                        <div class="card-body">
                            <div class="fs-sm-4 font-monospace">Job</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-4 col-md-4 mb-3">
                    <div class="card p-4">
                    <a href="{{ route('sub_jobs.index') }}">
                        <img src="{{ asset('images/secure.JPG') }}" alt="Logo" class="img-fluid">
                        <div class="card-body">
                            <div class="fs-sm-4 font-monospace">SubJob</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-4 col-md-4 mb-3">
                <div class="card p-4">
                    <a href="{{ route('persons.index') }}">
                        <img src="{{ asset('images/secure.JPG')}}" alt="Logo" class="img-fluid">
                        <div class="card-body">
                            <div class="fs-sm-4 font-monospace">Person</div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-4 col-md-4 mb-3">
                <div class="card p-4">
                    <a href="{{ route('perlengkapan.index') }}">
                        <img src="{{asset('images/secure.JPG')}}" alt="Logo" class="img-fluid">
                        <div class="card-body">
                        <div class="fs-sm-4 font-monospace">Perlengkapan</div>
                        </div>
                    </a>
            </div>
        </div>
    </div>
@endif

    @livewire('example')

    @else
    <p>Please log in to access the dashboard.</p>
    @endif

    @if(session('popup'))

    <script>
        alert('{{ session('popup') }}');
    </script>
@endif
</body>
</html>
