<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class text_banners extends Model
{
    use HasFactory;
    protected $table = 'text_banners';
    protected $fillable = ['h1', 'h2'];
}
