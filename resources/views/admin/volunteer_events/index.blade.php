@extends('layouts.admin')

@section('content')
    @if (!session('is_admin'))
        <script>
            window.location.href = "{{ route('admin.login') }}";
        </script>
        @php exit; @endphp
    @endif

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">All Volunteer Events</h1>
        <a href="{{ route('admin.volunteer-events.create') }}"
            class="inline-block bg-orange-600 hover:bg-green-700 text-white px-5 py-2 rounded shadow transition">
            <i class="fas fa-plus-circle mr-1"></i> Add New Event
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow border border-gray-200">
            <thead class="bg-orange-100 text-gray-800 text-sm uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-3 text-left">Title</th>
                    <th class="px-6 py-3 text-left">Location</th>
                    <th class="px-6 py-3 text-left">Start Date</th>
                    <th class="px-6 py-3 text-left">Duration</th>
                    <th class="px-6 py-3 text-left">Last Date to Apply</th>
                    <th class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>

            <tbody class="text-gray-700 text-sm divide-y divide-gray-100">
                @forelse ($events as $event)
                    <tr class="volunteer-event-row hover:bg-orange-50 transition cursor-pointer font-semibold"
                        data-id="{{ $event->id }}">

                        <td class="px-6 py-4">{{ $event->title }}</td>
                        <td class="px-6 py-4">{{ $event->location }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($event->activity_start_date)->format('d M, Y') }}</td>
                        <td class="px-6 py-4">{{ $event->duration }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($event->application_last_date)->format('d M, Y') }}</td>

                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center space-x-4">
                                <a href="{{ route('admin.volunteer-events.edit', $event->id) }}"
                                    class="text-yellow-600 hover:underline text-sm font-bold flex items-center"
                                    onclick="event.stopPropagation();">
                                    <i class="fas fa-edit mr-1"></i>Edit
                                </a>
                                <form action="{{ route('admin.volunteer-events.destroy', $event->id) }}" method="POST"
                                    onsubmit="event.stopPropagation(); return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:underline text-sm font-bold flex items-center">
                                        <i class="fas fa-trash-alt mr-1"></i>Delete
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500 font-medium">
                            No volunteer events found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.volunteer-event-row').forEach(row => {
        row.addEventListener('click', function (e) {
            // prevent row click if user clicked on button/link inside it
            if (
                e.target.closest('a') ||
                e.target.closest('form') ||
                e.target.closest('button') ||
                e.target.tagName === 'BUTTON'
            ) return;

            const id = this.getAttribute('data-id');
            window.location.href = `/admin/volunteer-events/${id}/participants`;
        });
    });
</script>
@endpush
