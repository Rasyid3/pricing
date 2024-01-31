@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    body{
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        display: fixed;
        justify-content: center;
        align-items: center;
        height: 100%;
        max-height: 500%;

    }

    .container{
        position: fixed;
        align-items: center;
        left:10%;
        top:0%;
        height: 100%;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        padding: 5%;
        z-index: 0;

    }

    .font{
        font-family: monospace;
    }

    .btn {
        margin-right: 10px;
        margin: 0 10px;

    }

    </style>
</head>
<body>
    <div class="container">
        <div class="font">
    <h1>Edit</h1>
    <form method="POST" action="{{ route('bpjsp.update', $bpjsItem) }}">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="nama_bpjs">Nama : </label>
            <input type="text" name="nama_bpjs" id="nama_bpjs" class="form-control" value="{{ $bpjsItem->nama_bpjs }}" required>
        </div>

        <div class="form-group">
            <label for="nominal_persentase">Nominal / Persentase:</label>
            <input type="number" name="nominal_persentase" id="nominal_persentase" class="form-control" value="{{ $bpjsItem->nominal_persentase }}" step="any" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <a href="{{ route('bpjsp.index') }}" class="btn btn-secondary">Back to List</a>
</div>
</div>
</body>
</html>
