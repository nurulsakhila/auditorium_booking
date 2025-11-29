@extends('layouts.main')

@section('title', 'Tentang Auditorium')

@section('content')

<div class="max-w-4xl mx-auto">

    {{-- Header --}}
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-slate-100 mb-4">
            Tentang Auditorium FMIPA Universitas Riau
        </h1>
        <p class="text-lg text-slate-300 leading-relaxed">
            Auditorium FMIPA Universitas Riau merupakan ruangan serbaguna yang digunakan untuk berbagai kegiatan 
            seperti seminar, workshop, rapat organisasi, acara akademik, dan kegiatan kemahasiswaan lainnya.
        </p>
    </div>

    {{-- Information Cards --}}
    <div class="space-y-6">
        
        {{-- Informasi Ruangan --}}
        <div class="bg-white/5 backdrop-blur-md rounded-2xl p-8 border border-white/10">
            <h2 class="text-2xl font-bold text-slate-200 mb-6">Informasi Ruangan</h2>
            <ul class="space-y-3 text-slate-300">
                <li class="flex items-start">
                    <span class="mr-2">•</span>
                    <span><b class="text-slate-200">Kapasitas : </b> ± 200 orang</span>
                </li>
                <li class="flex items-start">
                    <span class="mr-2">•</span>
                    <span><b class="text-slate-200">Lokasi : </b> Fakultas Matematika dan Ilmu Pengetahuan Alam, Universitas Riau</span>
                </li>
                <li class="flex items-start">
                    <span class="mr-2">•</span>
                    <span><b class="text-slate-200">Luas Ruangan: </b> 14m x 18m</span>
                </li>
                <li class="flex items-start">
                    <span class="mr-2">•</span>
                    <span><b class="text-slate-200">Tipe Kegiatan : </b> Seminar, pelatihan, rapat, acara organisasi, dll.</span>
                </li>
                <li class="flex items-start">
                    <span class="mr-2">•</span>
                    <span><b class="text-slate-200">Contact Person : </b> Nurul Sakhila Indayana (0812345679)</span>
                </li>
            </ul>
        </div>

        {{-- Fasilitas --}}
        <div class="bg-white/5 backdrop-blur-md rounded-2xl p-8 border border-white/10">
            <h2 class="text-2xl font-bold text-slate-200 mb-6">Fasilitas yang Tersedia</h2>
            <ul class="grid grid-cols-1 md:grid-cols-2 gap-3 text-slate-300">
                <li class="flex items-center">
                    <span class="mr-2">✓</span>
                    <span>Sound System & Mic</span>
                </li>
                <li class="flex items-center">
                    <span class="mr-2">✓</span>
                    <span>Proyektor & Layar</span>
                </li>
                <li class="flex items-center">
                    <span class="mr-2">✓</span>
                    <span>AC</span>
                </li>
                <li class="flex items-center">
                    <span class="mr-2">✓</span>
                    <span>Kursi + Meja</span>
                </li>
                <li class="flex items-center">
                    <span class="mr-2">✓</span>
                    <span>Panggung kecil</span>
                </li>
                <li class="flex items-center">
                    <span class="mr-2">✓</span>
                    <span>Akses listrik</span>
                </li>
            </ul>
        </div>

        {{-- Ketentuan Peminjaman --}}
        <div class="bg-white/5 backdrop-blur-md rounded-2xl p-8 border border-white/10">
            <h2 class="text-2xl font-bold text-slate-200 mb-6">Ketentuan Peminjaman</h2>
            <ul class="space-y-3 text-slate-300">
                <li class="flex items-start">
                    <span class="mr-2">•</span>
                    <span>Peminjam wajib mengisi formulir dengan data yang benar.</span>
                </li>
                <li class="flex items-start">
                    <span class="mr-2">•</span>
                    <span>Peminjam wajib mengunggah surat peminjaman dari organisasi/fakultas.</span>
                </li>
                <li class="flex items-start">
                    <span class="mr-2">•</span>
                    <span>Jadwal akan disetujui berdasarkan ketersediaan ruangan.</span>
                </li>
                <li class="flex items-start">
                    <span class="mr-2">•</span>
                    <span>Ruangan harus dikembalikan dalam kondisi bersih dan rapi.</span>
                </li>
                <li class="flex items-start">
                    <span class="mr-2">•</span>
                    <span>Peminjam bertanggung jawab atas kerusakan selama pemakaian.</span>
                </li>
            </ul>
        </div>

    </div>

</div>

@endsection
