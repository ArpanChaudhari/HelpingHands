@extends('layouts.admin')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h2 class="text-2xl font-bold" style="color: #0e4037;">
            Donors for Campaign: <span class="text-orange-600">{{ $campaign->title }}</span>
        </h2>

        <a href="{{ route('admin.campaigns.index') }}"
            class="inline-flex items-center px-4 py-2 bg-orange-100 text-orange-700 text-sm font-medium rounded hover:bg-orange-200 transition duration-200 shadow-sm">
            <i class="fas fa-arrow-left mr-2"></i> Back to Campaigns
        </a>
    </div>


    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow border border-gray-200">
            <thead class="bg-orange-100 text-gray-800 text-sm uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-3 text-left">Name</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-left">Phone</th>
                    <th class="px-6 py-3 text-left">Amount</th>
                    <th class="px-6 py-3 text-left">Date</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm divide-y divide-gray-100">
                @forelse ($donations as $donation)
                    <tr class="font-medium text-gray-800">
                        <td class="px-6 py-4">{{ $donation->name ?? ($donation->donor->name ?? 'N/A') }}</td>
                        <td class="px-6 py-4">{{ $donation->email ?? ($donation->donor->email ?? 'N/A') }}</td>
                        <td class="px-6 py-4">{{ $donation->phone ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-green-800 font-semibold">₹{{ number_format($donation->amount) }}</td>
                        <td class="px-6 py-4 text-gray-800">{{ $donation->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 py-4 font-medium">No donations yet for this
                            campaign.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
