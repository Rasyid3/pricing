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
            max-height: 500%;

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
        <div calss="font">
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
