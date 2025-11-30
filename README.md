# Sistem Booking Auditorium FMIPA UNRI

Sistem informasi berbasis web untuk pengelolaan peminjaman (booking) Auditorium FMIPA Universitas Riau. Aplikasi ini memudahkan mahasiswa dan ormawa dalam mengajukan peminjaman ruangan serta membantu admin dalam mengelola jadwal dan persetujuan kegiatan.

## Fitur Utama

### Halaman Publik (Mahasiswa/Ormawa)
- **Cek Jadwal**: Melihat ketersediaan auditorium melalui kalender interaktif.
- **Pengajuan Booking**: Form formulir peminjaman online dengan upload surat pengantar.
- **Download Template**: Unduh template surat peminjaman langsung dari website.
- **Informasi Fasilitas**: Melihat detail fasilitas dan kapasitas auditorium.

### Halaman Admin
- **Dashboard**: Ringkasan statistik peminjaman (Total, Pending, Approved, Rejected).
- **Manajemen Booking**:
  - Validasi pengajuan (Approve/Reject).
  - Lihat detail kegiatan dan surat peminjaman.
- **Kalender Admin**: Tampilan jadwal kegiatan dalam bentuk kalender.
- **Export Data**: Rekap data peminjaman ke format **PDF**.

## Teknologi yang Digunakan
- **Framework**: [Laravel 11](https://laravel.com)
- **Database**: MySQL
- **Frontend**: Blade Templates + [Tailwind CSS](https://tailwindcss.com)
- **Alerts**: SweetAlert2
- **Icons**: Heroicons

## Akses Website
   - **Public**: http://127.0.0.1:8000
   - **Admin Login**: http://127.0.0.1:8000/admin/login
     - **Email**: `admin@example.com`
     - **Password**: `password`

## 👨‍💻 Author
**Nurul Sakhila Indayana**
Projek Akhir Mandiri Mata Kuliah Pengembangan Sistem Informasi Berbasis Web Lanjut.