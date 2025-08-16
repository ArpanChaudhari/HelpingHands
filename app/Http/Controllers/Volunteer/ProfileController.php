<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\Participation;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $volunteer = Auth::guard('volunteer')->user();

        // Total event participations
        $totalParticipations = Participation::where('volunteer_id', $volunteer->id)->count();

        // Participation history with event details
        $participations = Participation::with('event')
            ->where('volunteer_id', $volunteer->id)
            ->latest()
            ->get();

        return view('volunteer.profile', compact('volunteer', 'totalParticipations', 'participations'));
    }
}
