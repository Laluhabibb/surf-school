<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookingsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Booking::with('package')->get()->map(function ($booking) {
            return [
                'name' => $booking->name,
                'phone' => $booking->phone,
                'email' => $booking->email,
                'package' => $booking->package?->name,
                'booking_date' => $booking->booking_date,
                'people' => $booking->people,
                'notes' => $booking->notes,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Name',
            'Phone',
            'Email',
            'Package',
            'Booking Date',
            'People',
            'Notes',
        ];
    }
}