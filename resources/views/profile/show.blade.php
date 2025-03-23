@extends('layout')

@section('title', 'الملف الشخصي')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

<style>
    .profile-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 20px;
    }

    .profile-header {
        background: linear-gradient(135deg, #003e37 0%, #006d5b 100%);
        color: white;
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 30px;
    }

    .profile-avatar {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: 5px solid white;
        object-fit: cover;
    }

    .profile-header-info h1 {
        margin: 0;
        font-size: 2em;
    }

    .profile-role {
        display: inline-block;
        background: #bb9339;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.9em;
        margin-top: 10px;
    }

    .profile-sections {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }

    .profile-section {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .section-title {
        color: #003e37;
        border-bottom: 2px solid #bb9339;
        padding-bottom: 10px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-title i {
        color: #bb9339;
    }

    .info-item {
        margin-bottom: 15px;
        padding: 10px;
        border-radius: 8px;
        transition: background-color 0.3s;
    }

    .info-item:hover {
        background-color: #f8f9fa;
    }

    .info-label {
        color: #666;
        font-size: 0.9em;
        margin-bottom: 5px;
    }

    .info-value {
        color: #333;
        font-weight: 500;
    }

    .permissions-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .permissions-list li {
        padding: 8px 0;
        border-bottom: 1px solid #eee;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .permissions-list i {
        color: #28a745;
    }

    .action-buttons {
        display: flex;
        gap: 15px;
        margin-top: 30px;
    }

    .btn {
        padding: 12px 25px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.3s;
        text-decoration: none;
        text-align: center;
    }

    .btn-primary {
        background: #003e37;
        color: white;
    }

    .btn-secondary {
        background: #bb9339;
        color: white;
    }

    .btn:hover {
        opacity: 0.9;
        transform: translateY(-2px);
    }
</style>

<div class="profile-container">
    <div class="profile-header">
        <img src="{{ asset('storage/' . ($user->avatar ?? 'avatars/default.png')) }}" 
             alt="الصورة الشخصية" 
             class="profile-avatar">
        <div class="profile-header-info">
            <h1>{{ $user->name }}</h1>
            <div class="profile-role">
                @foreach($user->roles as $role)
                    {{ $role->display_name }}
                    @if(!$loop->last), @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="profile-sections">
        <div class="profile-section">
            <h2 class="section-title">
                <i class="fas fa-user"></i>
                المعلومات الشخصية
            </h2>
            <div class="info-item">
                <div class="info-label">البريد الإلكتروني</div>
                <div class="info-value">{{ $user->email }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">رقم الهاتف</div>
                <div class="info-value">{{ $user->phone ?? 'غير محدد' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">المدينة</div>
                <div class="info-value">{{ $user->city ?? 'غير محدد' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">العمر</div>
                <div class="info-value">{{ $user->age ?? 'غير محدد' }}</div>
            </div>
        </div>

        <div class="profile-section">
            <h2 class="section-title">
                <i class="fas fa-shield-alt"></i>
                الصلاحيات
            </h2>
            <ul class="permissions-list">
                @foreach($user->roles as $role)
                    @foreach($role->permissions as $permission)
                        <li>
                            <i class="fas fa-check-circle"></i>
                            {{ $permission->display_name }}
                        </li>
                    @endforeach
                @endforeach
            </ul>
        </div>

        @if($user->license_number || $user->bio || $user->salary || $user->bank)
        <div class="profile-section">
            <h2 class="section-title">
                <i class="fas fa-briefcase"></i>
                المعلومات المهنية
            </h2>
            @if($user->license_number)
            <div class="info-item">
                <div class="info-label">رقم الرخصة</div>
                <div class="info-value">{{ $user->license_number }}</div>
            </div>
            @endif
            @if($user->bio)
            <div class="info-item">
                <div class="info-label">نبذة تعريفية</div>
                <div class="info-value">{{ $user->bio }}</div>
            </div>
            @endif
            @if($user->salary)
            <div class="info-item">
                <div class="info-label">الراتب</div>
                <div class="info-value">{{ $user->salary }}</div>
            </div>
            @endif
            @if($user->bank)
            <div class="info-item">
                <div class="info-label">البنك</div>
                <div class="info-value">{{ $user->bank }}</div>
            </div>
            @endif
        </div>
        @endif

        @if($user->preferred_neighborhoods)
        <div class="profile-section">
            <h2 class="section-title">
                <i class="fas fa-map-marker-alt"></i>
                الأحياء المفضلة
            </h2>
            <ul class="permissions-list">
                @foreach(json_decode($user->preferred_neighborhoods) as $neighborhood)
                    <li>
                        <i class="fas fa-map-pin"></i>
                        {{ $neighborhood }}
                    </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <div class="action-buttons">
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">
            <i class="fas fa-edit"></i>
            تعديل الملف الشخصي
        </a>
        <a href="#" class="btn btn-secondary" onclick="event.preventDefault(); document.getElementById('change-password-form').submit();">
            <i class="fas fa-key"></i>
            تغيير كلمة المرور
        </a>
    </div>
</div>

<form id="change-password-form" action="{{ route('profile.password.change') }}" method="POST" style="display: none;">
    @csrf
</form>
@endsection
