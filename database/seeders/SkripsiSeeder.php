<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SkripsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $theses = [
            [
                'judul' => 'Pengaruh Penggunaan Teknologi Augmented Reality dalam Pembelajaran Matematika',
                'deskripsi' => 'Skripsi ini menganalisis pengaruh penggunaan augmented reality dalam meningkatkan pemahaman siswa terhadap konsep matematika.',
            ],
            [
                'judul' => 'Sistem Informasi Pengelolaan Inventaris Barang Berbasis Web di Perusahaan XYZ',
                'deskripsi' => 'Membahas pembuatan sistem informasi berbasis web untuk mengelola inventaris barang di perusahaan XYZ agar lebih efisien.',
            ],
            [
                'judul' => 'Implementasi Algoritma Klasifikasi untuk Prediksi Penyakit Jantung pada Pasien',
                'deskripsi' => 'Meneliti penggunaan algoritma klasifikasi untuk memprediksi kemungkinan seseorang terkena penyakit jantung berdasarkan data medis.',
            ],
            [
                'judul' => 'Analisis Keamanan Sistem Jaringan pada Aplikasi E-Commerce Menggunakan Enkripsi',
                'deskripsi' => 'Skripsi ini membahas penerapan teknik enkripsi untuk meningkatkan keamanan data pengguna pada aplikasi e-commerce.',
            ],
            [
                'judul' => 'Perancangan Sistem Manajemen Keuangan Keluarga Berbasis Android',
                'deskripsi' => 'Membahas pembuatan aplikasi manajemen keuangan keluarga berbasis Android untuk memudahkan perencanaan keuangan sehari-hari.',
            ],
            [
                'judul' => 'Pengembangan Sistem Deteksi Penyakit Tanaman Menggunakan Metode Citra Digital',
                'deskripsi' => 'Skripsi ini membahas tentang sistem deteksi penyakit pada tanaman dengan menggunakan citra digital dan teknik pemrosesan gambar.',
            ],
            [
                'judul' => 'Implementasi Teknologi Internet of Things untuk Monitoring Kualitas Udara',
                'deskripsi' => 'Meneliti penggunaan IoT dalam sistem monitoring kualitas udara untuk memantau tingkat polusi di area perkotaan.',
            ],
            [
                'judul' => 'Penerapan Algoritma Deep Learning dalam Pengenalan Wajah pada Aplikasi Keamanan',
                'deskripsi' => 'Menganalisis penggunaan deep learning dalam pengenalan wajah untuk meningkatkan tingkat keamanan pada aplikasi.',
            ],
            [
                'judul' => 'Optimasi Proses Bisnis Menggunakan Robotic Process Automation (RPA) pada Perusahaan XYZ',
                'deskripsi' => 'Membahas penerapan Robotic Process Automation (RPA) untuk mengoptimalkan proses bisnis di perusahaan XYZ.',
            ],
            [
                'judul' => 'Pengembangan Aplikasi e-Learning Berbasis Mobile untuk Pembelajaran Bahasa Inggris',
                'deskripsi' => 'Skripsi ini membahas pembuatan aplikasi mobile berbasis Android untuk mendukung pembelajaran bahasa Inggris secara daring.',
            ],
        ];

        foreach ($theses as $skripsi) {
            DB::table('skripsis') -> insert([
                'judul' => $skripsi['judul'],
                'deskripsi' => $skripsi['deskripsi'],
                'halaman' => $faker->numberBetween(1, 30), // Faker untuk halaman
                'tahun_terbit' => $faker->year(), // Faker untuk tahun terbit
                'penulis' => $faker->name, // Faker untuk penulis
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
