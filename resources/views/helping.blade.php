@extends('layouts.app')

@section('title', 'Home | HelpingHands')

{{-- ✅ Link home page specific CSS --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush

@section('content')

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-overlay">
            <div class="hero-content">
                <h1>“When You Care, the World Heals.”</h1>
                <p>Extend your hand—your kindness reaches further than you know.</p>
                <div class="hero-buttons">
                    <a href="{{ route('Donate') }}" class="hero-btn">
                        <i class="fas fa-heart"></i> Donate
                    </a>
                    <a href="{{ route('Volunteer') }}" class="hero-btn">
                        <i class="fas fa-hands-helping"></i> Become a Volunteer
                    </a>
                </div>
                <p class="microtext">100% of donations go directly to those in need.</p>
            </div>
        </div>
    </section>

    <!-- Our Services -->
    <section class="our-services">
        <div class="services-header">
            <h2 class="section-title">Our Services</h2>
        </div>
        <div class="swiper-container">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <img src="{{ asset('image/social services 1.jpg') }}" class="card-image" alt="Social Services">
                        <div class="card-content">
                            <span class="badge designer">Social Welfare</span>
                            <h3 class="card-title">Empowering communities through essential support services including
                                healthcare,
                                education, and housing.</h3>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('image/eco volunteer.jpg') }}" class="card-image" alt="Environment">
                        <div class="card-content">
                            <span class="badge environment">Environment</span>
                            <h3 class="card-title">Promoting sustainable practices to build a greener, healthier planet for
                                future
                                generations.</h3>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('image/flood rescue.jpg') }}" class="card-image" alt="Disaster Relief">
                        <div class="card-content">
                            <span class="badge disaster">Disaster Relief</span>
                            <h3 class="card-title">Rapid response and recovery support for communities affected by natural
                                disasters.
                            </h3>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('image/social work.jpg') }}" class="card-image" alt="Volunteering">
                        <div class="card-content">
                            <span class="badge volunteering">Volunteering</span>
                            <h3 class="card-title">Connecting individuals with opportunities to give back and strengthen
                                communities.
                            </h3>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('image/Educational and Vocational Training.jpg') }}" class="card-image"
                            alt="Education">
                        <div class="card-content">
                            <span class="badge education">Education</span>
                            <h3 class="card-title">Empowering through quality education and career development programs.
                            </h3>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('image/Rural and Community Development.jpg') }}" class="card-image"
                            alt="Rural Development">
                        <div class="card-content">
                            <span class="badge rural">Rural Development</span>
                            <h3 class="card-title">Fostering growth in rural areas through infrastructure and social
                                initiatives.</h3>
                        </div>
                    </div>
                </div>

                <!-- Swiper Controls -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </section>

    <!-- How It Works Section -->
    <section class="HowItWorks">
        <div class="HowItWorks-header">
            <h2 class="section-title">How It Works</h2>
        </div>
        <div class="tab-buttons">
            <button class="tab-btn active" onclick="showTab('donor')">For Donors</button>
            <button class="tab-btn" onclick="showTab('volunteer')">For Volunteer</button>
        </div>
        <div class="how-it-works-content">
            <!-- Donor Cards -->
            <div id="donor-content" class="content-grid hidden">
                <div class="info-card">
                    <img src="{{ asset('image/howitwork-image/For Donar/Choose-Cause.png') }}" alt="Choose Cause" />
                    <h3>Choose a Cause</h3>
                    <p>Select a campaign
                        that resonates with you from various needs.</p>
                </div>

                <div class="info-card">
                    <img src="{{ asset('image/howitwork-image/For Donar/Select-Donation.png') }}" alt="Select Donation" />
                    <h3>Select Donation Type</h3>
                    <p>Choose how you'd like to support—whether it's funds, food, clothes, or essentials.</p>
                </div>

                <div class="info-card">
                    <img src="{{ asset('image/howitwork-image/For Donar/Completed-Donation.png') }}"
                        alt="Completed-Donation" />
                    <h3>Complete Donation</h3>
                    <p>Securely complete
                        your donation and bring hope to those in need.</p>
                </div>

                <div class="info-card">

                    <img src="{{ asset('image/howitwork-image/For Donar/Track-Impact.png') }}" alt="Track Impact" />
                    <h3>Track Impact</h3>
                    <p>Get updates on how your donation is making a real difference.</p>
                </div>
            </div>

            <!-- Volunteer Cards -->
            <div id="volunteer-content" class="content-grid hidden ">
                <div class="info-card">
                    <img src="{{ asset('image/howitwork-image/For Volunteer/Browsing-Event.png') }}"
                        alt="Browsing-Event" />
                    <h3>Browse Events</h3>
                    <p>Explore upcoming donation drives and volunteering opportunities.</p>
                </div>
                <div class="info-card">
                    <img src="{{ asset('image/howitwork-image/For Volunteer/Register-Interest.png') }}"
                        alt="Register For Any Interested Events" />
                    <h3>Register Your Interest</h3>
                    <p>Sign up for events that align with your passion to help.</p>
                </div>
                <div class="info-card">
                    <img src="{{ asset('image/howitwork-image/For Volunteer/Get Confirmed & Participate.png') }}"
                        alt="Get-Confirmation details" />
                    <h3>Get Confirmed & Participate</h3>
                    <p>Get confirmation and actively join the event—your role helps drive real change.</p>
                </div>
                <div class="info-card">
                    <img src="{{ asset('image/howitwork-image/For Volunteer/Recieve-Certification.png') }}"
                        alt="Recieve-Certification" />
                    <h3>Receive Participation Certificate</h3>
                    <p>Get recognized for your valuable contribution with a certificate</p>
                </div>
            </div>
        </div>
    </section>

    <!--priorrity causes-->
    <!-- Priority Causes Section -->
    <section class="Priority-Causes">
        <div class="Priority-Causes-header">
            <h2 class="section-title">Ongoing Priority Causes</h2>
        </div>

        <div class="card-container">
            @foreach ($campaigns as $campaign)
                <div class="cause-card">
                    <div class="cause-image">
                        <img src="{{ asset('storage/' . $campaign->image) }}" alt="{{ $campaign->title }}">
                    </div>
                    <div class="cause-title">{{ $campaign->title }}</div>
                    <div class="card-body">
                        <div class="fund-info">
                            <div class="raised">
                                <strong>₹{{ number_format($campaign->amount_raised) }}</strong><span> Raised</span>
                            </div>
                            <div class="backers">
                                <i class="fas fa-user icon"></i><strong>{{ $campaign->backers }}</strong><span>
                                    Backers</span>
                            </div>
                        </div>
                        <div class="progress-bar">
                            <div class="progress" style="width: {{ $campaign->progress }}%;"></div>
                        </div>
                        <div class="cause-actions">
                            <a href="{{ route('donate.show', $campaign->slug) }}" class="btn-donate">Donate</a>
                            <a href="#" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Our Impact Section -->
    <section class="impact-section">

        <!-- Separate full-width title div -->
        <div class="our-impact-title">
            <h2 class="section-title">Our Impact</h2>
        </div>

        <!-- Impact cards in a bordered container below -->
        <div class="impact-container">
            <div class="impact-cards">
                <div class="impact-card">
                    <i class="fas fas fa-donate"></i>
                    <h4><span class="count" data-target="8">0</span> Cr+</h4>
                    <p>Worth Donations</p>
                </div>
                <div class="impact-card">
                    <i class="fas fa-project-diagram"></i>
                    <h4><span class="count" data-target="900">0</span>+</h4>
                    <p>Projects Completed</p>
                </div>
                <div class="impact-card">
                    <i class="fas fa-users"></i>
                    <h4><span class="count" data-target="3000">0</span>+</h4>
                    <p>Active Volunteers</p>
                </div>
            </div>
        </div>

    </section>
    <!-- Testimonials Section -->
    <section class="testimonial-section">
        <div class="testimonial-header">
            <h2 class="section-title">Testimonials</h2>
        </div>

        <div class="testimonial-container">
            <div class="testimonial-card">
                <img src="{{ asset('image/Testimonials/letsventure.jpg') }}" alt="Shanti Mohan">
                <h3>Shanti Mohan</h3>
                <p class="designation">Founder of LetsVenture</p>
                <p class="testimonial">
                    “Real heroes aren’t always on screen. HelpingHands proves that kindness and action can change lives. I’m
                    proud
                    to support their incredible mission”
                </p>
            </div>

            <div class="testimonial-card">
                <img src="{{ asset('image/Testimonials/vijay-sharma.jpeg') }}" alt="Vijay Shekhar Sharma">
                <h3>Vijay Shekhar Sharma</h3>
                <p class="designation">Founder of One97 & Paytm</p>
                <p class="testimonial">
                    “HelpingHands is a platform we trust. Their work is genuine, and we’re proud to support their cause.”
                </p>
            </div>

            <div class="testimonial-card">
                <img src="{{ asset('image/Testimonials/Yuvarajsingh.jpg') }}" alt="Yuvraj Singh">
                <h3>Yuvraj Singh</h3>
                <p class="designation">Former Indian International Cricketer</p>
                <p class="testimonial">
                    “On the field, we play for victory. Off the field, I believe in playing for humanity. HelpingHands
                    connects
                    hearts and gives hope where it's needed most.”
                </p>
            </div>
        </div>
    </section>

    <div class="back-to-top-container" id="backToTop" onclick="window.scrollTo({ top: 0 })">
        <!-- Scroll bar with background and fill -->
        <div class="scroll-track">
            <div class="scroll-fill" id="scrollFill"></div>
        </div>
        <div class="back-to-top">BACK TOP</div>
    </div>
@endsection

{{-- ✅ Link home page specific JS --}}
@push('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
@endpush
