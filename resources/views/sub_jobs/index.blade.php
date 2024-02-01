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
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 5%;
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

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 20px;
        }

        .btn {
            margin-right: 10px;

        }
        .btn-container {
            display: flex;
            margin-top: 20px;
        }

        .btn {
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="font">
        <h1>SubJob List</h1>

        <ul>
            @foreach ($subJobs as $subJob)
                <li>
                    <div>
                    <a href="{{ route('sub_jobs.show', $subJob) }}">{{ $subJob->subtitle }}</a>
                    </div>
                    <div>
                    <span>
                        <a href="{{ route('sub_jobs.edit', $subJob) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('sub_jobs.destroy', $subJob) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this SubJob?')">Delete</button>
                        </form>
                    </span>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="btn-container">
            <a href="{{ route('sub_jobs.create') }}" class="btn btn-primary">Create SubJob</a>
            <a href="{{ url('/dashboard') }}" class="btn btn-primary">Home</a>
        </div>
    </div>
    </div>

</body>
</html>
