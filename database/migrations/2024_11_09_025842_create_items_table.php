<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); // Judul item (untuk semua jenis)
            $table->string('type'); // Menyimpan tipe item (book, journal, cd, dsb.)
            $table->text('deskripsi')->nullable(); // Deskripsi item (untuk Book, Journal, Skripsi)
            $table->string('halaman')->nullable(); // Halaman (untuk Book, Journal, Skripsi)
            $table->string('penulis')->nullable(); // Penulis (untuk Book, Journal, Skripsi)
            $table->string('artis')->nullable(); // Artis (untuk CD)
            $table->string('genre')->nullable(); // Genre (untuk CD)
            $table->string('tahun_terbit'); // Tahun Terbit (untuk semua jenis)
            $table->timestamps(); // Untuk menyimpan waktu pembuatan dan pembaruan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
