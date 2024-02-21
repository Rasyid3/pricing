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
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
<form action="" method="post">
    @csrf

    <label for="job_title">Job Title:</label>
    <select name="subtitle" id="subtitle">
    @foreach ($sub as $subtitle)
        <option value="{{ $subtitle }}">{{ $subtitle }}</option>
    @endforeach
    </select>

    <label for="location">Pilih Lokasi:</label>
    <select name="regency" id="regency">
    @foreach ($regencies as $regency)
        <option value="{{ $regency }}">{{ $regency }}</option>
    @endforeach
    </select>

    <h2>A. Struktur Gaji</h2>
    <h4>Tunjangan Tetap</h4>
    <label for="gaji_pokok">Gaji Pokok (UMK):</label>
    <!-- <input type="text" name="gaji_pokok" id="gaji_pokok"> -->
    <input type="text" name="gaji_pokok" id="gaji_pokok" readonly>

    <!-- <label for="tunjangan_tetap">Tunjangan Tetap:</label>
    <input type="text" name="tunjangan_tetap" id="tunjangan_tetap"> -->

    <h3></h3>
    <label for="tunjangan_jabatan">Tunjangan Jabatan:</label>
    <input type="text" name="tunjangan_jabatan" id="tunjangan_jabatan" readonly>

    <h3></h3>
    <label for="tunjangan_komunikasi">Tunjangan Komunikasi:</label>
    <input type="text" name="tunjangan_komunikasi" id="tunjangan_komunikasi" readonly>

    <h3></h3>
    <label for="tunjangan_transportasi">Tunjangan Transportasi:</label>
    <input type="text" name="tunjangan_transportasi" id="tunjangan_transportasi" readonly>

    <h3></h3>
    <label for="tunjangan_makan">Tunjangan Makan:</label>
    <input type="text" name="tunjangan_makan" id="tunjangan_makan" readonly>

    <h3></h3>
    <label for="tunjangan_lembur">Tunjangan Lembur:</label>
    <input type="text" name="tunjangan_lembur" id="tunjangan_lembur" readonly>

    <h3></h3>
    <label for="tunjangan_shift">Tunjangan Shift:</label>
    <input type="text" name="tunjangan_shift" id="tunjangan_shift" readonly>

    <!-- <h2>Gaji Pokok + Tunjangan Tetap</h2>
    <p id="total_gaji">Rp. 0</p> -->
    <h2>Gaji Pokok + Tunjangan Tetap</h2>
    <p id="total_gaji"> <span id="total_gaji">0</span></p>

    <input type="button" onclick="window.location.href='/dashboard'" value="Back" style="visibility: hidden;">
    <input type="submit" value="Next Page">

</form>
</div>
</div>
</div>

    <script>

        function formatCurrency(amount) {
            var formattedAmount = parseFloat(amount).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return 'Rp. ' + formattedAmount;
        }

    function redirectToNextPage() {

        $('form').submit();
    }

    function logout() {
    window.location.href = '/security-pricing3';
}

    function updateGajiPokok() {
        var selectedSubtitle = $('#subtitle').val();
        var selectedRegency = $('#regency').val();


        $.ajax({
            url: '/get-wages',
            method: 'POST',
            data: {
                subtitle: selectedSubtitle,
                regency: selectedRegency,
                _token: $('input[name="_token"]').val()
            },
            success: function(response) {

                var gajiPokok = formatCurrency(parseFloat(response.umk_wage) +
                parseFloat(response.additional_wage));

                var gajiTotal = formatCurrency(parseFloat(response.umk_wage) +
                parseFloat(response.additional_wage) + parseFloat(response.tunjangan_jabatan) +
                parseFloat(response.tunjangan_komunikasi) + parseFloat(response.tunjangan_transportasi) +
                parseFloat(response.tunjangan_makan) + parseFloat(response.tunjangan_lembur) +
                parseFloat(response.tunjangan_shift));

                $('#gaji_pokok').val(gajiPokok);

                $('#tunjangan_jabatan').val(formatCurrency(response.tunjangan_jabatan));
                $('#tunjangan_komunikasi').val(formatCurrency(response.tunjangan_komunikasi));
                $('#tunjangan_transportasi').val(formatCurrency(response.tunjangan_transportasi));
                $('#tunjangan_makan').val(formatCurrency(response.tunjangan_makan));
                $('#tunjangan_lembur').val(formatCurrency(response.tunjangan_lembur));
                $('#tunjangan_shift').val(formatCurrency(response.tunjangan_shift));

                $('#total_gaji').text(gajiTotal);

        },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    $('#subtitle, #regency').on('change', function() {
        updateGajiPokok();
    });

    $('form').submit(function (e) {
    e.preventDefault();
    submitFormAndRedirect();
    });

    function submitFormAndRedirect() {
    var selectedSubtitle = $('#subtitle').val();
    var selectedRegency = $('#regency').val();
    window.location.href = '/security-pricing2';
}
    updateGajiPokok();

    </script>
</body>
</html>
