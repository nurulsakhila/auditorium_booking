<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'pending'   => Booking::where('status', 'pending')->count(),
            'approved'  => Booking::where('status', 'approved')->count(),
            'rejected'  => Booking::where('status', 'rejected')->count(),
            'total'     => Booking::count(),
            'latest'    => Booking::latest()->take(3)->get()  // utk tabel booking terbaru
        ]);
    }

    public function calendar()
    {
        return view('admin.calendar');
    }

    public function calendarData()
    {
        $bookings = Booking::all();

        $events = [];

        foreach ($bookings as $b) {
            $events[] = [
                'id'    => $b->id,
                'title' => $b->nama_kegiatan . ' - ' . $b->peminjam,
                'start' => $b->tanggal . 'T' . $b->jam_mulai,
                'end'   => $b->tanggal_selesai . 'T' . $b->jam_selesai,
            ];
        }

        return response()->json($events);
    }
}
