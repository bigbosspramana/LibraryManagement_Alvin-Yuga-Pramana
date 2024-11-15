<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Skripsi;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skripsi>
 */
class SkripsiFactory extends Factory
{
    protected $model = Skripsi::class;

    public function definition()
    {
        $theses = [
            [
                'Judul Skripsi' => 'Pengaruh Penggunaan Teknologi Augmented Reality dalam Pembelajaran Matematika',
                'Deskripsi Skripsi' => 'Skripsi ini menganalisis pengaruh penggunaan augmented reality dalam meningkatkan pemahaman siswa terhadap konsep matematika.',
            ],
            [
                'Judul Skripsi' => 'Sistem Informasi Pengelolaan Inventaris Barang Berbasis Web di Perusahaan XYZ',
                'Deskripsi Skripsi' => 'Membahas pembuatan sistem informasi berbasis web untuk mengelola inventaris barang di perusahaan XYZ agar lebih efisien.',
            ],
            [
                'Judul Skripsi' => 'Implementasi Algoritma Klasifikasi untuk Prediksi Penyakit Jantung pada Pasien',
                'Deskripsi Skripsi' => 'Meneliti penggunaan algoritma klasifikasi untuk memprediksi kemungkinan seseorang terkena penyakit jantung berdasarkan data medis.',
            ],
            [
                'Judul Skripsi' => 'Analisis Keamanan Sistem Jaringan pada Aplikasi E-Commerce Menggunakan Enkripsi',
                'Deskripsi Skripsi' => 'Skripsi ini membahas penerapan teknik enkripsi untuk meningkatkan keamanan data pengguna pada aplikasi e-commerce.',
            ],
            [
                'Judul Skripsi' => 'Perancangan Sistem Manajemen Keuangan Keluarga Berbasis Android',
                'Deskripsi Skripsi' => 'Membahas pembuatan aplikasi manajemen keuangan keluarga berbasis Android untuk memudahkan perencanaan keuangan sehari-hari.',
            ],
            [
                'Judul Skripsi' => 'Pengembangan Sistem Deteksi Penyakit Tanaman Menggunakan Metode Citra Digital',
                'Deskripsi Skripsi' => 'Skripsi ini membahas tentang sistem deteksi penyakit pada tanaman dengan menggunakan citra digital dan teknik pemrosesan gambar.',
            ],
            [
                'Judul Skripsi' => 'Implementasi Teknologi Internet of Things untuk Monitoring Kualitas Udara',
                'Deskripsi Skripsi' => 'Meneliti penggunaan IoT dalam sistem monitoring kualitas udara untuk memantau tingkat polusi di area perkotaan.',
            ],
            [
                'Judul Skripsi' => 'Penerapan Algoritma Deep Learning dalam Pengenalan Wajah pada Aplikasi Keamanan',
                'Deskripsi Skripsi' => 'Menganalisis penggunaan deep learning dalam pengenalan wajah untuk meningkatkan tingkat keamanan pada aplikasi.',
            ],
            [
                'Judul Skripsi' => 'Optimasi Proses Bisnis Menggunakan Robotic Process Automation (RPA) pada Perusahaan XYZ',
                'Deskripsi Skripsi' => 'Membahas penerapan Robotic Process Automation (RPA) untuk mengoptimalkan proses bisnis di perusahaan XYZ.',
            ],
            [
                'Judul Skripsi' => 'Pengembangan Aplikasi e-Learning Berbasis Mobile untuk Pembelajaran Bahasa Inggris',
                'Deskripsi Skripsi' => 'Skripsi ini membahas pembuatan aplikasi mobile berbasis Android untuk mendukung pembelajaran bahasa Inggris secara daring.',
            ],
        ];

        $data = [];
        foreach ($theses as $skripsi) {
            $data[] = [
                'Judul Skripsi' => $skripsi['Judul Skripsi'],
                'Deskripsi Skripsi' => $skripsi['Deskripsi Skripsi'],
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
