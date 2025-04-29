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

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('nama_kategori', 'like', '%' . $search . '%');
        });
    }

    public function armadas()
    {
        return $this->hasMany(Armada::class, 'category_id');
    }
}
