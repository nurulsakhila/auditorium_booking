@extends('layouts.main')

@section('title', 'Form Pengajuan Booking')

@section('content')

<div class="max-w-3xl mx-auto">
    <div class="bg-white/5 backdrop-blur-md rounded-2xl p-8 border border-white/10">
        <h1 class="text-3xl font-bold text-slate-100 mb-4">Form Pengajuan Booking Auditorium</h1>

        <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label class="block text-slate-200 font-medium mb-2">Peminjam *</label>
                <select name="peminjam" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-slate-200">
                    <option value="" style="background-color: #1e293b; color: #94a3b8;">-- Pilih --</option>
                    <option value="DPM FMIPA" style="background-color: #1e293b; color: #e2e8f0;">DPM FMIPA</option>
                    <option value="BEM FMIPA" style="background-color: #1e293b; color: #e2e8f0;">BEM FMIPA</option>
                    <option value="HIMALKOM" style="background-color: #1e293b; color: #e2e8f0;">HIMALKOM</option>
                    <option value="HIMASKA" style="background-color: #1e293b; color: #e2e8f0;">HIMASKA</option>
                    <option value="HIMABIO" style="background-color: #1e293b; color: #e2e8f0;">HIMABIO</option>
                    <option value="HIMAFI" style="background-color: #1e293b; color: #e2e8f0;">HIMAFI</option>
                    <option value="HIMAKI" style="background-color: #1e293b; color: #e2e8f0;">HIMAKI</option>
                    <option value="ALKAMIL" style="background-color: #1e293b; color: #e2e8f0;">ALKAMIL</option>
                    <option value="KPA" style="background-color: #1e293b; color: #e2e8f0;">KPA</option>
                    <option value="UMUM" style="background-color: #1e293b; color: #e2e8f0;">UMUM</option>
                </select>
            </div>

            <div>
                <label class="block text-slate-200 font-medium mb-2">Penanggung Jawab *</label>
                <input type="text" name="pic_name" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-slate-200">
            </div>

            <div>
                <label class="block text-slate-200 font-medium mb-2">No HP / WhatsApp *</label>
                <input type="text" name="pic_phone" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-slate-200">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-slate-200 font-medium mb-2">Tanggal Mulai *</label>
                    <input type="date" name="tanggal" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-slate-200">
                </div>
                <div>
                    <label class="block text-slate-200 font-medium mb-2">Jam Mulai *</label>
                    <input type="time" name="jam_mulai" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-slate-200">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-slate-200 font-medium mb-2">Tanggal Selesai *</label>
                    <input type="date" name="tanggal_selesai" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-slate-200">
                </div>
                <div>
                    <label class="block text-slate-200 font-medium mb-2">Jam Selesai *</label>
                    <input type="time" name="jam_selesai" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-slate-200">
                </div>
            </div>

            <div>
                <label class="block text-slate-200 font-medium mb-2">Nama Kegiatan *</label>
                <input type="text" name="nama_kegiatan" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-slate-200">
            </div>

            <div>
                <label class="block text-slate-200 font-medium mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-slate-200"></textarea>
            </div>

            <div>
                <label class="block text-slate-200 font-medium mb-2">Upload Surat Peminjaman *</label>
                <div class="mb-3">
                    <a href="{{ asset('template/Template_Surat_Peminjaman_Auditorium.docx') }}" class="text-indigo-400 hover:text-indigo-300 text-sm flex items-center gap-2 underline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                        Download Template Surat
                    </a>
                </div>
                <input type="file" name="surat" required accept=".pdf,.jpg,.jpeg,.png" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-slate-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-indigo-600 file:text-white file:cursor-pointer hover:file:bg-indigo-700">
                <p class="text-xs text-slate-500 mt-1">Format: PDF, JPG, JPEG, PNG (Max 2MB)</p>
            </div>

            <label class="flex items-start gap-3">
                <input type="checkbox" name="agree_rules" value="1" required class="mt-1 w-5 h-5">
                <span class="text-slate-300">Saya setuju dengan syarat peminjaman *</span>
            </label>

            <button type="submit" class="w-full px-6 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg">
                Kirim Pengajuan
            </button>
        </form>
    </div>
</div>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: "{{ session('error') }}",
    });
</script>
@endif

@endsection