@extends('layouts.app') {{-- or your actual layout --}}

@section('content')
    <div class="campaigns-container">
        @foreach ($campaigns as $campaign)
            <div class="cause-card">
                <div class="cause-image">
                    <img src="{{ asset('storage/' . $campaign->image) }}" alt="{{ $campaign->title }}" />
                </div>
                <div class="cause-title">{{ $campaign->title }}</div>
                <div class="card-body">
                    <div class="fund-info">
                        <div class="raised">
                            <strong>₹{{ number_format($campaign->amount_raised) }}</strong>
                            <span> raised of ₹{{ number_format($campaign->goal_amount) }}</span>
                        </div>
                        <div class="backers"><i class="fas fa-user icon"></i><strong>{{ $campaign->backers }}</strong><span>
                                Backers</span></div>
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
@endsection
