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
- **Export Data**: Rekap data peminjaman ke format **Excel** dan **PDF**.

## Teknologi yang Digunakan
- **Framework**: [Laravel 11](https://laravel.com)
- **Database**: MySQL
- **Frontend**: Blade Templates + [Tailwind CSS](https://tailwindcss.com)
- **Alerts**: SweetAlert2
- **Icons**: Heroicons

## Cara Instalasi

Ikuti langkah-langkah berikut untuk menjalankan projek ini di komputer lokal Anda:

1. **Clone Repository**
   ```bash
   git clone https://github.com/nurulsakhila/auditorium_booking.git
   cd auditorium_booking
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup Environment**
   - Copy file `.env.example` menjadi `.env`:
     ```bash
     cp .env.example .env
     ```
   - Atur koneksi database di file `.env`:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=booking
     DB_USERNAME=root
     DB_PASSWORD=
     ```

4. **Generate Key**
   ```bash
   php artisan key:generate
   ```

5. **Migrasi & Seeder Database**
   ```bash
   php artisan migrate:fresh --seed
   ```
   *(Command ini akan membuat database dan mengisi data dummy untuk testing)*

6. **Jalankan Aplikasi**
   Buka dua terminal terpisah dan jalankan:
   ```bash
   # Terminal 1 (Backend)
   php artisan serve

   # Terminal 2 (Frontend Assets)
   npm run dev
   ```

7. **Akses Website**
   - **Public**: http://127.0.0.1:8000
   - **Admin Login**: http://127.0.0.1:8000/admin/login
     - **Email**: `admin@example.com`
     - **Password**: `password`

## 👨‍💻 Author
**Nurul Sakhila Indayana**
Projek Akhir Mandiri Mata Kuliah Pengembangan Sistem Informasi Berbasis Web Lanjut.