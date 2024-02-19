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
                    <div class="text-center">
                    <h1>List Perlengkapan</h1>
                    </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th data-field="perlengkapan">Perlengkapan</th>
                                    <th> Action </th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach ($perlengkapanItems as $item)
                                <tr>
                                    <td> {{$item->perlengkapan}} </td>
                                    <td>
                                    <a href="{{route('perlengkapan.show', $item)}}" class="btn btn-info">View</a>
                                    <a href="{{route('perlengkapan.edit', $item)}}" class="btn btn-warning">Edit</a>
                                    <form action="{{route('perlengkapan.delete', $item)}}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Item?')">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                                    @endforeach
                            </tbody>
                            </table>
    <div class="btn-container">
    <a href="{{ route('perlengkapan.create') }}" class="btn btn-primary">Add Perlengkapan</a>
    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Home</a>
</body>
</html>
