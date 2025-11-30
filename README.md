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

### Backend
- **PHP**: 8.2
- **Framework**: [Laravel 12](https://laravel.com)
- **Authentication**: Laravel Breeze (custom session-based untuk admin)
- **Database**: MySQL
- **Testing**: PHPUnit

### Frontend
- **Template Engine**: Blade Templates
- **CSS Framework**: [Tailwind CSS](https://tailwindcss.com) v3.1
- **JavaScript**: Alpine.js v3.4
- **Build Tool**: Vite v7.0
- **HTTP Client**: Axios v1.11
- **Calendar**: FullCalendar v6.1.10
- **Alerts**: SweetAlert2
- **Icons**: Heroicons

### Libraries & Packages
- **PDF Export**: [DomPDF](https://github.com/barryvdh/laravel-dompdf) v3.1
- **Dummy Data**: Faker v1.23

### Development Tools
- **Package Manager**: Composer & NPM
- **Version Control**: Git
- **Code Formatter**: Laravel Pint
- **Container**: Laravel Sail (Docker)

## Akses Website
   - **Public**: http://127.0.0.1:8000
   - **Admin Login**: http://127.0.0.1:8000/admin/login
     - **Email**: `admin@example.com`
     - **Password**: `password`

## 👨‍💻 Author
**Nurul Sakhila Indayana**
Projek Akhir Mandiri Mata Kuliah Pengembangan Sistem Informasi Berbasis Web Lanjut.