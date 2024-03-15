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
            color: #555;
        }

        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"], input[type="button"] {
            width: 48%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: transform 0.3s;
        }

        input[type="submit"]:hover, input[type="button"]:hover {
            transform: scale(1.05);
        }

        input[type="button"] {
            background-color: #333;
            margin-left: 4%;
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
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

@php
    $gajiPokok = session('gaji_pokok');
    $kes = session('kes_karyawan');
    $jht = session('jht_karyawan');
    $jp = session('jp_karyawan');
    $total = session('total_gaji');
@endphp

<form action="" method="post" id="myForm">
    <!-- @csrf -->

    <h4>BPJS Ditanggung Karyawan</h4>
    <label for="kes">BPJS KES (1 % Gaji Pokok) : </label>
    <input type="text" name="kes" id="kes" readonly>

    <h3></h3>
    <label for="jht">BPJSTK JHT (2 % Gaji Pokok) : </label>
    <input type="text" name="jht" id="jht" readonly>

    <h3></h3>
    <label for="jp">BPJSTK JP (1 % Gaji Pokok) : </label>
    <input type="text" name="jp" id="jp" readonly>

    <h3></h3>
    <label for="tbdk">Total BPJS ditanggung Karyawan : </label>
    <input type="text" name="tbdk" id="tbdk" readonly>

    <h2>Take Home Pay : </h2>
    <input type="text" name="thp" id="thp" readonly>

    <input type="submit" value="Next Page" onclick="redirectToNextPage()" style="visibility: hidden;">
    <input type="button" value="Back" onclick="window.location.href='/security-pricing'">
</form>
    </div>
    </div>
    </div>
<script>

function formatCurrency(amount) {
    var formattedAmount = parseFloat(amount).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return 'Rp. ' + formattedAmount;
    }

var rawGajiPokok = {{ $gajiPokok }};
var rawKes = {{ $kes }};
var rawJht = {{ $jht }};
var rawJp = {{ $jp }};
var rawTotal = {{ $total }};
var kesValue = rawGajiPokok * rawKes;
var jhtValue = rawGajiPokok * rawJht;
var jpValue = rawGajiPokok * rawJp;
var tbdkValue = kesValue + jhtValue + jpValue;
var thpValue = rawTotal - tbdkValue;

document.getElementById('kes').value = formatCurrency(kesValue);
document.getElementById('jht').value = formatCurrency(jhtValue);
document.getElementById('jp').value = formatCurrency(jpValue);
document.getElementById('tbdk').value = formatCurrency(tbdkValue);
document.getElementById('thp').value = formatCurrency(thpValue);

</script>
@else
    <p>Please log in to access </p>
    @endif
</body>
</html>

