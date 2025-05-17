<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [

        'client_id' => '1060319148043-nmdbifep6fms9mb2t62rljtpq5t9tuiv.apps.googleusercontent.com',

        'client_secret' => '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',

        'redirect' => env('APP_URL').'/auth/google/callback',

    ],

    'facebook' => [

        'client_id' => '1163922925337370',

        'client_secret' => 'db5253b517029cfab318767a54a95b88',

        'redirect' => env('APP_URL').'/auth/facebook/callback',

    ],

];
