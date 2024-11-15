<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $cds = [
            'Belajar Laravel untuk Pemula',
            'Pengembangan Web dengan PHP',
            'Mastering JavaScript',
            'Fundamentals of Python Programming',
            'React for Beginners',
            'Web Design with HTML & CSS',
            'Database Management with MySQL',
            'Data Science for Beginners',
            'Introduction to Artificial Intelligence',
            'Mobile App Development with Flutter',
        ];

        $genres = ['Pop', 'Rock', 'Jazz', 'Classical', 'Hip-Hop', 'Metal',];

        for ($i = 0; $i < 10; $i++) {
            $cd = $cds[$i];
            $genre = $genres[array_rand($genres)];

            DB::table('c_d_s')->insert([
                'judul' => $cd,
                'artis' => $faker->name,
                'genre' => $genre,
                'tahun_terbit' => $faker->numberBetween(2005, 2024),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
