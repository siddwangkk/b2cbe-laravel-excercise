<?php

return [
    /**
     * Config for Lang
     */
    'lang' => [
        'frontendType' => 'marketing',
    ],

    /**
     * API service configs
     */
    'services' => [
        'svc-common' => [
            'domain' => env('GMBE_SDK_COMMON_SVC_DOMAIN'),
            'x-api-key' => env('GMBE_SDK_COMMON_SVC_KEY'),
        ],

        'api-product' => [
            'domain' => env('GMBE_SDK_PRODUCT_API_DOMAIN'),
            'x-auth-id' => env('GMBE_SDK_PRODUCT_API_AUTH_ID'),
            'x-auth-signature' => env('GMBE_SDK_PRODUCT_API_SIGNATURE'),
        ],

        'api-acctdoc' => [
            'domain' => env('GMBE_SDK_ACCTDOC_API_DOMAIN'),
        ],

        'api-guarantee' => [
            'domain' => env('GMBE_SDK_GUARANTEE_API_DOMAIN'),
        ],

        'api-invoice' => [
            'domain' => env('GMBE_SDK_INVOICE_API_DOMAIN'),
        ],

        'api-mkt' => [
            'domain' => env('GMBE_SDK_MARKETING_API_DOMAIN'),
        ],

        'api-kkday' => [
            'domain' => env('GMBE_SDK_KKDAY_API_DOMAIN'),
            'apiKey' => env('GMBE_SDK_KKDAY_API_API_KEY'),
            'userOid' => env('GMBE_SDK_KKDAY_API_USER_OID'),
        ],

        'payment' => [
            'domain' => env('GMBE_SDK_KKDAY_PAYMENT_DOMAIN'),
        ],

        'promotion-notification' => [
            'domain' => env('GMBE_SDK_PROMOTION_NOTIFICATION_DOMAIN'),
            'authToken' => env('GMBE_SDK_PROMOTION_NOTIFICATION_AUTH_TOKEN'),
        ],

        'auth-kkday' => [
            'domain' => env('GMBE_SDK_KKDAY_AUTH_DOMAIN'),
            'apiKey' => env('GMBE_SDK_KKDAY_AUTH_API_KEY'),
        ],

        'api-affiliate' => [
            'domain' => env('GMBE_SDK_KKDAY_AFFILIATE_API_DOMAIN'),
        ],

        'apiLang' => [
            'domain' => env('GMBE_SDK_API_LANG_DOMAIN'),
            'token' => env('GMBE_SDK_API_LANG_TOKEN'),
        ],

        'api-dcs' => [
            'domain' => env('GMBE_SDK_API_DCS_DOMAIN'),
            'apiKey' => env('GMBE_SDK_API_DCS_API_KEY'),
            'cache' => env('GMBE_SDK_API_DCS_CACHE_DRIVER'),
        ],

        'api-search' => [
            'domain' => env('GMBE_SDK_API_SEARCH_DOMAIN'),
            'x-auth-key' => env('GMBE_SDK_API_SEARCH_AUTH_KEY'),
        ],

        'svc-affiliate' => [
            'domain' => env('GMBE_SDK_SVC_AFFILIATE_DOMAIN'),
        ],
    ],
];
