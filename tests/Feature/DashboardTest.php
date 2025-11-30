<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_cannot_be_accessed_by_guest()
    {
        $response = $this->get('/admin/dashboard');

        $response->assertRedirect('/admin/login');
    }

    public function test_dashboard_can_be_accessed_by_admin()
    {
        $admin = Admin::create([
            'name' => 'Admin Test',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->withSession(['admin_id' => $admin->id])
                         ->get('/admin/dashboard');

        $response->assertStatus(200);
    }
}
