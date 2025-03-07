<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Webkassa API Configuration
    |--------------------------------------------------------------------------
    | Здесь находятся настройки для интеграции с API Webkassa.
    |
    | Укажите ваш API-ключ и URL-адрес Webkassa API.
    |
    */

    'api_key' => env('WEBKASSA_API_KEY'),

    'api_url' => env('WEBKASSA_API_URL', 'https://devkkm.webkassa.kz/api'),

    'login' => env('WEBKASSA_LOGIN'),

    'password' => env('WEBKASSA_PASSWORD'),

];
