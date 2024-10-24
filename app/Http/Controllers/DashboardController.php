<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\User; // Assuming you have a Contact model

class DashboardController extends Controller
{
    public function index()
    {
        // جلب عدد الطلبات حسب الحالة
        $ordersCount = Order::select('status', \DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        // جلب عدد المنتجات
        $productsCount = Product::count();

        // جلب عدد المستخدمين
        $usersCount = User::count();

        // جلب إحصائيات الاتصالات حسب المصدر
        $contactsBySource = Contact::select('source', \DB::raw('count(*) as total'))
            ->groupBy('source')
            ->pluck('total', 'source');

        // جلب إحصائيات الاتصالات حسب الحالة
        $contactsByStatus = Contact::select('status', \DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        return view('dashboard.index', compact('ordersCount', 'productsCount', 'usersCount', 'contactsBySource', 'contactsByStatus'));
    }
}
