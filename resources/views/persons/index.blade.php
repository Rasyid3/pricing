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
        <h1>Persons List</h1>
                <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th data-field="person">Person</th>
                            <th> Action </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($persons as $person)
                        <tr>
                            <td> {{$person->name}} </td>
                            <td>
                            <a href="{{route('persons.show', $person)}}" class="btn btn-info"> View</a>
                            <a href="{{route('persons.edit', $person)}}" class="btn btn-warning"> Edit</a>
                            <form action="{{route('persons.destroy', $person)}}" method="POST" style="display:inline;">
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Subjob?')">Delete</button>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                            </tbody>
                            </table>
        <div class="btn-container">
        <a href="{{ route('persons.create') }}" class="btn btn-primary">Create SubJob</a>
        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Home</a>
        </div>

        </body>
        </html>
