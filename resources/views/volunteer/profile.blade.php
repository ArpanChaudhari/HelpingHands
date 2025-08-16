@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/volunteer_profile.css') }}">
@endpush

@section('content')
    <div class="profile-container">
        <h2 class="profile-heading"><i class="fas fa-user-circle"></i> Volunteer Profile</h2>

        <div class="profile-row">
            <!-- Profile Card -->
            <div class="col-md-6">
                <div class="profile-card">
                    <div class="profile-icon">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="profile-details">
                        <h3>{{ $volunteer->name }}</h3>
                        <p><i class="fas fa-envelope"></i> {{ $volunteer->email }}</p>
                    </div>
                </div>
            </div>

            <!-- Impact Card -->
            <div class="col-md-6">
                <div class="impact-card orange">
                    <i class="fas fa-handshake"></i>
                    <h4>{{ $totalParticipations }}</h4>
                    <p>Events Participated</p>
                </div>
            </div>
        </div>


        <!-- Participation History -->
        <div class="history-section mt-5">
            <h3 class="impact-heading"><i class="fas fa-history"></i> Participation History</h3>

            @if ($participations->isEmpty())
                <p>No participation yet.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-3">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Event Title</th>
                                <th>Date Participated</th>
                                <th>Event Location</th> <!-- 👈 changed -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($participations as $index => $p)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $p->event->title ?? 'N/A' }}</td>
                                    <td>{{ $p->created_at->format('d M Y') }}</td>
                                    <td>{{ $p->event->location ?? 'N/A' }}</td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    </div>
@endsection
