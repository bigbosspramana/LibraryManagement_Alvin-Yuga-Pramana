<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $ebooks = [
            [
                'judul' => 'Belajar Laravel untuk Pemula',
                'deskripsi' => 'Buku ini adalah panduan lengkap untuk memahami Laravel bagi pemula.',
            ],
            [
                'judul' => 'Pengembangan Web dengan PHP',
                'deskripsi' => 'Buku ini mengajarkan pengembangan web dengan PHP dan MySQL dari dasar hingga tingkat lanjut.',
            ],
            [
                'judul' => 'Mastering JavaScript',
                'deskripsi' => 'Panduan lengkap untuk memahami JavaScript dari pemula hingga mahir.',
            ],
            [
                'judul' => 'Belajar Laravel untuk Pemula',
                'deskripsi' => 'Buku ini adalah panduan lengkap untuk memahami Laravel bagi pemula.',
            ],
            [
                'judul' => 'Pengembangan Web dengan PHP',
                'deskripsi' => 'Buku ini mengajarkan pengembangan web dengan PHP dan MySQL dari dasar hingga tingkat lanjut.',
            ],
            [
                'judul' => 'Mastering JavaScript',
                'deskripsi' => 'Panduan lengkap untuk memahami JavaScript dari pemula hingga mahir.',
            ],
            [
                'judul' => 'Fundamentals of Python Programming',
                'deskripsi' => 'Panduan untuk memulai pemrograman dengan Python, dari dasar hingga konsep-konsep penting.',
            ],
            [
                'judul' => 'React for Beginners',
                'deskripsi' => 'Buku ini mengajarkan dasar-dasar React untuk membangun aplikasi web modern.',
            ],
            [
                'judul' => 'Web Design with HTML & CSS',
                'deskripsi' => 'Panduan praktis untuk membuat website yang menarik menggunakan HTML dan CSS.',
            ],
            [
                'judul' => 'Database Management with MySQL',
                'deskripsi' => 'Belajar tentang manajemen database dan SQL menggunakan MySQL.',
            ],
        ];

        foreach ($ebooks as $ebook) {
            DB::table('ebooks') -> insert([
                'judul' => $ebook['judul'],
                'deskripsi' => $ebook['deskripsi'],
                'halaman' => $faker->numberBetween(100, 500), // Faker untuk halaman
                'tahun_terbit' => $faker->year(), // Faker untuk tahun terbit
                'penulis' => $faker->name, // Faker untuk penulis
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
