<!DOCTYPE html>
<html>

<head>
    <title>Volunteer Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4fdf4;
            font-family: 'Segoe UI', sans-serif;
        }

        .signup-box {
            max-width: 450px;
            margin: 40px auto;
            padding: 30px;
            background-color: #fff;
            border: 2px solid #006400;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0, 100, 0, 0.15);
        }

        .signup-box h2 {
            color: #006400;
            font-weight: 700;
            margin-bottom: 20px;
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

    <div class="signup-box">
        <!-- Logo -->
        <img src="{{ asset('image/HelpingHands_logos.png') }}" alt="HelpingHands Logo" class="logo">

        <!-- Title -->
        <h2>Register as Volunteer</h2>

        <!-- Error -->
        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <!-- Signup Form -->
        <form method="POST" action="{{ route('volunteer.register') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required placeholder="Enter your name">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required placeholder="Enter your email">
            </div>

            <div class="mb-3 position-relative">
                <label class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required placeholder="Create password">
                <i class="fas fa-eye-slash" id="togglePassword" onclick="togglePassword('password', 'togglePassword')"></i>
            </div>

            <div class="mb-3 position-relative">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" id="confirmPassword" class="form-control" required placeholder="Confirm password">
                <i class="fas fa-eye-slash" id="toggleConfirmPassword" onclick="togglePassword('confirmPassword', 'toggleConfirmPassword')"></i>
            </div>

            <button type="submit" class="btn btn-green w-100 mt-2">Sign Up</button>
        </form>
    </div>

    <!-- Password Toggle Script -->
    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            const isHidden = input.type === "password";

            input.type = isHidden ? "text" : "password";
            icon.classList.toggle("fa-eye", isHidden);
            icon.classList.toggle("fa-eye-slash", !isHidden);
        }
    </script>
</body>

</html>
