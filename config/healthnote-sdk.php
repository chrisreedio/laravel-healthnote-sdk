<?php

// config for ChrisReedIO/HealthNoteSDK
return [
    'base_url' => env('HEALTHNOTE_BASE_URL'),
    'api_key' => env('HEALTHNOTE_API_KEY'),

    'webhooks' => [
        'secret' => env('HEALTHNOTE_WEBHOOK_SECRET'),
    ],
];
