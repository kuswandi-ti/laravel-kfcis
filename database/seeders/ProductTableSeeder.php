<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = 'Super Admin';

        $input = [
            ['code' => '0000000001', 'slug' => Str::slug('0000000001'), 'name' => '112900 BONANZA 1329 HB NO-R/T SET(12)', 'specification' => '112900 BONANZA 1329 HB NO-R/T SET(12)', 'price_hpp' => 8294, 'price_sell' => 10119, 'margin' => 912, 'status' => 1, 'created_by' => $user],
            ['code' => '0000000002', 'slug' => Str::slug('0000000002'), 'name' => '1323-2B FC 1323-2B PACK 12  (Sap Code : 862050)', 'specification' => '1323-2B FC 1323-2B PACK 12  (Sap Code : 862050)', 'price_hpp' => 8294, 'price_sell' => 10119, 'margin' => 912, 'status' => 1, 'created_by' => $user],
            ['code' => '0000000003', 'slug' => Str::slug('0000000003'), 'name' => '111202 2B Black Matt R/T HT (12)', 'specification' => '111202 2B Black Matt R/T HT (12)', 'price_hpp' => 8294, 'price_sell' => 10119, 'margin' => 912, 'status' => 1, 'created_by' => $user],
            ['code' => '0000000004', 'slug' => Str::slug('0000000004'), 'name' => '1323 No.2 FC 1323 B R/T No. 2 (12)', 'specification' => '1323 No.2 FC 1323 B R/T No. 2 (12)', 'price_hpp' => 8294, 'price_sell' => 10119, 'margin' => 912, 'status' => 1, 'created_by' => $user],
            ['code' => '0000000005', 'slug' => Str::slug('0000000005'), 'name' => '1323 No.1 FC 1323 2B R/T No. 1 BULK FG', 'specification' => '1323 No.1 FC 1323 2B R/T No. 1 BULK FG', 'price_hpp' => 8294, 'price_sell' => 10119, 'margin' => 912, 'status' => 1, 'created_by' => $user],
            ['code' => '0000000006', 'slug' => Str::slug('0000000006'), 'name' => '3357 HB YELLOW 09  PENCIL - FC HK', 'specification' => '3357 HB YELLOW 09  PENCIL - FC HK', 'price_hpp' => 8294, 'price_sell' => 10119, 'margin' => 912, 'status' => 1, 'created_by' => $user],
            ['code' => '0000000007', 'slug' => Str::slug('0000000007'), 'name' => '111200 HB Black Matt R/T (12)', 'specification' => '111200 HB Black Matt R/T (12)', 'price_hpp' => 8294, 'price_sell' => 10119, 'margin' => 912, 'status' => 1, 'created_by' => $user],
            ['code' => '0000000008', 'slug' => Str::slug('0000000008'), 'name' => '112001 BONANZA 1320 B R/T SET (12)', 'specification' => '112001 BONANZA 1320 B R/T SET (12)', 'price_hpp' => 8294, 'price_sell' => 10119, 'margin' => 912, 'status' => 1, 'created_by' => $user],
            ['code' => '0000000009', 'slug' => Str::slug('0000000009'), 'name' => '111202 2B Black Matt R/T (12) Able', 'specification' => '111202 2B Black Matt R/T (12) Able', 'price_hpp' => 8294, 'price_sell' => 10119, 'margin' => 912, 'status' => 1, 'created_by' => $user],
            ['code' => '0000000010', 'slug' => Str::slug('0000000010'), 'name' => '111202-Red 2B Red Glossy R/T (12)', 'specification' => '111202-Red 2B Red Glossy R/T (12)', 'price_hpp' => 8294, 'price_sell' => 10119, 'margin' => 912, 'status' => 1, 'created_by' => $user],
            ['code' => '0000000011', 'slug' => Str::slug('0000000011'), 'name' => '111200 HB Black Matt R/T (12)', 'specification' => '111200 HB Black Matt R/T (12)', 'price_hpp' => 8294, 'price_sell' => 10119, 'margin' => 912, 'status' => 1, 'created_by' => $user],
            ['code' => '0000000012', 'slug' => Str::slug('0000000012'), 'name' => '115854 RL CLASSIC 24 L HANGTAB VAR 1112 EN-G FSC', 'specification' => '115854 RL CLASSIC 24 L HANGTAB VAR 1112 EN-G FSC', 'price_hpp' => 8294, 'price_sell' => 10119, 'margin' => 912, 'status' => 1, 'created_by' => $user],
            ['code' => '0000000013', 'slug' => Str::slug('0000000013'), 'name' => '111608 Red Line Jumbo 8 Short FCI', 'specification' => '111608 Red Line Jumbo 8 Short FCI', 'price_hpp' => 8294, 'price_sell' => 10119, 'margin' => 912, 'status' => 1, 'created_by' => $user],
            ['code' => '0000000014', 'slug' => Str::slug('0000000014'), 'name' => '115834 RL STD ROUND TIN 24 DISPLAY  EN-G', 'specification' => '115834 RL STD ROUND TIN 24 DISPLAY  EN-G', 'price_hpp' => 8294, 'price_sell' => 10119, 'margin' => 912, 'status' => 1, 'created_by' => $user],
            ['code' => '0000000015', 'slug' => Str::slug('0000000015'), 'name' => '111822-B TRI GRIP 2B DIPPING BULK FG  (Sap Code : 100-027-201)', 'specification' => '111822-B TRI GRIP 2B DIPPING BULK FG  (Sap Code : 100-027-201)', 'price_hpp' => 8294, 'price_sell' => 10119, 'margin' => 912, 'status' => 1, 'created_by' => $user],
        ];
        foreach ($input as $item) {
            Product::create($item);
        }
    }
}
