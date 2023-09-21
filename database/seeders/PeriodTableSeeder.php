<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeriodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = 'Super Admin';

        $input = [
            ['name' => '2023', 'slug' => Str::slug('2023'), 'status' => 1, 'created_by' => $user],
        ];
        foreach ($input as $item) {
            Period::create($item);
        }
    }
}
