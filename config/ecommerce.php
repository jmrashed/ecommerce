<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Currency Settings
    |--------------------------------------------------------------------------
    |
    | This option controls the default currency for your e-commerce platform.
    | You can set it to any currency code supported by your payment gateways.
    |
    */

    'currency' => env('ECOMMERCE_CURRENCY', 'USD'),

    /*
    |--------------------------------------------------------------------------
    | Payment Gateways
    |--------------------------------------------------------------------------
    |
    | Here you may configure the settings for multiple payment gateways.
    | These settings are used by the package to process payments.
    |
    */

    'payment_gateways' => [
        'stripe' => [
            'api_key' => env('STRIPE_API_KEY', 'your-stripe-api-key'),
            'secret' => env('STRIPE_SECRET', 'your-stripe-secret'),
        ],
        'paypal' => [
            'client_id' => env('PAYPAL_CLIENT_ID', 'your-paypal-client-id'),
            'client_secret' => env('PAYPAL_CLIENT_SECRET', 'your-paypal-client-secret'),
            'sandbox' => env('PAYPAL_SANDBOX', true),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Cart Settings
    |--------------------------------------------------------------------------
    |
    | Here you may configure the settings for the shopping cart.
    | These settings include the default tax rate and cart expiration time.
    |
    */

    'cart' => [
        'tax_rate' => env('CART_TAX_RATE', 0.07), // 7% tax
        'expiration' => env('CART_EXPIRATION', 120), // 120 minutes
    ],

    /*
    |--------------------------------------------------------------------------
    | Order Management
    |--------------------------------------------------------------------------
    |
    | This section defines settings related to order management,
    | such as the default status for new orders and notification settings.
    |
    */

    'orders' => [
        'default_status' => env('ORDER_DEFAULT_STATUS', 'pending'),
        'notify_admin' => env('ORDER_NOTIFY_ADMIN', true),
        'admin_email' => env('ORDER_ADMIN_EMAIL', 'admin@example.com'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Product Settings
    |--------------------------------------------------------------------------
    |
    | Here you can specify settings related to product management,
    | such as default items per page and image upload paths.
    |
    */

    'products' => [
        'items_per_page' => env('PRODUCTS_ITEMS_PER_PAGE', 15),
        'image_path' => env('PRODUCTS_IMAGE_PATH', 'storage/products/images'),
        'thumbnail_path' => env('PRODUCTS_THUMBNAIL_PATH', 'storage/products/thumbnails'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Multi-Language Support
    |--------------------------------------------------------------------------
    |
    | This option enables or disables multi-language support for the e-commerce
    | platform. When enabled, users can add translations for product details.
    |
    */

    'multi_language' => env('MULTI_LANGUAGE', true),

];
