<?php

namespace Database\Seeders;

use App\Models\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = 'Super Admin';

        $input = [
            ['name' => 'BELUM/TIDAK BEKERJA', 'created_by' => $user],
            ['name' => 'PEGAWAI NEGERI SIPIL', 'created_by' => $user],
            ['name' => 'TENTARA NASIONAL INDONESIA', 'created_by' => $user],
            ['name' => 'KEPOLISIAN RI', 'created_by' => $user],
            ['name' => 'KARYAWAN BUMN', 'created_by' => $user],
            ['name' => 'KARYAWAN BUMD', 'created_by' => $user],
            ['name' => 'ANGGOTA DPR-RI', 'created_by' => $user],
            ['name' => 'ANGGOTA DPD', 'created_by' => $user],
            ['name' => 'ANGGOTA BPK', 'created_by' => $user],
            ['name' => 'PRESIDEN', 'created_by' => $user],
            ['name' => 'WAKIL PRESIDEN', 'created_by' => $user],
            ['name' => 'ANGGOTA MAHKAMAH KONSTITUSI', 'created_by' => $user],
            ['name' => 'ANGGOTA KABINET/KEMENTERIAN', 'created_by' => $user],
            ['name' => 'DUTA BESAR', 'created_by' => $user],
            ['name' => 'GUBERNUR', 'created_by' => $user],
            ['name' => 'WAKIL GUBERNUR', 'created_by' => $user],
            ['name' => 'BUPATI', 'created_by' => $user],
            ['name' => 'WAKIL BUPATI', 'created_by' => $user],
            ['name' => 'WALIKOTA', 'created_by' => $user],
            ['name' => 'WAKIL WALIKOTA', 'created_by' => $user],
            ['name' => 'ANGGOTA DPRD PROVINSI', 'created_by' => $user],
            ['name' => 'ANGGOTA DPRD KABUPATEN/KOTA', 'created_by' => $user],
            ['name' => 'PENGACARA', 'created_by' => $user],
            ['name' => 'NOTARIS', 'created_by' => $user],
            ['name' => 'PENELITI', 'created_by' => $user],
            ['name' => 'PERANGKAT DESA', 'created_by' => $user],
            ['name' => 'KEPALA DESA', 'created_by' => $user],
            ['name' => 'DOSEN', 'created_by' => $user],
            ['name' => 'GURU', 'created_by' => $user],
            ['name' => 'PERDAGANGAN', 'created_by' => $user],
            ['name' => 'INDUSTRI', 'created_by' => $user],
            ['name' => 'KONSTRUKSI', 'created_by' => $user],
            ['name' => 'TRANSPORTASI', 'created_by' => $user],
            ['name' => 'KARYAWAN SWASTA', 'created_by' => $user],
            ['name' => 'KARYAWAN HONORER', 'created_by' => $user],
            ['name' => 'BURUH HARIAN LEPAS', 'created_by' => $user],
            ['name' => 'PEMBANTU RUMAH TANGGA', 'created_by' => $user],
            ['name' => 'TUKANG CUKUR', 'created_by' => $user],
            ['name' => 'TUKANG LISTRIK', 'created_by' => $user],
            ['name' => 'TUKANG BATU', 'created_by' => $user],
            ['name' => 'TUKANG KAYU', 'created_by' => $user],
            ['name' => 'TUKANG SOL SEPATU', 'created_by' => $user],
            ['name' => 'TUKANG LAS/PANDAI BESI', 'created_by' => $user],
            ['name' => 'TUKANG JAHIT', 'created_by' => $user],
            ['name' => 'TUKANG GIGI', 'created_by' => $user],
            ['name' => 'PENATA RIAS', 'created_by' => $user],
            ['name' => 'PENATA BUSANA', 'created_by' => $user],
            ['name' => 'PENATA RAMBUT', 'created_by' => $user],
            ['name' => 'MEKANIK', 'created_by' => $user],
            ['name' => 'SENIMAN', 'created_by' => $user],
            ['name' => 'TABIB', 'created_by' => $user],
            ['name' => 'PARAJI', 'created_by' => $user],
            ['name' => 'PERANCANG BUSANA', 'created_by' => $user],
            ['name' => 'PENTERJEMAH', 'created_by' => $user],
            ['name' => 'WARTAWAN', 'created_by' => $user],
            ['name' => 'JURU MASAK', 'created_by' => $user],
            ['name' => 'PROMOTOR ACARA', 'created_by' => $user],
            ['name' => 'PILOT', 'created_by' => $user],
            ['name' => 'ARSITEK', 'created_by' => $user],
            ['name' => 'AKUNTAN', 'created_by' => $user],
            ['name' => 'KONSULTAN', 'created_by' => $user],
            ['name' => 'PENYIAR TELEVISI', 'created_by' => $user],
            ['name' => 'PENYIAR RADIO', 'created_by' => $user],
            ['name' => 'PELAUT', 'created_by' => $user],
            ['name' => 'SOPIR', 'created_by' => $user],
            ['name' => 'PIALANG', 'created_by' => $user],
            ['name' => 'PARANORMAL', 'created_by' => $user],
            ['name' => 'PEDAGANG', 'created_by' => $user],
            ['name' => 'WIRASWASTA', 'created_by' => $user],
            ['name' => 'PETANI/PEKEBUN', 'created_by' => $user],
            ['name' => 'PETERNAK', 'created_by' => $user],
            ['name' => 'BURUH TANI/PERKEBUNAN', 'created_by' => $user],
            ['name' => 'BURUH PETERNAKAN', 'created_by' => $user],
            ['name' => 'NELAYAN/PERIKANAN', 'created_by' => $user],
            ['name' => 'BURUH NELAYAN/PERIKANAN', 'created_by' => $user],
            ['name' => 'IMAM MESJID', 'created_by' => $user],
            ['name' => 'PENDETA', 'created_by' => $user],
            ['name' => 'PASTOR', 'created_by' => $user],
            ['name' => 'USTADZ/MUBALIGH', 'created_by' => $user],
            ['name' => 'BIARAWATI', 'created_by' => $user],
            ['name' => 'PELAJAR/MAHASISWA', 'created_by' => $user],
            ['name' => 'DOKTER', 'created_by' => $user],
            ['name' => 'BIDAN', 'created_by' => $user],
            ['name' => 'PERAWAT', 'created_by' => $user],
            ['name' => 'APOTEKER', 'created_by' => $user],
            ['name' => 'PSIKIATER/PSIKOLOG', 'created_by' => $user],
            ['name' => 'PENSIUNAN', 'created_by' => $user],
            ['name' => 'MENGURUS RUMAH TANGGA', 'created_by' => $user],
            ['name' => 'LAINNYA', 'created_by' => $user],
        ];
        foreach ($input as $item) {
            Profession::create($item);
        }
    }
}
