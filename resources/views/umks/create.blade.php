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
            font-family: monospace;
        }
    </style>
</head>
<body>

    <form method="POST" action="{{ route('umks.store') }}">
        @csrf
        <div class="container">
            <div class="font">
        <h1>Create UMK</h1>

        <div class="form-group">
            <label for="regency">Regency:</label>
            <input type="text" name="regency" id="regency" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="wage">Wage:</label>
            <input type="number" name="wage" id="wage" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add UMK</button>
    </form>
    <a href="{{ route('umks.index') }}" class="btn btn-secondary">Back to Umk List</a>
    </div>
    </div>
</body>
</html>
