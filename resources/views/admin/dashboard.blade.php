@extends('layouts.admin-navbar')

@section('title', 'Dashboard Admin')

@section('content')

{{-- TITLE --}}
<h1 class="text-3xl font-bold text-slate-200 mb-8">Dashboard Admin</h1>

{{-- STATISTIK CARDS --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    {{-- Pending Card --}}
    <div class="bg-white/5 backdrop-blur-md rounded-2xl p-6 border border-white/10 
                hover:transform hover:-translate-y-1 hover:shadow-2xl transition-all duration-300 text-center">
        <div class="text-5xl font-extrabold text-indigo-400 mb-2">{{ $pending }}</div>
        <div class="text-slate-400 font-medium">Pending</div>
    </div>

    {{-- Disetujui Card --}}
    <div class="bg-white/5 backdrop-blur-md rounded-2xl p-6 border border-white/10 
                hover:transform hover:-translate-y-1 hover:shadow-2xl transition-all duration-300 text-center">
        <div class="text-5xl font-extrabold text-indigo-400 mb-2">{{ $approved }}</div>
        <div class="text-slate-400 font-medium">Disetujui</div>
    </div>

    {{-- Ditolak Card --}}
    <div class="bg-white/5 backdrop-blur-md rounded-2xl p-6 border border-white/10 
                hover:transform hover:-translate-y-1 hover:shadow-2xl transition-all duration-300 text-center">
        <div class="text-5xl font-extrabold text-indigo-400 mb-2">{{ $rejected }}</div>
        <div class="text-slate-400 font-medium">Ditolak</div>
    </div>

    {{-- Total Card --}}
    <div class="bg-white/5 backdrop-blur-md rounded-2xl p-6 border border-white/10 
                hover:transform hover:-translate-y-1 hover:shadow-2xl transition-all duration-300 text-center">
        <div class="text-5xl font-extrabold text-indigo-400 mb-2">{{ $total }}</div>
        <div class="text-slate-400 font-medium">Total Booking</div>
    </div>

</div>

{{-- BOOKING TERBARU TABLE --}}
<div class="bg-white/5 backdrop-blur-md rounded-2xl p-6 border border-white/10">
    <h2 class="text-xl font-bold text-slate-200 mb-4">Booking Terbaru</h2>

    {{-- Table Wrapper untuk Responsive --}}
    <div class="overflow-x-auto rounded-lg">
        <table class="w-full">
            <thead class="bg-white/10">
                <tr>
                    <th class="px-4 py-3 text-sm font-semibold text-slate-200 border-b border-white/10 w-[25%]">
                        Organisasi
                    </th>
                    <th class="px-4 py-3 text-sm font-semibold text-slate-200 border-b border-white/10 w-[30%]">
                        Kegiatan
                    </th>
                    <th class="px-4 py-3 text-sm font-semibold text-slate-200 border-b border-white/10 w-[25%]">
                        Waktu
                    </th>
                    <th class="px-4 py-3 text-sm font-semibold text-slate-200 border-b border-white/10 w-[20%]">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($latest as $b)
                <tr class="hover:bg-white/5 transition-colors border-b border-white/5 last:border-0">
                    <td class="px-4 py-4 align-top">
                        <strong class="text-slate-200 block mb-1">{{ $b->peminjam }}</strong>
                        <span class="text-xs text-slate-500">{{ $b->pic_name }}</span>
                    </td>
                    <td class="px-4 py-4 align-top text-slate-400">
                        {{ $b->nama_kegiatan }}
                    </td>
                    <td class="px-4 py-4 align-top">
                        <div class="flex flex-col gap-1">
                            <span class="text-sm text-slate-300">
                                {{ \Carbon\Carbon::parse($b->tanggal)->format('d M Y') }}
                            </span>
                            <span class="text-sm text-slate-400">
                                {{ $b->jam_mulai }} - {{ $b->jam_selesai }}
                            </span>
                        </div>
                    </td>
                    <td class="px-4 py-4 align-top">
                        @if($b->status == 'pending')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold
                                         bg-yellow-500/10 text-yellow-400 border border-yellow-500/20">
                                Pending
                            </span>
                        @elseif($b->status == 'approved')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold
                                         bg-green-500/10 text-green-400 border border-green-500/20">
                                Disetujui
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold
                                         bg-red-500/10 text-red-400 border border-red-500/20">
                                Ditolak
                            </span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-16 text-center text-slate-500">
                        Belum ada booking
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection