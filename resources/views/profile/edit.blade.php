{{--@extends('layout')--}}

{{--@section('title', 'الملف الشخصي')--}}

{{--@section('content')--}}
{{--            <!-- إضافة روابط Font Awesome و GLightbox CSS -->--}}
{{--            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">--}}
{{--            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">--}}
{{--            <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">--}}

{{--            <!-- إضافة CSS -->--}}
{{--            <style>--}}
{{--                :root {--}}
{{--                    --primary-color-light: #fff;--}}
{{--                    --primary_2-color-light: #fff6e0;--}}
{{--                    --secondary-color-light: #003e37;--}}
{{--                    --accent-color-light: #bb9339;--}}

{{--                    --primary-color-dark: #091716;--}}
{{--                    --primary_2-color-dark: #08201e;--}}
{{--                    --secondary-color-dark: #fff;--}}
{{--                    --accent-color-dark: #bb9339;--}}
{{--                }--}}

{{--                body {--}}
{{--                    font-family: 'Cairo', sans-serif;--}}
{{--                    margin: 0;--}}
{{--                    padding: 0;--}}
{{--                    background-color: var(--primary-color-light);--}}
{{--                    color: var(--secondary-color-light);--}}
{{--                    transition: background-color 0.3s, color 0.3s;--}}
{{--                }--}}

{{--                body.dark-mode {--}}
{{--                    background-color: var(--primary-color-dark);--}}
{{--                    color: var(--secondary-color-dark);--}}
{{--                }--}}

{{--                .container {--}}
{{--                    width: 85%;--}}
{{--                    margin: auto;--}}
{{--                    overflow: hidden;--}}
{{--                }--}}

{{--                .header {--}}
{{--                    background: var(--secondary-color-light);--}}
{{--                    color: var(--primary-color-light);--}}
{{--                    padding: 20px 0;--}}
{{--                    text-align: center;--}}
{{--                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);--}}
{{--                    transition: background 0.3s, color 0.3s;--}}
{{--                }--}}

{{--                body.dark-mode .header {--}}
{{--                    background: var(--secondary-color-dark);--}}
{{--                    color: var(--primary-color-dark);--}}
{{--                }--}}

{{--                .profile-main img {--}}
{{--                    width: 150px;--}}
{{--                    height: 150px;--}}
{{--                    border-radius: 50%;--}}
{{--                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);--}}
{{--                    margin-bottom: 20px;--}}
{{--                }--}}

{{--                .profile-info {--}}
{{--                    padding: 30px;--}}
{{--                    background: var(--primary-color-light);--}}
{{--                    border-radius: 12px;--}}
{{--                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);--}}
{{--                    margin-bottom: 30px;--}}
{{--                    transition: background 0.3s, color 0.3s;--}}
{{--                }--}}

{{--                body.dark-mode .profile-info {--}}
{{--                    background: var(--primary-color-dark);--}}
{{--                    color: var(--secondary-color-dark);--}}
{{--                }--}}

{{--                .profile-info h2 {--}}
{{--                    margin-top: 0;--}}
{{--                    font-size: 2.5em;--}}
{{--                    color: var(--secondary-color-light);--}}
{{--                    transition: color 0.3s;--}}
{{--                }--}}

{{--                body.dark-mode .profile-info h2 {--}}
{{--                    color: var(--secondary-color-dark);--}}
{{--                }--}}

{{--                .profile-info p {--}}
{{--                    margin: 15px 0;--}}
{{--                    line-height: 1.6;--}}
{{--                }--}}

{{--                .profile-info .label {--}}
{{--                    font-weight: bold;--}}
{{--                    margin-right: 10px;--}}
{{--                    color: var(--accent-color-light);--}}
{{--                    transition: color 0.3s;--}}
{{--                }--}}

{{--                body.dark-mode .profile-info .label {--}}
{{--                    color: var(--accent-color-dark);--}}
{{--                }--}}

{{--                .profile-info .value {--}}
{{--                    color: var(--secondary-color-light);--}}
{{--                    transition: color 0.3s;--}}
{{--                }--}}

{{--                body.dark-mode .profile-info .value {--}}
{{--                    color: var(--secondary-color-dark);--}}
{{--                }--}}

{{--                .edit-button {--}}
{{--                    background: var(--secondary-color-light);--}}
{{--                    color: var(--primary-color-light);--}}
{{--                    border: none;--}}
{{--                    padding: 12px 25px;--}}
{{--                    font-size: 1.1em;--}}
{{--                    cursor: pointer;--}}
{{--                    border-radius: 8px;--}}
{{--                    transition: background 0.3s ease, color 0.3s ease;--}}
{{--                    display: block;--}}
{{--                    width: 100%;--}}
{{--                    text-align: center;--}}
{{--                    margin-top: 20px;--}}
{{--                }--}}

{{--                .edit-button:hover {--}}
{{--                    background: var(--accent-color-light);--}}
{{--                }--}}

{{--                body.dark-mode .edit-button {--}}
{{--                    background: var(--secondary-color-dark);--}}
{{--                    color: var(--primary-color-dark);--}}
{{--                }--}}
{{--            </style>--}}

{{--            <!-- إضافة محتوى الصفحة -->--}}
{{--            <div class="container">--}}
{{--                    <header class="header">--}}
{{--                        <h1>الملف الشخصي</h1>--}}
{{--                    </header>--}}

{{--                    <section class="profile-main">--}}
{{--                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="الصورة الرمزية">--}}
{{--                    </section>--}}
{{--                <div class="container mx-auto px-4 py-6 text-center">--}}
{{--                    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">--}}
{{--                        <div class="p-6">--}}
{{--                            <h1 class="text-2xl font-bold mb-4 m-5">تعديل الملف الشخصي</h1>--}}
{{--                                <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">--}}
{{--                                    @csrf--}}

{{--                                    <div class="mb-4 text-center">--}}
{{--                                        <label for="name" class="block text-sm font-medium text-gray-700 text-center">الاسم</label><br>--}}
{{--                                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>--}}
{{--                                    </div>--}}

{{--                                    <div class="mb-4">--}}
{{--                                        <label for="avatar" class="block text-sm font-medium text-gray-700 text-center">الصورة الشخصية</label><br>--}}
{{--                                        <input--}}
{{--                                            type="file"--}}
{{--                                            id="avatar"--}}
{{--                                            name="avatar"--}}
{{--                                            class="mt-1 block w-full text-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">--}}
{{--                                    </div>--}}

{{--                                    <div class="mb-4">--}}
{{--                                        <label for="email" class="block text-sm font-medium text-gray-700 text-center">البريد الإلكتروني</label><br>--}}
{{--                                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>--}}
{{--                                    </div>--}}

{{--                                    <div class="mb-4">--}}
{{--                                        <label for="phone" class="block text-sm font-medium text-gray-700">رقم الهاتف</label><br>--}}
{{--                                        <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">--}}
{{--                                    </div>--}}

{{--                                    <div class="mb-4">--}}
{{--                                        <label for="role" class="block text-sm font-medium text-gray-700">دور المستخدم</label><br>--}}
{{--                                        <select id="role" name="role" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">--}}
{{--                                            <option value="client" {{ old('role', $user->role) == 'client' ? 'selected' : '' }}>عميل</option>--}}
{{--                                            <option value="manager" {{ old('role', $user->role) == 'manager' ? 'selected' : '' }}>مدير</option>--}}
{{--                                            <option value="agent" {{ old('role', $user->role) == 'agent' ? 'selected' : '' }}>وكيل</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

{{--                                    <div class="mb-4">--}}
{{--                                        <label for="license_number" class="block text-sm font-medium text-gray-700">رقم الرخصة</label><br>--}}
{{--                                        <input type="text" id="license_number" name="license_number" value="{{ old('license_number', $user->license_number) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">--}}
{{--                                    </div>--}}

{{--                                    <div class="mb-4">--}}
{{--                                        <label for="bio" class="block text-sm font-medium text-gray-700">السيرة الذاتية</label><br>--}}
{{--                                        <textarea id="bio" name="bio" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('bio', $user->bio) }}</textarea>--}}
{{--                                    </div>--}}

{{--                                    <div class="mb-4">--}}
{{--                                        <label for="salary" class="block text-sm font-medium text-gray-700">الراتب</label>--}}
{{--                                        <input type="number" id="salary" name="salary" value="{{ old('salary', $user->salary) }}" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">--}}
{{--                                    </div>--}}

{{--                                    <div class="mb-4">--}}
{{--                                        <label for="bank" class="block text-sm font-medium text-gray-700">البنك</label><br>--}}
{{--                                        <input type="text" id="bank" name="bank" value="{{ old('bank', $user->bank) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">--}}
{{--                                    </div>--}}

{{--                                    <div class="mb-4">--}}
{{--                                        <label for="city" class="block text-sm font-medium text-gray-700">المدينة</label><br>--}}
{{--                                        <input type="text" id="city" name="city" value="{{ old('city', $user->city) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">--}}
{{--                                    </div>--}}

{{--                                    <div class="mb-4">--}}
{{--                                        <label for="preferred_neighborhoods" class="block text-sm font-medium text-gray-700">--}}
{{--                                            الأحياء المفضلة (فصل بين القيم بفاصلة)--}}
{{--                                        </label><br>--}}
{{--                                        <input--}}
{{--                                            type="text"--}}
{{--                                            id="preferred_neighborhoods"--}}
{{--                                            name="preferred_neighborhoods"--}}
{{--                                            value="{{ old('preferred_neighborhoods', implode(', ', json_decode($user->preferred_neighborhoods, true) ?? [])) }}"--}}
{{--                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"--}}
{{--                                        >--}}
{{--                                    </div>--}}


{{--                                    <div class="mb-4">--}}
{{--                                        <label for="age" class="block text-sm font-medium text-gray-700">العمر</label><br>--}}
{{--                                        <input type="number" id="age" name="age" value="{{ old('age', $user->age) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">--}}
{{--                                    </div>--}}

{{--                                    <div class="flex items-center justify-between">--}}
{{--                                        <a href="{{ route('profile.show') }}" class="text-gray-500 hover:text-gray-700">إلغاء</a>--}}
{{--                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">حفظ التعديلات</button>--}}
{{--                                        <a href="{{ route('profile.edit') }}" class="edit-button">تعديل الملف الشخصي</a>--}}

{{--                                    </div>--}}
{{--                                </form>--}}


{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--@endsection--}}








    <!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index, follow" />
    <meta name="author" content="RamiAbdallah" />
    <meta name="theme-color" content="#1c6f8b" />
    <title>Ahmed store</title>

    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

    <!-- GOOGLE FONT ARABIC CAIRO -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet" />

    <!-- CUSTOM SIDEBAR STYLES -->
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}" />
</head>
<body>

<main class="main-wrapper">
    <section class="navbar">
        <div class="profile">
            <p>{{ Auth::user()->name }}</p>
            <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('assets/images/default.png') }}" alt="profile-avatar" />
        </div>

        <div class="toggler" id="toggler">
            <i class="bi bi-list"></i>
        </div>
    </section>

    <section class="best-seller">
        <div class="form-actions text-center">
            <button type="button" id="enableEdit" class="btn btn-primary">التعديل على البيانات</button>
        </div>

        <!-- نموذج تعديل البيانات الشخصية -->
        <div class="add-form">
            <form id="profileForm" action="{{ route('profile.update') }}" method="POST" class="dashboard-form" enctype="multipart/form-data">
                @csrf

                <div class="form-info">
                    <h4>تعديل البيانات الشخصية</h4>
                </div>

                <div class="form-inputs flex-flow-section">
                    <div class="input-field">
                        <span>الصورة الشخصية</span>
                        <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('assets/images/default.png') }}" alt="avatar" width="100" disabled/>
                        <label for="avatar">تغيير الصورة</label>
                        <input type="file" name="avatar" id="avatar" style="display: none" />

                        <div id="image-holder"></div>
                    </div>

                    <div class="input-field">
                        <label for="name">الإسم </label>
                        <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" disabled />
                        @error('name')
                        <p class="error-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-field">
                        <label for="email">البريد الإلكتروني </label>
                        <input type="email" name="email" id="email" value="{{ Auth::user()->email }}"  disabled/>
                        @error('email')
                        <p class="error-field">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-inputs flex-flow-section">
                    <div class="input-field">
                        <label for="phone">رقم الهاتف </label>
                        <input type="number" name="phone" id="phone" value="{{ Auth::user()->phone }}" disabled />
                        @error('phone')
                        <p class="error-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-field">
                        <label for="role">الدور </label>
                        <select id="role" name="role" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" >
                            <option value="client" {{ old('role', Auth::user()->role) == 'client' ? 'selected' : '' }}>عميل</option>
                            <option value="manager" {{ old('role', Auth::user()->role) == 'manager' ? 'selected' : '' }}>مدير</option>
                            <option value="agent" {{ old('role', Auth::user()->role) == 'agent' ? 'selected' : '' }}>وكيل</option>
                        </select>
                        @error('role')
                        <p class="error-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-field">
                        <label for="license_number">رقم الرخصة </label>
                        <input type="text" id="license_number" name="license_number" value="{{ old('license_number', Auth::user()->license_number) }}" disabled class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('license_number')
                        <p class="error-field">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-inputs flex-flow-section">
                    <div class="input-field">
                        <label for="bio"> وصف قصير أو سيرة ذاتية </label>
                        <textarea id="bio" name="bio" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" >{{ old('bio', Auth::user()->bio) }}</textarea>
                        @error('bio')
                        <p class="error-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-field">
                        <label for="salary">الراتب</label>
                        <input type="number" id="salary" name="salary" value="{{ old('salary', Auth::user()->salary) }}" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" disabled>
                        @error('salary')
                        <p class="error-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-field">
                        <label for="bank">البنك </label>
                        <input type="text" id="bank" name="bank" value="{{ old('bank', Auth::user()->bank) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" disabled>
                        @error('bank')
                        <p class="error-field">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-inputs flex-flow-section">
                    <div class="input-field">
                        <label for="city">المدينة </label>
                        <input type="text" id="city" name="city" value="{{ old('city', Auth::user()->city) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" disabled>
                        @error('city')
                        <p class="error-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-field">
                        <label for="age">العمر</label>
                        <input type="number" id="age" name="age" value="{{ old('age', Auth::user()->age) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" disabled>
                        @error('age')
                        <p class="error-field">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- حقل الأحياء المفضلة -->
{{--                    <div class="mb-4">--}}
{{--                        <label for="preferred_neighborhoods" class="block text-gray-700 text-sm font-bold mb-2">الأحياء المفضلة(ضع فواصل الاحياء):</label>--}}
{{--                        <div id="preferred-neighborhoods-wrapper">--}}
{{--                            @if(is_array(old('preferred_neighborhoods', $user->preferred_neighborhoods)))--}}
{{--                                @foreach(old('preferred_neighborhoods', $user->preferred_neighborhoods) as $neighborhood)--}}
{{--                                    <div class="mb-2 flex">--}}
{{--                                        <input type="text" name="preferred_neighborhoods[]" value="{{ $neighborhood }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">--}}
{{--                                        <button type="button" class="ml-2 remove-neighborhood text-red-500 hover:text-red-700">إزالة</button>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            @else--}}
{{--                                <div class="mb-2 flex">--}}
{{--                                    <input type="text" name="preferred_neighborhoods[]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">--}}
{{--                                    <button type="button" class="ml-2 remove-neighborhood text-red-500 hover:text-red-700">إزالة</button>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                        <button type="button" id="add-neighborhood" class="mt-2 text-blue-500 hover:text-blue-700">إضافة حي مفضل آخر</button>--}}
{{--                    </div>--}}
{{--                    <div class="mb-4">--}}
{{--                       <label for="preferred_neighborhoods" class="block text-sm font-medium text-gray-700">--}}
{{--                            الأحياء المفضلة (فصل بين القيم بفاصلة)--}}
{{--                        </label><br>--}}
{{--                            @if(is_array(old('preferred_neighborhoods', $user->preferred_neighborhoods)))--}}
{{--                            @foreach(old('preferred_neighborhoods', $user->preferred_neighborhoods) as $neighborhood)--}}

{{--                            <input--}}
{{--                            type="text"--}}
{{--                            id="preferred_neighborhoods"--}}
{{--                            name="preferred_neighborhoods"--}}
{{--                            value="{{ old('preferred_neighborhoods', implode(', ', json_decode($neighborhood->preferred_neighborhoods, true) ?? [])) }}"--}}
{{--                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">--}}
{{--                                <input type="text" id="preferred_neighborhoods" name="preferred_neighborhoods" value="{{ old('preferred_neighborhoods', implode(', ', json_decode($user->preferred_neighborhoods, true) ?? [])) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">--}}
{{--                            @endforeach--}}
{{--                        @endif--}}
{{--                    </div>--}}

                    </div>

                <div class="form-actions">
                    <input type="submit" value="حفظ التغييرات" class="btn btn-primary" disabled/>
                </div>
            </form>
        </div>

        <div class="seperator"></div>


        <div class="add-form">
            @if(session('status'))
                <p class="success-field">{{ session('status') }}</p>
            @endif

            <form id="profileForm" action="{{ route('password.update') }}" method="POST" class="dashboard-form">
                @csrf
                @method('PUT')

                <div class="form-info">
                    <h4>تغيير كلمة السر</h4>
                </div>

                <div class="form-inputs flex-flow-section">
                    <div class="input-field">
                        <label for="oldPassword">كلمة السر القديمة</label>
                        <input
                            type="password"
                            name="oldPassword"
                            id="oldPassword"
                            placeholder="كلمة السر القديمة"  disabled />
                        @error('oldPassword')
                        <p class="error-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-field">
                        <label for="newPassword">كلمة السر الجديدة</label>
                        <input
                            type="password"
                            name="newPassword"
                            id="newPassword"
                            placeholder="كلمة السر الجديدة" disabled />
                        @error('newPassword')
                        <p class="error-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-field">
                        <label for="newPassword_confirmation">تأكيد كلمة السر الجديدة</label>
                        <input
                            type="password"
                            name="newPassword_confirmation"
                            id="newPassword_confirmation"
                            placeholder="تأكيد كلمة السر الجديدة"  disabled/>
                    </div>
                </div>

                <div class="form-actions">
                    <input
                        type="submit"
                        value="تغيير كلمة السر"
                        class="btn btn-primary" disabled />
                </div>
            </form>
        </div>

    </section>


</main>

<script src="{{ asset('assets/js/sidebar.js') }}"></script>

<script>
    document.getElementById('enableEdit').addEventListener('click', function() {
        // إزالة خاصية disabled من جميع الحقول في النموذج
        var inputs = document.querySelectorAll('#profileForm input, #profileForm button');
        inputs.forEach(function(input) {
            input.removeAttribute('disabled');
        });

        // إخفاء زر التفعيل بعد الضغط عليه
        this.style.display = 'none';
    });
</script>

</body>
</html>
