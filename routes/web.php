<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AuthCheckController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductRequestController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// إضافة هذا المسار في ملف routes/web.php
Route::get('/auth/check', [AuthCheckController::class, 'check'])->name('auth.check');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['check.employee' => \App\Http\Middleware\CheckEmployeeRole::class])->prefix('dashboard')->group(function () {
    Route::get('/contacts', [ContactController::class, 'adminIndex'])->name('admin.contacts.index');
    Route::get('/contacts/{id}/edit', [ContactController::class, 'adminEdit'])->name('admin.contacts.edit');
    Route::put('/contacts/{id}', [ContactController::class, 'adminUpdate'])->name('admin.contacts.update');
    Route::post('/admin/contacts/{id}/update', [ContactController::class, 'adminUpdate'])->name('admin.contacts.update');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('dashboard.products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/reports', [DashboardController::class, 'reports'])->name('dashboard.reports');
    Route::get('/product-requests', [ProductRequestController::class, 'showProductRequests'])->name('dashboard.product.requests');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders/update', [OrderController::class, 'update'])->name('orders.update'); // لا يتطلب معرف الطلب في المسار

    Route::resource('cities', CityController::class);
});

Route::middleware(['Auth_user' => \App\Http\Middleware\Auth_user::class])->prefix('home')->group(function () {
    Route::post('/orders/store/{product}', [OrderController::class, 'store'])->name('orders.store');
    Route::post('/likes', [LikeController::class, 'store'])->name('likes.store');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/products/{id}/order', [OrderController::class, 'placeOrder'])->name('products.order');
    Route::get('/products/{product}/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::post('/products/{product}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::post('/comments/{comment}/reply', [CommentController::class, 'reply'])->name('comments.reply');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('/password/confirm', [ConfirmPasswordController::class, 'confirm']);

Route::get('/1', function () {
    return view('dashboard');
});

Route::get('/2', function () {
    return view('pproprty');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products1', [ProductController::class, 'index1'])->name('products.index1');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/request-product', [ProductRequestController::class, 'showRequestForm'])->name('request.product.form');
Route::post('/request-product', [ProductRequestController::class, 'submitRequest'])->name('submit.product.request');

Route::get('/get-neighborhoods/{cityId}', [ProductRequestController::class, 'getNeighborhoods'])->name('get.neighborhoods');

use App\Http\Controllers\ContactController;

Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts/store', [ContactController::class, 'store'])->name('contacts.store');
