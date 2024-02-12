<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
@include('asset.bs')
</head>
<body>



<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4">
        <h1 class="mb-4">Login</h1>
        <form method="POST" action="{{ route('login.submit') }}" class="row g-3">
            @csrf
            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email" class="form-control" required>
            </div>
            <div class="col-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>

@if(session('error'))
    <script>
        // Show popup for invalid credentials
        alert('{{ session('error') }}');
    </script>
@endif



</body>
</html>
