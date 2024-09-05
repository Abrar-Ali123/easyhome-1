<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // دالة لعرض الملف الشخصي
    public function show()
    {
        $user = Auth::user();

        return view('profile.show', compact('user'));
    }

    // دالة لتعديل الملف الشخصي
    public function edit()
    {
        $user = Auth::user();

        return view('profile.edit', compact('user'));
    }

    // دالة لتحديث الملف الشخصي
    public function update(Request $request)
    {
        $user = Auth::user();

        // التحقق من صحة البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:20',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'license_number' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'salary' => 'nullable|numeric',
            'bank' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'preferred_neighborhoods' => 'nullable|array',
            'age' => 'nullable|integer',
        ]);

        try {
            // معالجة الصورة الشخصية إذا كانت موجودة
            if ($request->hasFile('avatar')) {
                // حذف الصورة القديمة إذا كانت موجودة
                if ($user->avatar && Storage::exists('public/'.$user->avatar)) {
                    Storage::delete('public/'.$user->avatar);
                }

                // رفع الصورة الجديدة
                $avatarName = $request->file('avatar')->store('avatars', 'public');
                $user->avatar = $avatarName;
            }

            // تحديث معلومات المستخدم
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => $request->role,
                'license_number' => $request->license_number,
                'bio' => $request->bio,
                'salary' => $request->salary,
                'bank' => $request->bank,
                'city' => $request->city,
                'preferred_neighborhoods' => $request->preferred_neighborhoods ? json_encode($request->preferred_neighborhoods) : null,
                'age' => $request->age,
            ]);

            // توجيه المستخدم مع رسالة نجاح
            return redirect()->route('profile.show')->with('success', 'تم تحديث الملف الشخصي بنجاح.');

        } catch (\Exception $e) {
            // توجيه المستخدم مع رسالة خطأ
            return redirect()->route('profile.show')->with('error', 'حدث خطأ أثناء تحديث الملف الشخصي.');
        }
    }
}
