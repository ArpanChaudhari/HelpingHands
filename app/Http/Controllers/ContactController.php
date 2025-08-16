<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactConfirmationMail;

class ContactController extends Controller
{
    // app/Http/Controllers/ContactController.php

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Store to DB
        $contact = ContactMessage::create($validated);

        // Send email to user
        Mail::to($validated['email'])->send(new ContactConfirmationMail($contact));

        // Optionally send to admin:
        // Mail::to('admin@helpinghands.com')->send(new AdminContactMail($contact));

        return back()->with('success', 'Thank you for contacting us!');
    }
}
