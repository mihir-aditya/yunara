<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactConfirmation;
use App\Models\ContactSubmission;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'type' => 'required|string',
            'message' => 'required|string',
        ]);

        ContactSubmission::create($validated);

        Mail::to($validated['email'])->send(new ContactConfirmation($validated));

        return redirect()->back()->with('success', 'Your inquiry has been received. Our concierge will contact you soon.');
    }
}
