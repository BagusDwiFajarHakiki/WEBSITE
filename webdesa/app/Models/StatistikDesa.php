<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatistikDesa extends Model
{
    use HasFactory;
    protected $table = 'statistik_desa';
    protected $fillable = [
        'luas_wilayah', 
        'jumlah_dusun', 
        'jumlah_penduduk', 
        'jumlah_rt', 
        'jumlah_rw', 
        'mata_pencaharian_utama'
    ];
}
