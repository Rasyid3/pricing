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
            background-color: #4CAF50;
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
            background-color: #4CAF50;
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

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>


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

    <input type="submit" value="Next Page">
    <input type="button" onclick="window.location.href='/dashboard'" value="Back">

</form>

    <script>

        function formatCurrency(amount) {
            var formattedAmount = parseFloat(amount).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return 'Rp. ' + formattedAmount;
        }



    // JavaScript code to calculate the total
    // gaji based on the input values

    function formatCurrency(amount) {
    // Format the number with commas and round to 0 decimal places
    var formattedAmount = parseFloat(amount).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");

    // Add "Rp." in front of the formatted amount
    return 'Rp. ' + formattedAmount;
    }

    function redirectToNextPage() {

        $('form').submit();
    }

    function updateGajiPokok() {
        var selectedSubtitle = $('#subtitle').val();
        var selectedRegency = $('#regency').val();

        // Make an Ajax request to fetch the relevant data
        $.ajax({
            url: '/get-wages', // Replace with the actual URL to fetch wages
            method: 'POST',
            data: {
                subtitle: selectedSubtitle,
                regency: selectedRegency,
                _token: $('input[name="_token"]').val()
            },
            success: function(response) {
                // Update the "Gaji Pokok" field with the calculated value
                var gajiPokok = formatCurrency(parseFloat(response.umk_wage) +
                parseFloat(response.additional_wage));

                var gajiTotal = formatCurrency(parseFloat(response.umk_wage) +
                parseFloat(response.additional_wage) + parseFloat(response.tunjangan_jabatan) +
                parseFloat(response.tunjangan_komunikasi) + parseFloat(response.tunjangan_transportasi) +
                parseFloat(response.tunjangan_makan) + parseFloat(response.tunjangan_lembur) +
                parseFloat(response.tunjangan_shift));

                $('#gaji_pokok').val(gajiPokok);

                 // Update the "Tunjangan Jabatan" field with the fetched value
                $('#tunjangan_jabatan').val(formatCurrency(response.tunjangan_jabatan));
                $('#tunjangan_komunikasi').val(formatCurrency(response.tunjangan_komunikasi));
                $('#tunjangan_transportasi').val(formatCurrency(response.tunjangan_transportasi));
                $('#tunjangan_makan').val(formatCurrency(response.tunjangan_makan));
                $('#tunjangan_lembur').val(formatCurrency(response.tunjangan_lembur));
                $('#tunjangan_shift').val(formatCurrency(response.tunjangan_shift));

                // Update the total gaji paragraph
                $('#total_gaji').text(gajiTotal);
            // Store the subtotal data in the session
            $.ajax({
                url: '/store-total-gaji',
                method: 'POST',
                data: {
                    subtitle: selectedSubtitle,
                    regency: selectedRegency,
                    total_gaji: gajiTotal,
                    _token: $('input[name="_token"]').val()
                },
                success: function(response) {
                    console.log('Total Gaji stored in session:', response);
                    redirectToNextPage();
                },
                error: function(error) {
                    console.error('Error storing total gaji in session:', error);
                }
            });
        },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    // Attach the updateGajiPokok function to the change event of subtitle and regency fields
    $('#subtitle, #regency').on('change', function() {
        updateGajiPokok();
    });

    // Add this function to handle form submission and redirection

    $('form').submit(function (e) {
    e.preventDefault(); // Prevent the default form submission
    submitFormAndRedirect(); // Submit the form and redirect to the next page
    });

    function submitFormAndRedirect() {
    var selectedSubtitle = $('#subtitle').val();
    var selectedRegency = $('#regency').val();

    // Make an Ajax request to fetch the relevant data
    $.ajax({
        url: '/get-wages',
        method: 'POST',
        data: {
            subtitle: selectedSubtitle,
            regency: selectedRegency,
            _token: $('input[name="_token"]').val()
        },
        success: function(response) {
            window.location.href = '/security-pricing2';
        },
        error: function(error) {
            console.error('Error fetching data:', error);
        }
    });
}
    updateGajiPokok();
    </script>
</body>
</html>
