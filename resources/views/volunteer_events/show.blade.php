@extends('layouts.app')

@section('content')
    <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset('css/event-details.css') }}">
    <!-- FontAwesome (ensure it's loaded in layouts.app, or include here if needed) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <section class="event-details">
        <div class="event-container">

            <!-- Name & Address -->
            <div>
                <h2><i class="fas fa-map-marker-alt icon"></i> Name & Address</h2>
                <div class="event-address">
                    {{ $event->location }}
                </div>
            </div>

            <!-- Activity Details -->
            <div>
                <h2><i class="fas fa-clipboard-list icon"></i> Activity Details:</h2>
                <table class="event-table">
                    <tbody>
                        <tr>
                            <th><i class="fas fa-leaf"></i> Activity Category</th>
                            <td>{{ $event->category ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-bullhorn"></i> Activity Name</th>
                            <td>{{ $event->title }}</td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-calendar-alt"></i> Tentative Start Date</th>
                            <td>{{ \Carbon\Carbon::parse($event->activity_start_date)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-calendar-times"></i> Activity Close Date</th>
                            <td>--</td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-clock"></i> Application Last Date</th>
                            <td>{{ \Carbon\Carbon::parse($event->application_last_date)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-hourglass-half"></i> Duration</th>
                            <td>{{ $event->duration ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-info-circle"></i> Activity Details</th>
                            <td>{{ $event->details ?? 'N/A' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Volunteer Eligibility -->
            <div>
                <h2><i class="fas fa-user-check icon"></i> Volunteer Eligibility Criteria:</h2>
                <table class="event-table">
                    <tbody>
                        <tr>
                            <th><i class="fas fa-graduation-cap"></i> Qualification</th>
                            <td>{{ $event->qualification ?? 'Any' }}</td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-venus-mars"></i> Gender</th>
                            <td>{{ $event->gender ?? 'Any' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Participate Button -->
            <a href="{{ route('participate.form', $event->id) }}">
                <button class="participate-btn">Participate</button>
            </a>


        </div>
    </section>
@endsection
