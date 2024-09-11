<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;

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

        return view('dashboard.index', compact('ordersCount', 'productsCount', 'usersCount'));
    }
}
