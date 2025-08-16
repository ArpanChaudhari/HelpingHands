@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/participation.css') }}">
@endpush

@section('content')
    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif
    @if (isset($eventId))
        <input type="hidden" name="event_id" value="{{ $eventId }}">
    @endif


    <div class="event-details-wrapper">
        <div class="event-card">
            <h2><i class="fas fa-calendar-check"></i>
                Participate in:
                <span>{{ isset($event) ? $event->title : 'General Volunteering' }}</span>
            </h2>

            <form method="POST" action="{{ route('participate.submit') }}" class="participation-form">
                @csrf
                <input type="hidden" name="event_id" value="{{ isset($event) ? $event->id : 0 }}">

                <div class="form-group">
                    <label><i class="fas fa-user"></i> Name</label>
                    <input type="text" name="name"
                        value="{{ Auth::guard('volunteer')->check() ? Auth::guard('volunteer')->user()->name : '' }}"
                        {{ Auth::guard('volunteer')->check() ? 'readonly' : '' }} required>
                </div>

                <div class="form-group">
                    <label><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" name="email"
                        value="{{ Auth::guard('volunteer')->check() ? Auth::guard('volunteer')->user()->email : '' }}"
                        {{ Auth::guard('volunteer')->check() ? 'readonly' : '' }} required>
                </div>

                <div class="form-group">
                    <label><i class="fas fa-phone-alt"></i> Phone</label>
                    <input type="text" name="phone" required>
                </div>

                <button type="submit" class="btn-orange">
                    <i class="fas fa-check-circle"></i> Confirm Participation
                </button>
            </form>
        </div>
    </div>
@endsection
