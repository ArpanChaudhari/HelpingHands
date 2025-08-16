@extends('layouts.admin')

@section('content')
    @if (!session('is_admin'))
        <script>window.location.href = "{{ route('admin.login') }}";</script>
        @php exit; @endphp
    @endif

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-gray-800">All Priority Campaigns</h2>
        <a href="{{ route('admin.campaigns.create') }}"
            class="inline-block bg-orange-500 text-white px-5 py-2 rounded hover:bg-orange-600 transition duration-200 shadow-md">
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
                    <th class="px-6 py-3 text-left">Goal</th>
                    <th class="px-6 py-3 text-left">Raised</th>
                    <th class="px-6 py-3 text-left">Backers</th>
                    <th class="px-6 py-3 text-left">Progress</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm divide-y divide-gray-100">
                @foreach ($campaigns as $campaign)
                    <tr class="campaign-row hover:bg-orange-50 transition cursor-pointer" data-id="{{ $campaign->id }}">
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $campaign->image) }}" alt="Image"
                                class="w-20 h-14 object-cover rounded border border-gray-300 shadow-sm">
                        </td>
                        <td class="px-6 py-4 font-semibold">{{ $campaign->title }}</td>
                        <td class="px-6 py-4 font-medium text-orange-600">₹{{ number_format($campaign->goal_amount) }}</td>
                        <td class="px-6 py-4 font-medium text-green-600">₹{{ number_format($campaign->amount_raised) }}</td>
                        <td class="px-6 py-4">{{ $campaign->backers }}</td>
                        <td class="px-6 py-4">
                            <div class="w-full bg-gray-200 rounded-full h-3 mb-1">
                                <div class="bg-orange-500 h-3 rounded-full" style="width: {{ $campaign->progress }}%"></div>
                            </div>
                            <span class="text-xs text-gray-600 font-semibold">{{ $campaign->progress }}%</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.campaigns.edit', $campaign->id) }}"
                                    class="text-orange-600 hover:underline text-sm font-medium">
                                    <i class="fas fa-edit mr-1"></i>Edit
                                </a>
                                <form action="{{ route('admin.campaigns.destroy', $campaign->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm font-medium">
                                        <i class="fas fa-trash-alt mr-1"></i>Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.campaign-row').forEach(row => {
        row.addEventListener('click', function (e) {
            // ignore if clicking on a button or link
            if (
                e.target.closest('a') ||
                e.target.closest('form') ||
                e.target.closest('button') ||
                e.target.tagName === 'BUTTON'
            ) return;

            const id = this.getAttribute('data-id');
            window.location.href = `/admin/campaigns/${id}/donors`;
        });
    });
</script>
@endpush
