<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class struktur extends Model
{
    use HasFactory;
    protected $table = 'strukturs';
    protected $fillable = ['gambar'];
}
