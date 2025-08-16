<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Campaign;
use App\Models\ExploreCampaign;
use App\Models\Donation;
use App\Mail\DonationConfirmation;
use Illuminate\Support\Facades\Mail;

class DonationController extends Controller
{
    // ✅ For priority/explore campaign donation
    public function store(Request $request, $slug)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'campaign_type' => 'required|in:priority,explore',
            'campaign_id' => 'required|integer',
        ]);

        // Get campaign by type
        if ($request->campaign_type === 'priority') {
            $campaign = \App\Models\Campaign::where('slug', $slug)->firstOrFail();
        } else {
            $campaign = \App\Models\ExploreCampaign::where('slug', $slug)->firstOrFail();
        }

        // Check donation goal limit
        if (
            $campaign->amount_raised >= $campaign->goal_amount ||
            ($campaign->amount_raised + $request->amount) > $campaign->goal_amount
        ) {
            return back()->with('error', 'Donation goal already reached!');
        }

        // Save donation
        $donation = new Donation();
        $donation->campaign_id = $campaign->id;
        $donation->campaign_type = $request->campaign_type;
        $donation->amount = $request->amount;

        if (Auth::guard('donor')->check()) {
            $donation->donor_id = Auth::guard('donor')->id();
            $donation->name = Auth::guard('donor')->user()->name;
            $donation->email = Auth::guard('donor')->user()->email;
            $donation->phone = $request->phone;
            $donation->nationality = $request->nationality;
        } else {
            $request->validate([
                'name' => 'required|string|max:100',
                'email' => 'required|email',
                'phone' => 'required|string|max:15',
                'nationality' => 'required|string',
            ]);
            $donation->name = $request->name;
            $donation->email = $request->email;
            $donation->phone = $request->phone;
            $donation->nationality = $request->nationality;
        }

        $donation->save();

        // Update campaign stats
        $campaign->amount_raised += $request->amount;
        $campaign->backers += 1;
        $campaign->progress = min(100, ($campaign->amount_raised / $campaign->goal_amount) * 100);
        $campaign->save();

        // Send notification email
        Mail::to($donation->email)->send(new DonationConfirmation($donation));

        return back()->with('success', 'Thanks for your donation!');
    }


    // ✅ For general donations (no campaign)
    public function storeGeneral(Request $request)
    {
        if (Auth::guard('donor')->check()) {
            $request->validate([
                'phone' => 'required|string',
                'nationality' => 'required|string',
                'amount' => 'required|integer|min:1',
            ]);

            $donor = Auth::guard('donor')->user();

            $donation = \App\Models\Donation::create([
                'donor_id' => $donor->id,
                'name' => $donor->name,
                'email' => $donor->email,
                'phone' => $request->phone,
                'nationality' => $request->nationality,
                'amount' => $request->amount,
                'campaign_id' => null,
                'campaign_type' => null,
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string',
                'nationality' => 'required|string',
                'amount' => 'required|integer|min:1',
            ]);

            $donation = \App\Models\Donation::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'nationality' => $request->nationality,
                'amount' => $request->amount,
                'campaign_id' => null,
                'campaign_type' => null,
            ]);
        }

        // ✅ Now $donation is defined correctly
        Mail::to($donation->email)->send(new DonationConfirmation($donation));

        return redirect()->to('/donate#donation-form')->with('success', 'Thank you for your donation!');
    }
}
