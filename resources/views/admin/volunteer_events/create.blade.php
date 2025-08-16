@extends('layouts.admin')

@section('content')
    <h1 class="text-3xl font-extrabold text-orange-600 mb-6">➕ Create Volunteer Event</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-5">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.volunteer-events.store') }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-8 rounded-xl shadow-lg space-y-6 w-full max-w-3xl">
        @csrf

        <!-- Title -->
        <div>
            <label class="block text-gray-700 font-semibold mb-1">
                <i class="fas fa-heading mr-1 text-orange-500"></i> Title
            </label>
            <input type="text" name="title" value="{{ old('title') }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-orange-400 focus:outline-none"
                required>
        </div>

        <!-- Location -->
        <div>
            <label class="block text-gray-700 font-semibold mb-1">
                <i class="fas fa-map-marker-alt mr-1 text-orange-500"></i> Location
            </label>
            <input type="text" name="location" value="{{ old('location') }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-orange-400 focus:outline-none"
                required>
        </div>

        <!-- Start Date & Time -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-1">
                    <i class="fas fa-calendar-day mr-1 text-orange-500"></i> Activity Start Date
                </label>
                <input type="date" name="activity_start_date" value="{{ old('activity_start_date') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-orange-400 focus:outline-none"
                    required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">
                    <i class="fas fa-clock mr-1 text-orange-500"></i> Event Time
                </label>
                <input type="time" name="event_time" value="{{ old('event_time') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-orange-400 focus:outline-none"
                    required>
            </div>
        </div>

        <!-- Duration -->
        <div>
            <label class="block text-gray-700 font-semibold mb-1">
                <i class="fas fa-hourglass-half mr-1 text-orange-500"></i> Duration
            </label>
            <input type="text" name="duration" value="{{ old('duration') }}"
                placeholder="e.g. 3 hours, 1 day"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-orange-400 focus:outline-none"
                required>
        </div>

        <!-- Application Last Date -->
        <div>
            <label class="block text-gray-700 font-semibold mb-1">
                <i class="fas fa-hourglass-end mr-1 text-orange-500"></i> Application Last Date
            </label>
            <input type="date" name="application_last_date" value="{{ old('application_last_date') }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-orange-400 focus:outline-none"
                required>
        </div>

        <!-- Event Banner -->
        <div>
            <label class="block text-gray-700 font-semibold mb-1">
                <i class="fas fa-image mr-1 text-orange-500"></i> Event Banner/Image
            </label>
            <input type="file" name="image" accept="image/*"
                class="w-full mt-1 border border-gray-300 rounded-lg p-2" required>
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button type="submit"
                class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition">
                <i class="fas fa-plus-circle mr-2"></i> Create Volunteer Event
            </button>
        </div>
    </form>
@endsection
