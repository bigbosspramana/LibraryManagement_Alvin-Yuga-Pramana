<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Journal;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Journal>
 */
class JournalFactory extends Factory
{
    protected $model = Journal::class;

    public function definition()
    {
        // return [
        //     'Judul Jorunal' => $this->faker->unique()->words(8, true),
        //     'Halaman' => $this->faker->randomNumber,
        //     'Deskripsi Journal' => $this->faker->paragraph(2, true),
        //     'Tahun Terbit' => $this->faker->numberBetween(2000, 2018),
        //     'Penulis' => $this->faker->name,
        // ];

        $journals = [
            [
                'Judul Journal' => 'Analisis Algoritma Pencarian Tercepat',
                'Deskripsi Journal' => 'Journal ini membahas tentang analisis berbagai algoritma pencarian dan implementasinya dalam pemrograman.',
            ],
            [
                'Judul Journal' => 'Keamanan Sistem Informasi di Era Digital',
                'Deskripsi Journal' => 'Journal ini membahas tantangan dan solusi dalam menjaga keamanan sistem informasi di dunia digital saat ini.',
            ],
            [
                'Judul Journal' => 'Penerapan Machine Learning dalam Data Mining',
                'Deskripsi Journal' => 'Membahas penerapan teknik machine learning dalam data mining untuk analisis data yang lebih akurat.',
            ],
            [
                'Judul Journal' => 'Teknik Pengolahan Citra Digital',
                'Deskripsi Journal' => 'Journal ini mengulas berbagai teknik pengolahan citra digital dan penerapannya dalam dunia industri.',
            ],
            [
                'Judul Journal' => 'Pemrograman Paralel untuk Pengolahan Data Besar',
                'Deskripsi Journal' => 'Membahas penerapan pemrograman paralel dalam pengolahan big data menggunakan teknologi terbaru.',
            ],
            [
                'Judul Journal' => 'Cloud Computing dan Implikasinya terhadap Bisnis',
                'Deskripsi Journal' => 'Membahas penerapan teknologi cloud computing dan dampaknya terhadap efisiensi operasional bisnis.',
            ],
            [
                'Judul Journal' => 'Pembangunan Aplikasi Mobile dengan Flutter',
                'Deskripsi Journal' => 'Membahas cara membangun aplikasi mobile menggunakan Flutter dan keunggulannya dibandingkan platform lain.',
            ],
            [
                'Judul Journal' => 'Penerapan Internet of Things dalam Kehidupan Sehari-hari',
                'Deskripsi Journal' => 'Journal ini mengulas penerapan teknologi IoT dalam kehidupan sehari-hari dan manfaatnya untuk kehidupan yang lebih terhubung.',
            ],
            [
                'Judul Journal' => 'Big Data dan Pengaruhnya dalam Pengambilan Keputusan',
                'Deskripsi Journal' => 'Journal ini membahas penggunaan big data dalam pengambilan keputusan di berbagai sektor industri.',
            ],
            [
                'Judul Journal' => 'Sistem Otomasi Rumah dengan Teknologi IoT',
                'Deskripsi Journal' => 'Membahas tentang penerapan teknologi IoT untuk membuat sistem otomasi rumah yang lebih efisien dan hemat energi.',
            ],
        ];

        $data = [];
        foreach ($journals as $journal) {
            $data[] = [
                'Judul Journal' => $journal['Judul Journal'],
                'Deskripsi Journal' => $journal['Deskripsi Journal'],
                'Halaman' => $this->faker->numberBetween(1, 30), // Faker untuk halaman
                'Tahun Terbit' => $this->faker->year(), // Faker untuk tahun terbit
                'Penulis' => $this->faker->name, // Faker untuk penulis
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        return $data;
    }
}
