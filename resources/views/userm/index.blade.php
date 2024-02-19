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
        <h1>User Management</h1>
        </div>

                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th data-field="BPJS">Nama User</th>
                                    <th data-field="Persentase"> Role</th>
                                    <th> Action </th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach ($userItems as $item)
                                <tr>
                                    <td> {{$item->name}} </td>
                                    <td> {{$item->role}} </td>
                                    <td>
                                    <a href="{{route('userm.show', $item)}}" class="btn btn-info">View</a>
                                    <a href="{{route('userm.edit', $item)}}" class="btn btn-warning">Edit</a>
                                    <form action="{{route('userm.delete', $item)}}" method="POST" style="display:inline;">
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
            <a href="{{ route('userm.create') }}" class="btn btn-primary">Create New User</a>
            <a href="{{ url('/dashboard') }}" class="btn btn-primary">Home</a>
        </div>

        </body>
        </html>
