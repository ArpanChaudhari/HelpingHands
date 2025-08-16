<!DOCTYPE html>
<html>

<head>
    <title>Volunteer Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        body {
            background-color: #f4fdf4;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-box {
            max-width: 400px;
            margin: 40px auto;
            padding: 30px;
            background-color: #fff;
            border: 2px solid #006400;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0, 100, 0, 0.15);
        }

        .login-box h2 {
            color: #006400;
            font-weight: 700;
            margin-bottom: 20px;
            font-size: 26px;
            text-align: center;
        }

        .form-label {
            font-weight: 600;
        }

        .btn-green {
            background-color: #006400;
            color: white;
        }

        .btn-green:hover {
            background-color: #004d00;
        }

        .logo {
            display: block;
            margin: 0 auto 10px;
            max-width: 100px;
        }

        .position-relative i {
            position: absolute;
            top: 38px;
            right: 15px;
            cursor: pointer;
            color: #555;
        }
        .fas{
            margin-top: 5px
        }
    </style>
</head>

<body>

    <div class="login-box">
        <!-- Logo -->
        <img src="{{ asset('image/HelpingHands_logos.png') }}" alt="HelpingHands Logo" class="logo">

        <!-- Title -->
        <h2>Volunteer Login</h2>

        <!-- Error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('volunteer.login') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required placeholder="Enter email">
            </div>

            <div class="mb-3 position-relative">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required placeholder="Enter password" id="volPassword">
                <i class="fas fa-eye-slash" id="toggleVolIcon" onclick="toggleVolunteerPassword()"></i>
            </div>

            <button type="submit" class="btn btn-green w-100 mt-2">Login</button>

            <p class="mt-3 text-center">
                New here? <a href="{{ route('volunteer.register.form') }}" class="text-success fw-semibold">Create a Volunteer account</a>
            </p>
        </form>
    </div>

    <!-- Password Toggle Script -->
    <script>
        function toggleVolunteerPassword() {
            const input = document.getElementById("volPassword");
            const icon = document.getElementById("toggleVolIcon");

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        }
    </script>
</body>

</html>
