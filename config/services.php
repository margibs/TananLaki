<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key'    => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => '',
        'secret' => '',
    ],

    'github' => [
        'client_id' => '9bf761f6a5906debf503',
        'client_secret' => '2a8be8a524f75175f6856820dacf5453c8c83b99',
        'redirect' => 'http://alllad.com/githubcallback',
    ],
    'facebook' => [
        'client_id' => '907091149365288',
        'client_secret' => 'b6b39fef2d5b628efbaed0b40b0c055e',
        'redirect' => 'http://alllad.com/login/facebook',
    ],

];
