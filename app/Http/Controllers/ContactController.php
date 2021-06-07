<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormReceived;

class ContactController extends Controller
{
    public function contactForm(Request $request)
    {
        // Honeypot
        if ($request->trap) {
            return redirect()->back()
                ->withSuccess('Your message has been sent.');
        }
        $contact = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactFormDetails($contact));
        Mail::to($request->email)->send(new ContactFormReceived());
        return redirect()->back()->with('message', 'Your message has been sent.');
    }
}
