<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    // دالة لإضافة المنتج إلى المفضلة
    public function addToFavorites($productId)
    {
        $user = Auth::user(); // الحصول على المستخدم الحالي
        $product = Product::findOrFail($productId); // التحقق من وجود المنتج

        // تحقق من عدم وجود المنتج بالفعل في المفضلة
        if (! $user->favorites()->where('product_id', $productId)->exists()) {
            $user->favorites()->create(['product_id' => $productId]);
        }

        return redirect()->back()->with('success', 'تمت إضافة المنتج إلى المفضلة!');
    }

    // دالة لإزالة المنتج من المفضلة
    public function removeFromFavorites($productId)
    {
        $user = Auth::user(); // الحصول على المستخدم الحالي
        $favorite = $user->favorites()->where('product_id', $productId)->first(); // البحث عن المنتج في المفضلة

        if ($favorite) {
            $favorite->delete(); // حذف المنتج من المفضلة
        }

        return redirect()->back()->with('success', 'تمت إزالة المنتج من المفضلة!');
    }
}
