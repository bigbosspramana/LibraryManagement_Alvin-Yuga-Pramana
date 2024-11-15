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
        Schema::create('pustakawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->boolean('jenis_kelamin')->comment('true = pria, false = wanita');
            $table->integer('umur');
            $table->string('tanggal_lahir');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->string('role')->default('pustakawan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pustakawans');
    }
};
