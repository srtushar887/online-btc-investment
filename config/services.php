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
        'client_id' => '152880562448-t6iuo1p5o2egg52e73966mn8r49vnts4.apps.googleusercontent.com',
        'client_secret' => '3wQ1pMdTWbb4DX-MI4QmbDlL',
        'redirect' => 'https://idsoptions.com/callback/google',
    ],

    'facebook' => [
        'client_id' => '182107646342520',
        'client_secret' => '39197a57eca5a18c0cf8992657dbb424',
        'redirect' => 'https://idsoptions.com/callback/facebook',
    ],

];
