<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Cart;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function storeBooking(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:bookings,email', // Ensure unique email for bookings
            'service_id' => 'required|exists:services,id', // Ensure service_id exists in services table
            'user_id' => 'nullable|exists:users,id', // Allow null for user_id if no user is logged in
            'date' => 'required|date',
        ]);
        
        // If user is authenticated, set user_id
        $user_id = auth()->check() ? auth()->user()->id : null;

        // Create the booking record
        Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'service_id' => $request->service_id,
            'user_id' => $user_id,
            'date1' => $request->date1,
        ]);
        session()->flash('success', 'Booking successful.');
        return redirect()->back();
    }

    //booking List (BookingData)
    public function bookingList() {
        $bookings = Booking::with(['service', 'user'])
            ->orderBy('created_at', 'desc') // Order by creation date, newest first
            ->get(); 
    
        return view('admin.bookingData', ['bookings' => $bookings]);
    }

    // Accept and Decline Booking methods
    public function acceptBooking($id) {
        $booking = Booking::findOrFail($id); // Find the booking by ID

        // Update the status to accepted
        $booking->status = 'accepted';
        $booking->save();

        return redirect()->back()->with('success', 'Booking accepted successfully!');
    }

    public function declineBooking($id) {
        $booking = Booking::findOrFail($id); // Find the booking by ID

        // Update the status to declined
        $booking->status = 'declined';
        $booking->save();

        return redirect()->back()->with('success', 'Booking declined successfully!');
    }

    public function showBookingForm()
{
    // Fetch all services from the 'services' table
    $services = Service::all();
    $count = 0;

    // Check if the user is authenticated
    if (Auth::check()) {
        $userid = Auth::id();
        $count = Cart::where('user_id', $userid)->count();
    }
    
    // Pass the variables to the view
    return view('pages.booking', compact('services', 'count'));
}


//user profile Booking Data
public function profileBookingList()
    {
        $bookings = Booking::with(['service', 'user'])
            ->where('user_id', auth()->id())
            ->get();

        return view('profile.userBookingData', ['profileBooking' => $bookings]);
    }


    //delete Booking From User
    public function deleteBooking($id)
    {
        Booking::where('id', $id)->delete();
        return redirect()->back();
    }

}
