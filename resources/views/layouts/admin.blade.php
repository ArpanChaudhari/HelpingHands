<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HelpingHands Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        body {
            background-color: #fdf6f0;
            /* Light orange background */
        }

        .text-orange {
            color: #e67c00;
        }

        .hover-orange:hover {
            background-color: #fce6c6;
        }

        .sidebar {
            background-color: #ffffff;
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .header {
            background-color: #ffffff;
            position: sticky;
            top: 0;
        }

        .sidebar a.active {
            background-color: #fce6c6;
            font-weight: 600;
        }
    </style>
</head>

<body class="flex min-h-screen text-gray-800">

    <!-- Sidebar -->
    <aside class="w-64 sidebar p-6 space-y-6">
        <!-- Logo -->
        <div class="flex justify-center">
            <img src="{{ asset('image/HelpingHands_logos.png') }}" alt="Logo" class="w-40 h-auto">
        </div>

        <!-- Sidebar Navigation -->
        <nav class="space-y-2 text-base">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center px-3 py-2 rounded hover-orange transition {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-line mr-3 text-orange"></i> Dashboard
            </a>

            <a href="{{ route('admin.campaigns.index') }}"
                class="flex items-center px-3 py-2 rounded hover-orange transition {{ request()->routeIs('admin.campaigns.*') ? 'active' : '' }}">
                <i class="fas fa-bullhorn mr-3 text-orange"></i> Priority Causes
            </a>

            <a href="{{ route('admin.explore.index') }}"
                class="flex items-center px-3 py-2 rounded hover-orange transition {{ request()->routeIs('admin.explore.*') ? 'active' : '' }}">
                <i class="fas fa-globe mr-3 text-orange"></i> Explore Campaigns
            </a>

            <a href="{{ route('admin.volunteer-events.index') }}"
                class="flex items-center px-3 py-2 rounded hover-orange transition {{ request()->routeIs('admin.volunteer-events.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-alt mr-3 text-orange"></i> Volunteer Events
            </a>

        </nav>
    </aside>

    <!-- Main Panel -->
    <div class="flex-1 flex flex-col">

        <!-- Header -->
        <header class="header flex items-center justify-between  p-4 ">
            <div class="relative w-full max-w-xs">
                <input type="text" placeholder="Search..."
                    class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-400" />
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1116.65 2a7.5 7.5 0 010 14.5z" />
                    </svg>
                </div>
            </div>

            <!-- Admin Profile Dropdown -->
            <!-- Top Right Profile with Name & Dropdown -->
            <div x-data="{ open: false }" class="flex items-center gap-4 relative">

                <!-- ✅ Name + Email (Visible Always) -->
                <div class="text-right hidden sm:block">
                    <div class="font-semibold text-gray-800">Mr. Admin</div>
                    <div class="text-sm text-gray-500">admin@helpinghands.com</div>
                </div>

                <!-- ✅ Profile Icon with Dropdown -->
                <button @click="open = !open"
                    class="relative w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center shadow focus:outline-none hover:ring-2 hover:ring-orange-300 transition">
                    <i class="fas fa-user text-orange-600 text-xl"></i>
                    <span
                        class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></span>
                </button>

                <!-- ✅ Dropdown Menu -->
                <div x-show="open" x-transition @click.outside="open = false"
                    class="absolute right-0 top-12 w-48 bg-white border rounded-lg shadow-lg z-50">
                    <!-- Dropdown Header -->
                    <div class="px-4 py-2 border-b">
                        <div class="font-semibold text-gray-800">Mr. Admin</div>
                        <div class="text-sm text-gray-500">admin@helpinghands.com</div>
                    </div>

                    <!-- Go to Website -->
                    <a href="{{ url('/') }}"
                        class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-orange-100">
                        <i class="fas fa-home text-orange-500"></i> Go to Website
                    </a>

                    <!-- Logout -->
                    <form method="GET" action="{{ route('admin.logout') }}">
                        <button type="submit"
                            class="w-full flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-orange-100">
                            <i class="fas fa-sign-out-alt text-orange-500"></i> Logout
                        </button>
                    </form>
                </div>
            </div>

        </header>


        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>

    </div>
    @stack('scripts')
</body>

</html>
