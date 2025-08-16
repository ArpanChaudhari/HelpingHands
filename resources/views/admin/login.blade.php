<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="text-center mb-4">
        <img src="{{ asset('image/HelpingHands_logos.png') }}" width="140">
        <h2 class="text-success mt-3">Admin Login</h2>
    </div>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required placeholder="Enter your email">
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required placeholder="Enter your password">
        </div>

        <button type="submit" class="btn btn-success w-100">Login</button>
    </form>
</body>
</html>
