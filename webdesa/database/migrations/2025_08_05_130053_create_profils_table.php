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
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->text('profil')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->timestamps();
        });

        Schema::create('strukturs', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });

        schema::create('perangkats', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('nama')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('kontak')->nullable();
            $table->string('alamat')->nullable();
            $table->timestamps();
        });

        Schema::create('Maps', function (Blueprint $table) {
            $table->id();
            $table->string('peta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
        Schema::dropIfExists('strukturs');
        Schema::dropIfExists('perangkats');
        Schema::dropIfExists('Maps');
    }
};
