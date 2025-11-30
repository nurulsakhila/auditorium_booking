<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    public function test_booking_form_is_accessible()
    {
        $response = $this->get('/booking');
        $response->assertStatus(200);
    }

    public function test_public_can_submit_booking()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->create('surat.pdf', 100, 'application/pdf');

        $response = $this->post('/booking', [
            'peminjam' => 'Test Organization',
            'pic_name' => 'John Doe',
            'pic_phone' => '08123456789',
            'tanggal' => '2025-12-01',
            'jam_mulai' => '09:00',
            'tanggal_selesai' => '2025-12-01',
            'jam_selesai' => '12:00',
            'nama_kegiatan' => 'Test Event',
            'deskripsi' => 'This is a test event',
            'surat' => $file,
            'agree_rules' => true,
        ]);

        $response->assertRedirect(route('booking.form'));
        $response->assertSessionHas('success');
        
        $this->assertDatabaseHas('bookings', [
            'peminjam' => 'Test Organization',
            'nama_kegiatan' => 'Test Event',
            'status' => 'pending',
        ]);
    }

    public function test_admin_can_view_bookings()
    {
        $admin = Admin::create([
            'name' => 'Admin Test',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
        ]);

        Booking::create([
            'peminjam' => 'Test Org',
            'pic_name' => 'John Doe',
            'pic_phone' => '08123456789',
            'nama_kegiatan' => 'Test Event',
            'tanggal' => '2025-12-01',
            'tanggal_selesai' => '2025-12-01',
            'jam_mulai' => '09:00',
            'jam_selesai' => '12:00',
            'surat' => 'surat/test.pdf',
            'status' => 'pending',
        ]);

        $response = $this->withSession(['admin_id' => $admin->id])
                         ->get('/admin/booking');

        $response->assertStatus(200);
        $response->assertSee('Test Event');
    }

    public function test_admin_can_approve_booking()
    {
        $admin = Admin::create([
            'name' => 'Admin Test',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
        ]);

        $booking = Booking::create([
            'peminjam' => 'Test Org',
            'pic_name' => 'John Doe',
            'pic_phone' => '08123456789',
            'nama_kegiatan' => 'Test Event',
            'tanggal' => '2025-12-01',
            'tanggal_selesai' => '2025-12-01',
            'jam_mulai' => '09:00',
            'jam_selesai' => '12:00',
            'surat' => 'surat/test.pdf',
            'status' => 'pending',
        ]);

        $response = $this->withSession(['admin_id' => $admin->id])
                         ->post("/admin/booking/{$booking->id}/approve");

        $response->assertSessionHas('success');
        
        $this->assertDatabaseHas('bookings', [
            'id' => $booking->id,
            'status' => 'approved',
        ]);
    }

    public function test_admin_can_reject_booking()
    {
        $admin = Admin::create([
            'name' => 'Admin Test',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
        ]);

        $booking = Booking::create([
            'peminjam' => 'Test Org',
            'pic_name' => 'John Doe',
            'pic_phone' => '08123456789',
            'nama_kegiatan' => 'Test Event',
            'tanggal' => '2025-12-01',
            'tanggal_selesai' => '2025-12-01',
            'jam_mulai' => '09:00',
            'jam_selesai' => '12:00',
            'surat' => 'surat/test.pdf',
            'status' => 'pending',
        ]);

        $response = $this->withSession(['admin_id' => $admin->id])
                         ->post("/admin/booking/{$booking->id}/reject");

        $response->assertSessionHas('success');
        
        $this->assertDatabaseHas('bookings', [
            'id' => $booking->id,
            'status' => 'rejected',
        ]);
    }
}
