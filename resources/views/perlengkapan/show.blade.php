@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container {
            position: fixed;
            align-items: center;
            left:10%;
            top:10%;
            height: 100vh;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 50px;
            z-index: 0;
        }
        .font{
            font-family:  monospace;
        }
    </style>
    </head>
<body>
    <div class="container">
    <div class="font">
    <h1>Details</h1>

    <p>Perlengkapan : {{ $perlengkapanItem->perlengkapan }}</p>
    <p>Nominal / Persentase : {{ $perlengkapanItem->nominal_persentase }}</p>


    <a href="{{ route('perlengkapan.index') }}">Back to List</a>
    </div>
    </div>
</body>
</html>

