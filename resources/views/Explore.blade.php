@extends('layouts.app')

@section('title', 'Explore | HelpingHands')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/Explore.css') }}">
@endpush

@section('content')
<!-- COMPAIGNS-->
    <section class="campaigns-section">
    <h1>Explore Campaigns</h1>

    <div class="filter-buttons">
        @php
            $categories = ['all', 'animal', 'children', 'elderly', 'faith', 'disaster', 'hunger', 'education', 'women', 'medical'];
        @endphp
        @foreach($categories as $category)
            <button onclick="filterCards('{{ $category }}')" class="{{ $category === 'all' ? 'active' : '' }}">
                <i class="fas fa-{{ match($category) {
                    'all' => 'layer-group',
                    'animal' => 'paw',
                    'children' => 'child',
                    'elderly' => 'blind',
                    'faith' => 'praying-hands',
                    'disaster' => 'house-damage',
                    'hunger' => 'utensils',
                    'education' => 'book-open',
                    'women' => 'female',
                    'medical' => 'heartbeat',
                } }}"></i>
                <span>{{ ucfirst($category) }}</span>
            </button>
        @endforeach
    </div>

    {{-- Yahan dynamic cards show honge --}}
    @include('explorecampaigns.index', ['campaigns' => $campaigns])
</section>
@endsection

@push('scripts')
<script src="{{ asset('js/Explore.js') }}"></script>
@endpush
