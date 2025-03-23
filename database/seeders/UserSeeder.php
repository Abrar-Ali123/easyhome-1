<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // إنشاء المستخدم الرئيسي (Admin)
        User::create([
            'name' => 'مدير النظام',
            'avatar' => null,
            'email' => 'admin@easyhome.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'phone' => '+966500000000',
            'license_number' => 'ADM123',
            'bio' => 'مدير النظام الرئيسي',
            'is_supported' => true,
            'salary' => 15000.00,
            'bank' => 'البنك الأهلي',
            'age' => 35,
            'email_verified_at' => now()
        ]);

        // إنشاء مستخدم عادي للتجربة
        User::create([
            'name' => 'مستخدم تجريبي',
            'avatar' => null,
            'email' => 'user@easyhome.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
            'phone' => '+966500000001',
            'license_number' => 'USR456',
            'bio' => 'مستخدم عادي في النظام',
            'is_supported' => false,
            'salary' => 8000.00,
            'bank' => 'بنك الرياض',
            'age' => 28,
            'email_verified_at' => now()
        ]);
    }
}
