<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryArmada extends Model
{
    use HasFactory;

    protected $table = 'category_armadas';

    protected $fillable = [
        'nama_kategori',
        'slug',
        'images'
    ];
}
