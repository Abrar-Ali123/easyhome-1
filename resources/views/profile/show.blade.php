@extends('layout')

@section('title', 'الملف الشخصي')

@section('content')
<!-- إضافة روابط Font Awesome و GLightbox CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

<!-- إضافة CSS -->
<style>
    :root {
        --primary-color-light: #fff;
        --primary_2-color-light: #fff6e0;
        --secondary-color-light: #003e37;
        --accent-color-light: #bb9339;

        --primary-color-dark: #091716;
        --primary_2-color-dark: #08201e;
        --secondary-color-dark: #fff;
        --accent-color-dark: #bb9339;
    }

    body {
        font-family: 'Cairo', sans-serif;
        margin: 0;
        padding: 0;
        background-color: var(--primary-color-light);
        color: var(--secondary-color-light);
        transition: background-color 0.3s, color 0.3s;
    }

    body.dark-mode {
        background-color: var(--primary-color-dark);
        color: var(--secondary-color-dark);
    }

    .container {
        width: 85%;
        margin: auto;
        overflow: hidden;
    }

    .header {
        background: var(--secondary-color-light);
        color: var(--primary-color-light);
        padding: 20px 0;
        text-align: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        transition: background 0.3s, color 0.3s;
    }

    body.dark-mode .header {
        background: var(--secondary-color-dark);
        color: var(--primary-color-dark);
    }

    .profile-main img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        margin-bottom: 20px;
    }

    .profile-info {
        padding: 30px;
        background: var(--primary-color-light);
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        transition: background 0.3s, color 0.3s;
    }

    body.dark-mode .profile-info {
        background: var(--primary-color-dark);
        color: var(--secondary-color-dark);
    }

    .profile-info h2 {
        margin-top: 0;
        font-size: 2.5em;
        color: var(--secondary-color-light);
        transition: color 0.3s;
    }

    body.dark-mode .profile-info h2 {
        color: var(--secondary-color-dark);
    }

    .profile-info p {
        margin: 15px 0;
        line-height: 1.6;
    }

    .profile-info .label {
        font-weight: bold;
        margin-right: 10px;
        color: var(--accent-color-light);
        transition: color 0.3s;
    }

    body.dark-mode .profile-info .label {
        color: var(--accent-color-dark);
    }

    .profile-info .value {
        color: var(--secondary-color-light);
        transition: color 0.3s;
    }

    body.dark-mode .profile-info .value {
        color: var(--secondary-color-dark);
    }

    .edit-button {
        background: var(--secondary-color-light);
        color: var(--primary-color-light);
        border: none;
        padding: 12px 25px;
        font-size: 1.1em;
        cursor: pointer;
        border-radius: 8px;
        transition: background 0.3s ease, color 0.3s ease;
        display: block;
        width: 100%;
        text-align: center;
        margin-top: 20px;
    }

    .edit-button:hover {
        background: var(--accent-color-light);
    }

    body.dark-mode .edit-button {
        background: var(--secondary-color-dark);
        color: var(--primary-color-dark);
    }
</style>

<!-- إضافة محتوى الصفحة -->
<div class="container">
    <header class="header">
        <h1>الملف الشخصي</h1>
    </header>

    <section class="profile-main">
        <img src="{{ asset('storage/' . $user->avatar) }}" alt="الصورة الرمزية">
    </section>

    <section class="profile-info text-center">
        <h2>{{ $user->name }}</h2>

        <p><span class="label ">البريد الإلكتروني:</span><br> <span class="value ">{{ $user->email }}</span></p><hr>

        <p><span class="label">الهاتف:</span> <br><span class="value ">{{ $user->phone }}</span></p><hr>

        <p><span class="label">الدور:</span> <br><span class="value ">{{ $user->role }}</span></p><hr>

        <p><span class="label ">رقم الرخصة:</span> <br><span class="value ">{{ $user->license_number }}</span></p><hr>
        <p><span class="label ">الوصف:</span> <br><span class="value ">{{ $user->bio }}</span></p><hr>
        <p><span class="label ">مدعوم:</span> <br><span class="value ">{{ $user->is_supported ? 'نعم' : 'لا' }}</span></p><hr>
        <p><span class="label ">الراتب:</span><br> <span class="value ">{{ $user->salary }}</span></p><hr>
        <p><span class="label ">البنك:</span> <br><span class="value ">{{ $user->bank }}</span></p><hr>
        <p><span class="label ">المدينة:</span> <br><span class="value ">{{ $user->city }}</span></p><hr>
        <p><span class="label ">الأحياء المفضلة:</span>
            <span class="value ">
                @if($user->preferred_neighborhoods)
                    <ul>
                        @foreach(json_decode($user->preferred_neighborhoods) as $neighborhood)
                            <li>{{ $neighborhood }}</li>
                        @endforeach
                    </ul>
                @else
                    لا توجد أحياء مفضلة مسجلة.
                @endif
            </span>
        </p>


        <a href="{{ route('profile.edit') }}" class="edit-button">تعديل الملف الشخصي</a>
        <a href="{{ route('profile.edit') }}" class="edit-button">تعديل الملف الشخصي</a>

        <p><span class="label ">العمر:</span> <span class="value ">{{ $user->age }}</span></p>
     </section>
</div>
