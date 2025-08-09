<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class perangkat extends Model
{
    use HasFactory;
    protected $table = 'perangkats';
    protected $fillable = ['foto','nama','jabatan','kontak','alamat'];
}
