<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AuthCheckController;
use App\Http\Controllers\CategoryBlogController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductRequestController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// مسارات الصفحة الرئيسية والتسجيل
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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

// مسارات البحث العامة (متاحة للجميع)
Route::get('/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/neighborhoods/{cityId}', [CityController::class, 'neighborhoods'])->name('neighborhoods.get');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/properties', [ProductController::class, 'properties'])->name('products.properties');

// مسارات المستخدم المصادق عليه
Route::middleware(['Auth_user'])->group(function () {
    // مسارات الملف الشخصي
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    
    // مسارات الطلبات والتفاعلات
    Route::post('/orders/store/{product}', [OrderController::class, 'store'])->name('orders.store');
    Route::post('/likes', [LikeController::class, 'store'])->name('likes.store');
    Route::post('/products/{id}/order', [OrderController::class, 'placeOrder'])->name('products.order');
    Route::get('/products/{product}/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::post('/products/{product}/comments', [CommentController::class, 'store'])->name('comments.store');
});

// مسارات لوحة التحكم
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('why-choose-us', Admin\WhyChooseUsController::class);
    Route::resource('section-titles', Admin\SectionTitleController::class)->except(['create', 'store', 'destroy']);
    Route::resource('about', Admin\AboutController::class);
});

// مسارات المنتجات
Route::get('/products1', [ProductController::class, 'index1'])->name('products.index1');
Route::get('/request-product', [ProductRequestController::class, 'showRequestForm'])->name('request.product.form');
Route::post('/request-product', [ProductRequestController::class, 'submitRequest'])->name('submit.product.request');
Route::get('/get-neighborhoods/{cityId}', [ProductRequestController::class, 'getNeighborhoods'])->name('get.neighborhoods');

// مسارات الأراضي
Route::get('/lands', [LandController::class, 'index'])->name('lands.index');
Route::get('/lands/search', [LandController::class, 'search'])->name('lands.search');
Route::get('/lands/create', [LandController::class, 'create'])->name('lands.create');
Route::post('/lands', [LandController::class, 'store'])->name('lands.store');
Route::get('/lands/{land}', [LandController::class, 'show'])->name('lands.show');
Route::get('/lands/{land}/edit', [LandController::class, 'edit'])->name('lands.edit');
Route::put('/lands/{land}', [LandController::class, 'update'])->name('lands.update');
Route::delete('/lands/{land}', [LandController::class, 'destroy'])->name('lands.destroy');

// مسارات المدن
Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
Route::get('/cities/create', [CityController::class, 'create'])->name('cities.create');
Route::post('/cities', [CityController::class, 'store'])->name('cities.store');
Route::get('/cities/{city}', [CityController::class, 'show'])->name('cities.show');
Route::get('/cities/{city}/edit', [CityController::class, 'edit'])->name('cities.edit');
Route::put('/cities/{city}', [CityController::class, 'update'])->name('cities.update');
Route::delete('/cities/{city}', [CityController::class, 'destroy'])->name('cities.destroy');

// مسارات الأحياء
Route::get('/category_blog', [CategoryBlogController::class, 'index'])->name('category_blog.index');
Route::get('/category_blog/create', [CategoryBlogController::class, 'create'])->name('category_blog.create');
Route::post('/category_blog', [CategoryBlogController::class, 'store'])->name('category_blog.store');
Route::get('/category_blog/{category_blog}', [CategoryBlogController::class, 'show'])->name('category_blog.show');
Route::get('/category_blog/{category_blog}/edit', [CategoryBlogController::class, 'edit'])->name('category_blog.edit');
Route::put('/category_blog/{category_blog}', [CategoryBlogController::class, 'update'])->name('category_blog.update');
Route::delete('/category_blog/{category_blog}', [CategoryBlogController::class, 'destroy'])->name('category_blog.destroy');

// مسارات المنشورات
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// مسارات الإتصالات
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

// مسارات الطلبات
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

// مسارات الإعجابات
Route::get('/likes', [LikeController::class, 'index'])->name('likes.index');
Route::get('/likes/create', [LikeController::class, 'create'])->name('likes.create');
Route::post('/likes', [LikeController::class, 'store'])->name('likes.store');
Route::get('/likes/{like}', [LikeController::class, 'show'])->name('likes.show');
Route::get('/likes/{like}/edit', [LikeController::class, 'edit'])->name('likes.edit');
Route::put('/likes/{like}', [LikeController::class, 'update'])->name('likes.update');
Route::delete('/likes/{like}', [LikeController::class, 'destroy'])->name('likes.destroy');

// مسارات التعليقات
Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
Route::get('/comments/create', [CommentController::class, 'create'])->name('comments.create');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments/{comment}', [CommentController::class, 'show'])->name('comments.show');
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

// مسارات لوحة التحكم
Route::middleware(['check.employee' => \App\Http\Middleware\CheckEmployeeRole::class])->prefix('admin')->group(function () {
    Route::get('/contacts', [ContactController::class, 'adminIndex'])->name('admin.contacts.index');
    Route::get('/contacts/{id}/edit', [ContactController::class, 'adminEdit'])->name('admin.contacts.edit');
    Route::put('/contacts/{id}', [ContactController::class, 'adminUpdate'])->name('admin.contacts.update');
    Route::post('/admin/contacts/{id}/update', [ContactController::class, 'adminUpdate'])->name('admin.contacts.update');
    Route::resource('category_blog', CategoryBlogController::class);
    Route::get('/products', [ProductController::class, 'index1'])->name('products.index');
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/admin2', function () {
    return view('dashboard.index2');
})->name('admin2');

Route::get('/posts', [PostController::class, 'userPosts'])->name('posts.user.index');

Route::get('/auth/check', [AuthCheckController::class, 'check'])->name('auth.check');

Route::get('/contact/page1', [ContactController::class, 'createPage1'])->name('contact.page1');
Route::get('/contact/page2', [ContactController::class, 'createPage2'])->name('contact.page2');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::post('/contacts/store', [ContactController::class, 'store'])->name('contacts.store');

Route::get('/admin/contacts', [ContactController::class, 'adminIndex'])->name('admin.contacts.index');
Route::post('/admin/contacts/{id}/update', [ContactController::class, 'adminUpdate'])->name('admin.contacts.update');

Route::post('/contacts/store', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/blog', [PostController::class, 'userIndex'])->name('blog.index');

Route::get('/admin/contacts', [ContactController::class, 'adminIndex'])->name('admin.contacts.index');
Route::post('/admin/contacts/{id}/update', [ContactController::class, 'adminUpdate'])->name('admin.contacts.update');

Route::get('/1', function () {
    return view('dashboard');
});

Route::get('/2', function () {
    return view('pproprty');
});

Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts/store', [ContactController::class, 'store'])->name('contacts.store');
Route::resource('posts', PostController::class);
