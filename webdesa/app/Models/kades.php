<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kades extends Model
{
    protected $table = 'kades';

    protected $fillable = ['gambar', 'nama', 'jabatan'];
}
