<?php

// config for ChrisReedIO/HealthNoteSDK
return [
    'base_url' => env('HEALTHNOTE_BASE_URL'),
    'api_key' => env('HEALTHNOTE_API_KEY'),

    'webhooks' => [
        'signature_header' => env('HEALTHNOTE_WEBHOOK_SIGNATURE', 'webhook-checksum'),
        'secret' => env('HEALTHNOTE_WEBHOOK_SECRET'),
    ],
];
