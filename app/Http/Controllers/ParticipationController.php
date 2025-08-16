<?php

namespace App\Http\Controllers;

use App\Models\Participation;
use App\Models\VolunteerEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ParticipationConfirmation;


class ParticipationController extends Controller
{
    public function showForm($eventId)
    {
        $event = null;

        if ($eventId != 0) {
            $event = VolunteerEvent::findOrFail($eventId);
        }

        return view('participate.form', compact('event'));
    }


    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'event_id' => 'nullable|integer',
        ]);

        if ($request->event_id != 0 && !VolunteerEvent::find($request->event_id)) {
            return redirect()->back()->withErrors(['event_id' => 'Selected event does not exist.']);
        }

        // Store data and get the created participation
        $participation = Participation::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'event_id' => $request->event_id != 0 ? $request->event_id : null,
            'volunteer_id' => auth()->guard('volunteer')->check() ? auth()->guard('volunteer')->id() : null,
        ]);

        // Send confirmation mail with data
        Mail::to($participation->email)->send(new ParticipationConfirmation($participation));

        return redirect()->back()->with('success', 'Thank you for participating!');
    }
}
