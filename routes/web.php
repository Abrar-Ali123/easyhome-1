<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReplyController;
use Illuminate\Support\Facades\Route;
// مجموعة الراوتات للداشبورد (للموظفين) باستخدام ميدل وير auth و check.employee


// راوت الصفحة الرئيسية والمزيد
Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['check.employee' => \App\Http\Middleware\CheckEmployeeRole::class,])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('dashboard.settings');
    Route::get('/reports', [DashboardController::class, 'reports'])->name('dashboard.reports');

    // راوت لعرض الطلبات في لوحة التحكم
    Route::get('/product-requests', [ProductRequestController::class, 'showProductRequests'])->name('dashboard.product.requests');

    // راوتات المنتجات
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // راوتات الطلبات
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders/store/{id}', [OrderController::class, 'store'])->name('orders.store');

Route::patch('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');

    // راوتات المدن
    Route::resource('cities', CityController::class);
});

// مجموعة الراوتات للمستخدمين العاديين باستخدام ميدل وير auth فقط
Route::middleware(['auth'])->group(function () {

    // راوتات طلبات المنتجات
//    Route::get('/request-product', [ProductRequestController::class, 'showRequestForm'])->name('request.product');
    Route::post('/request-product', [ProductRequestController::class, 'submitRequest'])->name('submit.product.request');

    // راوتات التعليقات والإعجابات والردود
    Route::post('/comments/{product}', [CommentController::class, 'store'])->name('comments.store');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::post('/comments/{comment}/toggle-visibility', [CommentController::class, 'toggleVisibility']);
    Route::post('/replies/{comment}', [ReplyController::class, 'store']);
    Route::post('/likes', [LikeController::class, 'store'])->name('likes.store');

    // راوتات الطلبات
    Route::post('/products/{id}/order', [OrderController::class, 'placeOrder'])->name('products.order');
    // راوتات الملف الشخصي
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

});

// راوتات المصادقة والتسجيل
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.r');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::get('/password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('/password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'confirm']);



Route::get('/1', function () {
    return view('dashboard');
});

Route::get('/2', function () {
    return view('pproprty');
});

Route::get('/login', function () {
    return view('login');
});

//Route::get('/products', [ProductController::class, 'index'])->name('products.index')->middleware('auth');;
//Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')->middleware('auth');
//Route::post('/products', [ProductController::class, 'store'])->name('products.store')->middleware('auth');;
//Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show')->middleware('auth');;
//Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit')->middleware('auth');;
//Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update')->middleware('auth');;
//Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('auth');;

Route::get('/single', [ProductController::class, 'single'])->name('single');

//Route::get('/single', function () {
//    return view('single');
//});

Route::post('/products/{id}/order', [OrderController::class, 'placeOrder'])->middleware('auth')->name('products.order');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
