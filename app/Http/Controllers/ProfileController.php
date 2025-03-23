<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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
        
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => ['nullable', 'string', 'max:20'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'license_number' => ['nullable', 'string', 'max:50'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'salary' => ['nullable', 'numeric', 'min:0'],
            'bank' => ['nullable', 'string', 'max:100'],
            'city' => ['nullable', 'string', 'max:100'],
            'preferred_neighborhoods' => ['nullable', 'array'],
            'preferred_neighborhoods.*' => ['nullable', 'string', 'max:100'],
            'age' => ['nullable', 'integer'],
        ]);

        if ($request->hasFile('avatar')) {
            // حذف الصورة القديمة إذا وجدت
            if ($user->avatar && Storage::exists($user->avatar)) {
                Storage::delete($user->avatar);
            }

            // حفظ الصورة الجديدة
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $validatedData['avatar'] = $avatarPath;
        }

        // تنظيف وتحضير الأحياء المفضلة
        if (isset($validatedData['preferred_neighborhoods'])) {
            $neighborhoods = array_filter($validatedData['preferred_neighborhoods'], function($value) {
                return !is_null($value) && $value !== '';
            });
            $validatedData['preferred_neighborhoods'] = json_encode(array_values($neighborhoods));
        }

        try {
            $user->update($validatedData);
            return redirect()->route('profile.show')->with('success', 'تم تحديث الملف الشخصي بنجاح');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'حدث خطأ أثناء تحديث الملف الشخصي'])->withInput();
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'كلمة المرور الحالية غير صحيحة']);
        }

        try {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route('profile.show')->with('success', 'تم تحديث كلمة المرور بنجاح');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'حدث خطأ أثناء تحديث كلمة المرور'])->withInput();
        }
    }
}
