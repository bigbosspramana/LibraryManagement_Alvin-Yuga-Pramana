<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PustakawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $pustakawans = [
            [
                'email' => 'email123@gmail.com',
                'username' => 'pustakawan1',
                'password' => bcrypt('pUSTAKAWAN1'),
            ],
            [
                'email' => 'email456@gmail.com',
                'username' => 'pustakawan2',
                'password' => bcrypt('pUSTAKAWAN2'),
            ],
            [
                'email' => 'email678@gmail.com',
                'username' => 'pustakawan3',
                'password' => bcrypt('pUSTAKAWAN3'),
            ]
        ];

        foreach ($pustakawans as $pustakawan) {
            DB::table('pustakawans')->insert([
                'nama' => $faker->name,
                'jenis_kelamin' => $faker->boolean,
                'umur' => $faker->numberBetween(1, 80), // Faker untuk halaman
                'tanggal_lahir' => $faker->date(), // Faker untuk tahun terbit
                'email' => $pustakawan['email'], // Faker untuk penulis
                'username' => $pustakawan['username'],
                'password' => $pustakawan['password'],
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
