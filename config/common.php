<?php

return [

    'path_storage' => env('PATH_STORAGE'),

    'logo_company_main' => env('LOGO_COMPANY_MAIN'),
    'logo_company_desktop' => env('LOGO_COMPANY_DESKTOP'),
    'logo_company_toggle' => env('LOGO_COMPANY_TOGGLE'),
    'image_user_profile_small' => env('IMAGE_USER_PROFILE_SMALL'),
    'image_user_profile_big' => env('IMAGE_USER_PROFILE_BIG'),
    'image_product' => env('IMAGE_PRODUCT'),
    'image_square_200x200' => env('IMAGE_SUARE_200x200'),

    'path_template' => env('PATH_TEMPLATE'),
    'path_template_admin' => env('PATH_TEMPLATE_ADMIN'),
    'path_template_mobile' => env('PATH_TEMPLATE_MOBILE'),
    'path_template_website' => env('PATH_TEMPLATE_WEBSITE'),

    'guard_name_admin' => env('GUARD_NAME_ADMIN'),
    'guard_name_member' => env('GUARD_NAME_MEMBER'),
    'guard_name_user' => env('GUARD_NAME_USER'),

    'guard_text_admin' => env('GUARD_TEXT_ADMIN'),
    'guard_text_member' => env('GUARD_TEXT_MEMBER'),
    'guard_text_user' => env('GUARD_TEXT_USER'),

    'site_microsoft_api_host' => env('SITE_MICROSOFT_API_HOST'),
    'site_microsoft_api_key' => env('SITE_MICROSOFT_API_KEY'),

    'mail_mailer' => env('MAIL_MAILER'),
    'mail_host' => env('MAIL_HOST'),
    'mail_port' => env('MAIL_PORT'),
    'mail_username' => env('MAIL_USERNAME'),
    'mail_password' => env('MAIL_PASSWORD'),
    'mail_encryption' => env('MAIL_ENCRYPTION'),
    'mail_from_address' => env('MAIL_FROM_ADDRESS'),
    'mail_from_name' => env('MAIL_FROM_NAME'),

    'midtrans_environment' => env('MIDTRANS_ENVIRONMENT'),
    'midtrans_merchant_id' => env('MIDTRANS_MERCHANT_ID'),
    'midtrans_client_key' => env('MIDTRANS_CLIENT_KEY'),
    'midtrans_server_key' => env('MIDTRANS_SERVER_KEY'),

];
