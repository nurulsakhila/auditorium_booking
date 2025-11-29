<?php

namespace App\Exports;

use App\Models\Booking;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BookingsExport implements FromView
{
    public function view(): View
    {
        return view('admin.booking-excel', [
            'bookings' => Booking::orderBy('created_at', 'desc')->get()
        ]);
    }
}
