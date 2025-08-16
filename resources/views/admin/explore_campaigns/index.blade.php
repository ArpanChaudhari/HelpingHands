@extends('layouts.admin')

@section('content')
    @if (!session('is_admin'))
        <script>
            window.location.href = "{{ route('admin.login') }}";
        </script>
        @php exit; @endphp
    @endif

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">All Explore Campaigns</h1>
        <a href="{{ route('admin.explore.create') }}"
            class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded shadow transition">
            <i class="fas fa-plus-circle mr-1"></i> Add New Campaign
        </a>
    </div>

    @if (session('success'))
        <div class="bg-orange-100 border border-orange-400 text-orange-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow border border-gray-200">
            <thead class="bg-orange-100 text-gray-800 text-sm uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-3 text-left">Image</th>
                    <th class="px-6 py-3 text-left">Title</th>
                    <th class="px-6 py-3 text-center">Goal</th>
                    <th class="px-6 py-3 text-center">Raised</th>
                    <th class="px-6 py-3 text-center">Backers</th>
                    <th class="px-6 py-3 text-center">Progress</th>
                    <th class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm divide-y divide-gray-100">
                @forelse ($campaigns as $campaign)
                    <tr class="campaign-row hover:bg-orange-50 transition cursor-pointer"
                        data-id="{{ $campaign->id }}">
                        <td class="px-6 py-4">
                            <img src="{{ asset(str_replace(' ', '%20', $campaign->image)) }}"
                                alt="{{ $campaign->title }}"
                                class="w-20 h-14 object-cover rounded border shadow-sm">
                        </td>
                        <td class="px-6 py-4 font-semibold">{{ $campaign->title }}</td>
                        <td class="px-6 py-4 text-center text-orange-600 font-medium">
                            ₹{{ number_format($campaign->goal_amount) }}
                        </td>
                        <td class="px-6 py-4 text-center text-green-600 font-medium">
                            ₹{{ number_format($campaign->amount_raised) }}
                        </td>
                        <td class="px-6 py-4 text-center">{{ $campaign->backers }}</td>
                        <td class="px-6 py-4 text-center">
                            <div class="w-full bg-gray-200 rounded-full h-3 mb-1">
                                <div class="bg-orange-500 h-3 rounded-full" style="width: {{ $campaign->progress }}%">
                                </div>
                            </div>
                            <span class="text-xs text-gray-600 font-semibold">{{ $campaign->progress }}%</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center space-x-2">
                                <a href="{{ route('admin.explore.edit', $campaign->id) }}"
                                    onclick="event.stopPropagation();"
                                    class="text-orange-600 hover:underline text-sm font-medium">
                                    <i class="fas fa-edit mr-1"></i>Edit
                                </a>
                                <form action="{{ route('admin.explore.destroy', $campaign->id) }}" method="POST"
                                    onsubmit="event.stopPropagation(); return confirm('Are you sure?')"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm font-medium">
                                        <i class="fas fa-trash-alt mr-1"></i>Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                            No explore campaigns added yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.campaign-row').forEach(row => {
        row.addEventListener('click', function (e) {
            // Ignore if clicking on edit/delete
            if (
                e.target.closest('a') ||
                e.target.closest('form') ||
                e.target.closest('button')
            ) return;

            const id = this.getAttribute('data-id');
            window.location.href = `/admin/explore/${id}/donors`;
        });
    });
</script>
@endpush
