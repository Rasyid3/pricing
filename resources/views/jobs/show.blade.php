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
        <div calss="font-monospace">
    <h1>Job Details</h1>

    <p>Title: {{ $job->title }}</p>

    <h2>Sub Jobs</h2>

    @if ($job->subJob)

        <ul>

            @foreach ($job->subJob as $subJob)

                <li>{{ $subJob->subtitle }} - Additional Wage: {{ $subJob->additional_wage }}</li>

            @endforeach

        </ul>

    @else

        <p>No sub jobs available for this job.</p>

    @endif

    <a href="{{ route('jobs.index') }}">Back to Jobs List</a>
    </div>
    </div>
</body>

</html>
