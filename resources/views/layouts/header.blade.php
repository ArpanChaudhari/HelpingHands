<!-- ===== MOBILE HEADER ===== -->
<header class="mobile-header">
    <div class="mobile-logo">
        <img src="{{ asset('image/HelpingHands_logos.png') }}" alt="Logo" />
    </div>
    <button class="menu-btn" id="openMenuBtn">
        <span></span><span></span><span></span>
    </button>
</header>

<!-- ===== MOBILE NAVIGATION ===== -->
<nav class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-header">
        <div class="mobile-logo">
            <img src="{{ asset('image/HelpingHands_logos.png') }}" alt="Logo" />
        </div>
        <button class="close-btn" id="closeMenuBtn">&times;</button>
    </div>
    <ul class="menu-list">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about') }}">About Us</a></li>
        <li><a href="{{ route('Explore') }}">Explore Campaigns</a></li>
        <li><a href="{{ route('Donate') }}">Donate</a></li>
        <li><a href="{{ route('Volunteer') }}">Volunteer</a></li>
        <li><a href="{{ route('Contactus') }}">Contact Us</a></li>
    </ul>
    <div class="menu-footer">
        @if (Auth::guard('donor')->check() || Auth::guard('volunteer')->check())
            @php
                $user = Auth::guard('donor')->check() ? Auth::guard('donor')->user() : Auth::guard('volunteer')->user();
                $firstName = explode(' ', $user->name)[0];
                $profileRoute = Auth::guard('donor')->check() ? route('donor.profile') : route('volunteer.profile');
            @endphp
            <h3 class="login-title">Hello, {{ $firstName }}</h3>
            <div class="footer-buttons">
                <a href="{{ $profileRoute }}" class="footer-btn profile-btn">
                    <i class="fas fa-user"></i> My Profile
                </a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="footer-btn logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        @else
            <h3 class="login-title">Join Us / Login</h3>
            <div class="footer-buttons">
                <a href="{{ route('donor.login.form') }}" class="footer-btn donor">
                    <i class="fas fa-hand-holding-heart"></i> As Donor
                </a>
                <a href="{{ route('volunteer.login.form') }}" class="footer-btn volunteer">
                    <i class="fas fa-handshake"></i> As Volunteer
                </a>
            </div>
        @endif
    </div>


</nav>
<div class="menu-overlay" id="menuOverlay"></div>

<!-- ===== DESKTOP HEADER (MAIN HEADER) ===== -->
<header class="main-header">
    <div class="logo">
        <img src="{{ asset('image/HelpingHands_logos.png') }}" alt="HelpingHands Logo" />
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{ route('Explore') }}">Explore Campaigns</a></li>
            <li><a href="{{ route('Donate') }}">Donate</a></li>
            <li><a href="{{ route('Volunteer') }}">Volunteer</a></li>
            <li><a href="{{ route('Contactus') }}">Contact Us</a></li>
        </ul>
    </nav>
    <div>
        @if (Auth::guard('donor')->check() || Auth::guard('volunteer')->check())
            <div class="dropdown">
                <button class="login-signup-btn" id="user-dropdown">
                    @php
                        $fullName = Auth::guard('donor')->check()
                            ? Auth::guard('donor')->user()->name
                            : Auth::guard('volunteer')->user()->name;
                        $firstName = explode(' ', $fullName)[0];
                    @endphp
                    <i class="fas fa-user-circle mr-1"></i> {{ $firstName }} ▾
                </button>
                <div class="dropdown-content">
                    @if (Auth::guard('donor')->check())
                        <a href="{{ route('donor.profile') }}" class="profile-link">
                            <i class="fas fa-user"></i> My Profile
                        </a>
                    @elseif (Auth::guard('volunteer')->check())
                        <a href="{{ route('volunteer.profile') }}" class="profile-link">
                            <i class="fas fa-user"></i> My Profile
                        </a>
                    @endif

                    <form action="{{ Auth::guard('donor')->check() ? route('logout') : route('logout') }}"
                        method="POST">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        @else
            <div class="dropdown">
                <button class="login-signup-btn" id="login-btn">Login/SignUp ▾</button>
                <div class="dropdown-content">
                    <a href="{{ route('donor.login.form') }}" class="donor">
                        <i class="fas fa-hand-holding-heart"></i> As Donor
                    </a>
                    <a href="{{ route('volunteer.login.form') }}" class="volunteer">
                        <i class="fas fa-handshake"></i> As Volunteer
                    </a>
                </div>
            </div>
        @endif
    </div>
</header>
