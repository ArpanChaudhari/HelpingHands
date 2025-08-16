@extends('layouts.admin')

@section('content')
    <h1 class="text-3xl font-extrabold text-orange-600 mb-6">✏️ Edit Explore Campaign</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-5">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.explore.update', $campaign->id) }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-8 rounded-xl shadow-lg space-y-6 w-full max-w-3xl">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 font-semibold mb-1">
                <i class="fas fa-heading mr-1 text-orange-500"></i> Title
            </label>
            <input type="text" name="title" value="{{ $campaign->title }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-orange-400 focus:outline-none" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-1">
                <i class="fas fa-align-left mr-1 text-orange-500"></i> Description
            </label>
            <textarea name="description" rows="5" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-orange-400 focus:outline-none" required>{{ $campaign->description }}</textarea>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-1">
                <i class="fas fa-bullseye mr-1 text-orange-500"></i> Goal Amount (₹)
            </label>
            <input type="number" name="goal_amount" value="{{ $campaign->goal_amount }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-orange-400 focus:outline-none" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-1">
                <i class="fas fa-image mr-1 text-orange-500"></i> Change Image
            </label>
            <input type="file" name="image" accept="image/*" class="w-full mt-1 border border-gray-300 rounded-lg p-2">

            @if ($campaign->image)
                <div class="mt-3">
                    <p class="text-sm text-gray-600 mb-1">Current Image:</p>
                    <img src="{{ asset($campaign->image) }}" alt="Current Image" class="h-24 rounded shadow-md">
                </div>
            @endif
        </div>

        <div class="pt-2">
            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition">
                <i class="fas fa-check-circle mr-2"></i> Update Campaign
            </button>
        </div>
    </form>
@endsection
