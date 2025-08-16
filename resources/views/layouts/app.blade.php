<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'HelpingHands')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('image/HelpingHands_logos.png') }}" type="image/png">

    <!-- ✅ Global CSS -->
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- ✅ Swiper CSS (Required for Our Services) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- ✅ Page-specific CSS -->
    @stack('styles')
</head>
<body>

    <!-- ✅ Global Header -->
    @include('layouts.header')

    <!-- ✅ Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- ✅ Global Footer -->
    @include('layouts.footer')

    <!-- ✅ Swiper JS (before your script.js) -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- ✅ Global JS -->
    <script src="{{ asset('js/header.js') }}"></script>

    <!-- ✅ Page-specific JS -->
    @stack('scripts')

</body>
</html>
