<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ImageDownloader
{
    /**
     * تحميل صورة من URL وحفظها في مجلد التخزين
     * 
     * @param string $imageUrl رابط الصورة
     * @param string $folder المجلد الذي سيتم حفظ الصورة فيه
     * @return string|null مسار الصورة المحفوظة أو null في حالة الفشل
     */
    public function downloadImage($imageUrl, $folder = 'images')
    {
        try {
            // إنشاء اسم فريد للصورة
            $filename = Str::random(40) . '.jpg';
            
            // تحميل محتوى الصورة
            $imageContent = file_get_contents($imageUrl);
            
            if ($imageContent === false) {
                return null;
            }

            // حفظ الصورة في مجلد التخزين
            $path = $folder . '/' . $filename;
            Storage::disk('public')->put($path, $imageContent);

            return $path;
        } catch (\Exception $e) {
            \Log::error('خطأ في تحميل الصورة: ' . $e->getMessage());
            return null;
        }
    }
}
