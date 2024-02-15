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
    @if(auth()->check())
    @if(session('role') === 'user')
    @include('layouts.app1')
    <div class="container-xl px-4 mt-n10">
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
        @endif
    </div>

        @if(session('role') === 'admin')
        @include('layouts.app')
        <div class="container-xl px-4 mt-n10">
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



        <div class="row flex-nowrap overflow-auto">
            <div class="col-6 col-sm-4 col-md-5">
                <div class="card p-3 border-0 justify-content-center align-items-center">
                    <a href="{{ route('bpjsp.index') }}" style="text-decoration: none;">
                        <img src="{{ asset('images/bpjsimage.png') }}" alt="Logo" class="img-fluid">
                        <div class="card-body text-center">
                            <div class="fs-5 fs-md-4 fs-lg-3 font-monospace">BPJS</div>
                        </div>
                     </a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-5">
                <div class="card p-3 border-0 justify-content-center align-items-center">
                    <a href="{{ route('benefit.index') }}" style="text-decoration: none;">
                        <img src="{{ asset('images/benimage (1).jpg') }}" alt="Logo" class="img-fluid">
                        <div class="card-body text-center">
                            <div class="fs-5 fs-md-4 fs-lg-3 font-monospace">Benefit</div>
                         </div>
                    </a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-5">
                <div class="card p-3 border-0 justify-content-center align-items-center">
                    <a href="{{ route('umks.index') }}" style="text-decoration: none;">
                        <img src="{{ asset('images/coinicon.png') }}" alt="Logo" class="img-fluid">
                        <div class="card-body text-center">
                            <div class="fs-5 fs-md-4 fs-lg-3 font-monospace">UMK</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-5">
                <div class="card p-3 border-0 justify-content-center align-items-center">
                    <a href="{{ route('jobs.index') }}" style="text-decoration: none;">
                        <img src="{{ asset('images/jobimage.jpg') }}" alt="Logo" class="img-fluid">
                        <div class="card-body text-center">
                            <div class="fs-5 fs-md-4 fs-lg-3 font-monospace">Job</div>
                         </div>
                    </a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-5">
                <div class="card p-3 border-0 justify-content-center align-items-center">
                    <a href="{{ route('sub_jobs.index') }}" style="text-decoration: none;">
                        <img src="{{ asset('images/taskicon.png') }}" alt="Logo" class="img-fluid">
                        <div class="card-body text-center">
                            <div class="fs-5 fs-md-4 fs-lg-3 font-monospace">SubJob</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-5">
                <div class="card p-3 border-0 justify-content-center align-items-center">
                    <a href="{{ route('persons.index') }}" style="text-decoration: none;">
                        <img src="{{ asset('images/personimage (3).png') }}" alt="Logo" class="img-fluid">
                        <div class="card-body text-center">
                            <div class="fs-5 fs-md-4 fs-lg-3 font-monospace">Person</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-5">
                <div class="card p-3 border-0 justify-content-center align-items-center">
                    <a href="{{ route('perlengkapan.index') }}" style="text-decoration: none;">
                        <img src="{{ asset('images/secicon.png') }}" alt="Logo" class="img-fluid">
                        <div class="card-body text-center">
                            <div class="fs-5 fs-md-4 fs-lg-3 font-calibri" style="white-space: nowrap">Perlengkapan</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- @livewire('example') -->

    @else
    <p>Please log in to access the dashboard.</p>
    @endif

    @if(session('popup'))

    <script>
        alert('{{ session('popup') }}');
    </script>
    @endif
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



