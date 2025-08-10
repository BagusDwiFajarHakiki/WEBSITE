<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ListBumdes extends Model
{
    use HasFactory;

    protected $table = 'listbumdes';
    protected $fillable = [
        'name',
        'deskripsi',
        'fotopath',
    ];
}
