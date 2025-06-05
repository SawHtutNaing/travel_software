<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Tour;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:user');
    }

    public function create(Tour $tour)
    {
        // Check if user has booked this tour
        $hasBooked = Booking::where('user_id', Auth::id())->where('tour_id', $tour->id)->exists();
        if (!$hasBooked) {
            abort(403, 'You can only review tours you have booked.');
        }
        return view('reviews.create', compact('tour'));
    }

    public function store(Request $request, Tour $tour)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Check if user has already reviewed this tour
        $existingReview = Review::where('user_id', Auth::id())->where('tour_id', $tour->id)->exists();
        if ($existingReview) {
            return redirect()->route('tours.show', $tour)->with('error', 'You have already reviewed this tour.');
        }

        Review::create([
            'user_id' => Auth::id(),
            'tour_id' => $tour->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('tours.show', $tour)->with('success', 'Review submitted successfully.');
    }
}
