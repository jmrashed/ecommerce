# E-commerce Toolkit for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jmrashed/ecommerce.svg?style=flat-square)](https://packagist.org/packages/jmrashed/ecommerce)
[![Total Downloads](https://img.shields.io/packagist/dt/jmrashed/ecommerce.svg?style=flat-square)](https://packagist.org/packages/jmrashed/ecommerce)
[![License](https://img.shields.io/packagist/l/jmrashed/ecommerce.svg?style=flat-square)](https://packagist.org/packages/jmrashed/ecommerce)

The E-commerce Toolkit for Laravel is a modular package providing essential features for building e-commerce websites. This package includes functionalities for managing product catalogs, carts, checkout systems, payment gateway integrations, and order management.

## Features

- **Product Catalogs**: Easily manage product listings, categories, and attributes.
- **Shopping Cart**: Add, update, and remove items from the cart with session management.
- **Checkout System**: Streamlined checkout process with customizable steps.
- **Payment Gateway Integrations**: Support for multiple payment gateways (e.g., Stripe, PayPal).
- **Order Management**: Track and manage orders from creation to fulfillment.
- **Multi-language and Currency Support**: Cater to a global audience with localization features.
- **Responsive Design**: Ensure a seamless experience across all devices.

## Folder Structure

```tree
ecommerce
├── config
│   └── ecommerce.php
├── database
│   ├── factories
│   │   └── ProductFactory.php
│   ├── migrations
│   │   └── 2024_05_25_000099_create_pkg_customers_table.php
│   │   └── 2024_05_25_000100_create_pkg_brands_table.php
│   │   └── 2024_05_25_000101_create_pkg_categories_table.php
│   │   └── 2024_05_25_000102_create_pkg_products_table.php
│   │   └── 2024_05_25_000103_create_pkg_orders_table.php
│   │   └── 2024_05_25_000105_create_pkg_order_items_table.php
│   │   └── 2024_05_25_000106_create_pkg_reviews_table.php 
│   └── seeders
│       └── DatabaseSeeder.php
├── resources
│   ├── assets
│   │   ├── css
│   │   │   └── ecommerce.css
│   │   └── js
│   │       └── ecommerce.js
│   ├── lang
│   │   └── en
│   │       └── ecommerce.php
│   └── views
│       ├── layouts
│       │   └── app.blade.php
│       └── products
│           └── index.blade.php
├── routes
│   └── web.php
├── src
│   ├── Console
│   │   └── Commands
│   │       └──InstallEcommercePackage.php
│   ├── Http
│   │   ├── Controllers
│   │   │   └── ProductController.php
│   │   └── Middleware
│   │       └── CheckCart.php
│   ├── Models
│   │   └── Brand.php
│   │   └── Category.php
│   │   └── Customer.php
│   │   └── OrderItem.php
│   │   └── Product.php
│   │   └── Review.php 
│   ├── Providers
├── ├── EcommerceServiceProvider.php
│   ├── Repositories
│   │   └── ProductRepository.php
│   └── Services
│       └── ProductService.php 
├── .gitignore
├── composer.json
├── LICENSE
├── README.md
└── CODE_OF_CONDUCT.md
```

2024_05_25_000099_create_pkg_addresses_table.php
2024_05_25_000099_create_pkg_customers_table.php
2024_05_25_000100_create_pkg_brands_table.php
2024_05_25_000101_create_pkg_categories_table.php
2024_05_25_000102_create_pkg_product_images_table.php
2024_05_25_000102_create_pkg_products_table.php
2024_05_25_000102_create_pkg_tags_table.php
2024_05_25_000103_create_pkg_orders_table.php
2024_05_25_000105_create_pkg_order_items_table.php
2024_05_25_000106_create_pkg_reviews_table.php
2024_05_25_000107_create_pkg_coupons_table.php
2024_05_25_000107_create_pkg_payments_table.php
2024_05_25_000107_create_pkg_shippings_table.php
2024_05_25_000107_create_pkg_wishlists_table.php

## Installation

To install the package, use Composer:

```bash
composer require jmrashed/ecommerce
```

After installing, publish the package resources:

```bash
php artisan vendor:publish --provider="Jmrashed\Ecommerce\EcommerceServiceProvider"
```

Run the migrations to set up the necessary database tables:

```bash
php artisan migrate
```

## Configuration

After publishing the package resources, you can configure the package by editing the configuration file located at `config/ecommerce.php`.

```php
return [
    'currency' => 'USD',
    'payment_gateways' => [
        'stripe' => [
            'api_key' => env('STRIPE_API_KEY'),
        ],
        'paypal' => [
            'client_id' => env('PAYPAL_CLIENT_ID'),
            'client_secret' => env('PAYPAL_CLIENT_SECRET'),
        ],
    ],
];
```

## Usage

### Product Management

To create a new product, use the provided model and controller:

```php
use Jmrashed\Ecommerce\Models\Product;

$product = new Product();
$product->name = 'Sample Product';
$product->price = 19.99;
$product->description = 'This is a sample product.';
$product->save();
```

### Cart Operations

Add items to the cart:

```php
use Jmrashed\Ecommerce\Facades\Cart;

Cart::add($productId, $quantity);
```

Retrieve items from the cart:

```php
$items = Cart::content();
```

### Checkout Process

Initiate the checkout process by redirecting to the checkout route:

```php
return redirect()->route('ecommerce.checkout');
```

Handle payment and order processing through provided controllers and routes.

## Contributing

Contributions are welcome! Please follow these steps to contribute:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/your-feature`).
3. Commit your changes (`git commit -am 'Add some feature'`).
4. Push to the branch (`git push origin feature/your-feature`).
5. Open a Pull Request.

Please adhere to the [code of conduct](CODE_OF_CONDUCT.md).

## License

The E-commerce Toolkit for Laravel is open-source software licensed under the [MIT license](LICENSE).

## Support

If you encounter any issues or have any questions, feel free to open an issue on GitHub or contact the maintainer at [jmrashed@gmail.com](mailto:jmrashed@gmail.com).

## Statistics

![GitHub repo size](https://img.shields.io/github/repo-size/jmrashed/ecommerce)
![GitHub issues](https://img.shields.io/github/issues/jmrashed/ecommerce)
![GitHub stars](https://img.shields.io/github/stars/jmrashed/ecommerce?style=social)

Thank you for using the E-commerce Toolkit for Laravel! We hope it helps you build amazing e-commerce websites.
