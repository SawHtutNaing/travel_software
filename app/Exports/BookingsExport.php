<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookingsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Booking::with(['user', 'tour'])->get()->map(function ($booking) {
            return [
                'ID' => $booking->id,
                'User' => $booking->user->name,
                'Tour' => $booking->tour->name,
                'Booking Date' => $booking->booking_date,
                'Persons' => $booking->persons,
                'Total Price' => $booking->total_price,
                'Status' => $booking->status,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'User',
            'Tour',
            'Booking Date',
            'Persons',
            'Total Price',
            'Status',
        ];
    }
}
