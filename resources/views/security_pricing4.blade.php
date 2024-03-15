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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.0/html2pdf.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

@php
    // Retrieve gaji pokok from the session
    $gajiPokok = session('gaji_pokok');
@endphp
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

<h2 style="display:none;">Gaji Pokok in Security Pricing 2 : <span id="formattedGajiPokok">{{ $gajiPokok }}</span></h2>

    <form action="" method="post" id="myForm">
        @csrf

        <h2>E. Perlengkapan Kerja</h2>

        <div>
        <label for="id_card">ID Card:</label>
            <input type="text"  name="id_card" id="id_card" readonly>

        </div>

        <div>
            <label for="seragam">Seragam:</label>
            <input type="text" name="seragam" id="seragam" readonly>
        </div>

        <div>
            <label for="sepatu">Sepatu:</label>
            <input type="text" name="sepatu" id="sepatu" readonly>
        </div>

        <h5>Opsional</h5>

        <div>
    <label for="CheckItem2">ATK:</label>
    <input type="checkbox" id="CheckItem2" onclick="forChecked(2)">
    <input type="text" style="display:none" name="atk" id="atk" readonly>
</div>

<div>
    <label for="CheckItem3">Masker:</label>
    <input type="checkbox" id="CheckItem3" onclick="forChecked(3)">
    <input type="text" style="display:none" name="masker" id="masker" readonly>
</div>

<div>
    <label for="CheckItem4">Face Shield:</label>
    <input type="checkbox" id="CheckItem4" onclick="forChecked(4)">
    <input type="text" style="display:none" name="faceshield" id="faceshield" readonly>
</div>

        <h2>Subtotal E.</h2>
        <p id="display_gaji_pokok"><span id="display_gaji_pokok">0</span></p>

        <input type="button" onclick="window.location.href='/security-pricing3'" value="Back">
        <input type="submit" value="Next Page" onclick="redirectToNextPage()">

    </form>
</div>
</div>
</div>
<script>
function forChecked(idcheck){
    var checkBox= document.getElementById("CheckItem");
    var checkBox2= document.getElementById("CheckItem2");
    var checkBox3= document.getElementById("CheckItem3");
    var checkBox4= document.getElementById("CheckItem4");
    var text= document.getElementById("id_card");
    var text2= document.getElementById("atk");
    var text3= document.getElementById("masker");
    var text4= document.getElementById("faceshield");

    var seragamValue = parseFloat((perlengkapanData.find(item => item.perlengkapan === 'Seragam').nominal_persentase) * 2 / 12);
    var sepatuValue = parseFloat((perlengkapanData.find(item => item.perlengkapan === 'Sepatu').nominal_persentase) / 12);
    var maskerValue = parseFloat((perlengkapanData.find(item => item.perlengkapan === 'Masker').nominal_persentase) * 2 / 5);
    var atkValue = parseFloat((perlengkapanData.find(item => item.perlengkapan === 'ATK').nominal_persentase) / 12);
    var faceValue = parseFloat((perlengkapanData.find(item => item.perlengkapan === 'Face Shield').nominal_persentase) * 2 / 12);

    if(idcheck === 2){
        if(checkBox2.checked === true){
            text2.style.display= "block";
            subtotale += atkValue;
        }
        else{
            text2.style.display="none";
            subtotale -= atkValue;
        }
    }
    else if(idcheck === 1){
        if(checkBox.checked === true){
            text.style.display= "block";
            subtotale += idValue;
        }
        else{
            text.style.display="none";
            subtotale -= idValue;
        }
    }
    else if(idcheck === 3){
        if(checkBox3.checked === true){
            text3.style.display= "block";
            subtotale += maskerValue;
        }
        else{
            text3.style.display="none";
            subtotale -= maskerValue;
        }
    }
    else if(idcheck === 4){
        if(checkBox4.checked === true){
            text4.style.display= "block";
            subtotale += faceValue;
        }
        else{
            text4.style.display="none";
            subtotale -= faceValue;
        }
    }
    document.getElementById('display_gaji_pokok').innerText = formatCurrency(subtotale);
}

function formatCurrency(amount) {
    var formattedAmount = parseFloat(amount).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return 'Rp. ' + formattedAmount;
    }

var rawGajiPokok = {{ $gajiPokok }};
var perlengkapanData = {!! $perlengkapanKerja->toJson() !!};

var idValue = parseFloat((perlengkapanData.find(item => item.perlengkapan === 'ID Card').nominal_persentase) / 12);
var seragamValue = parseFloat((perlengkapanData.find(item => item.perlengkapan === 'Seragam').nominal_persentase) * 2 / 12);
var sepatuValue = parseFloat((perlengkapanData.find(item => item.perlengkapan === 'Sepatu').nominal_persentase) / 12);
var maskerValue = parseFloat((perlengkapanData.find(item => item.perlengkapan === 'Masker').nominal_persentase) * 2 / 5);
var atkValue = parseFloat((perlengkapanData.find(item => item.perlengkapan === 'ATK').nominal_persentase) / 12);
var faceValue = parseFloat((perlengkapanData.find(item => item.perlengkapan === 'Face Shield').nominal_persentase) * 2 / 12);

var subtotale =  idValue + seragamValue + sepatuValue;

var formattedGajiPokok = formatCurrency(rawGajiPokok);

document.getElementById('formattedGajiPokok').innerText = formattedGajiPokok;
document.getElementById('id_card').value = formatCurrency(idValue);
document.getElementById('seragam').value = formatCurrency(seragamValue);
document.getElementById('sepatu').value = formatCurrency(sepatuValue);
document.getElementById('masker').value = formatCurrency(maskerValue);
document.getElementById('faceshield').value = formatCurrency(faceValue);
document.getElementById('atk').value = formatCurrency(atkValue);
document.getElementById('display_gaji_pokok').innerText = formatCurrency(subtotale);

function redirectToNextPage() {
    //var nextPageUrl = '/security-pricing5?subtotale=' + subtotale;//    var nextPageUrl = '/security-pricing5?subtotale=' + subtotale;
    sessionStorage.setItem('subtotale', subtotale);
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
