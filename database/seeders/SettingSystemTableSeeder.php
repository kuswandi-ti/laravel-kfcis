<?php

namespace Database\Seeders;

use App\Models\SettingSystem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSystemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            ['key' => 'company_name', 'value' => 'Koperasi FCI Sejahtera'],
            ['key' => 'site_title', 'value' => 'KFCIS System'],
            ['key' => 'company_email', 'value' => 'admin@kfcis.com'],
            ['key' => 'company_phone', 'value' => '021-505848'],
            ['key' => 'company_address', 'value' => 'Bekasi'],
            ['key' => 'default_date_format', 'value' => 'd-m-Y'],
            ['key' => 'default_time_format', 'value' => 'H:i:s'],
            ['key' => 'default_language', 'value' => 'id'],
            ['key' => 'company_logo', 'value' => config('common.no_image')],
            ['key' => 'company_favicon', 'value' => config('common.no_image')],
            ['key' => 'site_microsoft_api_host', 'value' => config('common.site_microsoft_api_host')],
            ['key' => 'site_microsoft_api_key', 'value' => config('common.site_microsoft_api_key')],
            ['key' => 'mail_type', 'value' => config('common.mail_mailer')],
            ['key' => 'mail_host', 'value' => config('common.mail_host')],
            ['key' => 'mail_username', 'value' => config('common.mail_username')],
            ['key' => 'mail_password', 'value' => config('common.mail_password')],
            ['key' => 'mail_encryption', 'value' => config('common.mail_encryption')],
            ['key' => 'mail_port', 'value' => config('common.mail_port')],
            ['key' => 'mail_from_address', 'value' => config('common.mail_from_address')],
            ['key' => 'mail_from_name', 'value' => config('common.mail_from_name')],
            ['key' => 'midtrans_environment', 'value' => config('common.midtrans_environment')],
            ['key' => 'midtrans_merchant_id', 'value' => config('common.midtrans_merchant_id')],
            ['key' => 'midtrans_client_key', 'value' => config('common.midtrans_client_key')],
            ['key' => 'midtrans_server_key', 'value' => config('common.midtrans_server_key')],
        ];
        foreach ($input as $item) {
            SettingSystem::create($item);
        }
    }
}
