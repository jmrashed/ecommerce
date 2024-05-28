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

### Dataflow Diagram

```mermaid
graph TD
    subgraph Catalog
        A[Product] --> B[Category]
        A --> C[Brand]
        B --> A
        C --> A
    end
    
    subgraph Customer
        G[Customer] --> I[Cart]
        G --> J[Wishlist]
        G --> K[Address]
        I --> G
        J --> G
        K --> G
    end
    
    subgraph OrderManagement
        F[Order] --> L[Payment]
        F --> M[Shipping]
        L --> F
        M --> F
    end
    
    subgraph ReviewManagement
        D[Review] --> A
        D --> G
    end
    
    subgraph Inventory
        N[Warehouse] --> A
        O[Stock] --> N
        N --> O
    end
    
    subgraph Search
        P[SearchService] --> A
        P --> B
        P --> C
        P --> D
    end
    
    subgraph Recommendation
        Q[RecommendationEngine] --> A
        Q --> G
        Q --> D
    end
    
    subgraph Analytics
        R[AnalyticsEngine] --> G
        R --> A
        R --> F
        R --> D
        R --> B
    end
    
    subgraph Notifications
        S[NotificationService] --> G
        S --> F
    end
    
    subgraph UserInterface
        T[WebApp] --> G
        T --> A
        T --> I
        T --> F
        T --> P
        T --> Q
        T --> S
        T --> R
        T --> D
        T --> B
        T --> C
    end
    
    subgraph AdminInterface
        U[AdminPanel] --> A
        U --> B
        U --> C
        U --> F
        U --> N
        U --> O
        U --> R
    end
    
    T -.-> U

```


### Use Case Diagram

```mermaid
graph TB
  subgraph CustomerUseCases
    C[Customer] --> P[View Products]
    C --> Ca[Manage Cart]
    C --> W[Manage Wishlist]
    C --> O[Place Order]
    O --> Pa[Make Payment]
    O --> S[Track Shipping]
    C --> R[Write Review]
    C --> Se[Search Products]
    C --> Re[Get Recommendations]
  end

  subgraph AdminUseCases
    Ad[Admin] --> P
    Ad --> C[Manage Customers]
    Ad --> O[Manage Orders]
    Ad --> Pa[Manage Payments]
    Ad --> S[Manage Shipping]
    Ad --> R[Moderate Reviews]
    Ad --> Se[Manage Search]
    Ad --> Re[Manage Recommendations]
    Ad --> A[View Analytics]
    Ad --> N[Send Notifications]
  end

  subgraph Services
    Pa
    S
    Se
    Re
    A
    N
  end

  %% Service interactions
  P --> Se
  P --> Re
  P --> A
  P --> N
  O --> Pa
  O --> S

  %% Admin-Services relations
  Ad --> P
  Ad --> C
  Ad --> O
  Ad --> Pa
  Ad --> S
  Ad --> R
  Ad --> Se
  Ad --> Re
  Ad --> A
  Ad --> N

```

### Database Design 

```mermaid
erDiagram
    CUSTOMER ||--|| CART : has
    CUSTOMER ||--|| WISHLIST : has
    CUSTOMER ||--|| ADDRESS : has
    CUSTOMER ||--|| ORDER : places
    ORDER ||--|| PAYMENT : has
    ORDER ||--|| SHIPPING : has
    PRODUCT ||--|| CATEGORY : belongs to
    PRODUCT ||--|| BRAND : belongs to
    PRODUCT ||--|| REVIEW : has
    WAREHOUSE ||--|| STOCK : stores
    SEARCHSERVICE ||--|| PRODUCT : searches
    SEARCHSERVICE ||--|| CATEGORY : searches
    SEARCHSERVICE ||--|| BRAND : searches
    SEARCHSERVICE ||--|| REVIEW : searches
    RECOMMENDATIONENGINE ||--|| PRODUCT : recommends
    RECOMMENDATIONENGINE ||--|| CUSTOMER : recommends
    RECOMMENDATIONENGINE ||--|| REVIEW : recommends
    ANALYTICSENGINE ||--|| CUSTOMER : analyzes
    ANALYTICSENGINE ||--|| PRODUCT : analyzes
    ANALYTICSENGINE ||--|| ORDER : analyzes
    ANALYTICSENGINE ||--|| REVIEW : analyzes
    ANALYTICSENGINE ||--|| CATEGORY : analyzes
    NOTIFICATIONSERVICE ||--|| CUSTOMER : notifies
    NOTIFICATIONSERVICE ||--|| ORDER : notifies
    WEBAPP ||--|| CUSTOMER : uses
    WEBAPP ||--|| PRODUCT : uses
    WEBAPP ||--|| CART : uses
    WEBAPP ||--|| ORDER : uses
    WEBAPP ||--|| SEARCHSERVICE : uses
    WEBAPP ||--|| RECOMMENDATIONENGINE : uses
    WEBAPP ||--|| NOTIFICATIONSERVICE : uses
    WEBAPP ||--|| ANALYTICSENGINE : uses
    WEBAPP ||--|| REVIEW : uses
    WEBAPP ||--|| CATEGORY : uses
    ADMINPANEL ||--|| PRODUCT : manages
    ADMINPANEL ||--|| CATEGORY : manages
    ADMINPANEL ||--|| BRAND : manages
    ADMINPANEL ||--|| ORDER : manages
    ADMINPANEL ||--|| WAREHOUSE : manages
    ADMINPANEL ||--|| STOCK : manages
    ADMINPANEL ||--|| ANALYTICSENGINE : uses

```


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
