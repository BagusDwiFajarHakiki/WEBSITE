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
        Schema::create('statistik_desa', function (Blueprint $table) {
            $table->id();
            $table->decimal('luas_wilayah', 8, 2)->nullable();
            $table->integer('jumlah_dusun')->nullable();
            $table->integer('jumlah_penduduk')->nullable();
            $table->integer('jumlah_rt')->nullable();
            $table->integer('jumlah_rw')->nullable();
            $table->string('mata_pencaharian_utama')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistik_desa');
    }
};
