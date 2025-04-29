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

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                $query->where('nama_mobil', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%')
                    ->orWhere('ukuran', 'like', '%' . $search . '%')
                    ->orWhere('muatan', 'like', '%' . $search . '%')
                    ->orWhereHas('category', function($query) use ($search) {
                        $query->where('nama_kategori', 'like', '%' . $search . '%');
                    });
            });
        });
    }
}
