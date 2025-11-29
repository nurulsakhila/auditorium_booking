@extends('layouts.main')

@section('title', 'Beranda')

@section('content')

<div class="max-w-4xl mx-auto">
    
    {{-- Hero Section --}}
    <div class="bg-white/5 backdrop-blur-md rounded-2xl p-8 md:p-12 border border-white/10 mb-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-slate-100 mb-6">
            Booking Auditorium FMIPA Sekarang!
        </h1>
        
        <p class="text-lg text-slate-300 mb-8 leading-relaxed">
            Platform digital yang dirancang untuk mempermudah proses peminjaman auditorium
            bagi seluruh pengguna di lingkungan FMIPA maupun masyarakat umum.
        </p>
        
        <a href="{{ route('booking.form') }}" 
           class="inline-block px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold rounded-lg shadow-lg transition-all transform hover:scale-105">
            Ajukan Booking
        </a>
    </div>

    {{-- Features Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <div class="bg-white/5 backdrop-blur-md rounded-xl p-6 border border-white/10 hover:bg-white/10 transition-all">
            <div class="text-xl font-bold text-slate-200 mb-3">Pengajuan Online</div>
            <div class="text-slate-400">Ajukan peminjaman auditorium secara online tanpa harus datang langsung.</div>
        </div>

        <div class="bg-white/5 backdrop-blur-md rounded-xl p-6 border border-white/10 hover:bg-white/10 transition-all">
            <div class="text-xl font-bold text-slate-200 mb-3">Cek Jadwal</div>
            <div class="text-slate-400">Lihat kalender acara auditorium untuk memastikan slot yang tersedia.</div>
        </div>

        <div class="bg-white/5 backdrop-blur-md rounded-xl p-6 border border-white/10 hover:bg-white/10 transition-all">
            <div class="text-xl font-bold text-slate-200 mb-3">Pantau Status</div>
            <div class="text-slate-400">Cek apakah pengajuan kamu sedang diproses, ditolak, atau sudah disetujui.</div>
        </div>

    </div>

</div>

@endsection