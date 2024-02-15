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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<!-- @php
    // Retrieve gaji pokok from the session
    $gajiPokok = session('gaji_pokok');
@endphp -->

<h2 style="display:none;">Gaji Pokok in Security Pricing 2 :
<span id="formattedGajiPokok">{{ $gajiPokok }}</span></h2>

<form action="" method="post" id="myForm">
    @csrf

    <h2>C. BPJS Ditanggung Perusahaan</h2>
    <label for="bpjskes">BPJS KES : </label>
    <input type="text" name="bpjskes" id="bpjskes" readonly>

    <h3></h3>
    <label for="bpjstkjkk">BPJSTK JKK : </label>
    <input type="text" name="bpjstkjkk" id="bpjstkjkk" readonly>

    <h3></h3>
    <label for="bpjstkjkm">BPJSTK JKM : </label>
    <input type="text" name="bpjstkjkm" id="bpjstkjkm" readonly>

    <h3></h3>
    <label for="bpjstkjht">BPJSTK JHT : </label>
    <input type="text" name="bpjstkjht" id="bpjstkjht" readonly>

    <h3></h3>
    <label for="bpjstkjp">BPJSTK JP : </label>
    <input type="text" name="bpjstkjp" id="bpjstkjp" readonly>

    <h2>Subtotal C.</h2>
    <p id="total_gaji"> <span id="display_gaji_pokok">0</span></p>

    <input type="button" onclick="window.location.href='/security-pricing2'" value="Back">
    <input type="submit" value="Next Page" onclick="redirectToNextPage()">

</form>
<script>

function formatCurrency(amount) {
    var formattedAmount = parseFloat(amount).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return 'Rp. ' + formattedAmount;
    }

var rawGajiPokok = {{ $gajiPokok }};

var bpjspData = {!! $addBpjsp->toJson() !!};
var kesNom = bpjspData.find(item => item.nama_bpjs === 'BPJSKES').nominal_persentase;
var jkkNom = bpjspData.find(item => item.nama_bpjs === 'BPJSTK JKK').nominal_persentase;
var jkmNom = bpjspData.find(item => item.nama_bpjs === 'BPJSTK JKM').nominal_persentase;
var jhtNom = bpjspData.find(item => item.nama_bpjs === 'BPJSTK JHT').nominal_persentase;
var jpNom = bpjspData.find(item => item.nama_bpjs === 'BPJSTK JP').nominal_persentase;


var kesValue = rawGajiPokok * kesNom;
var jkkValue = rawGajiPokok * jkkNom;
var jkmValue = rawGajiPokok * jkmNom;
var jhtValue = rawGajiPokok * jhtNom;
var jpValue = rawGajiPokok * jpNom;
var subtotalc = kesValue + jkkValue + jkmValue + jhtValue + jpValue;

var formattedGajiPokok = formatCurrency(rawGajiPokok);
document.getElementById('formattedGajiPokok').innerText = formattedGajiPokok;
document.getElementById('bpjskes').value = formatCurrency(kesValue);
document.getElementById('bpjstkjkk').value = formatCurrency(jkkValue);
document.getElementById('bpjstkjkm').value = formatCurrency(jkmValue);
document.getElementById('bpjstkjht').value = formatCurrency(jhtValue);
document.getElementById('bpjstkjp').value = formatCurrency(jpValue);
document.getElementById('display_gaji_pokok').innerText = formatCurrency(subtotalc);

function redirectToNextPage() {
    window.location.href = '/security-pricing4';
}

$('form').submit(function (e) {
    e.preventDefault(); // Prevent the default form submission
    submitFormAndRedirect(); // Submit the form and redirect to the next page
    });

$('input[type="submit"]').on('click', function() {
    submitFormAndRedirect();
    });

</script>



</body>
</html>
