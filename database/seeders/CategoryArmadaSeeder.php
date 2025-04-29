<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoryArmada;
use Illuminate\Support\Str;

class CategoryArmadaSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Box Alumunium',
            'Box Besi',
            'Blind Van',
            'Pickup',
            'Double Cabin',
            'Tronton',
            'Container 20 Feet',
            'Container 40 Feet',
            'Flatbed',
            'Lowbed',
            'Fuso',
            'CDE',
            'CDD',
            'Wing Box',
            'Trailer'
        ];

        foreach ($categories as $category) {
            CategoryArmada::create([
                'nama_kategori' => $category,
                'slug' => Str::slug($category),
                'images' => 'category-armada-images/default.jpg'
            ]);
        }
    }
}
