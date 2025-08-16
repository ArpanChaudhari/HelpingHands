@extends('layouts.app')

@push('styles')
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: #fff;
            color: #333;
            overflow-x: hidden;
        }

        .donation-wrapper {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            border: 1px solid #ff7a00;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            font-family: 'Segoe UI', sans-serif;
        }

        .donation-wrapper h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .donation-wrapper input[type="text"],
        .donation-wrapper input[type="email"],
        .donation-wrapper input[type="number"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        .donation-wrapper .radio-group {
            display: flex;
            justify-content: space-between;
            margin: 10px 0 20px;
        }

        .donation-wrapper .radio-option {
            flex: 1;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 6px;
            text-align: center;
            margin: 0 5px;
            cursor: pointer;
        }

        .donation-wrapper .radio-option input {
            margin-right: 8px;
        }

        .donation-wrapper button {
            width: 100%;
            background: #f4511e;
            border: none;
            color: white;
            font-size: 18px;
            padding: 14px;
            border-radius: 8px;
            cursor: pointer;
        }

        .donation-wrapper button:hover {
            background: #d63a0d;
        }

        .error-box {
            margin-bottom: 15px;
            background: #ffe5e5;
            padding: 10px;
            border-radius: 5px;
            color: #c00;
        }

        .success-message {
            background-color: #e6f4ea;
            color: #207744;
            padding: 15px 40px;
            margin: 20px auto;
            max-width: 600px;
            border-left: 6px solid #0c4715;
            border-radius: 8px;
            font-weight: bold;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            font-size: 18px;
        }
    </style>
@endpush

@section('content')
    <div class="donation-wrapper">
        <h2>Support: {{ $campaign->title }}</h2>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ url()->current() }}">
            @csrf

            {{-- Campaign Type: priority or explore --}}
            <input type="hidden" name="campaign_type"
                value="{{ get_class($campaign) == 'App\\Models\\ExploreCampaign' ? 'explore' : 'priority' }}">
            <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">

            @guest('donor')
                {{-- Guest: Full Form --}}
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="text" name="phone" placeholder="Mobile Number (10 digit)" required>

                <div class="radio-group">
                    <label class="radio-option">
                        <input type="radio" name="nationality" value="indian" checked>
                        I'm An Indian National
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="nationality" value="non-indian">
                        I'm Not An Indian National
                    </label>
                </div>
            @else
                {{-- Logged-in Donor --}}
                <div style="margin-bottom: 15px; font-size: 16px;">
                    <strong>Name:</strong> {{ auth('donor')->user()->name }}
                </div>

                <input type="text" name="phone" placeholder="Mobile Number (10 digit)" required>

                <div class="radio-group">
                    <label class="radio-option">
                        <input type="radio" name="nationality" value="indian" checked>
                        I'm An Indian National
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="nationality" value="non-indian">
                        I'm Not An Indian National
                    </label>
                </div>
            @endguest


            <input type="number" name="amount" placeholder="Enter donation amount (e.g. 500)" required>

            <button type="submit">Continue to Donate</button>
        </form>
    </div>
@endsection
