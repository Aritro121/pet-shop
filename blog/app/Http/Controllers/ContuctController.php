<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContuctController extends Controller
{
    // Display contact page
    public function contact(Request $req)
    {
        $count = Auth::check() ? Cart::where('user_id', Auth::id())->count() : 0;
        return view('pages.contact', compact('count'));
    }

    // Handle contact form submission
    public function contuctData(Request $req)
    {
        $req->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name' => $req->name,
            'email' => $req->email,
            'message' => $req->message,
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    // Display list of all contacts (for admin)
    public function ContactList()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.contuct', ['contacts' => $contacts]);
    }
}
