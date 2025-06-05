<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Tour;
use App\Exports\BookingsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        $totalBookings = Booking::count();
        $totalRevenue = Booking::sum('total_price');
        $bookingsByTour = Booking::select('tour_id')
            ->groupBy('tour_id')
            ->with('tour')
            ->get()
            ->map(function ($booking) {
                return [
                    'tour_name' => $booking->tour->name,
                    'booking_count' => Booking::where('tour_id', $booking->tour_id)->count(),
                    'total_revenue' => Booking::where('tour_id', $booking->tour_id)->sum('total_price'),
                ];
            });

        return view('reports.index', compact('totalBookings', 'totalRevenue', 'bookingsByTour'));
    }

    public function export()
    {
        return Excel::download(new BookingsExport, 'bookings_report.csv');
    }
}
