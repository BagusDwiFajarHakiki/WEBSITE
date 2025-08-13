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
            $table->string('name');
            $table->string('file_path');
            $table->boolean('is_main')->default(false);
            $table->timestamps();
        });

        Schema::create('pengumuman', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->text('isi');
        $table->string('gambar')->nullable();
        $table->boolean('status')->default(0)->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beranda');
    }
};