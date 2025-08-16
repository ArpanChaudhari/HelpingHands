@extends('layouts.app')

@section('title', 'About Us | HelpingHands')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endpush

@section('content')
<section class="about-section">
    <div class="container">
        <div class="content-flex">
            <div class="text-content">
                <h1>Change Today.<br><span>Change Tomorrow.</span></h1>
                <p class="description">
                    HelpingHands was founded to serve underprivileged communities across India. We believe everyone
                    deserves access to education, healthcare, and a dignified life. Since our inception, we have
                    created countless volunteering opportunities and life-changing campaigns.
                </p>
                <div class="btn-group">
                    <a href="{{ route('Donate') }}" class="btn primary">Donate Now ↗</a>
                    <a href="{{ route('Volunteer') }}" class="btn secondary">Become a Volunteer ↗</a>
                </div>
            </div>

            <div class="image-collage">
                <img src="{{ asset('image/Rural and Community Development.jpg') }}" class="main-img" alt="Main Activity">
                <img src="{{ asset('image/Educational and Vocational Training.jpg') }}" class="overlay-img" alt="Happy Kids">
                <div class="dots top-left"></div>
                <div class="dots bottom-right"></div>
            </div>
        </div>

        <!-- Mission & Vision -->
        <div class="mv-container">
            <h3>Our Mission & Vision</h3>
            <div class="mv-box-wrapper">
                <div class="mv-box">
                    <i class="fas fa-bullseye icon"></i>
                    <h3>Our Mission</h3>
                    <p>
                        To create meaningful change by empowering underprivileged individuals with
                        education, healthcare access, and humanitarian aid.
                    </p>
                </div>
                <div class="mv-box">
                    <i class="fas fa-eye icon"></i>
                    <h3>Our Vision</h3>
                    <p>
                        A world where every human being has the opportunity to live a safe, healthy,
                        and fulfilling life — no matter their background.
                    </p>
                </div>
            </div>
        </div>

        <!-- Impact Stats -->
        <div class="impact-stats">
            <h3>Our Impact</h3>
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
                    <div class="impact-card">
                        <i class="fas fa-hands-helping"></i>
                        <h4><span class="count" data-target="50">0</span>+</h4>
                        <p>Campaigns Run</p>
                    </div>
                    <div class="impact-card">
                        <i class="fas fa-heartbeat"></i>
                        <h4><span class="count" data-target="10000">0</span>+</h4>
                        <p>Lives Impacted</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="program-vision-section">
    <h2 class="program-title">Our Programme Vision (2025–2035)</h2>
    <div class="vision-cards">
        <div class="vision-card">
            <div class="vision-icon bg-orange">
                <i class="fas fa-lightbulb"></i>
            </div>
            <h3>Education Drive</h3>
            <p>Empowering 10,000+ underprivileged children with access to quality education and digital tools by 2030.</p>
        </div>
        <div class="vision-card">
            <div class="vision-icon bg-green">
                <i class="fas fa-leaf"></i>
            </div>
            <h3>Eco Awareness</h3>
            <p>Launching green campaigns across 500+ villages and urban areas to build an eco-conscious generation.</p>
        </div>
        <div class="vision-card">
            <div class="vision-icon bg-blue">
                <i class="fas fa-heartbeat"></i>
            </div>
            <h3>Health & Wellness</h3>
            <p>Improving health and hygiene for 1 lakh families through medical camps and awareness sessions.</p>
        </div>
        <div class="vision-card">
            <div class="vision-icon bg-purple">
                <i class="fas fa-hands-helping"></i>
            </div>
            <h3>Skill Development</h3>
            <p>Train and empower 5,000+ youth and women with job-ready skills for a brighter future.</p>
        </div>
    </div>
</section>

<section class="team-section">
    <h2 class="section-title">Meet The Team</h2>
    <div class="team-container">
        <div class="team-member">
            <img src="{{ asset('image/image 2.jpg') }}" alt="Arpan Chaudhari" class="team-photo" />
            <h3>Arpan Chaudhari</h3>
            <p class="role ceo">CEO & Co-Founder</p>
        </div>
        <div class="team-member">
            <img src="{{ asset('image/image 2.jpg') }}" alt="Ayush Chaudhary" class="team-photo" />
            <h3>Ayush Chaudhary</h3>
            <p class="role">Co-Founder</p>
        </div>
        <div class="team-member">
            <img src="{{ asset('image/image 3.avif') }}" alt="Moksh Patel" class="team-photo" />
            <h3>Moksh Patel</h3>
            <p class="role">Co-Founder</p>
        </div>
    </div>
    <p class="team-description">
        <strong>Together, we build, support, and inspire change every single day.</strong>
    </p>
</section>
@endsection

@push('scripts')
<script src="{{ asset('js/about.js') }}"></script>
@endpush
