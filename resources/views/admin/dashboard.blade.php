@extends('layouts.admin')

@section('content')
    @if (!session('is_admin'))
        <script>
            window.location.href = "{{ route('admin.login') }}";
        </script>
        @php exit; @endphp
    @endif

    <h1 class="text-4xl font-extrabold text-gray-800 mb-10">Admin Dashboard</h1>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <!-- Donors -->
        <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-user-friends text-orange-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-800">Total Donors</p>
                    <h2 class="text-3xl font-semibold text-orange-600">{{ $donorCount }}</h2>
                </div>
            </div>
        </div>

        <!-- Volunteers -->
        <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-hands-helping text-orange-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-800">Total Volunteers</p>
                    <h2 class="text-3xl font-semibold text-orange-600">{{ $volunteerCount }}</h2>
                </div>
            </div>
        </div>

        <!-- Donations -->
        <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-donate text-orange-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-800">Total Donations</p>
                    <h2 class="text-3xl font-semibold text-orange-600">₹{{ number_format($totalDonation) }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="flex flex-col lg:flex-row gap-6 mb-8">
        <!-- Left Section (75%) -->
        <div class="w-full lg:w-3/4 bg-white p-6 rounded-2xl shadow-md flex gap-6 h-[320px] items-start">
            <!-- Bar Chart (60%) -->
            <div class="w-[60%] flex flex-col">
                <h2 class="text-lg font-semibold text-gray-800 mb-3">Monthly Donation Analytics</h2>
                <div class="flex-grow flex items-center">
                    <canvas id="donationChart" class="w-full h-[200px]"></canvas>
                </div>
            </div>

            <!-- Donut Chart (40%) -->
            <div class="w-[40%] flex flex-col items-start">
                <h2 class="text-lg font-semibold text-gray-800 mb-3">Donor Type</h2>
                <div class="w-full max-w-[220px] h-[220px] mx-auto flex items-center justify-center">
                    <canvas id="donorTypeChart" class="w-full h-full"></canvas>
                </div>
            </div>
        </div>

        <!-- Right Section (25%) -->
        <div class="w-full lg:w-1/4 bg-white p-4 rounded-2xl shadow-md h-[320px] flex flex-col">
            <h2 class="text-lg font-semibold text-gray-800 mb-3">Donations by Campaign Type</h2>
            <div class="flex-grow flex items-center justify-center">
                <canvas id="volunteerPieChart" class="w-full h-full"></canvas>
            </div>
        </div>
    </div>




    <!-- Recent Donors -->
    <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition mt-8">
        <div class="flex items-center gap-4 mb-4">
            <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                <i class="fas fa-clock text-orange-600 text-lg"></i>
            </div>
            <h2 class="text-lg font-semibold text-gray-800">Recent Donors</h2>
        </div>
        <ul class="max-h-60 overflow-y-auto space-y-3">
            @forelse ($recentDonors as $donor)
                <li class="flex justify-between items-center border-b pb-2">
                    <span class="text-gray-800">{{ $donor->name ?? 'Registered Donor' }}</span>
                    <span class="font-semibold text-orange-600">₹{{ $donor->amount }}</span>
                </li>
            @empty
                <li class="text-gray-500">No recent donations</li>
            @endforelse
        </ul>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Bar Chart - Monthly Donations
        new Chart(document.getElementById('donationChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_keys($monthlyDonations)) !!},
                datasets: [{
                    label: 'Total Donations (₹)',
                    data: {!! json_encode(array_values($monthlyDonations)) !!},
                    backgroundColor: 'rgba(255, 115, 0, 0.7)',
                    borderColor: 'rgba(255, 115, 0, 1)',
                    borderWidth: 1,
                    borderRadius: 5,
                    barPercentage: 0.8,
                    categoryPercentage: 0.8,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            padding: 5
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f0f0f0',
                            drawTicks: false,
                            drawBorder: false,
                        },
                        ticks: {
                            stepSize: 5000,
                            maxTicksLimit: 5,
                            padding: 5,
                            callback: value => value >= 1000 ? (value / 1000) + 'k' : value
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Donut Chart - Donor Type
        new Chart(document.getElementById('donorTypeChart'), {
            type: 'doughnut',
            data: {
                labels: ['One-Time', 'Recurring'],
                datasets: [{
                    data: [70, 30],
                    backgroundColor: ['#F97316', '#FDBA74'],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#444',
                            boxWidth: 20,
                            padding: 15
                        }
                    }
                }
            }
        });

        // Pie Chart - Donations by Campaign Type
        new Chart(document.getElementById('volunteerPieChart'), {
            type: 'pie',
            data: {
                labels: {!! json_encode(array_keys($campaignDonationTypes)) !!},
                datasets: [{
                    label: 'Donations (₹)',
                    data: {!! json_encode(array_values($campaignDonationTypes)) !!},
                    backgroundColor: [
                        '#F97316', // Explore
                        '#FDBA74', // Priority
                        '#FB923C' // General
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            boxWidth: 15,
                            padding: 10
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.parsed || 0;
                                return `${label}: ₹${value.toLocaleString()}`;
                            }
                        }
                    }
                }
            }
        });
    </script>
@endpush
