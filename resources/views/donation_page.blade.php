@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/donation.css') }}">
@endpush

@section('content')
    <div class="donation-detail-page">
        <div class="donation-layout">
            {{-- Campaign Image --}}
            <div class="donation-image">
                <img src="{{ asset('storage/' . $campaign->image) }}" alt="{{ $campaign->title }}">
            </div>

            {{-- Stats & Actions --}}
            <div class="donation-info">
                <h2>{{ $campaign->title }}</h2>

                <div class="amount-raised">
                    <strong>₹{{ number_format($campaign->amount_raised) }}</strong> raised of
                    ₹{{ number_format($campaign->goal_amount) }} goal
                </div>

                <div class="backers-info">
                    <i class="fas fa-user"></i>
                    <span>{{ $campaign->backers }} Backers</span>
                </div>

                <div class="progress-bar">
                    <div class="progress" style="width: {{ $campaign->progress }}%"></div>
                </div>

                <form method="GET" action="{{ route('donate.fill', $campaign->slug) }}">
                    <button type="submit" class="btn-donate">Donate Now</button>
                </form>

                @if (session('success'))
                    <div class="success-message">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>

        {{-- Campaign Description --}}
        <div class="fundraiser-description">
            <h3>About the Fundraiser</h3>
            <p>{{ $campaign->description }}</p>
        </div>
    </div>
@endsection
