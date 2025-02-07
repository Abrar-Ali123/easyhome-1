<?php

namespace App\Providers;

use App\Models\City;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // تمرير البيانات إلى أجزاء العرض المحددة
        View::composer(['parts.search-filter', 'proprty','parts.property-list', 'welcome'], function ($view) {
            // إحضار البيانات المطلوبة
            $mainCities = City::whereNull('parent_id')->get(); // المدن الرئيسية
            $subCities = City::whereNotNull('parent_id')->get(); // الأحياء أو المدن التابعة
            $products = Product::paginate(100); // العقارات
            $posts = Post::latest()->take(6)->get(); // آخر المنشورات
            $cities = City::all(); // جميع المدن

            // تمرير البيانات إلى العرض
            $view->with(compact('mainCities', 'subCities', 'products', 'posts', 'cities'));
        });
    }
}
