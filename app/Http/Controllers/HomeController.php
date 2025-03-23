<?php

namespace App\Http\Controllers;

use App\Models\CompanyValue;
use App\Models\HeroSlider;
use App\Models\Land;
use App\Models\Partner;
use App\Models\Product;
use App\Models\SectionTitle;
use App\Models\Testimonial;
use App\Models\WhyChooseUs;
use App\Models\City;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Remove auth middleware as this is a public page
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // جلب عناوين الأقسام النشطة
        $sectionTitles = SectionTitle::where('is_active', true)
            ->orderBy('order')
            ->get()
            ->keyBy('section_key');

        // جلب السلايدر
        $heroSliders = HeroSlider::where('is_active', true)
            ->orderBy('order')
            ->get();
            
        // جلب قيم الشركة
        $companyValues = CompanyValue::where('is_active', true)
            ->orderBy('order')
            ->get();
            
        // جلب لماذا تختارنا
        $whyChooseUs = WhyChooseUs::where('is_active', true)
            ->orderBy('order')
            ->get();
            
        // جلب آراء العملاء
        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('order')
            ->get();
            
        // جلب الأراضي مع علاقاتها
        $lands = Land::with(['city' => function($query) {
                $query->whereNull('parent_id');
            }, 'neighborhood' => function($query) {
                $query->whereNotNull('parent_id');
            }])
            ->latest()
            ->take(6)
            ->get();
        
        // جلب الشركاء
        $partners = Partner::where('is_active', true)
            ->orderBy('order')
            ->get();
            
        // جلب المنتجات مع علاقاتها
        $products = Product::with(['city' => function($query) {
                $query->whereNull('parent_id');
            }, 'neighborhood' => function($query) {
                $query->whereNotNull('parent_id');
            }])
            ->latest()
            ->take(6)
            ->get();

        // جلب المدن الرئيسية للفلتر
        $cities = City::whereNull('parent_id')
            ->orderBy('name')
            ->get();

        return view('welcome', compact(
            'sectionTitles',
            'heroSliders',
            'companyValues',
            'whyChooseUs',
            'testimonials',
            'lands',
            'partners',
            'products',
            'cities'
        ));
    }
}
