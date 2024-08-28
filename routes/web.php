<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('easyhome/login', [LoginController::class, 'showLoginForm'])->name('Abrar');
Route::post('easyhome/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('easyhome/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('easyhome/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.r');
Route::post('easyhome/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('easyhome/password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('easyhome/password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('easyhome/password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('easyhome/password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('easyhome/password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('easyhome/password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'confirm']);

Route::get('easyhome/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::post('easyhome/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/', function () {
    return view('welcome');
});

Route::get('1', function () {
    return view('dashboard');
});

Route::get('easyhome/2', function () {
    return view('proprty');
});

Route::get('easyhome/login', function () {
    return view('login');
});

Route::get('easyhome/products', [ProductController::class, 'index'])->name('products.index');
Route::get('easyhome/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('easyhome/products', [ProductController::class, 'store'])->name('products.store');
Route::get('easyhome/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('easyhome/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('easyhome/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('easyhome/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('easyhome/single', function () {
    return view('single');
});

Route::post('/products/{id}/order', [OrderController::class, 'placeOrder'])->middleware('auth')->name('products.order');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/property/{product}', [ProductController::class, 'show'])->name('property.show');
