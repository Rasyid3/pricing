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
            <h1>Create New User</h1>

            <form method="POST" action="{{ route('userm.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nama User : </label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password : </label>
                <input type="text" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="role">Role : </label>
                <select name="role" id="role" class="form-control" required>
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                </select>
            </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
        <a href="{{ route('userm.index') }}" class="btn btn-secondary">Back</a>
</div>
</div>
</body>
</html>
