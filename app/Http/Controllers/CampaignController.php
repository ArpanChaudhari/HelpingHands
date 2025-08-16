<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    // Show all campaign cards on the page
    public function index()
    {
        $campaigns = Campaign::orderBy('id', 'desc')->get();
        return view('campaigns.index', compact('campaigns'));
    }

    // Homepage
    public function homepage()
    {
        $campaigns = Campaign::orderBy('id', 'desc')->get();
        return view('helping', compact('campaigns'));
    }

    // Show donation page with image + progress
    public function show($slug)
    {
        $campaign = Campaign::where('slug', $slug)->firstOrFail();
        return view('donation_page', compact('campaign'));
    }

    // Show detailed form to fill (after clicking Donate Now)
    public function showForm($slug)
    {
        $campaign = Campaign::where('slug', $slug)->firstOrFail();
        return view('fill_donation', compact('campaign'));
    }

    // Handle actual donation form POST
    public function donate(Request $request, $slug)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'name' => 'required_if:donor_id,null',
            'email' => 'required_if:donor_id,null|email',
            'phone' => 'required_if:donor_id,null',
            'nationality' => 'required_if:donor_id,null',
        ]);

        $campaign = Campaign::where('slug', $slug)->firstOrFail();

        $goal = $campaign->goal_amount;

        if ($campaign->amount_raised >= $goal || ($campaign->amount_raised + $request->amount) > $goal) {
            return redirect()->back()->with('error', 'Donation goal already reached!');
        }

        // ✅ Store in donations table
        $donation = new Donation();
        $donation->campaign_id = $campaign->id;
        $donation->amount = $request->amount;

        if (Auth::guard('donor')->check()) {
            $donation->donor_id = Auth::guard('donor')->id();
        } else {
            $donation->name = $request->name;
            $donation->email = $request->email;
            $donation->phone = $request->phone;
            $donation->nationality = $request->nationality;
        }

        $donation->save();

        // ✅ Update campaign stats
        $campaign->amount_raised += $request->amount;
        $campaign->progress = min(100, ($campaign->amount_raised / $goal) * 100);
        $campaign->backers += 1;
        $campaign->save();

        return redirect()->route('donate.show', $campaign->slug)->with('success', 'Thanks for donating!');
    }
}
