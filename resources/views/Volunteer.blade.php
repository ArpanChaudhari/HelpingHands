@extends('layouts.app')

@section('title', 'Volunteer | HelpingHands')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Volunteer.css') }}">
@endpush

@section('content')
    <section class="volunteer-section">
        <h1>Volunteer</h1>
        <p class="intro">Volunteer support plays a vital role in strengthening and enriching the implementation of various
            services and activities across schools, NGOs, and other organizations. By contributing their diverse talents,
            skills, and experiences, volunteers add significant value to the overall mission and goals of the institution.
            Their active involvement enhances the effectiveness, reach, and quality of both co-curricular and
            community-focused initiatives, ultimately contributing to more inclusive and impactful outcomes.</p>

        <div class="volunteer-steps">
            <div class="step">
                <div class="icon"><img src="image/icon/Volunteer Registration.png"></div>
                <h3>Step 01</h3>
                <h4>Volunteer Registration</h4>
                <p>Register yourself as a volunteer (Individual, NGO or Organization) on the portal by providing some basic
                    personal particulars.</p>
            </div>

            <div class="step">
                <div class="icon"><img src="image/icon/Search Contribution Requests.png"></div>
                <h3>Step 02</h3>
                <h4>Search Contribution Requests</h4>
                <p>After successful registration, search the requests raised by the Organization to participate.</p>
            </div>

            <div class="step">
                <div class="icon"><img src="image/icon/Show Interest.png"></div>
                <h3>Step 03</h3>
                <h4>Show Interest</h4>
                <p>Also can express your interest in the requests raised by the school as per your area of interest.</p>
            </div>

            <div class="step">
                <div class="icon"><img src="image/icon/Confirmation by Event Manager.png"></div>
                <h3>Step 04</h3>
                <h4>Confirmation by Event Manager</h4>
                <p>Volunteer to wait for the confirmation from the beneficiary organizations. You'll be notified via text
                    and
                    email.</p>
            </div>

            <div class="step">
                <div class="icon"><img src="image/icon/ContributionParticipation.png"></div>
                <h3>Step 05</h3>
                <h4>Contribution/Participation</h4>
                <p>Volunteer can make contributions for services, activities, materials, or equipment.</p>
            </div>

            <div class="step">
                <div class="icon"><img src="image/icon/Contribution Successful  Feedback.png"></div>
                <h3>Step 06</h3>
                <h4>Contribution Successful / Feedback</h4>
                <p>After successful contribution, volunteers may submit their feedback.</p>
            </div>
        </div>
    </section>


    <!--why with us -->
    <section class="helping-section">
        <h1 class="helping-section-title">
            Why Volunteer With <span class="highlight-helping">HelpingHands</span>?
        </h1>
        <p class="helping-subtitle">
            Make every moment count by creating a lasting impact whether it’s during weekdays or weekends.
        </p>
        <p class="helping-subtext">
            With HelpingHands, you’re not just volunteering; you’re transforming lives, one step at a time.
        </p>

        <div class="helping-card-container">
            <!-- Card 1 -->
            <div class="helping-card">
                <div class="helping-icon"><i class="fas fa-book-open"></i></div>
                <div class="helping-title">Empower Children</div>
                <div class="helping-text">
                    Educate children in shelters and underserved communities
                </div>
                <div class="helping-badge">
                    <span></span> Weekend Volunteering
                </div>
            </div>

            <!-- Card 2 -->
            <div class="helping-card">
                <div class="helping-icon"><i class="fas fa-seedling"></i></div>
                <div class="helping-title">Protect Our Planet</div>
                <div class="helping-text">
                    Champion causes like environmental conservation and animal welfare.
                </div>
                <div class="helping-badge">
                    <span></span> Catalyse
                </div>
            </div>

            <!-- Card 3 -->
            <div class="helping-card">
                <div class="helping-icon"><i class="fas fa-users-cog"></i></div>
                <div class="helping-title">Lead the Change</div>
                <div class="helping-text">
                    Become part of our leadership programs to craft innovative social solutions.
                </div>
                <div class="helping-badge">
                    <span></span> Leadership Development
                </div>
            </div>
        </div>
    </section>


    <!-- become volunteer  -->
    @if (!Auth::guard('volunteer')->check())
        <section class="volunteer-interest-section">
            <h2 class="volunteer-title">Interested in Volunteering?</h2>
            <p class="volunteer-subtext">Join us and contribute your time for a good cause!</p>

            <a href="{{ route('participate.form', ['eventId' => 0]) }}" class="volunteer-button">
                <i class="fas fa-hands-helping"></i> Become a Volunteer
            </a>
        </section>
    @endif





    <!-- ongoing event-->
    <section class="ongoing-event-section">
        <div class="helping-section-title">
            <h2 class="sec-title">Ongoing Events</h2>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="event-scroll-container">

                    @foreach ($events as $event)
                        <div class="event-row">
                            <div class="event-date">
                                <h5>Application Last Date</h5>
                                <p>{{ \Carbon\Carbon::parse($event->application_last_date)->format('M d, Y') }}</p>
                                <h5>Activity Start Date</h5>
                                <p>{{ \Carbon\Carbon::parse($event->activity_start_date)->format('M d, Y') }}</p>
                            </div>
                            <div class="event-info">
                                <h4>{{ $event->title }}</h4>
                                <p>{{ $event->location }}</p>
                                <a href="{{ route('volunteer.events.show', $event->id) }}" class="btn btn-primary">View
                                    Details</a>
                            </div>
                            <div class="event-image">
                                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}">
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>



    <!-- success stories-->
    <section class="success-wrapper">
        <h2 class="success-heading">Success Stories</h2>

        <div class="success-cards">
            <!-- Card 1 -->
            <div class="success-card">
                <div class="success-badge">🏅</div>
                <p>Congratulations</p>
                <h3>Vineet Saini</h3>
                <p>on successful completion of <br><strong>Teaching Languages</strong></p>

                <div class="success-icon-text"><i class="fas fa-list"></i>Generic Level Activities</div>
                <div class="success-icon-text"><i class="fas fa-school"></i>Govt. Boys Sr. Sec. School, Gokalpur Village,
                    Delhi</div>
                <div class="success-icon-text"><i class="fas fa-map-marker-alt"></i>Gokalpur Village, Delhi</div>

                <div class="success-stars">★★★★★</div>
                <button class="success-button">View Details</button>
            </div>

            <!-- Card 2 -->
            <div class="success-card">
                <div class="success-badge">🎖️</div>
                <p>Congratulations</p>
                <h3>Meenu Sharma</h3>
                <p>on successful completion of <br><strong>Teaching Art & craft</strong></p>

                <div class="success-icon-text"><i class="fas fa-list"></i>Generic Level Activities</div>
                <div class="success-icon-text"><i class="fas fa-school"></i>Atal Adarsh Bengali Balika Sr. Secondary, New
                    Delhi</div>
                <div class="success-icon-text"><i class="fas fa-map-marker-alt"></i>Gole Market, New Delhi</div>

                <div class="success-stars">★★★★☆</div>
                <button class="success-button">View Details</button>
            </div>

            <!-- Card 3 -->
            <div class="success-card">
                <div class="success-badge">🏆</div>
                <p>Congratulations</p>
                <h3>Paridhi Sharma</h3>
                <p>on successful completion of <br><strong>Teaching Vocational Skills</strong></p>

                <div class="success-icon-text"><i class="fas fa-list"></i>Generic Level Activities</div>
                <div class="success-icon-text"><i class="fas fa-school"></i>Sarvodaya Kanya Vidyalaya, Block-B(AH), Delhi
                </div>
                <div class="success-icon-text"><i class="fas fa-map-marker-alt"></i>Shalimar Bagh, Delhi</div>

                <div class="success-stars">★★★★★</div>
                <button class="success-button">View Details</button>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/Volunteer.js') }}"></script>
@endpush
