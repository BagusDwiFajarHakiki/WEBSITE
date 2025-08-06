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
        Schema::create('beranda', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        // Tabel untuk Video Profil
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file_path');
            $table->boolean('is_main')->default(false);
            $table->timestamps();
        });

        // Tabel untuk Foto Profil
        Schema::create('fotos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file_path');
            $table->boolean('is_main')->default(false);
            $table->timestamps();
        });

        // Tabel untuk Slogan Desa
        Schema::create('slogans', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->boolean('is_main')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beranda');
        Schema::dropIfExists('videos');
        Schema::dropIfExists('fotos');
        Schema::dropIfExists('slogans');
    }
};