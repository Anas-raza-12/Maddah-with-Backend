<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/category', [HomeController::class, 'category'])->name('category');
Route::get('/wishlist', [HomeController::class, 'wishlist'])->name('wishlist');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/myaccount', [HomeController::class, 'myaccount'])->name('myaccount');
Route::get('/order-detail', [HomeController::class, 'orderDetail'])->name('order-detail');
Route::get('/order-confirmation', [HomeController::class, 'orderConfirmation'])->name('order-confirmation');
Route::get('/404-error', [HomeController::class, 'Error404'])->name('404-error');
Route::post('/promo-email', [HomeController::class, 'promoEmails'])->name('promoemail');

Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop/{product_slug}', [ShopController::class, 'productDetail'])->name('shop.product.detail');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginUser'])->name('login.user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'registerUser'])->name('register.user');

Route::middleware(ValidUser::class)->group(function(){
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/product', [AdminController::class, 'product'])->name('dashboard.product.list');
    Route::get('/dashboard/product/create', [AdminController::class, 'addProduct'])->name('dashboard.product.add');
    Route::post('/dashboard/product/create', [AdminController::class, 'storeProduct'])->name('dashboard.product.store');
    Route::get('/dashboard/product/edit/{id}', [AdminController::class, 'editProduct'])->name('dashboard.product.edit');
    Route::put('/dashboard/product/edit/{id}', [AdminController::class, 'updateProduct'])->name('dashboard.product.update');
    Route::delete('/dashboard/product/delete/{id}', [AdminController::class, 'deleteProduct'])->name('dashboard.product.delete');
    Route::get('/dashboard/categories', [AdminController::class, 'categories'])->name('dashboard.categories.list');
    Route::get('/dashboard/categories/create', [AdminController::class, 'addCategory'])->name('dashboard.category.add');
    Route::post('/dashboard/categories/create', [AdminController::class, 'storeCategory'])->name('dashboard.category.store');
    Route::get('/dashboard/categories/edit/{id}', [AdminController::class, 'editCategory'])->name('dashboard.category.edit');
    Route::put('/dashboard/categories/update/{id}', [AdminController::class, 'updateCategory'])->name('dashboard.category.update');
    Route::delete('/dashboard/categories/delete/{id}', [AdminController::class, 'deleteCategory'])->name('dashboard.category.delete');
    Route::get('/dashboard/our-team', [AdminController::class, 'ourTeam'])->name('dashboard.ourteam.list');
    Route::get('/dashboard/our-team/add-member', [AdminController::class, 'addMember'])->name('dashboard.ourteam.addmember');
    Route::post('/dashboard/our-team/add-member', [AdminController::class, 'storeMember'])->name('dashboard.ourteam.storemember');
    Route::get('/dashboard/our-team/edit-member/{id}', [AdminController::class, 'editMember'])->name('dashboard.ourteam.editmember');
    Route::put('/dashboard/our-team/update-member/{id}', [AdminController::class, 'updateMember'])->name('dashboard.ourteam.updatemember');
    Route::delete('/dashboard/our-team/delete-member/{id}', [AdminController::class, 'deleteMember'])->name('dashboard.ourteam.deletemember');
    Route::get('/dashboard/promo-emails', [AdminController::class, 'promoEmails'])->name('dashboard.promoemails.list');
    Route::delete('/dashboard/promo-emails/{id}', [AdminController::class, 'deletePromoEmail'])->name('dashboard.promoemails.delete');
});
