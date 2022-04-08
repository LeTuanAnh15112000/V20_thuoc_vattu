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
    'google' => [
        'client_id' => '387977755569-8k58r22427osi8be40hnt06lb6m20eld.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/google/callback',
    ],

    'facebook' => [
        'client_id' => '1119400635472120',
        'client_secret' => '93b03df6f5dc89639e0aaf49f9abfbe6',
        'redirect' => 'http://localhost:8000/facebook/callback',
    ],

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

];
