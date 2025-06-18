<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class KaryaSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan user_id 1 ada dan valid
        DB::table('karya')->insert([
            [
                'user_id' => 1,
                'judul' => 'Lukisan Bunga Matahari',
                'gambar' => 'karya/sample1.jpg',
                'deskripsi' => 'Lukisan yang menggambarkan keindahan bunga matahari di pagi hari.',
                'harga' => 250000.00,
                'stok' => 1,
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'judul' => 'Ilustrasi Malam Berbintang',
                'gambar' => 'karya/sample2.jpg',
                'deskripsi' => 'Ilustrasi digital bertema malam dengan bintang bertaburan.',
                'harga' => 300000.00,
                'stok' => 1,
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
