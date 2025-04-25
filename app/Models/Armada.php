<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armada extends Model
{
    use HasFactory;

    protected $table = 'armada';
    
    protected $fillable = [
        'category_id',
        'nama_mobil',
        'slug',
        'deskripsi',
        'ukuran',
        'berat',
        'muatan',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(CategoryArmada::class);
    }
}
