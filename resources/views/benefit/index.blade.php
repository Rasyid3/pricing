@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

</style>
</head>
<body>

<div class="container">
<div class="font-monospace">
        <h1>Benefit</h1>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th data-field="Benefit">Benefit</th>
                                    <th data-field="Persentase"> Nominal/Persentase</th>
                                    <th> Action </th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach ($benefitItems as $item)
                                <tr>
                                    <td> {{$item->benefit}} </td>
                                    <td> {{$item->nominal_persentase}} </td>
                                    <td>
                                    <a href="{{route('benefit.edit', $item)}}" class="btn btn-warning">Edit</a>
                                    <a href="{{route('benefit.show', $item)}}" class="btn btn-info">View</a>
                                    <form action="{{route('benefit.delete', $item)}}" method="POST" style="display:inline;">
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Subjob?')">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                                    @endforeach
                            </tbody>
                            </table>

        <div class="btn-container">
            <a href="{{ route('benefit.create') }}" class="btn btn-primary">Create SubJob</a>
            <a href="{{ url('/dashboard') }}" class="btn btn-primary">Home</a>
        </div>

        </body>
        </html>
