<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Exports\BookingsExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class BookingController extends Controller
{

    public function store(Request $request)
    {
        try {
            // Log request data
            \Log::info('Booking form submitted', $request->all());

            // Validasi
            $validated = $request->validate([
                'peminjam'         => 'required',
                'pic_name'         => 'required',
                'pic_phone'        => 'required',
                'tanggal'          => 'required|date',
                'jam_mulai'        => 'required',
                'tanggal_selesai'  => 'required|date',
                'jam_selesai'      => 'required',
                'nama_kegiatan'    => 'required',
                'deskripsi'        => 'nullable',
                'surat'            => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                'agree_rules'      => 'accepted',
            ]);

            \Log::info('Validation passed');

            // Upload file
            if ($request->hasFile('surat')) {
                $file = $request->file('surat');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('surat', $fileName, 'public');
                \Log::info('File uploaded: ' . $filePath);
            } else {
                throw new \Exception('File surat tidak ditemukan');
            }

            // Simpan ke database
            $booking = Booking::create([
                'peminjam'         => $request->peminjam,
                'pic_name'         => $request->pic_name,
                'pic_phone'        => $request->pic_phone,
                'nama_kegiatan'    => $request->nama_kegiatan,
                'deskripsi'        => $request->deskripsi,
                'tanggal'          => $request->tanggal,
                'tanggal_selesai'  => $request->tanggal_selesai,
                'jam_mulai'        => $request->jam_mulai,
                'jam_selesai'      => $request->jam_selesai,
                'surat'            => $filePath,
                'status'           => 'pending',
            ]);

            \Log::info('Booking created with ID: ' . $booking->id);

            return redirect()->route('booking.form')
                ->with('success', 'Pengajuan booking berhasil dikirim! ID: ' . $booking->id);
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation failed: ' . json_encode($e->errors()));
            return redirect()->back()
                ->withInput()
                ->withErrors($e->errors());
        } catch (\Exception $e) {
            \Log::error('Booking store error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    // =======================
    // BAGIAN ADMIN
    // =======================
    public function index()
    {
        $bookings = Booking::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.booking-index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.booking-detail', compact('booking'));
    }

    public function approve($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'approved';
        $booking->save();

        return back()->with('success', 'Booking berhasil disetujui!');
    }

    public function reject($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'rejected';
        $booking->save();

        return back()->with('success', 'Booking ditolak!');
    }

    // Filter bookings by date (untuk AJAX request dari calendar)
    public function getBookingsByDate(Request $request)
    {
        $date = $request->query('date');
        $search = $request->query('search');
        
        $query = Booking::query();

        if ($date) {
            $query->where(function($q) use ($date) {
                $q->where('tanggal', '<=', $date)
                  ->where('tanggal_selesai', '>=', $date);
            });
            $query->orderBy('jam_mulai', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('peminjam', 'like', "%{$search}%")
                  ->orWhere('nama_kegiatan', 'like', "%{$search}%");
            });
        }
        
        $bookings = $query->get();
        
        return response()->json($bookings);
    }

    public function publicSchedule()
    {
        $bookings = Booking::where('status', 'approved')
            ->orderBy('tanggal', 'asc')
            ->get();
            
        return view('public.schedule', compact('bookings'));
    }

    public function exportExcel()
    {
        return Excel::download(new BookingsExport, 'bookings.xlsx');
    }

    public function exportPdf()
    {
        $bookings = Booking::orderBy('created_at', 'desc')->get();
        $pdf = PDF::loadView('admin.booking-pdf', compact('bookings'));
        return $pdf->download('bookings.pdf');
    }
}
