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
        <h1>SubJob List</h1>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th data-field="subjob">Subjob</th>
                                    <th> Action </th>
                                </tr>
                            </thead>

                            <tbody>
                                    @foreach ($subJobs as $subJob)
                                <tr>
                                    <td> {{$subJob->subtitle}} </td>
                                    <td>
                                    <a href="{{route('sub_jobs.show', $subJob)}}" class="btn btn-info">View</a>
                                    <a href="{{route('sub_jobs.edit', $subJob)}}" class="btn btn-warning">Edit</a><form action="{{route('sub_jobs.destroy', $subJob)}}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Subjob?')">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                                    @endforeach
                            </tbody>
                            </table>

        <div class="btn-container">
            <a href="{{ route('sub_jobs.create') }}" class="btn btn-primary">Create SubJob</a>
            <a href="{{ url('/dashboard') }}" class="btn btn-primary">Home</a>
        </div>

        </body>
        </html>
