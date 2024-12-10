<?php

use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\UserAccountController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
// Route::post('/cart/update', [CartController::class, 'updateCart']);
Route::post('/cart/remove', [CartController::class, 'removeFromCart']);
Route::get('/category', [HomeController::class, 'category'])->name('category');
Route::get('/category/{category_slug?}', [HomeController::class, 'categoryFilter'])->name('category.filter');
Route::get('/404-error', [HomeController::class, 'Error404'])->name('404-error');
Route::post('/promo-email', [HomeController::class, 'promoEmails'])->name('promoemail');

Route::get('/shop', [ShopController::class, 'index'])->name('shop');
// Route::get('/shop/{category_slug?}', [ShopController::class, 'index'])->name('shop.category');
Route::get('/shop/{product_slug}', [ShopController::class, 'productDetail'])->name('shop.product.detail');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginUser'])->name('login.user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'registerUser'])->name('register.user');

// Group for admin routes
Route::middleware([ValidUser::class . ':admin'])->group(function() {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    
    // Product routes
    Route::get('/dashboard/product', [AdminController::class, 'product'])->name('dashboard.product.list');
    Route::get('/dashboard/product/create', [AdminController::class, 'addProduct'])->name('dashboard.product.add');
    Route::post('/dashboard/product/create', [AdminController::class, 'storeProduct'])->name('dashboard.product.store');
    Route::get('/dashboard/product/edit/{id}', [AdminController::class, 'editProduct'])->name('dashboard.product.edit');
    Route::put('/dashboard/product/edit/{id}', [AdminController::class, 'updateProduct'])->name('dashboard.product.update');
    Route::delete('/dashboard/product/delete/{id}', [AdminController::class, 'deleteProduct'])->name('dashboard.product.delete');
    
    // Category routes
    Route::get('/dashboard/categories', [AdminController::class, 'categories'])->name('dashboard.categories.list');
    Route::get('/dashboard/categories/create', [AdminController::class, 'addCategory'])->name('dashboard.category.add');
    Route::post('/dashboard/categories/create', [AdminController::class, 'storeCategory'])->name('dashboard.category.store');
    Route::get('/dashboard/categories/edit/{id}', [AdminController::class, 'editCategory'])->name('dashboard.category.edit');
    Route::put('/dashboard/categories/update/{id}', [AdminController::class, 'updateCategory'])->name('dashboard.category.update');
    Route::delete('/dashboard/categories/delete/{id}', [AdminController::class, 'deleteCategory'])->name('dashboard.category.delete');
    
    // Our Team routes
    // Route::get('/dashboard/our-team', [AdminController::class, 'ourTeam'])->name('dashboard.ourteam.list');
    // Route::get('/dashboard/our-team/add-member', [AdminController::class, 'addMember'])->name('dashboard.ourteam.addmember');
    // Route::post('/dashboard/our-team/add-member', [AdminController::class, 'storeMember'])->name('dashboard.ourteam.storemember');
    // Route::get('/dashboard/our-team/edit-member/{id}', [AdminController::class, 'editMember'])->name('dashboard.ourteam.editmember');
    // Route::put('/dashboard/our-team/update-member/{id}', [AdminController::class, 'updateMember'])->name('dashboard.ourteam.updatemember');
    // Route::delete('/dashboard/our-team/delete-member/{id}', [AdminController::class, 'deleteMember'])->name('dashboard.ourteam.deletemember');

    // Orders routes
    Route::get('dashboard/orders', [AdminController::class, 'orders'])->name('dashboard.orders');
    Route::get('dashboard/orders/order-details/{orderId}', [AdminController::class, 'orderDetails'])->name('dashboard.order.details');
    
    // Promo Emails
    Route::get('/dashboard/promo-emails', [AdminController::class, 'promoEmails'])->name('dashboard.promoemails.list');
    Route::delete('/dashboard/promo-emails/{id}', [AdminController::class, 'deletePromoEmail'])->name('dashboard.promoemails.delete');
});

// Group for user-specific routes
Route::middleware([ValidUser::class . ':user'])->group(function() {
    Route::get('/wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
    Route::post('/wishlist/add', [WishlistController::class, 'add']);
    Route::delete('/wishlist/remove', [WishlistController::class, 'remove']);
    Route::post('/wishlist/move-to-cart', [WishlistController::class, 'moveToCart'])->name('wishlist.moveToCart');
    Route::get('/myaccount', [UserAccountController::class, 'index'])->name('user.dashboard');
    Route::post('/myaccount/update', [UserAccountController::class, 'update'])->name('profile.update');
    Route::get('/myaccount/change-password', [UserAccountController::class, 'changePassword'])->name('myaccount.password.change');
    Route::post('/myaccount/password', [UserAccountController::class, 'updatePassword'])->name('myaccount.password.update');
    Route::get('/myaccount/orders', [UserAccountController::class, 'orders'])->name('orders');
    Route::get('/myaccount/orders/{id}', [UserAccountController::class, 'orderDetail'])->name('order.detail');
    // Route::post('/orders/{orderId}/cancel', [UserAccountController::class, 'cancelOrder'])->name('orders.cancel');
    Route::match(['get', 'post'], '/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/order/place', [CartController::class, 'PlaceAnOrder'])->name('order.place');
    Route::get('/bank-accounts', [CartController::class, 'bankAccounts'])->name('bank.accounts');
    Route::get('/bank-details/{bank}', [CartController::class, 'bankDetails'])->name('bank.details');
    Route::post('/confirm-payment', [CartController::class, 'confirmPayment'])->name('confirm.payment');
    Route::get('/order-confirmation/{orderId}', [CartController::class, 'orderConfirmation'])->name('order-confirmation');
});

Route::fallback(function() {
    return view('errors.404');
});
