<?php

return [
    'base_url' => env('ITC_BASE_URL', 'https://lesweb.itc.gov.ae/operator/operator'),
    'username' => env('ITC_USERNAME'),
    'password' => env('ITC_PASSWORD'),
    'api_key' => env('ITC_API_KEY'),
    'token_cache_ttl' => 55, // minutes
    'sync_interval_hours' => 6,
];
