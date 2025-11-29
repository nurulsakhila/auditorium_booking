<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookings = [
            [
                'peminjam' => 'HIMALKOM',
                'pic_name' => 'Andi Pratama',
                'pic_phone' => '081234567890',
                'tanggal' => '2025-12-01',
                'jam_mulai' => '08:00',
                'tanggal_selesai' => '2025-12-01',
                'jam_selesai' => '16:00',
                'nama_kegiatan' => 'Seminar Nasional Teknologi 2025',
                'deskripsi' => 'Seminar tentang perkembangan AI di Indonesia.',
                'status' => 'approved',
                'surat' => 'surat_dummy.pdf',
            ],
            [
                'peminjam' => 'BEM FMIPA',
                'pic_name' => 'Budi Santoso',
                'pic_phone' => '081298765432',
                'tanggal' => '2025-12-05',
                'jam_mulai' => '09:00',
                'tanggal_selesai' => '2025-12-05',
                'jam_selesai' => '15:00',
                'nama_kegiatan' => 'Rapat Kerja BEM FMIPA',
                'deskripsi' => 'Pembahasan program kerja periode 2025/2026.',
                'status' => 'pending',
                'surat' => 'surat_dummy.pdf',
            ],
            [
                'peminjam' => 'HIMASKA',
                'pic_name' => 'Citra Dewi',
                'pic_phone' => '081345678901',
                'tanggal' => '2025-12-10',
                'jam_mulai' => '08:00',
                'tanggal_selesai' => '2025-12-10',
                'jam_selesai' => '17:00',
                'nama_kegiatan' => 'Olimpiade Matematika Tingkat SMA',
                'deskripsi' => 'Lomba matematika tahunan untuk siswa SMA se-Riau.',
                'status' => 'approved',
                'surat' => 'surat_dummy.pdf',
            ],
            [
                'peminjam' => 'DPM FMIPA',
                'pic_name' => 'Dimas Anggara',
                'pic_phone' => '082156789012',
                'tanggal' => '2025-12-12',
                'jam_mulai' => '13:00',
                'tanggal_selesai' => '2025-12-12',
                'jam_selesai' => '16:00',
                'nama_kegiatan' => 'Sidang Pleno DPM',
                'deskripsi' => 'Evaluasi kinerja BEM tengah periode.',
                'status' => 'pending',
                'surat' => 'surat_dummy.pdf',
            ],
            [
                'peminjam' => 'HIMABIO',
                'pic_name' => 'Eka Putri',
                'pic_phone' => '085267890123',
                'tanggal' => '2025-12-15',
                'jam_mulai' => '08:00',
                'tanggal_selesai' => '2025-12-16',
                'jam_selesai' => '16:00',
                'nama_kegiatan' => 'Bio Expo 2025',
                'deskripsi' => 'Pameran hasil penelitian mahasiswa Biologi.',
                'status' => 'rejected',
                'surat' => 'surat_dummy.pdf',
            ],
            [
                'peminjam' => 'HIMAFI',
                'pic_name' => 'Fajar Nugraha',
                'pic_phone' => '081178901234',
                'tanggal' => '2025-12-20',
                'jam_mulai' => '19:00',
                'tanggal_selesai' => '2025-12-20',
                'jam_selesai' => '22:00',
                'nama_kegiatan' => 'Malam Keakraban Fisika',
                'deskripsi' => 'Acara seni dan temu ramah mahasiswa baru.',
                'status' => 'approved',
                'surat' => 'surat_dummy.pdf',
            ],
            [
                'peminjam' => 'HIMAKI',
                'pic_name' => 'Gita Pertiwi',
                'pic_phone' => '081289012345',
                'tanggal' => '2025-12-22',
                'jam_mulai' => '08:00',
                'tanggal_selesai' => '2025-12-22',
                'jam_selesai' => '12:00',
                'nama_kegiatan' => 'Workshop Safety Lab',
                'deskripsi' => 'Pelatihan K3 laboratorium untuk mahasiswa tingkat akhir.',
                'status' => 'pending',
                'surat' => 'surat_dummy.pdf',
            ],
            [
                'peminjam' => 'ALKAMIL',
                'pic_name' => 'Hafiz Syahputra',
                'pic_phone' => '082290123456',
                'tanggal' => '2025-12-25',
                'jam_mulai' => '08:00',
                'tanggal_selesai' => '2025-12-25',
                'jam_selesai' => '11:00',
                'nama_kegiatan' => 'Kajian Rutin Bulanan',
                'deskripsi' => 'Tema: Meneladani Akhlak Rasulullah SAW.',
                'status' => 'approved',
                'surat' => 'surat_dummy.pdf',
            ],
            [
                'peminjam' => 'KPA',
                'pic_name' => 'Indra Lesmana',
                'pic_phone' => '081301234567',
                'tanggal' => '2025-12-28',
                'jam_mulai' => '16:00',
                'tanggal_selesai' => '2025-12-28',
                'jam_selesai' => '18:00',
                'nama_kegiatan' => 'Latihan Gabungan Pecinta Alam',
                'deskripsi' => 'Persiapan pendakian massal akhir tahun.',
                'status' => 'pending',
                'surat' => 'surat_dummy.pdf',
            ],
            [
                'peminjam' => 'UMUM',
                'pic_name' => 'Joko Susilo',
                'pic_phone' => '081212345678',
                'tanggal' => '2025-12-30',
                'jam_mulai' => '09:00',
                'tanggal_selesai' => '2025-12-30',
                'jam_selesai' => '12:00',
                'nama_kegiatan' => 'Sosialisasi Beasiswa LPDP',
                'deskripsi' => 'Sharing session dengan awardee LPDP Riau.',
                'status' => 'rejected',
                'surat' => 'surat_dummy.pdf',
            ],
        ];

        foreach ($bookings as $booking) {
            Booking::create($booking);
        }
    }
}
