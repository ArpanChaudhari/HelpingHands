<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Donation;
use App\Models\Campaign;
use App\Models\ExploreCampaign;

class ProfileController extends Controller
{

    public function index()
    {
        if (!Auth::guard('donor')->check()) {
            return redirect()->route('donor.login.form');
        }

        $donor = Auth::guard('donor')->user();
        $donorEmail = $donor->email;

        $totalDonations = Donation::where('email', $donorEmail)->sum('amount');

        $donations = Donation::where('email', $donorEmail)->orderBy('created_at', 'desc')->get();

        $campaigns = collect();

        foreach ($donations as $donation) {
            if ($donation->campaign_type === 'priority') {
                $campaign = Campaign::find($donation->campaign_id);
            } elseif ($donation->campaign_type === 'explore') {
                $campaign = ExploreCampaign::find($donation->campaign_id);
            } else {
                $campaign = null;
            }

            if ($campaign) {
                $campaigns->push($campaign);
            }
        }

        $campaigns = $campaigns->unique('id')->values();
        $campaignsSupported = $campaigns->count();

        return view('donor.profile', compact(
            'donor',
            'totalDonations',
            'campaignsSupported',
            'campaigns',
            'donations'
        ));
    }
}
