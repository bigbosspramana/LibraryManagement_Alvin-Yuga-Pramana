<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PaperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $papers = [
            [
                'judul' => 'Optimasi Algoritma Pembelajaran Mesin untuk Data Besar',
                'deskripsi' => 'Paper ini membahas teknik optimasi pada algoritma pembelajaran mesin untuk memproses data besar dengan lebih efisien.',
            ],
            [
                'judul' => 'Analisis Performa Sistem Komunikasi 5G',
                'deskripsi' => 'Menganalisis performa sistem komunikasi 5G dalam berbagai kondisi jaringan dan tantangan implementasinya.',
            ],
            [
                'judul' => 'Penerapan Blockchain dalam Sistem Keamanan Digital',
                'deskripsi' => 'Paper ini membahas penerapan teknologi blockchain untuk meningkatkan keamanan dalam transaksi digital.',
            ],
            [
                'judul' => 'Pengembangan Sistem Kecerdasan Buatan untuk Pengolahan Citra Medis',
                'deskripsi' => 'Menjelaskan pengembangan sistem kecerdasan buatan yang dapat membantu dalam analisis dan pengolahan citra medis.',
            ],
            [
                'judul' => 'Evaluasi Sistem Keamanan pada Jaringan Internet of Things',
                'deskripsi' => 'Membahas tantangan dan solusi dalam menjaga keamanan pada perangkat yang terhubung dalam jaringan Internet of Things (IoT).',
            ],
            [
                'judul' => 'Penerapan Teknologi Augmented Reality dalam Pendidikan',
                'deskripsi' => 'Membahas penggunaan augmented reality dalam dunia pendidikan untuk menciptakan pengalaman belajar yang lebih interaktif.',
            ],
            [
                'judul' => 'Teknologi Wearable dan Pengaruhnya terhadap Kesehatan Masyarakat',
                'deskripsi' => 'Menilai penggunaan teknologi wearable dalam memantau kesehatan dan dampaknya terhadap pola hidup sehat masyarakat.',
            ],
            [
                'judul' => 'Cloud Computing dan Dampaknya terhadap Infrastruktur TI Tradisional',
                'deskripsi' => 'Menganalisis perubahan yang dibawa oleh cloud computing terhadap pengelolaan infrastruktur TI tradisional.',
            ],
            [
                'judul' => 'Implementasi Big Data dalam Pengelolaan Sumber Daya Alam',
                'deskripsi' => 'Membahas bagaimana big data dapat digunakan untuk mengoptimalkan pengelolaan sumber daya alam secara lebih efisien.',
            ],
            [
                'judul' => 'Menggunakan Teknologi 3D Printing untuk Pembangunan Infrastruktur',
                'deskripsi' => 'Menyelidiki penerapan teknologi 3D printing dalam pembangunan infrastruktur dan potensi masa depannya.',
            ],
        ];

        foreach ($papers as $paper) {
            DB::table('papers') -> insert([
                'judul' => $paper['judul'],
                'deskripsi' => $paper['deskripsi'],
                'halaman' => $faker->numberBetween(1, 30), // Faker untuk halaman
                'tahun_terbit' => $faker->year(), // Faker untuk tahun terbit
                'penerbit' => $faker->randomElement(['Kompas', 'Tribun Timur', 'Fajar']),
                'penulis' => $faker->name, // Faker untuk penulis
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }

    }
}
