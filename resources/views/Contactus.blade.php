@extends('layouts.app')

@section('title', 'Contact Us | HelpingHands')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Contactus.css') }}">
@endpush

@section('content')
    <!-- Contact Section -->
    <section class="contact-section">
        <div class="contact-left">
            <h4 class="section-tag">Contact</h4>
            <h2>Get In Touch</h2>
            <p>Have a query, want to volunteer, or looking to donate? Reach out and join our mission to bring hope and
                change
                to those in need - our HelpingHands team will get back to you shortly.</p>

        </div>
        <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
            @csrf
            <input type="text" name="name" placeholder="Name" required />
            <input type="email" name="email" placeholder="Email Address" required />
            <input type="text" name="subject" placeholder="Subject" required />
            <textarea name="message" placeholder="Message" required></textarea>
            <button type="submit">SUBMIT</button>

            @if (session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif
        </form>

    </section>

    <!-- Info Boxes -->
    <section class="info-boxes">
        <div class="info-box">
            <i class="fas fa-envelope icon"></i>
            <div class="info-text">
                <h4>Email</h4>
                <p>support@HelpingHands.com<br>contact@helpinghands.com</p>
            </div>
        </div>
        <div class="info-box">
            <i class="fas fa-phone icon"></i>
            <div class="info-text">
                <h4>Phone</h4>
                <p>9773414514</p>
            </div>
        </div>
        <div class="info-box">
            <i class="fas fa-map-marker-alt icon"></i>
            <div class="info-text">
                <h4>Address</h4>
                <p>Office :60, Centrum shopping centre Lokhandwala , Mumbai</p>
            </div>
        </div>
    </section>


    <!-- Office Visit Section -->
    <section class="visit-section">
        <div class="visit-left">
            <h2>Visit our office or<br>warehouse!</h2>
            <p>We welcome you to visit our HelpingHands office or warehouse to know more about our causes, see our work in
                action, or donate essentials directly. Your presence matters!</p>

            <button class="outline-btn">Get Directions</button>
        </div>
        <div class="visit-hours-wrapper">
            <div class="label">HOURS</div>
            <div class="visit-hours">
                <ul>
                    <li><strong>Monday – Friday</strong><br>9am – 5pm</li>
                    <li><strong>Saturdays</strong><br>11am – 5pm</li>
                    <li><strong>Sundays</strong><br>9am – 3pm</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section" id="faqs">
        <div class="faq-left">
            <h2>Frequently Asked Questions</h2>

            <div class="faq-item">
                <h4 class="faq-question">What services do you offer?</h4>
                <p class="faq-answer">We provide education, healthcare, food, and support to underprivileged communities.
                </p>
            </div>

            <div class="faq-item">
                <h4 class="faq-question">How can I volunteer?</h4>
                <p class="faq-answer">Fill out the volunteer form on our website and we'll get in touch with you.</p>
            </div>

            <div class="faq-item">
                <h4 class="faq-question">How do I donate?</h4>
                <p class="faq-answer">Visit our "Donate" page and choose your preferred payment method.</p>
            </div>

            <div class="faq-item">
                <h4 class="faq-question">Will I get a donation receipt?</h4>
                <p class="faq-answer">Yes, a receipt will be sent to your email after the donation.</p>
            </div>

            <div class="faq-item">
                <h4 class="faq-question">Is my donation tax-deductible?</h4>
                <p class="faq-answer">Yes, donations are eligible for tax benefits under Section 80G.</p>
            </div>

            <div class="faq-item">
                <h4 class="faq-question">How are donations used?</h4>
                <p class="faq-answer">Funds are used transparently for running programs and helping beneficiaries.</p>
            </div>

            <div class="faq-item">
                <h4 class="faq-question">How do I stay updated with your work?</h4>
                <p class="faq-answer">Follow us on social media or subscribe to our newsletter on the Volunteer page.</p>
            </div>
        </div>


        <div class="faq-right">
            <h3>Ask a different question</h3>
            <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
                @csrf
                <input type="text" name="name" placeholder="Name" required />
                <input type="email" name="email" placeholder="Email Address" required />
                <input type="text" name="subject" placeholder="Subject" required />
                <textarea name="message" placeholder="Message" required></textarea>
                <button type="submit">SUBMIT</button>

                @if (session('success'))
                    <p style="color: green;">{{ session('success') }}</p>
                @endif
            </form>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/Contactus.js') }}"></script>
@endpush
