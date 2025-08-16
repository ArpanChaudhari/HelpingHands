@extends('layouts.admin')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h2 class="text-2xl font-bold" style="color: #0e4037;">
            Participants for Event: <span class="text-orange-600">{{ $event->title }}</span>
        </h2>

        <a href="{{ route('admin.volunteer-events.index') }}"
            class="inline-flex items-center px-4 py-2 bg-orange-100 text-orange-700 text-sm font-medium rounded hover:bg-orange-200 transition duration-200 shadow-sm">
            <i class="fas fa-arrow-left mr-2"></i> Back to Events
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
            <thead class="bg-orange-100 text-gray-800 text-sm uppercase tracking-wide">
                <tr>
                    <th class="px-6 py-3 text-left">Name</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-left">Phone</th>
                    <th class="px-6 py-3 text-left">Applied On</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700 divide-y divide-gray-100">
                @forelse ($participants as $p)
                    <tr class="hover:bg-orange-50 transition font-semibold">
                        <td class="px-6 py-4 text-gray-700">{{ $p->name }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $p->email }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $p->phone }}</td>
                        <td class="px-6 py-4 text-gray-800">{{ $p->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-gray-800 py-5 font-semibold">
                            No participants found for this event.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
