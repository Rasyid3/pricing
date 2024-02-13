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

        .titel-kanan {
            left: 90%;
        }

        .card-body {
            padding: 20px;
        }


    </style>
</head>

<body>
    @if(auth()->check())
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-6 col-sm-8 col-md-10 col-lg-12">
                <div class="card justify-content-center align-items-center" style="text-decoration: none;">
                    <a href="{{ route('security_pricing') }}" style="text-decoration: none;">
                        <img src="{{ asset('images/secure.JPG') }}" alt="Logo" class="img-fluid">
                        <div class="card-body font-monospace">
                            <div class="fs-5 fs-md-4 fs-lg-3 font-monospace">Pricing</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @if(session('role') === 'admin')
        <div class="row flex-nowrap overflow-auto">
            <div class="col-6 col-sm-4 col-md-5">
                <div class="card p-4 justify-content-center align-items-center">
                    <a href="{{ route('bpjsp.index') }}" style="text-decoration: none;">
                        <img src="{{ asset('images/bpjsimage.png') }}" alt="Logo" class="img-fluid">
                        <div class="card-body">
                            <div class="fs-5 fs-md-4 fs-lg-3 font-monospace">BPJS</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-5">
                <div class="card p-4">
                    <a href="{{ route('benefit.index') }}" style="text-decoration: none;">
                        <img src="{{ asset('images/benimage (1).jpg') }}" alt="Logo" class="img-fluid">
                        <div class="card-body">
                            <div class="fs-5 fs-md-4 fs-lg-3 font-monospace">Benefit</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-5">
                <div class="card p-4">
                    <a href="{{ route('umks.index') }}" style="text-decoration: none;">
                        <img src="{{ asset('images/umkimage.jpg') }}" alt="Logo" class="img-fluid">
                        <div class="card-body">
                            <div class="fs-5 fs-md-4 fs-lg-3 font-monospace">UMK</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-5">
                <div class="card p-4">
                    <a href="{{ route('jobs.index') }}" style="text-decoration: none;">
                        <img src="{{ asset('images/jobimage.jpg') }}" alt="Logo" class="img-fluid">
                        <div class="card-body">
                            <div class="fs-5 fs-md-4 fs-lg-3 font-monospace">Job</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-5">
                <div class="card p-4">
                    <a href="{{ route('sub_jobs.index') }}" style="text-decoration: none;">
                        <img src="{{ asset('images/subimage.jpg') }}" alt="Logo" class="img-fluid">
                        <div class="card-body">
                            <div class="fs-5 fs-md-4 fs-lg-3 font-monospace">SubJob</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-5">
                <div class="card p-4">
                    <a href="{{ route('persons.index') }}" style="text-decoration: none;">
                        <img src="{{ asset('images/personimage (3).png') }}" alt="Logo" class="img-fluid">
                        <div class="card-body">
                            <div class="fs-5 fs-md-4 fs-lg-3 font-monospace">Person</div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-5">
                <div class="card p-4">
                    <a href="{{ route('perlengkapan.index') }}" style="text-decoration: none;">
                        <img src="{{ asset('images/perkapimage.jpg') }}" alt="Logo" class="img-fluid">
                        <div class="card-body">
                            <div class="fs-5 fs-md-4 fs-lg-3 font-calibri" style="white-space: nowrap">Perlengkapan</div>
                        </div>
                    </a>
                </div>
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
