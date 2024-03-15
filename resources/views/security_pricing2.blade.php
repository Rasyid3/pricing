@if(auth()->check())
    @if(session('role') === 'user')
    @include('layouts.app1')
    @endif
    @if(session('role') === 'admin')
    @include('layouts.app')
    @endif
    @endif

<!DOCTYPE html>
<html lang="en">
    <head>
        @include('asset.bs')
        <style>
            label {
                display: block;
                margin-bottom: 10px;
                font-weight: bold;
                color: #333;
            }

            input[type="text"], select {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ddd;
                border-radius: 4px;
                box-sizing: border-box;
            }

        input[type="button"], input[type="submit"] {
                width: 45%;
                margin-top: 15px;
                padding: 10px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 1rem;
                transition: background-color 0.3s, transform 0.3s;
            }

        input[type="submit"] {
                background-color: #0A4AAD;
                color: white;
            }

        input[type="button"] {
                background-color: #333;
                color: white;
                margin-left: 5%;
            }

        input[type="submit"]:hover, input[type="button"]:hover {
            background-color: #0A4AAD;
            transform: scale(1.05);
        }

        #total_gaji {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }
        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Include jQuery library -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.0/html2pdf.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>
    <body>
        @if(auth()->check())

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">

        <!-- @php
            // Retrieve gaji pokok from the session
            $gajiPokok = session('gaji_pokok');
            $totalGaji = session('total_gaji');
        @endphp -->



        <h2 style="display:none;">Gaji Pokok in Security Pricing 2 :
        <span id="formattedGajiPokok">{{ $gajiPokok }}</span></h2>

        <h2 style="display:none;">Gaji Pokok in Security Pricing 2 :
        <span id="formattedGajiTotal">{{ $totalGaji }}</span></h2>

                    <form action="" method="post">
                        @csrf

                        <h2>B. Additional Benefit</h2>
                        <label for="thr">THR : </label>
                        <!-- <input type="text" name="gaji_pokok" id="gaji_pokok"> -->
                        <input type="text" name="thr" id="thr" readonly>

                        <h3></h3>
                        <label for="imbalan_pasca_kerja">Imbalan Pasca Kerja : </label>
                        <input type="text" name="imbalan_pasca_kerja" id="imbalan_pasca_kerja" readonly>

                        <h3></h3>
                        <label for="insentif_kerja_di_hari_raya">Insentif Kerja di Hari Raya : </label>
                        <input type="text" name="insentif_kerja_di_hari_raya" id="insentif_kerja_di_hari_raya" readonly>

                        <h3></h3>
                        <label for="extra">Extra Voeding : </label>
                        <input type="text" name="extra" id="extra" onblur="calculateManagementFee()">

                        <h2>Subtotal B.</h2>
                        <p id="total_gaji"> <span id="display_gaji_pokok"></span></p>

                        <input type="button" onclick="window.location.href='/security-pricing'" value="Back">
                        <input type="submit" value="Next Page" onclick="redirectToNextPage()">
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>

    var thrValue = <?php echo json_encode($thrValue); ?>;
    var imbalanPascaKerjaValue = <?php echo json_encode($imbalanPascaKerjaValue); ?>;
    var insentifKerjaDiHariRayaValue = <?php echo json_encode($insentifKerjaDiHariRayaValue); ?>;
    var extraValue = <?php echo json_encode($extraValue); ?>;
    var subtotalb = <?php echo json_encode($subtotalb); ?>;


    document.getElementById('thr').value = formatCurrency(thrValue);
    document.getElementById('imbalan_pasca_kerja').value = formatCurrency(imbalanPascaKerjaValue);
    document.getElementById('insentif_kerja_di_hari_raya').value = formatCurrency(insentifKerjaDiHariRayaValue);
    document.getElementById('extra').value = formatCurrency(extraValue);
    document.getElementById('display_gaji_pokok').textContent = formatCurrency(subtotalb);

    // Now you can use these JavaScript variables in your code
    console.log('thr : ', formatCurrency(thrValue));
    console.log('imb : ',imbalanPascaKerjaValue);
    console.log('ins : ',insentifKerjaDiHariRayaValue);
    console.log('ex : ',extraValue);
    console.log('sub : ',subtotalb);
    function formatCurrency(amount) {
        var formattedAmount = parseFloat(amount).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        return 'Rp. ' + formattedAmount;
    }

    // var extraValue = parseFloat(document.getElementById('extra').value) || 0;
    // console.log(extraValue);
    // var subtotalbValue = parseFloat(document.getElementById('display_gaji_pokok').textContent.replace('Rp. ', '')) || 0;
    // console.log(subtotalbValue);

            var rawGajiPokok = {{ $gajiPokok }};
            var rawGajiTotal = {{ $totalGaji }};
            var benefitData = {!! $addBen->toJson() !!};
            var subtotalbValue;
            var subtotalbSession = subtotalb;

        function calculateManagementFee() {
            var extraInput = document.getElementById('extra');
            var extraAmount = parseFloat(extraInput.value) || 0;
            console.log('Extra amount:', formatCurrency(extraAmount));
            document.getElementById('extra').value = formatCurrency(extraAmount);

            subtotalbSession = subtotalb + extraAmount;
            document.getElementById('display_gaji_pokok').textContent = subtotalbSession;

            document.getElementById('display_gaji_pokok').textContent = formatCurrency(subtotalbSession);

            console.log('subtotalb session / final : ', subtotalbSession);


        }
            function redirectToNextPage() {
                sessionStorage.setItem('subtotalbSession', subtotalbSession);
                window.location.href = '/security-pricing3';
            }


            $('form').submit(function (e) {
                e.preventDefault();
                submitFormAndRedirect();
                });

            $('input[type="submit"]').on('click', function() {
                submitFormAndRedirect();
                });

            document.getElementById('extra').addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    validateInput();
                    }
                });



        </script>

        @else
        <p>Please log in to access </p>
        @endif
    </body>
</html>
