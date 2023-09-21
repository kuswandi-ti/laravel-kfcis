<?php

namespace Database\Seeders;

use App\Models\Plafond;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlafondTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = 'Super Admin';

        $input = [
            ['years_of_work' => '< 3 Tahun', 'level' => 0, 'warranty' => 0, 'asset' => 0, 'index' => 1000000, 'max_loan' => 1000000, 'created_by' => $user],
            ['years_of_work' => '>= 3 s/d < 6 Tahun', 'level' => 1, 'warranty' => 0, 'asset' => 0, 'index' => 2500000, 'max_loan' => 9000000, 'created_by' => $user],
            ['years_of_work' => '>= 6 s/d < 9 Tahun', 'level' => 2, 'warranty' => 0, 'asset' => 0, 'index' => 2500000, 'max_loan' => 14000000, 'created_by' => $user],
            ['years_of_work' => '>= 9 s/d < 12 Tahun', 'level' => 3, 'warranty' => 0, 'asset' => 0, 'index' => 2500000, 'max_loan' => 20000000, 'created_by' => $user],
            ['years_of_work' => '>= 12 s/d < 15 Tahun', 'level' => 4, 'warranty' => 0, 'asset' => 0, 'index' => 2500000, 'max_loan' => 25000000, 'created_by' => $user],
            ['years_of_work' => '<= 15 s/d < 18 Tahun', 'level' => 5, 'warranty' => 0, 'asset' => 0, 'index' => 2500000, 'max_loan' => 45000000, 'created_by' => $user],
            ['years_of_work' => '>= 18 Tahun', 'level' => 6, 'warranty' => 0, 'asset' => 0, 'index' => 2500000, 'max_loan' => 48000000, 'created_by' => $user],
        ];
        foreach ($input as $item) {
            Plafond::create($item);
        }
    }
}
