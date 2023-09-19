<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\ChartOfAccount;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChartOfAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = 'Super Admin';

        $aktiva = ChartOfAccount::create([
            'code' => '100000',
            'slug' => Str::slug('100000'),
            'name' => 'Aktiva',
            'created_by' => $user,
        ]);
        $hutang = ChartOfAccount::create([
            'code' => '200000',
            'slug' => Str::slug('200000'),
            'name' => 'Hutang',
            'created_by' => $user,
        ]);
        $modal = ChartOfAccount::create([
            'code' => '300000',
            'slug' => Str::slug('300000'),
            'name' => 'Modal',
            'created_by' => $user,
        ]);
        $pendapatan = ChartOfAccount::create([
            'code' => '400000',
            'slug' => Str::slug('400000'),
            'name' => 'Pendapatan',
            'created_by' => $user,
        ]);
        $biaya = ChartOfAccount::create([
            'code' => '500000',
            'slug' => Str::slug('500000'),
            'name' => 'Biaya',
            'created_by' => $user,
        ]);

        /** Aktiva - Begin */
        $aktiva_lancar = ChartOfAccount::create([
            'code' => '101000',
            'slug' => Str::slug('101000'),
            'name' => 'Aktiva Lancar',
            'parent_id' => $aktiva->id,
            'created_by' => $user,
        ]);
        $item_aktiva_lancar = [
            ['code' => '101001', 'slug' => Str::slug('101001'), 'name' => 'Kas', 'parent_id' => $aktiva_lancar->id, 'created_by' => $user],
            ['code' => '101002', 'slug' => Str::slug('101002'), 'name' => 'BCA', 'parent_id' => $aktiva_lancar->id, 'created_by' => $user],
            ['code' => '101003', 'slug' => Str::slug('101003'), 'name' => 'Simpanan Pokok Anggota', 'parent_id' => $aktiva_lancar->id, 'created_by' => $user],
            ['code' => '101004', 'slug' => Str::slug('101004'), 'name' => 'Kasbon Anggota', 'parent_id' => $aktiva_lancar->id, 'created_by' => $user],
            ['code' => '101005', 'slug' => Str::slug('101005'), 'name' => 'Kasbon Pendanaan', 'parent_id' => $aktiva_lancar->id, 'created_by' => $user],
            ['code' => '101006', 'slug' => Str::slug('101006'), 'name' => 'Piutang ke Anggota', 'parent_id' => $aktiva_lancar->id, 'created_by' => $user],
            ['code' => '101007', 'slug' => Str::slug('101007'), 'name' => 'Piutang ke Non Anggota', 'parent_id' => $aktiva_lancar->id, 'created_by' => $user],
            ['code' => '101008', 'slug' => Str::slug('101008'), 'name' => 'Pajak PPH-21', 'parent_id' => $aktiva_lancar->id, 'created_by' => $user],
            ['code' => '101009', 'slug' => Str::slug('101009'), 'name' => 'Pajak PPH-23', 'parent_id' => $aktiva_lancar->id, 'created_by' => $user],
            ['code' => '101010', 'slug' => Str::slug('101010'), 'name' => 'Pajak PPH-25', 'parent_id' => $aktiva_lancar->id, 'created_by' => $user],
            ['code' => '101011', 'slug' => Str::slug('101011'), 'name' => 'Pajak PPH-4 (Ayat 2)', 'parent_id' => $aktiva_lancar->id, 'created_by' => $user],
            ['code' => '101012', 'slug' => Str::slug('101012'), 'name' => 'Piutang Lama ke FCI', 'parent_id' => $aktiva_lancar->id, 'created_by' => $user],
        ];
        foreach ($item_aktiva_lancar as $item) {
            ChartOfAccount::create($item);
        }
        $aktiva_tetap = ChartOfAccount::create([
            'code' => '102000',
            'slug' => Str::slug('102000'),
            'name' => 'Aktiva Tetap',
            'parent_id' => $aktiva->id,
            'created_by' => $user,
        ]);
        $item_aktiva_tetap = [
            ['code' => '102001', 'slug' => Str::slug('102001'), 'name' => 'Tanah & Bangunan', 'parent_id' => $aktiva_tetap->id, 'created_by' => $user],
            ['code' => '102002', 'slug' => Str::slug('102002'), 'name' => 'Peralatan Kantor', 'parent_id' => $aktiva_tetap->id, 'created_by' => $user],
            ['code' => '102003', 'slug' => Str::slug('102003'), 'name' => 'Akumulasi Penyusutan Peralatan Kantor', 'parent_id' => $aktiva_tetap->id, 'created_by' => $user],
        ];
        foreach ($item_aktiva_tetap as $item) {
            ChartOfAccount::create($item);
        }
        /** Aktiva - End */

        /** Hutang - Begin */

        $hutang_lancar = ChartOfAccount::create([
            'code' => '201000',
            'slug' => Str::slug('201000'),
            'name' => 'Hutang Lancar',
            'parent_id' => $hutang->id,
            'created_by' => $user,
        ]);
        $item_hutang_lancar = [
            ['code' => '201001', 'slug' => Str::slug('201001'), 'name' => 'Hutang FCI', 'parent_id' => $hutang_lancar->id, 'created_by' => $user],
            ['code' => '201002', 'slug' => Str::slug('201002'), 'name' => 'Hutang Lain-Lain', 'parent_id' => $hutang_lancar->id, 'created_by' => $user],
            ['code' => '201003', 'slug' => Str::slug('201003'), 'name' => 'Hutang Pajak', 'parent_id' => $hutang_lancar->id, 'created_by' => $user],
            ['code' => '201004', 'slug' => Str::slug('201004'), 'name' => 'Dana Anggota', 'parent_id' => $hutang_lancar->id, 'created_by' => $user],
            ['code' => '201005', 'slug' => Str::slug('201005'), 'name' => 'Dana Pendidikan', 'parent_id' => $hutang_lancar->id, 'created_by' => $user],
            ['code' => '201006', 'slug' => Str::slug('201006'), 'name' => 'Dana Pengurus', 'parent_id' => $hutang_lancar->id, 'created_by' => $user],
            ['code' => '201007', 'slug' => Str::slug('201007'), 'name' => 'Dana Karyawan', 'parent_id' => $hutang_lancar->id, 'created_by' => $user],
            ['code' => '201008', 'slug' => Str::slug('201008'), 'name' => 'Dana Sosial', 'parent_id' => $hutang_lancar->id, 'created_by' => $user],
            ['code' => '201009', 'slug' => Str::slug('201009'), 'name' => 'Dana Pembangunan Wilayah Kerja', 'parent_id' => $hutang_lancar->id, 'created_by' => $user],
            ['code' => '201010', 'slug' => Str::slug('201010'), 'name' => 'Utang Pajak PPH-21', 'parent_id' => $hutang_lancar->id, 'created_by' => $user],
            ['code' => '201011', 'slug' => Str::slug('201011'), 'name' => 'Utang Pajak PPH-4 (Ayat 2)', 'parent_id' => $hutang_lancar->id, 'created_by' => $user],
        ];
        foreach ($item_hutang_lancar as $item) {
            ChartOfAccount::create($item);
        }
        /** Hutang - End */

        /** Modal - Begin */

        $modal_sub = ChartOfAccount::create([
            'code' => '301000',
            'slug' => Str::slug('301000'),
            'name' => 'Modal',
            'parent_id' => $modal->id,
            'created_by' => $user,
        ]);
        $item_modal = [
            ['code' => '301001', 'slug' => Str::slug('301001'), 'name' => 'Modal', 'parent_id' => $modal_sub->id, 'created_by' => $user],
            ['code' => '301002', 'slug' => Str::slug('301002'), 'name' => 'Simpanan Pokok', 'parent_id' => $modal_sub->id, 'created_by' => $user],
            ['code' => '301003', 'slug' => Str::slug('301003'), 'name' => 'Simpanan Wajib', 'parent_id' => $modal_sub->id, 'created_by' => $user],
            ['code' => '301004', 'slug' => Str::slug('301004'), 'name' => 'Cadangan Umum', 'parent_id' => $modal_sub->id, 'created_by' => $user],
            ['code' => '301005', 'slug' => Str::slug('301005'), 'name' => 'Cadangan Resiko', 'parent_id' => $modal_sub->id, 'created_by' => $user],
            ['code' => '301006', 'slug' => Str::slug('301006'), 'name' => 'Hibah & Donasi', 'parent_id' => $modal_sub->id, 'created_by' => $user],
            ['code' => '301007', 'slug' => Str::slug('301007'), 'name' => 'SHU Tahun Lalu', 'parent_id' => $modal_sub->id, 'created_by' => $user],
            ['code' => '301008', 'slug' => Str::slug('301008'), 'name' => 'SHU Tahun Berjalan', 'parent_id' => $modal_sub->id, 'created_by' => $user],
            ['code' => '301009', 'slug' => Str::slug('301009'), 'name' => 'Simpanan Sukarela', 'parent_id' => $modal_sub->id, 'created_by' => $user],
        ];
        foreach ($item_modal as $item) {
            ChartOfAccount::create($item);
        }
        /** Modal - End */

        /** Pendapatan - Begin */

        $pendapatan_sub = ChartOfAccount::create([
            'code' => '401000',
            'slug' => Str::slug('401000'),
            'name' => 'Pendapatan',
            'parent_id' => $pendapatan->id,
            'created_by' => $user,
        ]);
        $item_pendapatan = [
            ['code' => '401001', 'slug' => Str::slug('401001'), 'name' => 'Pendapatan Jasa Pendanaan', 'parent_id' => $pendapatan_sub->id, 'created_by' => $user],
            ['code' => '401002', 'slug' => Str::slug('401002'), 'name' => 'Pendapatan Jasa Bank', 'parent_id' => $pendapatan_sub->id, 'created_by' => $user],
            ['code' => '401003', 'slug' => Str::slug('401003'), 'name' => 'Penjualan Pensil', 'parent_id' => $pendapatan_sub->id, 'created_by' => $user],
            ['code' => '401004', 'slug' => Str::slug('401004'), 'name' => 'Jasa Antar Jemput', 'parent_id' => $pendapatan_sub->id, 'created_by' => $user],
            ['code' => '401005', 'slug' => Str::slug('401005'), 'name' => 'Pendapatan Lain-Lain', 'parent_id' => $pendapatan_sub->id, 'created_by' => $user],
            ['code' => '401006', 'slug' => Str::slug('401006'), 'name' => 'Pendapatan Jasa Pinjaman', 'parent_id' => $pendapatan_sub->id, 'created_by' => $user],
        ];
        foreach ($item_pendapatan as $item) {
            ChartOfAccount::create($item);
        }
        /** Pendapatan - End */

        /** Biaya - Begin */

        $biaya_usaha = ChartOfAccount::create([
            'code' => '501000',
            'slug' => Str::slug('501000'),
            'name' => 'Biaya Usaha',
            'parent_id' => $biaya->id,
            'created_by' => $user,
        ]);
        $item_biaya_usaha = [
            ['code' => '501001', 'slug' => Str::slug('501001'), 'name' => 'Biaya Jasa Simpanan', 'parent_id' => $biaya_usaha->id, 'created_by' => $user],
            ['code' => '501002', 'slug' => Str::slug('501002'), 'name' => 'Harga Pokok Pensil', 'parent_id' => $biaya_usaha->id, 'created_by' => $user],
            ['code' => '501003', 'slug' => Str::slug('501003'), 'name' => 'Biaya Perbaikan Peralatan Kantor', 'parent_id' => $biaya_usaha->id, 'created_by' => $user],
            ['code' => '501004', 'slug' => Str::slug('501004'), 'name' => 'Biaya Gaji Karyawan', 'parent_id' => $biaya_usaha->id, 'created_by' => $user],
            ['code' => '501005', 'slug' => Str::slug('501005'), 'name' => 'Biaya Pendidikan, Pelatihan dan Penyuluhan', 'parent_id' => $biaya_usaha->id, 'created_by' => $user],
            ['code' => '501006', 'slug' => Str::slug('501006'), 'name' => 'Biaya Penyelenggaraan RAT', 'parent_id' => $biaya_usaha->id, 'created_by' => $user],
            ['code' => '501007', 'slug' => Str::slug('501007'), 'name' => 'Biaya Iuran Dekopinda', 'parent_id' => $biaya_usaha->id, 'created_by' => $user],
            ['code' => '501008', 'slug' => Str::slug('501008'), 'name' => 'Biaya ATK', 'parent_id' => $biaya_usaha->id, 'created_by' => $user],
            ['code' => '501009', 'slug' => Str::slug('501009'), 'name' => 'Biaya Apresiasi', 'parent_id' => $biaya_usaha->id, 'created_by' => $user],
            ['code' => '501010', 'slug' => Str::slug('501010'), 'name' => 'Biaya Audit Eksternal', 'parent_id' => $biaya_usaha->id, 'created_by' => $user],
            ['code' => '501011', 'slug' => Str::slug('501011'), 'name' => 'Biaya Lain-Lain', 'parent_id' => $biaya_usaha->id, 'created_by' => $user],
            ['code' => '501012', 'slug' => Str::slug('501012'), 'name' => 'PPh Badan Pasal 29', 'parent_id' => $biaya_usaha->id, 'created_by' => $user],
            ['code' => '501013', 'slug' => Str::slug('501013'), 'name' => 'Biaya Pajak PPH-4 (Ayat 2)', 'parent_id' => $biaya_usaha->id, 'created_by' => $user],
            ['code' => '501014', 'slug' => Str::slug('501014'), 'name' => 'Biaya Pajak PPH-25', 'parent_id' => $biaya_usaha->id, 'created_by' => $user],
            ['code' => '501015', 'slug' => Str::slug('501015'), 'name' => 'Biaya Penyusutan Peralatan Kantor', 'parent_id' => $biaya_usaha->id, 'created_by' => $user],
            ['code' => '501016', 'slug' => Str::slug('501016'), 'name' => 'Biaya Rapat Anggota', 'parent_id' => $biaya_usaha->id, 'created_by' => $user],
            ['code' => '501017', 'slug' => Str::slug('501017'), 'name' => 'Biaya Atribut Anggota', 'parent_id' => $biaya_usaha->id, 'created_by' => $user],
            ['code' => '501018', 'slug' => Str::slug('501018'), 'name' => 'Biaya Renovasi', 'parent_id' => $biaya_usaha->id, 'created_by' => $user],
            ['code' => '501019', 'slug' => Str::slug('501019'), 'name' => 'Biaya Legalitas Organisasi', 'parent_id' => $biaya_usaha->id, 'created_by' => $user],
            ['code' => '501020', 'slug' => Str::slug('501020'), 'name' => 'Biaya Promosi', 'parent_id' => $biaya_usaha->id, 'created_by' => $user],
        ];
        foreach ($item_biaya_usaha as $item) {
            ChartOfAccount::create($item);
        }
        $biaya_lain = ChartOfAccount::create([
            'code' => '502000',
            'slug' => Str::slug('502000'),
            'name' => 'Biaya Lain-Lain',
            'parent_id' => $biaya->id,
            'created_by' => $user,
        ]);
        $item_biaya_lain = [
            ['code' => '502001', 'slug' => Str::slug('502001'), 'name' => 'Biaya Adm Bank', 'parent_id' => $biaya_lain->id, 'created_by' => $user],
        ];
        foreach ($item_biaya_lain as $item) {
            ChartOfAccount::create($item);
        }
        /** Biaya - End */
    }
}
