<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\MainDataSeeder;
use Database\Seeders\NeedTableSeeder;
use Database\Seeders\PlafondTableSeeder;
use Database\Seeders\ReligionTableSeeder;
use Database\Seeders\LanguagesTableSeeder;
use Database\Seeders\FormatDateTableSeeder;
use Database\Seeders\FormatTimeTableSeeder;
use Database\Seeders\ProfessionTableSeeder;
use Database\Seeders\SettingSystemTableSeeder;
use Database\Seeders\ChartOfAccountTableSeeder;
use KodePandai\Indonesia\IndonesiaDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(BankTableSeeder::class);
        $this->call(ChartOfAccountTableSeeder::class);
        $this->call(FormatDateTableSeeder::class);
        $this->call(FormatTimeTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(MainDataSeeder::class);
        $this->call(NeedTableSeeder::class);
        $this->call(PeriodTableSeeder::class);
        $this->call(PlafondTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ProfessionTableSeeder::class);
        $this->call(ReligionTableSeeder::class);
        $this->call(SettingSystemTableSeeder::class);
        $this->call(IndonesiaDatabaseSeeder::class);
    }
}
