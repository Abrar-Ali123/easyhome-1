<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // إنشاء الصلاحيات
        $permissions = [
            // إدارة المستخدمين
            ['name' => 'view_users', 'display_name' => 'عرض المستخدمين'],
            ['name' => 'create_users', 'display_name' => 'إضافة مستخدمين'],
            ['name' => 'edit_users', 'display_name' => 'تعديل المستخدمين'],
            ['name' => 'delete_users', 'display_name' => 'حذف المستخدمين'],
            
            // إدارة العقارات
            ['name' => 'view_properties', 'display_name' => 'عرض العقارات'],
            ['name' => 'create_properties', 'display_name' => 'إضافة عقارات'],
            ['name' => 'edit_properties', 'display_name' => 'تعديل العقارات'],
            ['name' => 'delete_properties', 'display_name' => 'حذف العقارات'],
            
            // إدارة المحتوى
            ['name' => 'view_content', 'display_name' => 'عرض المحتوى'],
            ['name' => 'create_content', 'display_name' => 'إضافة محتوى'],
            ['name' => 'edit_content', 'display_name' => 'تعديل المحتوى'],
            ['name' => 'delete_content', 'display_name' => 'حذف المحتوى'],
            
            // إدارة الإعدادات
            ['name' => 'manage_settings', 'display_name' => 'إدارة إعدادات الموقع'],
            
            // إدارة الأدوار والصلاحيات
            ['name' => 'manage_roles', 'display_name' => 'إدارة الأدوار والصلاحيات'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        // إنشاء الأدوار
        $roles = [
            [
                'name' => 'super_admin',
                'display_name' => 'مدير عام',
                'description' => 'لديه كافة الصلاحيات في النظام',
                'permissions' => Permission::all()->pluck('name')->toArray()
            ],
            [
                'name' => 'admin',
                'display_name' => 'مدير',
                'description' => 'لديه صلاحيات إدارة المحتوى والمستخدمين',
                'permissions' => [
                    'view_users', 'edit_users',
                    'view_properties', 'edit_properties',
                    'view_content', 'edit_content',
                    'manage_settings'
                ]
            ],
            [
                'name' => 'property_manager',
                'display_name' => 'مدير عقارات',
                'description' => 'مسؤول عن إدارة العقارات',
                'permissions' => [
                    'view_properties', 'create_properties',
                    'edit_properties', 'delete_properties'
                ]
            ],
            [
                'name' => 'content_manager',
                'display_name' => 'مدير محتوى',
                'description' => 'مسؤول عن إدارة محتوى الموقع',
                'permissions' => [
                    'view_content', 'create_content',
                    'edit_content', 'delete_content'
                ]
            ],
            [
                'name' => 'user',
                'display_name' => 'مستخدم',
                'description' => 'مستخدم عادي',
                'permissions' => [
                    'view_properties',
                    'view_content'
                ]
            ]
        ];

        foreach ($roles as $roleData) {
            $permissions = $roleData['permissions'];
            unset($roleData['permissions']);
            
            $role = Role::create($roleData);
            
            // ربط الصلاحيات بالدور
            $permissionIds = Permission::whereIn('name', $permissions)->pluck('id');
            $role->permissions()->attach($permissionIds);
        }
    }
}
