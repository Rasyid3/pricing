<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('asset.bs')
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <style>
        #early{
            background-image:url("https://img.freepik.com/free-vector/gradient-abstract-wireframe-background_23-2149020364.jpg?w=740&t=st=1708053733~exp=1708054333~hmac=25363422930beef03b5cba5334f0a9effe9a83cf869469e98f6d8bc92a5991d0");
            height:100vh;
        }

        .fullscreen-mask {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      background-color: #000000;
      opacity: 0.7;
      z-index: 1000;
    }

    </style>
</head>

<body>
    @if(auth()->check())
    @if(session('role') === 'user')
    @include('layouts.app1')
    <div id="early" class="bg-image shadow-2-strong">
    <div class="fullscreen-mask">
        <div class="container d-flex align-items-center justify-content-center text-center h-100">
            <div class="text-white" data-mdtb-theme="dark">
                <h1 class="mb-3"> Halo {{ Auth::user()->name }}! </h1>
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-lg-6">
                        <div class="btn btn-outline-light btn-lg m-2">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-3">
                                        <div class="text-white-75 small">Pricing List</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between small">
                                <a class="text-white stretched-link" href="{{ route('security_pricing') }}">Go</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-lg m-2">
                                <div class="card-body"><i data-feather="log-out"></i>
                                <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                        <div class="text-white-75 small">Logout</div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between small">
                            </div>
                        </div>
                    </div>
</div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


            @endif

        @if(session('role') === 'admin')
        @include('layouts.app')
<div class="container mt-4">
        <div class="row justify-content-center mb-3">
            <div class="col-6 col-sm-8 col-md-10 col-lg-12">
                <div class="card border-0 justify-content-center align-items-center" style="text-decoration: none;">
                    <a href="{{ route('security_pricing') }}" style="text-decoration: none;">
                        <img src="{{ asset('images/secure.JPG') }}" alt="Logo" class="img-fluid">
                        <div class="card-body text-center font-monospace text-center">
                            <div class="fs-5 fs-md-4 fs-lg-3 font-monospace">Pricing</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        </div>

        <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="mb-3">List Data </h3>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <div class="card border-0">
                                    <a href="{{ route('bpjsp.index') }}" style="text-decoration: none;">
                                        <img class="img-fluid" alt="100%x280" src="{{ asset('images/bpjsimage.png') }}">
                                        <div class="card-body">
                                            <h4 class="card-title">BPJS</h4>
                                            <p class="card-text">Persentase BPJS yang ditanggung perusahaan dan karyawan</p>

                                        </div>
                                        </a>
                                    </div>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card border-0">
                                    <a href="{{ route('benefit.index') }}" style="text-decoration: none;">
                                        <img class="img-fluid" alt="100%x280" src="{{ asset('images/benimage (1).jpg') }}">
                                        <div class="card-body">
                                            <h4 class="card-title">Additional Benefit</h4>
                                            <p class="card-text">Tunjangan / insentif yang diterima karyawan</p>

                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card border-0">
                                    <a href="{{ route('umks.index') }}" style="text-decoration: none;">
                                        <img class="img-fluid" alt="100%x280" src="{{ asset('images/coinicon.png') }}">
                                        <div class="card-body">
                                            <h4 class="card-title">UMK</h4>
                                            <p class="card-text">Upah Minimum</p>

                                        </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <div class="card border-0">
                                    <a href="{{ route('jobs.index') }}" style="text-decoration: none;">
                                        <img class="img-fluid" alt="100%x280" src="{{ asset('images/jobimage.jpg') }}">
                                        <div class="card-body">
                                            <h4 class="card-title">Pekerjaan</h4>
                                            <p class="card-text">Detail Pekerjaan</p>

                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card border-0">
                                    <a href="{{ route('sub_jobs.index') }}" style="text-decoration: none;">
                                        <img class="img-fluid" alt="100%x280" src="{{ asset('images/taskicon.png') }}">
                                        <div class="card-body">
                                            <h4 class="card-title">Job Desk</h4>
                                            <p class="card-text">List Job desk</p>

                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card border-0">
                                    <a href="{{ route('persons.index') }}" style="text-decoration: none;">
                                        <img class="img-fluid" alt="100%x280" src="{{ asset('images/personimage (3).png') }}">
                                        <div class="card-body">
                                            <h4 class="card-title">Person</h4>
                                            <p class="card-text">Nama Orang</p>

                                        </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <div class="card border-0">
                                    <a href="{{ route('perlengkapan.index') }}" style="text-decoration: none;">
                                        <img class="img-fluid" alt="100%x280" src="{{ asset('images/secicon.png') }}">
                                        <div class="card-body">
                                            <h4 class="card-title">Perlengkapan</h4>
                                            <p class="card-text">Daftar perlengkapan yang dibutuhkan tiap karyawan</p>

                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card border-0">
                                    <a href="{{ route('userm.index') }}" style="text-decoration: none;">
                                        <img class="img-fluid" alt="100%x280" src="{{ asset('images/personimage (3).png') }}">
                                        <div class="card-body">
                                            <h4 class="card-title">User Management</h4>
                                            <p class="card-text">Membatasi hak akses dari setiap user</p>

                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    @endif

    <!-- @livewire('example') -->

    @else
    <p>Please log in to access the dashboard.</p>
    @endif

    <!-- @if(session('popup'))

    <script>
        alert('{{ session('popup') }}');
    </script>
    @endif -->
    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
    <script>
    var multipleCardCarousel = document.querySelector(
  "#carouselExampleControls"
);
if (window.matchMedia("(min-width: 768px)").matches) {
  var carousel = new bootstrap.Carousel(multipleCardCarousel, {
    interval: false,
  });
  var carouselWidth = $(".carousel-inner")[0].scrollWidth;
  var cardWidth = $(".carousel-item").width();
  var scrollPosition = 0;
  $("#carouselExampleControls .carousel-control-next").on("click", function () {
    if (scrollPosition < carouselWidth - cardWidth * 4) {
      scrollPosition += cardWidth;
      $("#carouselExampleControls .carousel-inner").animate(
        { scrollLeft: scrollPosition },
        600
      );
    }
  });
  $("#carouselExampleControls .carousel-control-prev").on("click", function () {
    if (scrollPosition > 0) {
      scrollPosition -= cardWidth;
      $("#carouselExampleControls .carousel-inner").animate(
        { scrollLeft: scrollPosition },
        600
      );
    }
  });
} else {
  $(multipleCardCarousel).addClass("slide");
}
</script>
</body>

</html>



