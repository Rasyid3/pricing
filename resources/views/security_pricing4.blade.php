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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.0/html2pdf.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

        <input type="button" onclick="window.location.href='/security-pricing3'" value="Back">
        <input type="submit" value="Next Page" onclick="redirectToNextPage()">

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
