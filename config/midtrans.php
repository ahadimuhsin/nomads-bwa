<?php

return [
    "server_key" => env("MIDTRANS_SERVER_KEY", null),
    "is_production" => env("MIDTRANS_IS_PRODUCTION", false),
    "is_sanitize" => env("MIDTRANS_IS_SANITIZE", true),
    "is_3ds" => env("MIDTRANS_IS_3DS", true)
];

?>


<!-- Cara panggilnya -> config('midtrans.server_key) -->
