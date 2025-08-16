<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VolunteerEvent;

class VolunteerEventAdminController extends Controller
{
    public function index()
    {
        $events = VolunteerEvent::latest()->get();
        return view('admin.volunteer_events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.volunteer_events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'location' => 'required',
            'activity_start_date' => 'required|date',
            'event_time' => 'required',
            'application_last_date' => 'required|date',
            'duration' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $imagePath = $request->file('image')->store('volunteer_events', 'public');

        VolunteerEvent::create([
            'title' => $request->title,
            'location' => $request->location,
            'activity_start_date' => $request->activity_start_date,
            'event_time' => $request->event_time,
            'application_last_date' => $request->application_last_date,
            'duration' => $request->duration,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.volunteer-events.index')->with('success', 'Event created successfully!');
    }


    public function edit($id)
    {
        $volunteerEvent = VolunteerEvent::findOrFail($id);
        return view('admin.volunteer_events.edit', compact('volunteerEvent'));
    }



    public function update(Request $request, $id)
    {
        $event = VolunteerEvent::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'location' => 'required',
            'activity_start_date' => 'required|date',
            'event_time' => 'required',
            'application_last_date' => 'required|date',
            'duration' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('volunteer_events', 'public');
            $event->image = $imagePath;
        }

        $event->update([
            'title' => $request->title,
            'location' => $request->location,
            'activity_start_date' => $request->activity_start_date,
            'event_time' => $request->event_time,
            'application_last_date' => $request->application_last_date,
            'duration' => $request->duration,
        ]);

        return redirect()->route('admin.volunteer-events.index')->with('success', 'Event updated successfully!');
    }


    public function destroy($id)
    {
        $event = VolunteerEvent::findOrFail($id);
        $event->delete();
        return redirect()->route('admin.volunteer-events.index')->with('success', 'Event deleted successfully!');
    }

    public function showParticipants($id)
    {
        $event = VolunteerEvent::findOrFail($id);
        $participants = $event->participants; // This should now return data

        return view('admin.volunteer_events.participants', compact('event', 'participants'));
    }
}
