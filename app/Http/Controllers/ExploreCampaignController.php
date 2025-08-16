<?php

namespace App\Http\Controllers;

use App\Models\ExploreCampaign;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ExploreCampaignController extends Controller
{
    public function index()
    {
        $campaigns = ExploreCampaign::orderBy('id', 'desc')->get();
        return view('explore', compact('campaigns'));
    }



    public function show($slug)
    {
        $campaign = ExploreCampaign::where('slug', $slug)->firstOrFail();
        return view('explore_donation_page', compact('campaign'));
    }
    // Show the donation form
    public function showForm($slug)
    {
        $campaign = ExploreCampaign::where('slug', $slug)->firstOrFail();
        return view('fill_donation', ['campaign' => $campaign]);
    }
}
