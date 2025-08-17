<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class umkm extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto',
        'nama_umkm',
        'pemilik',
        'kontak',
        'alamat',
    ];
}
