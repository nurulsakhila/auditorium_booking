@extends('layouts.main')

@section('title', 'Jadwal Penggunaan Auditorium')

@section('content')

<div class="max-w-6xl mx-auto py-12 px-4">

    <div class="text-center mb-12">
        <h1 class="text-3xl font-bold text-slate-200 mb-4">Jadwal Penggunaan Auditorium</h1>
        <p class="text-slate-400">Berikut adalah jadwal kegiatan yang telah disetujui.</p>
    </div>

    <div class="bg-white/5 backdrop-blur-md rounded-2xl border border-white/10 overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-white/10 text-slate-300 text-sm font-semibold uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4 border-b border-white/10">Organisasi</th>
                        <th class="px-6 py-4 border-b border-white/10">Kegiatan</th>
                        <th class="px-6 py-4 border-b border-white/10">Tanggal & Waktu</th>
                        <th class="px-6 py-4 border-b border-white/10">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($bookings as $booking)
                        <tr class="hover:bg-white/5 transition-colors group">
                            {{-- Organisasi --}}
                            <td class="px-6 py-4 align-top">
                                <strong class="text-slate-200 block mb-1">{{ $booking->peminjam }}</strong>
                                <span class="text-xs text-slate-500">{{ $booking->pic_name }}</span>
                            </td>

                            {{-- Kegiatan --}}
                            <td class="px-6 py-4 align-top text-slate-300">
                                {{ $booking->nama_kegiatan }}
                            </td>

                            {{-- Tanggal & Waktu --}}
                            <td class="px-6 py-4 align-top">
                                <div class="flex flex-col gap-1">
                                    <span class="text-sm text-slate-300">
                                        {{ \Carbon\Carbon::parse($booking->tanggal)->translatedFormat('d M Y') }}
                                    </span>
                                    <span class="text-sm text-slate-400">
                                        {{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}
                                    </span>
                                </div>
                            </td>

                            {{-- Status --}}
                            <td class="px-6 py-4 align-top">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-500/10 text-green-400 border border-green-500/20">
                                    Disetujui
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-16 text-center text-slate-500">
                                Belum ada jadwal kegiatan yang akan datang.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection