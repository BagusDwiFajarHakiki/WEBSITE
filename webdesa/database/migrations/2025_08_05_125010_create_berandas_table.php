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
        $table->string('gambar')->nullable();
        $table->boolean('status')->default(0)->nullable();
        $table->timestamps();
        });
        
        Schema::create('banners', function (Blueprint $table) {
        $table->id();
        $table->string('gambar')->nullable();
        $table->boolean('status')->default(0)->nullable();
        $table->timestamps();
        });
        
        Schema::create('text_banners', function (Blueprint $table) {
        $table->id();
        $table->text('h1')->nullable();
        $table->text('h2')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beranda');
        Schema::dropIfExists('pengumuman');
        Schema::dropIfExists('banners');
        Schema::dropIfExists('text_banners');
    }
};