@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('asset.bs')
    <style>

    </style>
    </head>
<body>
<div class="container mt-4">
        <div class="font-monospace">
    <h1>Create Person</h1>

    <form method="POST" action="{{ route('persons.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="umk_id">UMK ID:</label>
            <input type="number" name="umk_id" id="umk_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="job_id">Job ID:</label>
            <input type="number" name="job_id" id="job_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="sub_job_id">SubJob ID:</label>
            <input type="number" name="sub_job_id" id="sub_job_id" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Person</button>
    </form>

    <a href="{{ route('persons.index') }}" class="btn btn-secondary">Back to Person List</a>
    </div>
    </div>
</body>
</html>
