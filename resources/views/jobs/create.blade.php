@include('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
        font-family:monospace;
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
    <h1>Create Job</h1>
    <form method="POST" action="{{ route('jobs.store') }}">
        @csrf

        <div class="form-group">
            <label for="title">Job Title:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Job

        </button>

    </form>
    <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Back to Job List</a>
</div>
</div>

</body>
</html>
