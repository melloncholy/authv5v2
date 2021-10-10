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

    'facebook' => [
        'client_id' => '301949615018884',
        'client_secret' => 'dc2437d13f62bf42ccf006e5a15f7f81',
        'redirect' => 'http://localhost/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '735611876442-to4ajccpq72ki7kh9essmppvrrbo7nqe.apps.googleusercontent.com',
        'client_secret' => 'DU9TbfkRzwIU44D-7IT3OFLJ',
        'redirect' => 'http://localhost/auth/google/callback',
    ],

];
