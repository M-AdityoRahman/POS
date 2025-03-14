<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_supplier')->insert([
            [
                'supplier_kode' => 'ELEK001',
                'supplier_nama' => 'PT. Elektronik Jaya',
                'supplier_alamat' => 'Jl. Sudirman No. 1, Jakarta',
                'supplier_telepon' => '021-1234567'
            ],
            [
                'supplier_kode' => 'PAKA002',
                'supplier_nama' => 'CV. Pakaian Sejahtera',
                'supplier_alamat' => 'Jl. Merdeka No. 2, Bandung',
                'supplier_telepon' => '022-7654321'
            ],
            [
                'supplier_kode' => 'MAKA003',
                'supplier_nama' => 'UD. Makanan Makmur',
                'supplier_alamat' => 'Jl. Diponegoro No. 3, Surabaya',
                'supplier_telepon' => '031-9876543'
            ],
        ]);
    }
}
