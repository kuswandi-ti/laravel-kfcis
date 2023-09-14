<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReligionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = 'Super Admin';

        $input = [
            ['name' => 'Islam', 'created_by' => $user],
            ['name' => 'Katolik', 'created_by' => $user],
            ['name' => 'Protestan', 'created_by' => $user],
            ['name' => 'Hindu', 'created_by' => $user],
            ['name' => 'Budha', 'created_by' => $user],
            ['name' => 'Konghucu', 'created_by' => $user],
            ['name' => 'Other', 'created_by' => $user],
        ];
        foreach ($input as $item) {
            Religion::create($item);
        }
    }
}
