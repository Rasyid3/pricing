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
        <div class="text-center">
        <h1>UMK List</h1>
        </div>
        <table class="table ">
            <thead>
                <tr>
                    <th data-field="regency">Regency</th>
                    <th data-field="wage">Wage</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($umks as $umk)
                <tr>
                    <td>{{ $umk->regency }}</td>
                    <td>Rp.{{ $umk->wage }}</td>
                    <td>
                        <a href="{{ route('umks.show', $umk) }}" class="btn btn-info">View</a>
                        <a href="{{ route('umks.edit', $umk) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('umks.destroy', $umk) }}" method="POST" style="display:inline;">
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this UMK?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('umks.create') }}" class="btn btn-primary">Add UMK</a>
        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Home</a>
    </div>
</body>

</html>
