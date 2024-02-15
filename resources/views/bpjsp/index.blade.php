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
<div class="text-center">
        <h1>BPJS</h1>
        </div>

                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th data-field="BPJS">Jenis</th>
                                    <th data-field="Persentase"> Nominal/Persentase</th>
                                    <th> Action </th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach ($bpjsItems as $item)
                                <tr>
                                    <td> {{$item->nama_bpjs}} </td>
                                    <td> {{$item->nominal_persentase}} </td>
                                    <td>
                                    <a href="{{route('bpjsp.show', $item)}}" class="btn btn-info">View</a>
                                    <a href="{{route('bpjsp.edit', $item)}}" class="btn btn-warning">Edit</a>
                                    <form action="{{route('bpjsp.delete', $item)}}" method="POST" style="display:inline;">
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
            <a href="{{ route('bpjsp.create') }}" class="btn btn-primary">Create BPJS</a>
            <a href="{{ url('/dashboard') }}" class="btn btn-primary">Home</a>
        </div>

        </body>
        </html>
