<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
{
    // Initialize count to 0 by default
    $count = 0;

    // Check if the user is authenticated
    if (Auth::check()) {
        $userid = Auth::id();
        $count = Cart::where('user_id', $userid)->count();
    }

    // Pass the count to the view
    return view('pages.about', compact('count'));
}

}
