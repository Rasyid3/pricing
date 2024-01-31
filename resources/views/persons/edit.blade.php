@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: fixed;
            justify-content: center;
            align-items: center;
            height: 100%;
            max-height: 1000%;

        }

        .container {
            position: fixed;
            align-items: center;
            left:10%;
            top:0%;
            height: 100%;
            max-height: 1000%;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 10%;
            z-index: 0;
            overflow-y: scroll;
            scrollbar-width: none;

        }
        .container::-webkit-scrollbar {
            display: none;
        }
        .font{
            font-family: monospace;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="font">
    <h1>Edit Person</h1>
    <form method="POST" action="{{ route('persons.update', $person) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $person->name }}" required>
        </div>

        <div class="form-group">
            <label for="umk_id">UMK ID:</label>
            <input type="number" name="umk_id" id="umk_id" class="form-control" value="{{ $person->umk_id }}" required>
        </div>

        <div class="form-group">
            <label for="job_id">Job ID:</label>
            <input type="number" name="job_id" id="job_id" class="form-control" value="{{ $person->job_id }}" required>
        </div>

        <div class="form-group">
            <label for="sub_job_id">SubJob ID:</label>
            <input type="number" name="sub_job_id" id="sub_job_id" class="form-control" value="{{ $person->sub_job_id }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Person</button>
    </form>

    <a href="{{ route('persons.index') }}" class="btn btn-secondary">Back to Person List</a>
    </div>
    </div>
</body>
</html>
