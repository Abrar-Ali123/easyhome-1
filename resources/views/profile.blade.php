@extends('layout')

@section('title', 'الملف الشخصي')

@section('content')

<!-- إضافة محتوى الصفحة -->
<div class="profile-container">
    <header class="profile-header">
        <h1>الملف الشخصي</h1>
    </header>

    <section class="profile-avatar">
        <img src="{{ asset('storage/' . $user->avatar) }}" alt="الصورة الرمزية" class="profile-avatar-img">
    </section>

    <section class="profile-details">
        <h2 class="profile-name">{{ $user->name }}</h2>
        <p><span class="profile-label">البريد الإلكتروني:</span> <span class="profile-value">{{ $user->email }}</span></p>
        <p><span class="profile-label">الهاتف:</span> <span class="profile-value">{{ $user->phone }}</span></p>
        <p><span class="profile-label">الدور:</span> <span class="profile-value">{{ $user->role }}</span></p>
        <p><span class="profile-label">رقم الرخصة:</span> <span class="profile-value">{{ $user->license_number }}</span></p>
        <p><span class="profile-label">الوصف:</span> <span class="profile-value">{{ $user->bio }}</span></p>
        <p><span class="profile-label">مدعوم:</span> <span class="profile-value">{{ $user->is_supported ? 'نعم' : 'لا' }}</span></p>
        <p><span class="profile-label">الراتب:</span> <span class="profile-value">{{ $user->salary }}</span></p>
        <p><span class="profile-label">البنك:</span> <span class="profile-value">{{ $user->bank }}</span></p>
        <p><span class="profile-label">المدينة:</span> <span class="profile-value">{{ $user->city }}</span></p>
        <p><span class="profile-label">الأحياء المفضلة:</span>
            <span class="profile-value">
                @if($user->preferred_neighborhoods)
                    <ul class="profile-neighborhoods-list">
                        @foreach(json_decode($user->preferred_neighborhoods) as $neighborhood)
                            <li class="profile-neighborhood-item">{{ $neighborhood }}</li>
                        @endforeach
                    </ul>
                @else
                    لا توجد أحياء مفضلة مسجلة.
                @endif
            </span>
        </p>
        <p><span class="profile-label">العمر:</span> <span class="profile-value">{{ $user->age }}</span></p>

        <a href="{{ route('profile.show', $user->id) }}" class="profile-edit-button">تعديل الملف الشخصي</a>
    </section>
</div>

@endsection

<style>
    .profile-container {
        padding: 20px;
        background-color: var(--primary-color);
        color: var(--secondary-color);
        border-radius: 16px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.05);
        transition: background-color 0.3s, color 0.3s;
    }

    body.dark-theme .profile-container {
        background-color: var(--primary-color-dark);
        color: var(--highlight-color);
    }

    .profile-header {
        text-align: center;
        margin-bottom: 20px;
        color: var(--accent-color);
    }

    .profile-avatar {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .profile-avatar-img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: 4px solid var(--accent-color);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: border-color 0.3s;
    }

    body.dark-theme .profile-avatar-img {
        border-color: var(--highlight-color);
    }

    .profile-details {
        margin-top: 20px;
    }

    .profile-label {
        font-weight: bold;
        color: var(--accent-color);
        margin-right: 5px;
    }

    .profile-value {
        color: var(--secondary-color);
    }

    body.dark-theme .profile-value {
        color: var(--highlight-color);
    }

    .profile-neighborhoods-list {
        list-style: none;
        padding: 0;
        margin: 10px 0 0;
    }

    .profile-neighborhood-item {
        padding: 5px 0;
    }

    .profile-edit-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: var(--accent-color);
        color: var(--primary-color);
        border-radius: 8px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .profile-edit-button:hover {
        background-color: var(--secondary-color);
    }

    body.dark-theme .profile-edit-button {
        background-color: var(--highlight-color);
        color: var(--secondary-color);
    }
</style>
