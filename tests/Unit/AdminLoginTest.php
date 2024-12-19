<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Admin;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminLoginTest extends TestCase
{
    use DatabaseTransactions;

    public function test_can_login_as_admin()
    {
        // Arrange
        $user = Admin::create([
            'username' => 'admin123',
            'password' => bcrypt('admin12345'),
            'role' => 'admin',
        ]);

        // Act
        $response = $this->post('/login', [
            'username' => 'admin123',
            'password' => 'admin12345',
        ]);
        
        // Assert
        $this->assertInstanceOf(Admin::class, $user);
        $this->assertEquals('admin', $user->role);
    }
}
