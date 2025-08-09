<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class profil extends Model
{
    use HasFactory;
    protected $table = 'profils';
    protected $fillable = ['profil', 'visi', 'misi'];
}
