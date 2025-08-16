<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CampaignAdminController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::latest()->get();
        return view('admin.campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        return view('admin.campaigns.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'goal_amount' => 'required|numeric|min:1',
            'image' => 'required|image|max:2048',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['image'] = $request->file('image')->store('priority_causes', 'public');

        Campaign::create($data);

        return redirect()->route('admin.campaigns.index')->with('success', 'Campaign created successfully!');
    }

    public function edit(Campaign $campaign)
    {
        return view('admin.campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'goal_amount' => 'required|numeric|min:1',
            'image' => 'nullable|image|max:2048',
        ]);

        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($campaign->image);
            $data['image'] = $request->file('image')->store('priority_causes', 'public');
        }

        $campaign->update($data);

        return redirect()->route('admin.campaigns.index')->with('success', 'Campaign updated successfully!');
    }

    public function destroy(Campaign $campaign)
    {
        Storage::disk('public')->delete($campaign->image);
        $campaign->delete();

        return redirect()->route('admin.campaigns.index')->with('success', 'Campaign deleted successfully!');
    }

    public function showDonors($id)
    {
        $campaign = Campaign::findOrFail($id);

        // Get all donations with donor info if available
        $donations = $campaign->donations()->orderBy('created_at', 'desc')->get();

        return view('admin.campaigns.donors', compact('campaign', 'donations'));
    }
}
