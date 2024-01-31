@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
        form {
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            position: relative;
            top:0%;
            left:69%;
            width: 10vw;
            background-color: #4fa3e3;
            color: white;
            padding: 1vw 1vw;
            border: none;
            border-radius: 100vw;
            cursor: pointer;
            font-size: 1rem;
        }

        input[type="submit"]:hover {
            transform: scale(1.05);}

        input[type="button"]:hover {
            transform: scale(1.05);}

        input[type="button"] {
            position: relative;
            bottom: 0;
            right:21%;
            width: 10vw;
            background-color: #4fa3e3;
            color: white;
            padding: 1vw 1vw;
            border: none;
            border-radius: 100vw;
            cursor: pointer;
            font-size: 1rem;
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

<h2 style="display:none;">Gaji Pokok in Security Pricing 2 : <span id="formattedGajiPokok">{{ $gajiPokok }}</span></h2>

    <form action="" method="post" id="myForm">
        <!-- @csrf -->

        <h2>E. Perlengkapan Kerja</h2>

        <div>
            <label for="id_card">ID Card:</label>
            <input type="text" name="id_card" id="id_card" readonly>
        </div>

        <div>
            <label for="seragam">Seragam:</label>
            <input type="text" name="seragam" id="seragam" readonly>
        </div>

        <div>
            <label for="sepatu">Sepatu:</label>
            <input type="text" name="sepatu" id="sepatu" readonly>
        </div>

        <h2>Subtotal E.</h2>
        <p id="display_gaji_pokok"><span id="display_gaji_pokok">0</span></p>

        <input type="submit" value="Next Page" onclick="redirectToNextPage()">
        <input type="button" onclick="window.location.href='/security-pricing3'" value="Back">
    </form>
<script>

function formatCurrency(amount) {
    var formattedAmount = parseFloat(amount).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return 'Rp. ' + formattedAmount;
    }

var rawGajiPokok = {{ $gajiPokok }};
var perlengkapanData = {!! $perlengkapanKerja->toJson() !!};

var idValue = parseFloat((perlengkapanData.find(item => item.perlengkapan === 'ID Card').nominal_persentase) / 12);
var seragamValue = parseFloat((perlengkapanData.find(item => item.perlengkapan === 'Seragam').nominal_persentase) * 2 / 12);
var sepatuValue = parseFloat((perlengkapanData.find(item => item.perlengkapan === 'Sepatu').nominal_persentase) / 12);

var subtotale = idValue + seragamValue + sepatuValue;
var formattedGajiPokok = formatCurrency(rawGajiPokok);

document.getElementById('formattedGajiPokok').innerText = formattedGajiPokok;
document.getElementById('id_card').value = formatCurrency(idValue);
document.getElementById('seragam').value = formatCurrency(seragamValue);
document.getElementById('sepatu').value = formatCurrency(sepatuValue);
document.getElementById('display_gaji_pokok').innerText = formatCurrency(subtotale);

function redirectToNextPage() {
        window.location.href = '/security-pricing5';
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
