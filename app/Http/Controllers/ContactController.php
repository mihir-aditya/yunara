<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use App\Mail\ContactConfirmation;
use App\Models\ContactSubmission;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $key = 'contact_submit_' . $request->ip();
        $maxAttempts = 4;
        $decaySeconds = 24 * 60 * 60; // 24 hours

        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false, 
                    'message' => 'You have reached the maximum number of inquiries allowed per day. Please try again tomorrow.'
                ], 429);
            }
            return redirect()->back()->with('error', 'You have reached the maximum number of inquiries allowed per day. Please try again tomorrow.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'type' => 'required|string',
            'message' => 'required|string',
        ]);

        ContactSubmission::create($validated);

        Mail::to($validated['email'])->send(new ContactConfirmation($validated));

        RateLimiter::hit($key, $decaySeconds);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Your inquiry has been received. Our concierge will contact you soon.']);
        }

        return redirect()->back()->with('success', 'Your inquiry has been received. Our concierge will contact you soon.');
    }
}
