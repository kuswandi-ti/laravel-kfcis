<?php

namespace Database\Seeders;

use App\Models\Need;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NeedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = 'Super Admin';

        $input = [
            ['name' => 'Pembelian Alat Elektronik', 'slug' => Str::slug('Pembelian Alat Elektronik'), 'created_by' => $user],
            ['name' => 'Pembelian Kendaraan Bermotor Roda 2', 'slug' => Str::slug('Pembelian Kendaraan Bermotor Roda 2'), 'created_by' => $user],
            ['name' => 'Pembelian Kendaraan Bermotor Roda 4', 'slug' => Str::slug('Pembelian Kendaraan Bermotor Roda 4'), 'created_by' => $user],
            ['name' => 'Pembelian Gadget', 'slug' => Str::slug('Pembelian Gadget'), 'created_by' => $user],
            ['name' => 'Pembelian Laptop', 'slug' => Str::slug('Pembelian Laptop'), 'created_by' => $user],
            ['name' => 'Pembelian Komputer PC', 'slug' => Str::slug('Pembelian Komputer PC'), 'created_by' => $user],
            ['name' => 'Pembelian Alat Rumah Tangga', 'slug' => Str::slug('Pembelian Alat Rumah Tangga'), 'created_by' => $user],
            ['name' => 'Pembelian Alat Olahraga', 'slug' => Str::slug('Pembelian Alat Olahraga'), 'created_by' => $user],
            ['name' => 'Modal Usaha', 'slug' => Str::slug('Modal Usaha'), 'created_by' => $user],
            ['name' => 'Acara Keluarga', 'slug' => Str::slug('Acara Keluarga'), 'created_by' => $user],
            ['name' => 'Kepentingan Keluarga', 'slug' => Str::slug('Kepentingan Keluarga'), 'created_by' => $user],
            ['name' => 'Renovasi Rumah', 'slug' => Str::slug('Renovasi Rumah'), 'created_by' => $user],
            ['name' => 'Pembelian Material Bangunan', 'slug' => Str::slug('Pembelian Material Bangunan'), 'created_by' => $user],
            ['name' => 'Pembelian Aksesoris Kendaraan Bermotor Roda 2', 'slug' => Str::slug('Pembelian Aksesoris Kendaraan Bermotor Roda 2'), 'created_by' => $user],
            ['name' => 'Pembelian Aksesoris Kendaraan Bermotor Roda 4', 'slug' => Str::slug('Pembelian Aksesoris Kendaraan Bermotor Roda 4'), 'created_by' => $user],
            ['name' => 'Pembelian Alat Kesehatan', 'slug' => Str::slug('Pembelian Alat Kesehatan'), 'created_by' => $user],
            ['name' => 'Biaya Pendidikan', 'slug' => Str::slug('Biaya Pendidikan'), 'created_by' => $user],
            ['name' => 'Biaya Pengobatan', 'slug' => Str::slug('Biaya Pengobatan'), 'created_by' => $user],
            ['name' => 'Fashion', 'slug' => Str::slug('Fashion'), 'created_by' => $user],
            ['name' => 'Pembayaran Cicilan Rumah', 'slug' => Str::slug('Pembayaran Cicilan Rumah'), 'created_by' => $user],
            ['name' => 'Pembayaran Cicilan Pinjaman', 'slug' => Str::slug('Pembayaran Cicilan Pinjaman'), 'created_by' => $user],
            ['name' => 'Pembayaran Asuransi', 'slug' => Str::slug('Pembayaran Asuransi'), 'created_by' => $user],
            ['name' => 'Pembelian Tempat Tinggal', 'slug' => Str::slug('Pembelian Tempat Tinggal'), 'created_by' => $user],
            ['name' => 'Pembelian Tempat Usaha', 'slug' => Str::slug('Pembelian Tempat Usaha'), 'created_by' => $user],
            ['name' => 'Kebutuhan Orang Tua', 'slug' => Str::slug('Kebutuhan Orang Tua'), 'created_by' => $user],
            ['name' => 'Bayar Pajak', 'slug' => Str::slug('Bayar Pajak'), 'created_by' => $user],
            ['name' => 'Biaya Transportasi', 'slug' => Str::slug('Biaya Transportasi'), 'created_by' => $user],
            ['name' => 'Pembelian Logam Mulia', 'slug' => Str::slug('Pembelian Logam Mulia'), 'created_by' => $user],
            ['name' => 'Pembelian Furniture', 'slug' => Str::slug('Pembelian Furniture'), 'created_by' => $user],
            ['name' => 'Pembelian Hewan Ternak', 'slug' => Str::slug('Pembelian Hewan Ternak'), 'created_by' => $user],
            ['name' => 'Biaya Pernikahan', 'slug' => Str::slug('Biaya Pernikahan'), 'created_by' => $user],
            ['name' => 'Pembelian Sembako', 'slug' => Str::slug('Pembelian Sembako'), 'created_by' => $user],
        ];
        foreach ($input as $item) {
            Need::create($item);
        }
    }
}
