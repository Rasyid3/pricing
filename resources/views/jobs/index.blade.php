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
<div class="container">
        <div class="font-monospace">
        <h1>Job List</h1>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th data-field="Job">Job</th>
                                    <th> Action </th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach ($jobs as $job)
                                <tr>
                                    <td> {{$job->title}} </td>
                                    <td>
                                    <a href="{{route('jobs.show', $job)}}" class="btn btn-info">View</a>
                                    <a href="{{route('jobs.edit', $job)}}" class="btn btn-warning">Edit</a>
                                    <form action="{{route('jobs.destroy', $job)}}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                                    @endforeach
                            </tbody>
                            </table>

        <div class="btn-container">
            <a href="{{ route('jobs.create') }}" class="btn btn-primary">Create Job</a>
            <a href="{{ url('/dashboard') }}" class="btn btn-primary">Home</a>
        </div>

        </body>
        </html>

