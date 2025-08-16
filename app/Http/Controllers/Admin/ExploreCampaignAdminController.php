<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExploreCampaign;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ExploreCampaignAdminController extends Controller
{
    public function index()
    {
        $campaigns = ExploreCampaign::all();
        return view('admin.explore_campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        return view('admin.explore_campaigns.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'goal_amount' => 'required|numeric|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('explore_campaigns', 'public');

        ExploreCampaign::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . uniqid(),
            'description' => $request->description,
            'goal_amount' => $request->goal_amount,
            'amount_raised' => 0,
            'backers' => 0,
            'progress' => 0,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.explore.index')->with('success', 'Campaign added successfully!');
    }


    public function edit($id)
    {
        $campaign = ExploreCampaign::findOrFail($id);
        return view('admin.explore_campaigns.edit', compact('campaign'));
    }


    public function update(Request $request, $id)
    {
        $campaign = ExploreCampaign::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'goal_amount' => 'required|numeric|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('explore_campaigns', 'public');
            $campaign->image = $imagePath;
        }

        $campaign->title = $request->title;
        $campaign->slug = Str::slug($request->title) . '-' . uniqid();  // optional to update
        $campaign->description = $request->description;
        $campaign->goal_amount = $request->goal_amount;
        $campaign->save();

        return redirect()->route('admin.explore.index')->with('success', 'Campaign updated successfully!');
    }


    public function destroy($id)
    {
        $campaign = ExploreCampaign::findOrFail($id);

        // Optional: delete image from storage
        if ($campaign->image && Storage::disk('public')->exists($campaign->image)) {
            Storage::disk('public')->delete($campaign->image);
        }

        $campaign->delete();

        return redirect()->route('admin.explore.index')->with('success', 'Campaign deleted successfully!');
    }

    public function showDonors($id)
    {
        $campaign = \App\Models\ExploreCampaign::findOrFail($id);

        // Get donations with campaign_type = explore
        $donations = \App\Models\Donation::where('campaign_id', $id)
            ->where('campaign_type', 'explore')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.explore_campaigns.donors', compact('campaign', 'donations'));
    }
}
