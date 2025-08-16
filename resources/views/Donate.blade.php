@extends('layouts.app')

@section('title', 'Donate | HelpingHands')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Donate.css') }}">
@endpush

@section('content')
    <!-- Hero Section -->
    <!-- Hero Section with Image Tag -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-text">
                <h1>Your Contribution Can Change Lives</h1>
                <p>Help us bring hope, food, and education to those in need.</p>
                <a href="#donate-form" class="btn">Donate Now</a>
            </div>
            <div class="hero-img">
                <img src="image/Once a Child Labourer, This Bengaluru Girl Will Now Speak About Child Rights in Parliament.jpeg"
                    alt="Helping Hands Hero Image">
            </div>
        </div>
    </section>


    <!--emotional quotes-->
    <section class="quotes-section">
        <div class="quotes-container">
            <h2>Words That Inspire Us</h2>

            <p class="quote">“When you give to someone in need, you are not just giving money — you’re giving hope.”</p>

            <p class="quote">“A small act of kindness today could become someone’s reason to believe in tomorrow.”</p>

            <p class="quote">“Your donation doesn’t just change lives — it also rewards yours. All contributions are
                eligible for tax benefits under Section 80G.”</p>
        </div>
    </section>

    <!-- why us-->
    <section class="why-donate">
        <h2>Why Choose HelpingHands?</h2>
        <div class="why-grid">

            <div class="why-card">
                <img src="https://img.icons8.com/fluency-systems-regular/64/discount--v1.png" alt="Tax Benefits">
                <h3>Avail Tax Benefits</h3>
                <p>Get an 80G certificate with every donation & save on tax.</p>
            </div>

            <div class="why-card">
                <img src="https://img.icons8.com/fluency-systems-regular/64/lock-2.png" alt="Secure">
                <h3>Trustworthy & Secure</h3>
                <p>Donor data & payments are encrypted and protected.</p>
            </div>

            <div class="why-card">
                <img src="https://img.icons8.com/fluency-systems-regular/64/chat--v1.png" alt="Updates">
                <h3>Regular Updates</h3>
                <p>Get regular updates on how your donation is making an impact.</p>
            </div>

            <div class="why-card">
                <img src="https://img.icons8.com/fluency-systems-regular/64/money-transfer.png" alt="Hassle Free">
                <h3>Donate Hassle-Free</h3>
                <p>Donate via UPI, cards, net banking or any preferred method.</p>
            </div>

            <div class="why-card">
                <img src="https://img.icons8.com/fluency-systems-regular/64/approval.png" alt="Verified Campaign">
                <h3>100% Verified Campaigns</h3>
                <p>Strict due diligence and verification for every cause.</p>
            </div>

            <div class="why-card">
                <img src="https://img.icons8.com/fluency-systems-regular/64/handshake--v1.png" alt="Impact">
                <h3>Greater Impact</h3>
                <p>Save one life at a time with every donation you make.</p>
            </div>

        </div>
    </section>





    <!-- Impact Section -->
    <section class="impact">
        <h2>Where Your Donations Go</h2>
        <div class="impact-cards">
            <div class="impact-card">
                <img src="https://img.icons8.com/emoji/96/rice-ball-emoji.png" alt="Meal">
                <h3>1 Meal</h3>
                <p>₹30 feeds a person in need</p>
            </div>
            <div class="impact-card">
                <img src="https://img.icons8.com/color/96/backpack.png" alt="School Kit">
                <h3>School Kit</h3>
                <p>₹250 helps a child study</p>
            </div>
            <div class="impact-card">
                <img src="https://img.icons8.com/color/96/hospital-room.png" alt="Medical Aid">
                <h3>Medical Aid</h3>
                <p>₹500 for emergency health care</p>
            </div>
            <div class="impact-card">
                <img src="https://img.icons8.com/color/96/cottage.png" alt="Shelter">
                <h3>Shelter</h3>
                <p>₹1000 provides safe shelter</p>
            </div>
        </div>
    </section>








    <!-- Donation Form -->
    <section class="donation-form" id="donation-form">
        <h2>Donate Now</h2>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('donation.store.general') }}" method="POST">
            @csrf

            @if (Auth::guard('donor')->check())
                {{-- Logged-in Donor: Minimal Form --}}
                <input type="hidden" name="donor_id" value="{{ Auth::guard('donor')->id() }}">

                <div>
                    <label for="phone">Mobile Number</label>
                    <input type="tel" name="phone" id="phone" required placeholder="Enter mobile number">
                </div>

                <div>
                    <label for="nationality">Nationality</label>
                    <input type="text" name="nationality" id="nationality" required placeholder="Enter your nationality">
                </div>

                <div>
                    <label for="amount">Donation Amount (₹)</label>
                    <input type="number" name="amount" id="amount" required placeholder="Enter amount">
                </div>
            @else
                {{-- Guest User: Full Form --}}
                <div>
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" required placeholder="Enter your full name">
                </div>

                <div>
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" required placeholder="Enter your email">
                </div>

                <div>
                    <label for="phone">Mobile Number</label>
                    <input type="tel" name="phone" id="phone" required placeholder="Enter mobile number">
                </div>

                <div>
                    <label for="nationality">Nationality</label>
                    <input type="text" name="nationality" id="nationality" required placeholder="Enter your nationality">
                </div>

                <div>
                    <label for="amount">Donation Amount (₹)</label>
                    <input type="number" name="amount" id="amount" required placeholder="Enter amount">
                </div>
            @endif

            <button type="submit" class="btn">Donate Securely</button>
        </form>


        <p class="secure-note">
            <i class="fas fa-lock"></i> 100% Secure Payment
        </p>
    </section>





    <!-- FAQs -->
    <section class="faq">
        <h2>FAQs</h2>

        <div class="faq-item">
            <h3 onclick="toggleFAQ(this)">Is my donation tax exempt?</h3>
            <div class="faq-answer">Yes, all donations are eligible under 80G of Income Tax.</div>
        </div>

        <div class="faq-item">
            <h3 onclick="toggleFAQ(this)">How is the money used?</h3>
            <div class="faq-answer">Donations go directly into our programs for food, education, and aid.</div>
        </div>

        <div class="faq-item">
            <h3 onclick="toggleFAQ(this)">Can I donate items instead?</h3>
            <div class="faq-answer">Yes, visit our Volunteer page to contribute physical items.</div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/Donate.js') }}"></script>
@endpush
