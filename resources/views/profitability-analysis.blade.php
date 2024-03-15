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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profitability Analysis</title>
    <style>
        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="button"], input[type="submit"] {
            width: 45%;
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
    </style>
</head>
@include('asset.bs')
<body>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="mb-4">Profitability Analysis</h1>
                <form method="POST" action="{{ route('save-profitability') }}">
                    @csrf

                    <div class="form-group">
                        <label for="ams">AMS:</label>
                        <input type="text" id="ams" name="ams" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="customer">Customer:</label>
                        <input type="text" id="customer" name="customer" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="revision">Revision:</label>
</div>
                        <input type="number" id="revision"  min="1" max="10" value="1" >

                    <div class="form-group">
                        <label for="strt">Start Date:</label>
                        <input type="date" id="start" name="start" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="end">End Date:</label>
                        <input type="date" id="end" name="end" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="ToP">Term Of Payment:</label></div>
                        <select id="terms_of_payment">
                            <option value="NET_60">Net 60</option>
                            <option value="NET_90">Net 90</option>
                            <option value="NET_120">Net 120</option>
                            <option value="NET_180">Net 180</option>
                            <option value="NET_210">Net 210</option>
                        </select>

                    <div class="form-group">
                        <label for="drcost">Direct Cost:</label>
                        <input type="text" id="cost" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="manfee">Management Fee:</label>
                        <input type="text" id="manfee" class="form-control" value="{{ session('profitability_data.manfee') ?? '' }}" >
                    </div>

                    <h3>Revenue</h3>
                    <p id="total_gaji"> <span id="total_gaji">0</span></p>


                    <!-- Direct cost -->
                    <div class="form-group">
                        <label for="manPower">Man Power:</label>
                        <input type="text" id="ManPower" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="eq">Tools & Equipment:</label>
                        <input type="text" id="equipment" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="mtr">Material:</label>
                        <input type="text" id="material" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="it">IT System:</label>
                        <input type="text" id="ItS" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="warranty">Warranty:</label>
                        <input type="text" id="warranty" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="IFs">Infrastructur Support:</label>
                        <input type="text" id="IFs" class="form-control">
                    </div>
                    <!-- direct cost -->

                    <div class="form-group">
                        <label for="warranty">Warranty:</label>
                        <input type="text" id="warranty" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="mexpense">Management Expense:</label>
                        <input type="text" id="MExpense" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="entertainment">Entertainment:</label>
                        <input type="text" id="ent" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="bussinesspartner">Bussiness Partner:</label>
                        <input type="text" id="BPartner" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="concession">Concession:</label>
                        <input type="text" id="concession" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="interest">Interest:</label>
                        <input type="text" id="interest" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="Corporate">Corporate Tax Income:</label>
                        <input type="text" id="CTI" class="form-control">
                    </div>

                    <div class="form-group mt-4">
                        <input type="button" onclick="printToPDF()" value="Invoic">
                        <input type="submit" value="Submit" class="btn btn-primary">

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
function printToPDF() {
    window.print();}

    function


    </script>
    @else
    <p>Please log in to access </p>
    @endif
</body>

</html>
