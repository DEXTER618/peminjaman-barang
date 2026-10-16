<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategoris')->insert([
            [
                'nama_kategori' => 'Komputer & Laptop',
                'deskripsi' => 'Komputer dan laptop untuk praktikum laboratorium.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Perangkat Jaringan',
                'deskripsi' => 'Peralatan untuk kebutuhan jaringan komputer.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Alat Perkabelan',
                'deskripsi' => 'Peralatan dan kabel pendukung praktikum.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Multimedia',
                'deskripsi' => 'Peralatan multimedia laboratorium.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
