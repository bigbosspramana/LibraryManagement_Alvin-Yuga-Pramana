<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JournalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $journals = [
            [
                'judul' => 'Analisis Algoritma Pencarian Tercepat',
                'deskripsi' => 'Journal ini membahas tentang analisis berbagai algoritma pencarian dan implementasinya dalam pemrograman.',
            ],
            [
                'judul' => 'Keamanan Sistem Informasi di Era Digital',
                'deskripsi' => 'Journal ini membahas tantangan dan solusi dalam menjaga keamanan sistem informasi di dunia digital saat ini.',
            ],
            [
                'judul' => 'Penerapan Machine Learning dalam Data Mining',
                'deskripsi' => 'Membahas penerapan teknik machine learning dalam data mining untuk analisis data yang lebih akurat.',
            ],
            [
                'judul' => 'Teknik Pengolahan Citra Digital',
                'deskripsi' => 'Journal ini mengulas berbagai teknik pengolahan citra digital dan penerapannya dalam dunia industri.',
            ],
            [
                'judul' => 'Pemrograman Paralel untuk Pengolahan Data Besar',
                'deskripsi' => 'Membahas penerapan pemrograman paralel dalam pengolahan big data menggunakan teknologi terbaru.',
            ],
            [
                'judul' => 'Cloud Computing dan Implikasinya terhadap Bisnis',
                'deskripsi' => 'Membahas penerapan teknologi cloud computing dan dampaknya terhadap efisiensi operasional bisnis.',
            ],
            [
                'judul' => 'Pembangunan Aplikasi Mobile dengan Flutter',
                'deskripsi' => 'Membahas cara membangun aplikasi mobile menggunakan Flutter dan keunggulannya dibandingkan platform lain.',
            ],
            [
                'judul' => 'Penerapan Internet of Things dalam Kehidupan Sehari-hari',
                'deskripsi' => 'Journal ini mengulas penerapan teknologi IoT dalam kehidupan sehari-hari dan manfaatnya untuk kehidupan yang lebih terhubung.',
            ],
            [
                'judul' => 'Big Data dan Pengaruhnya dalam Pengambilan Keputusan',
                'deskripsi' => 'Journal ini membahas penggunaan big data dalam pengambilan keputusan di berbagai sektor industri.',
            ],
            [
                'judul' => 'Sistem Otomasi Rumah dengan Teknologi IoT',
                'deskripsi' => 'Membahas tentang penerapan teknologi IoT untuk membuat sistem otomasi rumah yang lebih efisien dan hemat energi.',
            ],
        ];

        foreach ($journals as $journal) {
            DB::table('journals') -> insert([
                'judul' => $journal['judul'],
                'deskripsi' => $journal['deskripsi'],
                'halaman' => $faker->numberBetween(1, 30), // Faker untuk halaman
                'tahun_terbit' => $faker->year(), // Faker untuk tahun terbit
                'penulis' => $faker->name, // Faker untuk penulis
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }

    }
}
