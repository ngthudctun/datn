<?php

return [
    /*
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['http://localhost:5174'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true, */

    'paths' => ['api/*', 'sanctum/csrf-cookie'], // Cho phép tất cả route API

    'allowed_methods' => ['*'], // Cho phép tất cả phương thức: GET, POST, PATCH, DELETE...

    'allowed_origins' => ['*'], // Cho phép mọi origin (domain)

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'], // Cho phép mọi loại header

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false, // Nếu cần gửi cookie thì chuyển thành true

];
