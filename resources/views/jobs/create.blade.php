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
