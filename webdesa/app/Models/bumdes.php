<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//model untuk profil bumdes
class bumdes extends Model
{
    protected $table = 'bumdes';

    protected $guarded = ['deskripsi'];
}
