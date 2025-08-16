<?php

namespace App\Http\Controllers;

use App\Models\VolunteerEvent;
use Illuminate\Http\Request;

class VolunteerEventController extends Controller
{
    // Show all events
    public function index()
    {
        $events = VolunteerEvent::orderBy('created_at', 'desc')->get();
        return view('volunteer_events.index', compact('events'));
    }



    // Show details of one event
    public function show($id)
    {
        $event = VolunteerEvent::findOrFail($id);
        return view('volunteer_events.show', compact('event'));
    }
}
