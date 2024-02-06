@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        form {
            padding: 20px;
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

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
</head>
<body>

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
    <label for="insentif_pasca_kerja">Insentif Pasca Kerja : </label>
    <input type="text" name="insentif_pasca_kerja" id="insentif_pasca_kerja" readonly>

    <h3></h3>
    <label for="insentif_kerja_di_hari_raya">Insentif Kerja di Hari Raya : </label>
    <input type="text" name="insentif_kerja_di_hari_raya" id="insentif_kerja_di_hari_raya" readonly>

    <h3></h3>
    <label for="extra">Extra : </label>
    <input type="text" name="extra" id="extra" readonly>

    <h2>Subtotal B.</h2>
    <p id="total_gaji"> <span id="display_gaji_pokok">0</span></p>

    <input type="button" onclick="window.location.href='/security-pricing'" value="Back">
    <input type="submit" value="Next Page" onclick="redirectToNextPage()">
</form>
<script>

function formatCurrency(amount) {
    var formattedAmount = parseFloat(amount).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return 'Rp. ' + formattedAmount;
    }

var rawGajiPokok = {{ $gajiPokok }};
var rawGajiTotal = {{ $totalGaji }};
var benefitData = {!! $addBen->toJson() !!};
var thrNom = benefitData.find(item => item.benefit === 'THR').nominal_persentase;
var imbalanNom = benefitData.find(item => item.benefit === 'Imbalan Pasca Kerja').nominal_persentase;
var insentifNom = benefitData.find(item => item.benefit === 'Insentif Kerja di Hari Raya').nominal_persentase;



var thrValue = rawGajiPokok / thrNom;
var insentifPascaKerjaValue = rawGajiPokok / imbalanNom;
var insentifKerjaDiHariRayaValue = insentifNom * 5 / 12;
var extraValue = 0;
var subtotalb = thrValue + insentifPascaKerjaValue + insentifKerjaDiHariRayaValue + extraValue;

var formattedGajiPokok = formatCurrency(rawGajiPokok);
document.getElementById('formattedGajiPokok').innerText = formattedGajiPokok;
document.getElementById('thr').value = formatCurrency(thrValue);
document.getElementById('insentif_pasca_kerja').value = formatCurrency(insentifPascaKerjaValue);
document.getElementById('insentif_kerja_di_hari_raya').value = formatCurrency(insentifKerjaDiHariRayaValue);
document.getElementById('extra').value = formatCurrency(extraValue);
document.getElementById('display_gaji_pokok').innerText = formatCurrency(subtotalb);

function redirectToNextPage() {
    window.location.href = '/security-pricing3';
}

$('form').submit(function (e) {
    e.preventDefault();
    submitFormAndRedirect();
    });

$('input[type="submit"]').on('click', function() {
    submitFormAndRedirect();
    });

</script>



</body>
</html>
