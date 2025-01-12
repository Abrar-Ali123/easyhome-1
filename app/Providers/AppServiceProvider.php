<?php

namespace App\Providers;

use App\Models\City;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider; // أضف هذا السطر

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // تمرير البيانات بشكل تلقائي إلى جميع الصفحات التي تحتوي على parts.search-filter
        View::composer(['parts.search-filter', 'parts.property-list', 'welcome'], function ($view) {
            // إحضار العقارات
            $products = Product::paginate(9);
            $posts = Post::latest()->take(6)->get();

            // إحضار قائمة المدن
            $cities = City::all();

            // تمرير البيانات إلى الـ View
            $view->with('posts', $posts);

            $view->with(compact('products', 'cities', 'posts'));
        });
    }
}
