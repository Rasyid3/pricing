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
     <h1>Edit Job</h1>

    <form method="POST" action="{{ route('jobs.update', $job) }}">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="title">Job Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $job->title }}" required>
        </div>


        <button type="submit" class="btn btn-primary">Update Job</button>
    </form>
    <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Back to Job List</a>
</div>
</div>
</body>
</html>
