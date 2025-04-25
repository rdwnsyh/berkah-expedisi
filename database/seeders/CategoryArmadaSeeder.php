<?php

namespace Database\Seeders;

use App\Models\CategoryArmada;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryArmadaSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'nama_kategori' => 'Box',
                'slug' => Str::slug('Box'),
                'images' => 'kategori-armada/box.jpg'
            ],
            [
                'nama_kategori' => 'Pickup',
                'slug' => Str::slug('Pickup'),
                'images' => 'kategori-armada/pickup.jpg'
            ],
            [
                'nama_kategori' => 'Tronton',
                'slug' => Str::slug('Tronton'),
                'images' => 'kategori-armada/tronton.jpg'
            ]
        ];

        foreach ($categories as $category) {
            CategoryArmada::create($category);
        }
    }
}
