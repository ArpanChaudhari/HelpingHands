@extends('layouts.app') {{-- ya layouts.main --}}

@section('content')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

    <div class="profile-container">
        <h2 class="profile-heading"><i class="fas fa-user-circle"></i> My Profile</h2>

        <div class="profile-card">
            <div class="profile-icon">
                <i class="fas fa-user-circle"></i>
            </div>
            <div class="profile-details">
                <h3>{{ $donor->name }}</h3>
                <p><i class="fas fa-envelope"></i> {{ $donor->email }}</p>
                <p><i class="fas fa-phone-alt"></i> {{ $donor->phone ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="impact-section">
            <h3 class="impact-heading"><i class="fas fa-chart-line"></i> My Impact</h3>
            <div class="impact-cards">
                <div class="impact-card orange">
                    <i class="fas fa-hand-holding-heart"></i>
                    <h4>₹{{ $totalDonations }}</h4>
                    <p>Total Donations</p>
                </div>
                <div class="impact-card purple">
                    <i class="fas fa-heart"></i>
                    <h4>{{ $campaignsSupported }}</h4>
                    <p>Campaigns Supported</p>
                </div>
            </div>
        </div>
    </div>

    @if ($donations->isNotEmpty())
        <div class="campaigns-table-section">
            <h3 class="impact-heading"><i class="fas fa-donate"></i> Donation History</h3>
            <div class="campaigns-table-wrapper">
                <table class="campaigns-table">
                    <thead>
                        <tr>
                            <th>Campaign</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donations as $donation)
                            @php
                                $campaign = null;
                                if ($donation->campaign_type === 'priority') {
                                    $campaign = \App\Models\Campaign::find($donation->campaign_id);
                                } elseif ($donation->campaign_type === 'explore') {
                                    $campaign = \App\Models\ExploreCampaign::find($donation->campaign_id);
                                }
                            @endphp
                            <tr>
                                <td>{{ $campaign->title ?? 'General Donation' }}</td>
                                <td>{{ ucfirst($donation->campaign_type ?? 'General') }}</td>
                                <td>₹{{ $donation->amount }}</td>
                                <td>{{ $donation->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
