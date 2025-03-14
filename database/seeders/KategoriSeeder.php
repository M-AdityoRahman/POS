<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $data = [
            ['kategori_nama' => 'Elektronik'],
            ['kategori_nama' => 'Pakaian'],
            ['kategori_nama' => 'Makanan'],
            ['kategori_nama' => 'Peralatan Rumah'],
            ['kategori_nama' => 'Mainan'],
        ];

        DB::table('m_kategori')->insert($data);
    }
}
