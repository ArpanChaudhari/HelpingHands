<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use App\Models\Volunteer;
use App\Models\Donation;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $donorCount = Donor::count();
        $volunteerCount = Volunteer::count();

        $priorityTotal = Donation::sum('amount');
        $totalDonation = $priorityTotal;

        $recentDonors = Donation::latest()->take(5)->get();

        // Monthly donation chart data
        $monthlyDonations = [];
        for ($i = 1; $i <= 12; $i++) {
            $month = Carbon::create()->month($i)->format('M');
            $monthlyDonations[$month] = Donation::whereMonth('created_at', $i)->sum('amount');
        }

        // Donations by campaign type
        $campaignDonationTypes = [
            'Explore' => Donation::where('campaign_type', 'explore')->sum('amount'),
            'Priority' => Donation::where('campaign_type', 'priority')->sum('amount'),
            'General' => Donation::whereNull('campaign_type')->sum('amount'),
        ];

        return view('admin.dashboard', compact(
            'donorCount',
            'volunteerCount',
            'totalDonation',
            'recentDonors',
            'monthlyDonations',
            'campaignDonationTypes' // Pass to Blade
        ));
    }
}
