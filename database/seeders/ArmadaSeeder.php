<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Armada;
use Illuminate\Support\Str;

class ArmadaSeeder extends Seeder
{
    public function run(): void
    {
        $armadas = [
            [
                'category_id' => 1,
                'nama_mobil' => 'Mitsubishi Colt Diesel Box Alumunium',
                'deskripsi' => 'Box Alumunium dengan kapasitas besar dan hemat bahan bakar',
                'ukuran' => '4.2 x 1.8 x 1.8 meter',
                'berat' => '2 ton',
                'muatan' => '4 ton'
            ],
            [
                'category_id' => 2,
                'nama_mobil' => 'Hino Dutro Box Besi',
                'deskripsi' => 'Box Besi kuat dan tahan lama',
                'ukuran' => '4.5 x 2.0 x 2.0 meter',
                'berat' => '3 ton',
                'muatan' => '5 ton'
            ],
            [
                'category_id' => 3,
                'nama_mobil' => 'Daihatsu Gran Max Blind Van',
                'deskripsi' => 'Van tertutup cocok untuk distribusi kota',
                'ukuran' => '3.5 x 1.5 x 1.8 meter',
                'berat' => '1 ton',
                'muatan' => '2 ton'
            ],
            [
                'category_id' => 4,
                'nama_mobil' => 'Toyota Hilux Pickup',
                'deskripsi' => 'Pickup tangguh segala medan',
                'ukuran' => '2.5 x 1.5 x 0.4 meter',
                'berat' => '1 ton',
                'muatan' => '1 ton'
            ],
            [
                'category_id' => 5,
                'nama_mobil' => 'Mitsubishi Triton Double Cabin',
                'deskripsi' => 'Double cabin nyaman untuk penumpang dan barang',
                'ukuran' => '2.5 x 1.5 x 0.4 meter',
                'berat' => '1.2 ton',
                'muatan' => '1 ton'
            ],
            [
                'category_id' => 6,
                'nama_mobil' => 'Hino Tronton 10 Roda',
                'deskripsi' => 'Truk besar untuk angkutan berat',
                'ukuran' => '9.0 x 2.5 x 2.5 meter',
                'berat' => '8 ton',
                'muatan' => '15 ton'
            ],
            [
                'category_id' => 7,
                'nama_mobil' => 'Container 20 Feet Standard',
                'deskripsi' => 'Container 20 feet standar internasional',
                'ukuran' => '6.0 x 2.4 x 2.6 meter',
                'berat' => '2.3 ton',
                'muatan' => '24 ton'
            ],
            [
                'category_id' => 8,
                'nama_mobil' => 'Container 40 Feet High Cube',
                'deskripsi' => 'Container 40 feet tinggi ekstra',
                'ukuran' => '12.0 x 2.4 x 2.9 meter',
                'berat' => '3.8 ton',
                'muatan' => '26 ton'
            ],
            [
                'category_id' => 9,
                'nama_mobil' => 'Flatbed Trailer',
                'deskripsi' => 'Trailer datar untuk kargo besar',
                'ukuran' => '12.0 x 2.5 x 0 meter',
                'berat' => '5 ton',
                'muatan' => '20 ton'
            ],
            [
                'category_id' => 10,
                'nama_mobil' => 'Lowbed Heavy Equipment',
                'deskripsi' => 'Khusus angkutan alat berat',
                'ukuran' => '12.0 x 3.0 x 0.5 meter',
                'berat' => '6 ton',
                'muatan' => '30 ton'
            ],
            [
                'category_id' => 11,
                'nama_mobil' => 'Mitsubishi Fuso Fighter',
                'deskripsi' => 'Truk tangguh untuk berbagai kebutuhan',
                'ukuran' => '7.0 x 2.4 x 2.2 meter',
                'berat' => '5 ton',
                'muatan' => '10 ton'
            ],
            [
                'category_id' => 12,
                'nama_mobil' => 'Mitsubishi Canter CDE',
                'deskripsi' => 'Truk ringan ekonomis',
                'ukuran' => '4.8 x 1.9 x 1.9 meter',
                'berat' => '2.5 ton',
                'muatan' => '5 ton'
            ],
            [
                'category_id' => 13,
                'nama_mobil' => 'Mitsubishi Canter CDD',
                'deskripsi' => 'Truk sedang serbaguna',
                'ukuran' => '5.2 x 2.0 x 2.0 meter',
                'berat' => '3 ton',
                'muatan' => '6 ton'
            ],
            [
                'category_id' => 14,
                'nama_mobil' => 'Hino Wing Box',
                'deskripsi' => 'Box dengan sistem wing untuk akses mudah',
                'ukuran' => '7.0 x 2.4 x 2.4 meter',
                'berat' => '4 ton',
                'muatan' => '8 ton'
            ],
            [
                'category_id' => 15,
                'nama_mobil' => 'Mercedes Benz Trailer Head',
                'deskripsi' => 'Prime mover untuk kontainer dan kargo berat',
                'ukuran' => '6.0 x 2.5 x 2.5 meter',
                'berat' => '7 ton',
                'muatan' => '40 ton'
            ]
        ];

        foreach ($armadas as $armada) {
            $armada['slug'] = Str::slug($armada['nama_mobil']);
            $armada['image'] = 'armada-images/default.jpg';
            Armada::create($armada);
        }
    }
}
