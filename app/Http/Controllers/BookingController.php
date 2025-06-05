<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Booking;
use App\Mail\BookingConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:user');
    }

    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())->with('tour')->get();
        return view('bookings.index', compact('bookings'));
    }

    public function create(Tour $tour)
    {
        if ($tour->available_spots <= 0) {
            return redirect()->route('tours.show', $tour)->with('error', 'No spots available for this tour.');
        }
        return view('bookings.create', compact('tour'));
    }

    public function store(Request $request, Tour $tour)
    {
        $request->validate([
            'booking_date' => 'required|date',
            'persons' => 'required|integer|min:1',
        ]);

        if ($request->persons > $tour->available_spots) {
            return redirect()->route('bookings.create', $tour)->with('error', 'Requested persons exceed available spots.');
        }

        $total_price = $tour->price * $request->persons;

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'tour_id' => $tour->id,
            'booking_date' => $request->booking_date,
            'persons' => $request->persons,
            'total_price' => $total_price,
            'status' => 'confirmed',
        ]);

        // Update available spots
        $tour->update(['available_spots' => $tour->available_spots - $request->persons]);

        // Send booking confirmation email

        Mail::to(Auth::user()->email)->send(new BookingConfirmation($booking));

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    public function show(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }
        return view('bookings.show', compact('booking'));
    }

    public function destroy(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }
        // Restore available spots
        $tour = $booking->tour;
        $tour->update(['available_spots' => $tour->available_spots + $booking->persons]);
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking cancelled successfully.');
    }
}
