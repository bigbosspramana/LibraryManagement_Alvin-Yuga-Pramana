<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Paper;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paper>
 */
class PaperFactory extends Factory
{
    protected $model = Paper::class;

    public function definition()
    {
        $papers = [
            [
                'Judul Paper' => 'Optimasi Algoritma Pembelajaran Mesin untuk Data Besar',
                'Deskripsi Paper' => 'Paper ini membahas teknik optimasi pada algoritma pembelajaran mesin untuk memproses data besar dengan lebih efisien.',
            ],
            [
                'Judul Paper' => 'Analisis Performa Sistem Komunikasi 5G',
                'Deskripsi Paper' => 'Menganalisis performa sistem komunikasi 5G dalam berbagai kondisi jaringan dan tantangan implementasinya.',
            ],
            [
                'Judul Paper' => 'Penerapan Blockchain dalam Sistem Keamanan Digital',
                'Deskripsi Paper' => 'Paper ini membahas penerapan teknologi blockchain untuk meningkatkan keamanan dalam transaksi digital.',
            ],
            [
                'Judul Paper' => 'Pengembangan Sistem Kecerdasan Buatan untuk Pengolahan Citra Medis',
                'Deskripsi Paper' => 'Menjelaskan pengembangan sistem kecerdasan buatan yang dapat membantu dalam analisis dan pengolahan citra medis.',
            ],
            [
                'Judul Paper' => 'Evaluasi Sistem Keamanan pada Jaringan Internet of Things',
                'Deskripsi Paper' => 'Membahas tantangan dan solusi dalam menjaga keamanan pada perangkat yang terhubung dalam jaringan Internet of Things (IoT).',
            ],
            [
                'Judul Paper' => 'Penerapan Teknologi Augmented Reality dalam Pendidikan',
                'Deskripsi Paper' => 'Membahas penggunaan augmented reality dalam dunia pendidikan untuk menciptakan pengalaman belajar yang lebih interaktif.',
            ],
            [
                'Judul Paper' => 'Teknologi Wearable dan Pengaruhnya terhadap Kesehatan Masyarakat',
                'Deskripsi Paper' => 'Menilai penggunaan teknologi wearable dalam memantau kesehatan dan dampaknya terhadap pola hidup sehat masyarakat.',
            ],
            [
                'Judul Paper' => 'Cloud Computing dan Dampaknya terhadap Infrastruktur TI Tradisional',
                'Deskripsi Paper' => 'Menganalisis perubahan yang dibawa oleh cloud computing terhadap pengelolaan infrastruktur TI tradisional.',
            ],
            [
                'Judul Paper' => 'Implementasi Big Data dalam Pengelolaan Sumber Daya Alam',
                'Deskripsi Paper' => 'Membahas bagaimana big data dapat digunakan untuk mengoptimalkan pengelolaan sumber daya alam secara lebih efisien.',
            ],
            [
                'Judul Paper' => 'Menggunakan Teknologi 3D Printing untuk Pembangunan Infrastruktur',
                'Deskripsi Paper' => 'Menyelidiki penerapan teknologi 3D printing dalam pembangunan infrastruktur dan potensi masa depannya.',
            ],
        ];

        $data = [];
        foreach ($papers as $paper) {
            $data[] = [
                'Judul Paper' => $paper['Judul Paper'],
                'Deskripsi Paper' => $paper['Deskripsi Paper'],
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
