<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Define routes for products
Route::resource('products', ProductController::class);

// Define routes for product reviews
Route::prefix('products/{product}/reviews')->name('reviews.')->group(function () {
    Route::get('/', [\Ecommerce\Http\Controllers\ReviewController::class, 'index'])->name('index');
    Route::get('/create', [\Ecommerce\Http\Controllers\ReviewController::class, 'create'])->name('create');
    Route::post('/', [\Ecommerce\Http\Controllers\ReviewController::class, 'store'])->name('store');
});

// Define routes for shopping cart
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add/{product}', [CartController::class, 'add'])->name('add');
    Route::put('/update/{item}', [CartController::class, 'update'])->name('update');
    Route::delete('/remove/{item}', [CartController::class, 'remove'])->name('remove');
});

// Define routes for checkout
Route::prefix('checkout')->name('checkout.')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('index');
    Route::post('/process', [CheckoutController::class, 'process'])->name('process');
    Route::get('/confirmation/{order}', [CheckoutController::class, 'confirmation'])->name('confirmation');
});

// Define routes for wishlist
Route::prefix('wishlist')->name('wishlist.')->group(function () {
    Route::get('/', [\Ecommerce\Http\Controllers\WishlistController::class, 'index'])->name('index');
    Route::post('/add/{product}', [\Ecommerce\Http\Controllers\WishlistController::class, 'store'])->name('add');
    Route::delete('/remove/{product}', [\Ecommerce\Http\Controllers\WishlistController::class, 'destroy'])->name('remove');
});

// Define routes for customer authentication
Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('/register', [CustomerAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [CustomerAuthController::class, 'register']);
    Route::get('/login', [CustomerAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [CustomerAuthController::class, 'login']);
    Route::post('/logout', [CustomerAuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [CustomerAuthController::class, 'profile'])->name('profile')->middleware('auth:customer'); // Protect with customer guard
                                                                                                                      // Customer panel routes
    Route::middleware('auth:customer')->group(function () {
        Route::get('/dashboard', [\Ecommerce\Http\Controllers\CustomerPanelController::class, 'dashboard'])->name('dashboard');
        Route::get('/orders', [\Ecommerce\Http\Controllers\CustomerPanelController::class, 'orders'])->name('orders');
        Route::get('/orders/{order}', [\Ecommerce\Http\Controllers\CustomerPanelController::class, 'orderDetail'])->name('orders.detail');
        Route::get('/addresses', [\Ecommerce\Http\Controllers\CustomerPanelController::class, 'addresses'])->name('addresses');
        Route::get('/reviews', [\Ecommerce\Http\Controllers\CustomerPanelController::class, 'reviews'])->name('reviews');
        Route::get('/wishlist', [\Ecommerce\Http\Controllers\CustomerPanelController::class, 'wishlist'])->name('wishlist');
        Route::get('/profile/edit', [\Ecommerce\Http\Controllers\CustomerPanelController::class, 'editProfile'])->name('profile.edit');
        Route::post('/profile/update', [\Ecommerce\Http\Controllers\CustomerPanelController::class, 'updateProfile'])->name('profile.update');
    });
});

// Admin routes for shipping management
Route::prefix('admin/shipping')->name('admin.shipping.')->group(function () {
    Route::get('/', [\Ecommerce\Http\Controllers\ShippingController::class, 'index'])->name('index');
    Route::get('/create', [\Ecommerce\Http\Controllers\ShippingController::class, 'create'])->name('create');
    Route::post('/', [\Ecommerce\Http\Controllers\ShippingController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [\Ecommerce\Http\Controllers\ShippingController::class, 'edit'])->name('edit');
    Route::put('/{id}', [\Ecommerce\Http\Controllers\ShippingController::class, 'update'])->name('update');
    Route::delete('/{id}', [\Ecommerce\Http\Controllers\ShippingController::class, 'destroy'])->name('destroy');
});

// Admin panel routes
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [\Ecommerce\Http\Controllers\AdminPanelController::class, 'dashboard'])->name('dashboard');
    Route::resource('products', \Ecommerce\Http\Controllers\AdminProductController::class);
    Route::resource('categories', \Ecommerce\Http\Controllers\AdminCategoryController::class);
    Route::resource('brands', \Ecommerce\Http\Controllers\AdminBrandController::class);
    Route::resource('orders', \Ecommerce\Http\Controllers\AdminOrderController::class);
    Route::resource('customers', \Ecommerce\Http\Controllers\AdminCustomerController::class);
    Route::resource('reviews', \Ecommerce\Http\Controllers\AdminReviewController::class);
    Route::resource('coupons', \Ecommerce\Http\Controllers\AdminCouponController::class);
    Route::resource('shippings', \Ecommerce\Http\Controllers\AdminShippingController::class);
});

// Define routes for coupons
Route::post('/coupon/apply', [\Ecommerce\Http\Controllers\CouponController::class, 'apply'])->name('coupon.apply');
Route::post('/coupon/remove', [\Ecommerce\Http\Controllers\CouponController::class, 'remove'])->name('coupon.remove');
