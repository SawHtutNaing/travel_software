<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Announcement;
use App\Mail\ContactFormSubmitted;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $tours = Tour::with('reviews')->get();
        $starTours = Tour::with('reviews')->where('is_star', true)->take(3)->get();
        $announcements = Announcement::latest()->take(3)->get();

        return view('home', compact('tours', 'starTours', 'announcements'));
    }



    public function search(Request $request)
    {
        $query = Tour::query();

        if ($request->has('destination') && $request->destination) {
            $query->where('destination', 'like', '%' . $request->destination . '%');
        }

        if ($request->has('start_date') && $request->start_date) {
            $query->where('start_date', '>=', $request->start_date);
        }

        if ($request->has('end_date') && $request->end_date) {
            $query->where('end_date', '<=', $request->end_date);
        }

        $tours = $query->get();
        $announcements = \App\Models\Announcement::latest()->get();
        return view('home', compact('tours', 'announcements'));
    }

    public function send_mail(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Send email
        try {
            Mail::to(config('mail.from.address'))->send(new ContactFormSubmitted($validated));
            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was an issue sending your message. Please try again later.');
        }
    }
    public function dashboard()
    {
        $totalTours = Tour::count();
        $totalBookings = Booking::count();
        $totalRevenue = Booking::sum('total_price');
        $starTours = Tour::where('is_star', true)->get();
        return view('dashboard', compact('totalTours', 'totalBookings', 'totalRevenue', 'starTours'));
    }
}
