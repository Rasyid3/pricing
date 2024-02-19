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
                <h1>Edit</h1>
                <form method="POST" action="{{ route('userm.update', $userItem) }}">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="name">Nama User : </label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $userItem->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="role">Role :</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="user" {{ $userItem->role === 'user' ? 'selected' : '' }}>user</option>
                            <option value="admin" {{ $userItem->role === 'admin' ? 'selected' : '' }}>admin</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                <a href="{{ route('userm.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </body>
</html>
