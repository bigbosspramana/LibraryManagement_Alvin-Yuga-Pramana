<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        // return [
        //     'Judul Buku' => $this->faker->unique()->words(3, true),
        //     'Halaman' => $this->faker->randomNumber,
        //     'Deskripsi Buku' => $this->faker->paragraph(2, true),
        //     'Tahun Terbit' => $this->faker->numberBetween(2000, 2018),
        //     'Penulis' => $this->faker->name,
        // ];
        $books = [
            [
                'Judul Buku' => 'Belajar Laravel untuk Pemula',
                'Deskripsi Buku' => 'Buku ini adalah panduan lengkap untuk memahami Laravel bagi pemula.',
            ],
            [
                'Judul Buku' => 'Pengembangan Web dengan PHP',
                'Deskripsi Buku' => 'Buku ini mengajarkan pengembangan web dengan PHP dan MySQL dari dasar hingga tingkat lanjut.',
            ],
            [
                'Judul Buku' => 'Mastering JavaScript',
                'Deskripsi Buku' => 'Panduan lengkap untuk memahami JavaScript dari pemula hingga mahir.',
            ],
            [
                'Judul Buku' => 'Belajar Laravel untuk Pemula',
                'Deskripsi Buku' => 'Buku ini adalah panduan lengkap untuk memahami Laravel bagi pemula.',
            ],
            [
                'Judul Buku' => 'Pengembangan Web dengan PHP',
                'Deskripsi Buku' => 'Buku ini mengajarkan pengembangan web dengan PHP dan MySQL dari dasar hingga tingkat lanjut.',
            ],
            [
                'Judul Buku' => 'Mastering JavaScript',
                'Deskripsi Buku' => 'Panduan lengkap untuk memahami JavaScript dari pemula hingga mahir.',
            ],
            [
                'Judul Buku' => 'Fundamentals of Python Programming',
                'Deskripsi Buku' => 'Panduan untuk memulai pemrograman dengan Python, dari dasar hingga konsep-konsep penting.',
            ],
            [
                'Judul Buku' => 'React for Beginners',
                'Deskripsi Buku' => 'Buku ini mengajarkan dasar-dasar React untuk membangun aplikasi web modern.',
            ],
            [
                'Judul Buku' => 'Web Design with HTML & CSS',
                'Deskripsi Buku' => 'Panduan praktis untuk membuat website yang menarik menggunakan HTML dan CSS.',
            ],
            [
                'Judul Buku' => 'Database Management with MySQL',
                'Deskripsi Buku' => 'Belajar tentang manajemen database dan SQL menggunakan MySQL.',
            ],
        ];

        $data = [];
        foreach ($books as $book) {
            $data[] = [
                'Judul Buku' => $book['Judul Buku'],
                'Deskripsi Buku' => $book['Deskripsi Buku'],
                'Halaman' => $this->faker->numberBetween(100, 500), // Faker untuk halaman
                'Tahun Terbit' => $this->faker->year(), // Faker untuk tahun terbit
                'Penulis' => $this->faker->name, // Faker untuk penulis
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        return $data;
    }
}
