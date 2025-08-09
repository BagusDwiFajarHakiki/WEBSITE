<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    protected $table = 'gallery';

    protected $fillable = ['judul', 'isi', 'gambar'];
}
