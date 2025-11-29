@extends('layouts.admin-navbar')

@section('title', 'Detail Booking')

@section('content')

<div class="max-w-4xl mx-auto">

    {{-- HEADER & BACK BUTTON --}}
    <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <h1 class="text-3xl font-bold text-slate-200">Detail Booking</h1>
        <a href="{{ route('admin.booking.index') }}" 
           class="inline-flex items-center gap-2 px-4 py-2 bg-white/5 border border-white/10 rounded-lg 
                  text-slate-300 hover:bg-white/10 hover:text-white transition-all group">
            <span class="group-hover:-translate-x-1 transition-transform">&larr;</span>
            Kembali ke Daftar
        </a>
    </div>

    <div class="bg-white/5 backdrop-blur-md rounded-2xl p-8 border border-white/10 space-y-6">

        {{-- ORGANISASI / PEMINJAM --}}
        <div class="border-b border-white/10 pb-4">
            <label class="block text-sm font-medium text-slate-500 mb-2">Organisasi / Pemohon</label>
            <div class="text-lg font-semibold text-slate-200">{{ $booking->peminjam }}</div>
        </div>

        {{-- NAMA KEGIATAN --}}
        <div class="border-b border-white/10 pb-4">
            <label class="block text-sm font-medium text-slate-500 mb-2">Nama Kegiatan</label>
            <div class="text-lg font-semibold text-slate-200">{{ $booking->nama_kegiatan }}</div>
        </div>

        {{-- PJ --}}
        <div class="border-b border-white/10 pb-4">
            <label class="block text-sm font-medium text-slate-500 mb-2">Penanggung Jawab</label>
            <div class="text-lg text-slate-300">{{ $booking->pic_name }}</div>
        </div>

        {{-- KONTAK --}}
        <div class="border-b border-white/10 pb-4">
            <label class="block text-sm font-medium text-slate-500 mb-2">Nomor HP / WhatsApp</label>
            <div class="text-lg text-slate-300">{{ $booking->pic_phone }}</div>
        </div>

        {{-- TANGGAL & JAM --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-b border-white/10 pb-4">
            <div>
                <label class="block text-sm font-medium text-slate-500 mb-2">Tanggal Mulai</label>
                <div class="text-lg text-slate-300">{{ $booking->tanggal }}</div>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-500 mb-2">Jam Mulai</label>
                <div class="text-lg text-slate-300">{{ $booking->jam_mulai }}</div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-b border-white/10 pb-4">
            <div>
                <label class="block text-sm font-medium text-slate-500 mb-2">Tanggal Selesai</label>
                <div class="text-lg text-slate-300">{{ $booking->tanggal_selesai }}</div>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-500 mb-2">Jam Selesai</label>
                <div class="text-lg text-slate-300">{{ $booking->jam_selesai }}</div>
            </div>
        </div>

        {{-- DESKRIPSI --}}
        <div class="border-b border-white/10 pb-4">
            <label class="block text-sm font-medium text-slate-500 mb-2">Deskripsi Kegiatan</label>
            <div class="text-slate-300">{{ $booking->deskripsi ?? '-' }}</div>
        </div>

        {{-- STATUS --}}
        <div class="border-b border-white/10 pb-4">
            <label class="block text-sm font-medium text-slate-500 mb-2">Status</label>
            <div>
                @if($booking->status == 'pending')
                    <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold uppercase tracking-wide
                                 bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900">
                        Pending
                    </span>
                @elseif($booking->status == 'approved')
                    <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold uppercase tracking-wide
                                 bg-gradient-to-r from-green-500 to-emerald-600 text-white">
                        Disetujui
                    </span>
                @else
                    <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold uppercase tracking-wide
                                 bg-gradient-to-r from-red-500 to-red-700 text-white">
                        Ditolak
                    </span>
                @endif
            </div>
        </div>

        {{-- SURAT --}}
        <div>
            <label class="block text-sm font-medium text-slate-500 mb-2">Surat Peminjaman</label>
            @if($booking->surat)
                <div class="flex gap-3">
                    <a href="{{ asset('storage/' . $booking->surat) }}" 
                       target="_blank" 
                       class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 
                              text-white rounded-lg font-medium transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        Lihat Surat
                    </a>
                    <a href="{{ asset('storage/' . $booking->surat) }}" 
                       download
                       class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 
                              text-white rounded-lg font-medium transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        Download
                    </a>
                </div>
            @else
                <div class="text-slate-500 italic">Tidak ada file</div>
            @endif
        </div>

    </div>

    {{-- BUTTON ACTION --}}
    <div class="flex gap-4 mt-8">
        <form action="{{ route('admin.booking.approve', $booking->id) }}" method="POST" class="flex-1">
            @csrf
            <button type="submit" 
                    class="w-full px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 
                           hover:from-green-600 hover:to-emerald-700 text-white rounded-lg 
                           font-semibold transition-all duration-200 shadow-lg hover:shadow-xl">
                Setujui
            </button>
        </form>

        <form action="{{ route('admin.booking.reject', $booking->id) }}" method="POST" class="flex-1">
            @csrf
            <button type="submit" 
                    class="w-full px-6 py-3 bg-gradient-to-r from-red-500 to-red-700 
                           hover:from-red-600 hover:to-red-800 text-white rounded-lg 
                           font-semibold transition-all duration-200 shadow-lg hover:shadow-xl">
                Tolak
            </button>
        </form>
    </div>

</div>

@endsection