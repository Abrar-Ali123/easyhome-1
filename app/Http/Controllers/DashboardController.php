<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\User; // افتراض أنك تملك موديل Contact

class DashboardController extends Controller
{
    public function index()
    {
        $ordersCount = Order::select('status', \DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        $totalOrders = Order::count();
        $productsCount = Product::count();
        $usersCount = User::count();

        // جلب إحصائيات الاتصالات حسب المصدر
        $contactsBySource = Contact::select('source', \DB::raw('count(*) as total'))
            ->groupBy('source')
            ->pluck('total', 'source');

        // جلب إحصائيات الاتصالات حسب الحالة
        $contactsByStatus = Contact::select('status', \DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        return view('dashboard.index', compact('ordersCount', 'totalOrders', 'productsCount', 'usersCount', 'contactsBySource', 'contactsByStatus'));
    }
}
