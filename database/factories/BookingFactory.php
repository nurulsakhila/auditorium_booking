<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $organisasi = [
            'BEM FMIPA',
            'DPM FMIPA',
            'HIMALKOM',
            'HIMASKA',
            'HIMABIO',
            'HIMAKI',
            'KPA FMIPA',
            'ALKAMIL',
            'Himpunan Mahasiswa Fisika',
            'Himpunan Mahasiswa Statistika'
        ];

        $kegiatan = [
            'Seminar Nasional Teknologi Informasi',
            'Workshop Data Science',
            'Rapat Koordinasi BEM',
            'Pelatihan Kepemimpinan',
            'Diskusi Panel Lingkungan',
            'Lomba Debat Mahasiswa',
            'Presentasi Tugas Akhir',
            'Kuliah Tamu Industri',
            'Sosialisasi Program Kerja',
            'Festival Sains dan Teknologi',
            'Kompetisi Robotika',
            'Seminar Kewirausahaan',
            'Workshop Desain Grafis',
            'Pelatihan Public Speaking',
            'Rapat Pleno Organisasi'
        ];

        // Generate random start date within next 60 days
        $startDate = fake()->dateTimeBetween('now', '+60 days');
        
        // Random duration: 1-3 days
        $duration = fake()->numberBetween(0, 2);
        $endDate = (clone $startDate)->modify("+{$duration} days");

        // Random time slots
        $jamMulai = fake()->randomElement([
            '08:00', '09:00', '10:00', '13:00', '14:00', '15:00', '19:00'
        ]);
        
        $jamSelesai = fake()->randomElement([
            '10:00', '12:00', '14:00', '16:00', '17:00', '18:00', '21:00'
        ]);

        return [
            'peminjam' => fake()->randomElement($organisasi),
            'pic_name' => fake()->name(),
            'pic_phone' => fake()->numerify('08##########'),
            'nama_kegiatan' => fake()->randomElement($kegiatan),
            'deskripsi' => fake()->paragraph(2),
            'tanggal' => $startDate->format('Y-m-d'),
            'tanggal_selesai' => $endDate->format('Y-m-d'),
            'jam_mulai' => $jamMulai,
            'jam_selesai' => $jamSelesai,
            'status' => fake()->randomElement(['pending', 'approved', 'rejected']),
            'surat' => 'surat/dummy.pdf', // Dummy file path
        ];
    }

    /**
     * Indicate that the booking is pending.
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
        ]);
    }

    /**
     * Indicate that the booking is approved.
     */
    public function approved(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'approved',
        ]);
    }

    /**
     * Indicate that the booking is rejected.
     */
    public function rejected(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'rejected',
        ]);
    }
}
