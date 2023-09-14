<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = 'Super Admin';

        $input = [
            ['name' => 'BNI (Bank Negara Indonesia)', 'code' => '009', 'created_by' => $user],
            ['name' => 'BRI (Bank Rakyat Indonesia)', 'code' => '002', 'created_by' => $user],
            ['name' => 'BTN (Bank Tabungan Negara)', 'code' => '200', 'created_by' => $user],
            ['name' => 'Bank Mandiri', 'code' => '008', 'created_by' => $user],
            ['name' => 'BSI (Bank Syariah Indonesia)', 'code' => '451', 'created_by' => $user],
            ['name' => 'BCA (Bank Central Asia)', 'code' => '014', 'created_by' => $user],
            ['name' => 'Bank CIMB Niaga', 'code' => '022', 'created_by' => $user],
            ['name' => 'Bank Muamalat', 'code' => '147', 'created_by' => $user],
            ['name' => 'Bank Danamon', 'code' => '011', 'created_by' => $user],
            ['name' => 'Bank OCBC NISP', 'code' => '028', 'created_by' => $user],
            ['name' => 'Bank Permata', 'code' => '013', 'created_by' => $user],
            ['name' => 'Bank Sinarmas', 'code' => '153', 'created_by' => $user],
            ['name' => 'Bank Mega', 'code' => '426', 'created_by' => $user],
            ['name' => 'Bank BII Maybank', 'code' => '016', 'created_by' => $user],
            ['name' => 'Bank Bukopin', 'code' => '441', 'created_by' => $user],
            ['name' => 'Bank BCA Syariah', 'code' => '536', 'created_by' => $user],
            ['name' => 'Bank Commonwealth', 'code' => '950', 'created_by' => $user],
            ['name' => 'Bank Citibank', 'code' => '031', 'created_by' => $user],
            ['name' => 'Bank BTPN', 'code' => '213', 'created_by' => $user],
            ['name' => 'Bank Jenius BTPN', 'code' => '213', 'created_by' => $user],
            ['name' => 'Bank Panin', 'code' => '019', 'created_by' => $user],
            ['name' => 'Bank Ekspor Indonesia', 'code' => '003', 'created_by' => $user],
            ['name' => 'Bank Arhta Niaga Kencana', 'code' => '020', 'created_by' => $user],
            ['name' => 'Bank Buana IND', 'code' => '023', 'created_by' => $user],
            ['name' => 'Bank Artha Graha', 'code' => '037', 'created_by' => $user],
            ['name' => 'Bank Bank Multicor', 'code' => '036', 'created_by' => $user],
            ['name' => 'Bank Sumitomo Mitsui Indonesia', 'code' => '045', 'created_by' => $user],
            ['name' => 'Bank DBS Indonesia', 'code' => '046', 'created_by' => $user],
            ['name' => 'Bank Resona Perdania', 'code' => '047', 'created_by' => $user],
            ['name' => 'Bank Mizuho Indonesia', 'code' => '048', 'created_by' => $user],
            ['name' => 'Bank Standard Chartered', 'code' => '050', 'created_by' => $user],
            ['name' => 'Bank Capital Indonesia', 'code' => '054', 'created_by' => $user],
            ['name' => 'Bank ABN Amro', 'code' => '052', 'created_by' => $user],
            ['name' => 'Bank Keppel Tatlee Buana', 'code' => '053', 'created_by' => $user],
            ['name' => 'Bank UOB Indonesia', 'code' => '023', 'created_by' => $user],
            ['name' => 'Bank Capital Indonesia', 'code' => '054', 'created_by' => $user],
            ['name' => 'Bank Woori Indonesia', 'code' => '068', 'created_by' => $user],
            ['name' => 'Bank Bumi Artha', 'code' => '076', 'created_by' => $user],
            ['name' => 'Bank Ekonomi', 'code' => '087', 'created_by' => $user],
            ['name' => 'Bank Haga', 'code' => '089', 'created_by' => $user],
            ['name' => 'Bank IFI', 'code' => '093', 'created_by' => $user],
            ['name' => 'Bank Century/Bank J Trust Indonesia', 'code' => '095', 'created_by' => $user],
            ['name' => 'Bank Mayapada', 'code' => '097', 'created_by' => $user],
            ['name' => 'Bank Nusantara Parahyangan', 'code' => '145', 'created_by' => $user],
            ['name' => 'Bank Swadesi', 'code' => '146', 'created_by' => $user],
            ['name' => 'Bank Mestika', 'code' => '151', 'created_by' => $user],
            ['name' => 'Bank Metro Express', 'code' => '152', 'created_by' => $user],
            ['name' => 'Bank Maspion', 'code' => '157', 'created_by' => $user],
            ['name' => 'Bank Hagakita', 'code' => '159', 'created_by' => $user],
            ['name' => 'Bank Ganesha', 'code' => '161', 'created_by' => $user],
            ['name' => 'Bank Windu Kentjana', 'code' => '162', 'created_by' => $user],
            ['name' => 'Bank Harmoni Internasional', 'code' => '166', 'created_by' => $user],
            ['name' => 'Bank QNB Kesawan (Bank QNB)', 'code' => '167', 'created_by' => $user],
            ['name' => 'Bank Swaguna', 'code' => '405', 'created_by' => $user],
            ['name' => 'Bank Bisnis Internasional', 'code' => '459', 'created_by' => $user],
            ['name' => 'Bank Sri Partha', 'code' => '466', 'created_by' => $user],
            ['name' => 'Bank DKI Jakarta', 'code' => '111', 'created_by' => $user],
            ['name' => 'Bank Jabar (Jawa Barat)', 'code' => '110', 'created_by' => $user],
            ['name' => 'Bank Jateng (Jawa Tengah)', 'code' => '113', 'created_by' => $user],
            ['name' => 'Bank Jatim (Jawa Timur)', 'code' => '114', 'created_by' => $user],
            ['name' => 'BPD DIY (Yogyakarta)', 'code' => '112', 'created_by' => $user],
            ['name' => 'BPD Jambi', 'code' => '115', 'created_by' => $user],
            ['name' => 'BPD Aceh', 'code' => '116', 'created_by' => $user],
            ['name' => 'BPD Aceh Syariah', 'code' => '116', 'created_by' => $user],
            ['name' => 'Bank Sumut (Sumatera Utara)', 'code' => '117', 'created_by' => $user],
            ['name' => 'Bank Nagari (Bank Sumbar)', 'code' => '118', 'created_by' => $user],
            ['name' => 'Bank Riau Kepri', 'code' => '119', 'created_by' => $user],
            ['name' => 'Bank Sumber Babel', 'code' => '120', 'created_by' => $user],
            ['name' => 'Bank Lampung', 'code' => '121', 'created_by' => $user],
            ['name' => 'Bank Kalsel (Kalimantan Selatan)', 'code' => '122', 'created_by' => $user],
            ['name' => 'Bank Kalbar (Kalimantan Barat)', 'code' => '123', 'created_by' => $user],
            ['name' => 'Bank Kaltim Tara (Kalimantan Timur dan Utara)', 'code' => '124', 'created_by' => $user],
            ['name' => 'Bank Kalteng (Kalimantan Tengah)', 'code' => '125', 'created_by' => $user],
            ['name' => 'Bank Sulselbar (Sulawesi Selatan dan Barat)', 'code' => '126', 'created_by' => $user],
            ['name' => 'Bank Sulutgo (Sulawesi Utara dan Gorontalo)', 'code' => '127', 'created_by' => $user],
            ['name' => 'Bank NTP', 'code' => '128', 'created_by' => $user],
            ['name' => 'Bank NTB Syariah', 'code' => '128', 'created_by' => $user],
            ['name' => 'Bank BPD Bali', 'code' => '129', 'created_by' => $user],
            ['name' => 'Bank NTT', 'code' => '130', 'created_by' => $user],
            ['name' => 'Bank Maluku Malut', 'code' => '131', 'created_by' => $user],
            ['name' => 'Bank Papua', 'code' => '132', 'created_by' => $user],
            ['name' => 'Bank Bengkulu', 'code' => '133', 'created_by' => $user],
            ['name' => 'Bank Sulteng (Sulawesi Tengah)', 'code' => '134', 'created_by' => $user],
            ['name' => 'Bank Sultra', 'code' => '135', 'created_by' => $user],
            ['name' => 'BPD Banten', 'code' => '137', 'created_by' => $user],
        ];
        foreach ($input as $item) {
            Bank::create($item);
        }
    }
}
