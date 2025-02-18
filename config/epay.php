<?php

return [
    'test_mode' => env('EPAY_TEST_MODE', true),

    'account_id' => '7026207447',
    'email' => env('EPAY_EMAIL', 'vyunner@gmail.com'),
    'password' => env('EPAY_PASSWORD'),
    'shop_id' => env('EPAY_SHOP_ID'),
    'client_id' => env('EPAY_CLIENT_ID'),
    'client_secret' => env('EPAY_CLIENT_SECRET'),
    'secret_hash' => env('EPAY_SECRET_HASH'),
    'tilda_secret' => env('EPAY_TILDA_SECRET'),
    'terminal' => env('EPAY_TERMINAL'),
    'terminal_id' => env('EPAY_TERMINAL_ID'),
    'oauth_url' => env('EPAY_TEST_MODE') ? 'https://testoauth.homebank.kz/epay2/oauth2/token' : 'https://epay-oauth.homebank.kz/oauth2/token',
    'invoice_url' => env('EPAY_TEST_MODE') ? 'https://testepay.homebank.kz/api/invoice' : 'https://epay-api.homebank.kz/invoice',
];
