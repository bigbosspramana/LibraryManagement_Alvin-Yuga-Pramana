<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'username' => 'admin123',
                'password' => bcrypt('a1d2m3i4n5'), // Jangan lupa untuk mengenkripsi password
                'role' => 'admin',
            ],
        ];

        foreach ($admins as $admin) {
            DB::table('admins')->insert([
                'username' => $admin['username'],
                'password' => $admin['password'],
                'role' => $admin['role'],
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
