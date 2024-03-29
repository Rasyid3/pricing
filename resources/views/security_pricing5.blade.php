    @if(auth()->check())
    @if(session('role') === 'user')
    @include('layouts.app1')
    @endif
    @if(session('role') === 'admin')
    @include('layouts.app')
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.0/html2pdf.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<body>




<!-- @php
    // Retrieve gaji pokok from the session
    $gajiPokok = session('gaji_pokok');
    $totalGaji = session('total_gaji');
    $thR = session('t_hr');
    $imbalanP = session('imbalan_pk');
    $kerjaInsentif = session('insentif_kerja');
    $bpjsKes = session('bpjs_kes');
    $bpjsJkk = session('bpjstk_jkk');
    $bpjsJkm = session('bpjstk_jkm');
    $bpjsJht = session('bpjstk_jht');
    $bpjsJp = session('bpjstk_jp');

@endphp -->


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

<form action="" method="post" id="myForm" onsubmit="validateInput();">
    <!-- @csrf -->

    <h2>Tagihan</h2>
    <label for="suba">Gaji Pokok + Tunjangan Tetap : </label>
    <input type="text" name="suba" id="suba" readonly>

    <h3></h3>
    <label for="subb">Additional Benefit : </label>
    <input type="text" name="subb" id="subb" readonly>

    <h3></h3>
    <label for="subc">BPJS Ditanggung Perusahaan : </label>
    <input type="text" name="subc" id="subc" readonly>

    <h3></h3>
    <label for="sube">Perlengkapan Kerja : </label>
    <input type="text" name="sube" id="sube" readonly>

    <h3></h3>
    <label for="sbmp">Subtotal Biaya / Man Power : </label>
    <input type="text" name="sbmp" id="sbmp" readonly>

    <h3></h3>
    <label for="jmp">Jumlah Man Power : </label>
    <input type="number" name="jmp" id="jmp" min="1" value="1" oninput="updateTotal()" onblur="validateInput()">

    <h3></h3>
    <label for="tbamp">Total Biaya All Man Power : </label>
    <input type="text" name="tbamp" id="tbamp" readonly>

    <h3></h3>
    <label for="manfee">Management Fee : </label>
    <div>
    <div style="display: flex; align-items: center; margin-bottom: 5px;">
        <input type="number" name="manfee" id="manfee" min="5" max="100" value="8" step="1" style="width: 60px; padding: 8px; margin-right: 5px;" oninput="calculateManagementFee()" onblur="validateInput()" >
        <span>%</span>
    </div>
    <label for="manfee_display">Management Fee (Calculated): </label>
    <input type="text" name="manfee_display" id="manfee_display" readonly>
</div>

    <h2>Total Tagihan ke Customer (excluded ppn 11%) : </h2>
    <p id="customer"> <span id="customer">0</span></p>

    <input type="button" value="Back" onclick="window.location.href='/security-pricing4'">
    <input type="submit" value="Profitability Analysis" onclick="window.location.href='/profitability-analysis'">

    <a href="#" id="downloadButton" onclick="printToPDF()">
        <i class="fas fa-download"></i>
    </a>
</form>
    </div>
    </div>
    </div>
<script>


var subtotale = Math.round(parseFloat(sessionStorage.getItem('subtotale')));
var subtotalbSession = parseFloat(sessionStorage.getItem('subtotalbSession'));

function printToPDF() {
    // Trigger the browser's print dialog
    window.print();
}

function formatCurrency(amount) {
    var formattedAmount = parseFloat(amount).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return 'Rp. ' + formattedAmount;
    }

var rawGajiPokok = {{ $gajiPokok }};
var rawGajiTotal = {{ $totalGaji }};
var subaValue = Math.round(rawGajiTotal);

var rawKes = {{ $bpjsKes }};
var rawJkk = {{ $bpjsJkk }};
var rawJkm = {{ $bpjsJkm }};
var rawJht = {{ $bpjsJht }};
var rawJp = {{ $bpjsJp }};
var kesValue = rawGajiPokok * rawKes;
var jkkValue = rawGajiPokok * rawJkk;
var jkmValue = rawGajiPokok * rawJkm;
var jhtValue = rawGajiPokok * rawJht;
var jpValue = rawGajiPokok * rawJp;
var subcValue = Math.round(kesValue + jkkValue + jkmValue + jhtValue + jpValue);

var perlengkapanData = {!! $perlengkapanKerja->toJson() !!};
var idValue = parseFloat((perlengkapanData.find(item => item.perlengkapan === 'ID Card').nominal_persentase) / 12);
var seragamValue = parseFloat((perlengkapanData.find(item => item.perlengkapan === 'Seragam').nominal_persentase) * 2 / 12);
var sepatuValue = parseFloat((perlengkapanData.find(item => item.perlengkapan === 'Sepatu').nominal_persentase) / 12);
var subeValue = Math.round(idValue + seragamValue + sepatuValue);
var sbmpValue = Math.round(subaValue + subtotalbSession +subcValue + subtotale);
var jumlahManPower = 1;
var totalBiayaAllManPower = sbmpValue * jumlahManPower;
var managementFee = 0;

document.getElementById('suba').value = formatCurrency(subaValue);
document.getElementById('subb').value = formatCurrency(subtotalbSession);
document.getElementById('subc').value = formatCurrency(subcValue);
document.getElementById('sube').value = formatCurrency(subeValue);
document.getElementById('sbmp').value = formatCurrency(sbmpValue);
document.getElementById('sube').value = formatCurrency(subtotale);

    console.log('suba : ', subaValue);
    console.log('subb : ', subtotalbSession);
    console.log('subc : ', subcValue);
    console.log('sube : ', subeValue);
    console.log('sbmp : ', sbmpValue);
    console.log('sube : ', subtotale);

function calculateManagementFee() {
        var percentageInput = parseFloat(document.getElementById('manfee').value) || 0;
        managementFee = (percentageInput / 100) * totalBiayaAllManPower;
        document.getElementById('manfee_display').value = formatCurrency(managementFee);
        updateCustomerValue();
    }

function updateTotal() {
    jumlahManPower = document.getElementById('jmp').value;
    totalBiayaAllManPower = sbmpValue * jumlahManPower;
    document.getElementById('tbamp').value = formatCurrency(totalBiayaAllManPower);
    calculateManagementFee();
}
updateTotal();

function updateCustomerValue() {
        var customerValue = totalBiayaAllManPower + managementFee;
        document.getElementById('customer').innerText = formatCurrency(customerValue);
    }
function redirectToNextPage() {
        window.location.href = '/security-pricing6';
    }

$('form').submit(function (e) {
    e.preventDefault();
    submitFormAndRedirect();
    });

$('input[type="submit"]').on('click', function() {
    submitFormAndRedirect();
    });

    function validateInput() {
        var inputElement = document.getElementById("jmp");
        var inputElement2 = document.getElementById("manfee");
        var inputValue = inputElement.value;
        var inputValue2 = inputElement2.value;

        if (parseInt(inputValue) < 1) {
            // If the entered value is 0 or less, set the value to 1
            inputElement.value = 1;
        }

        if (parseInt(inputValue2) <= 4) {
            // If the entered value is 0 or less, set the value to 1
            inputElement2.value = 5;
        }
    updateTotal();
    calculateManagementFee();
    }

    document.getElementById('manfee').addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault(); // Prevent form submission on Enter keypress
            validateInput(); // Call the validation function
        }
    });

    document.getElementById('jmp').addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault(); // Prevent form submission on Enter keypress
            validateInput(); // Call the validation function
        }
    });


</script>

@else
    <p>Please log in to access </p>
    @endif

</body>
</html>
