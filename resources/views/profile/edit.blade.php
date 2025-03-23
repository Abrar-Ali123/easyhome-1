@extends('layout')

@section('title', 'تعديل الملف الشخصي')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

<style>
    .edit-profile-container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
    }

    .edit-profile-header {
        background: linear-gradient(135deg, #003e37 0%, #006d5b 100%);
        color: white;
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 30px;
        text-align: center;
    }

    .edit-profile-header h1 {
        margin: 0;
        font-size: 2em;
    }

    .edit-profile-form {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .form-section {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }

    .form-section:last-child {
        border-bottom: none;
    }

    .section-title {
        color: #003e37;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-title i {
        color: #bb9339;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: #333;
        font-weight: 500;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #003e37;
        outline: none;
    }

    .avatar-preview {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin: 20px auto;
        display: block;
        object-fit: cover;
        border: 5px solid #fff;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .file-input-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    .file-input-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        cursor: pointer;
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
        display: inline-block;
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

    .action-buttons {
        display: flex;
        gap: 15px;
        margin-top: 30px;
        justify-content: center;
    }

    .error-message {
        color: #dc3545;
        font-size: 0.9em;
        margin-top: 5px;
    }

    .neighborhoods-container {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin-top: 10px;
    }

    .neighborhood-item {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }

    .add-neighborhood {
        background: #f8f9fa;
        border: 2px dashed #ddd;
        border-radius: 8px;
        padding: 10px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
    }

    .add-neighborhood:hover {
        border-color: #003e37;
        color: #003e37;
    }

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 8px;
    }

    .alert-success {
        color: #0f5132;
        background-color: #d1e7dd;
        border-color: #badbcc;
    }

    .alert-danger {
        color: #842029;
        background-color: #f8d7da;
        border-color: #f5c2c7;
    }

    .input-group {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-group .toggle-password {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #666;
    }

    .password-strength {
        margin-top: 5px;
        font-size: 0.85em;
    }

    .strength-weak { color: #dc3545; }
    .strength-medium { color: #ffc107; }
    .strength-strong { color: #198754; }
</style>

<div class="edit-profile-container">
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i>
            الرجاء تصحيح الأخطاء التالية:
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="edit-profile-header">
        <h1>تعديل الملف الشخصي</h1>
    </div>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="edit-profile-form" id="profile-form">
        @csrf
        @method('PUT')

        <div class="form-section">
            <h2 class="section-title">
                <i class="fas fa-user"></i>
                الصورة الشخصية
            </h2>
            <img src="{{ asset('storage/' . ($user->avatar ?? 'avatars/default.png')) }}" 
                 alt="الصورة الشخصية" 
                 class="avatar-preview" 
                 id="avatar-preview">
            <div class="form-group text-center">
                <div class="file-input-wrapper">
                    <button type="button" class="btn btn-secondary">
                        <i class="fas fa-camera"></i>
                        تغيير الصورة
                    </button>
                    <input type="file" name="avatar" accept="image/*" onchange="previewImage(this)">
                </div>
                @error('avatar')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-section">
            <h2 class="section-title">
                <i class="fas fa-info-circle"></i>
                المعلومات الأساسية
            </h2>
            <div class="form-group">
                <label class="form-label">الاسم</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">رقم الهاتف</label>
                <input type="tel" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
                @error('phone')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-section">
            <h2 class="section-title">
                <i class="fas fa-briefcase"></i>
                المعلومات المهنية
            </h2>
            <div class="form-group">
                <label class="form-label">رقم الرخصة</label>
                <input type="text" name="license_number" class="form-control" value="{{ old('license_number', $user->license_number) }}">
                @error('license_number')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">نبذة تعريفية</label>
                <textarea name="bio" class="form-control" rows="4">{{ old('bio', $user->bio) }}</textarea>
                @error('bio')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">الراتب</label>
                <input type="number" name="salary" class="form-control" value="{{ old('salary', $user->salary) }}">
                @error('salary')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">البنك</label>
                <input type="text" name="bank" class="form-control" value="{{ old('bank', $user->bank) }}">
                @error('bank')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-section">
            <h2 class="section-title">
                <i class="fas fa-map-marker-alt"></i>
                الموقع والأحياء المفضلة
            </h2>
            <div class="form-group">
                <label class="form-label">المدينة</label>
                <input type="text" name="city" class="form-control" value="{{ old('city', $user->city) }}">
                @error('city')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">الأحياء المفضلة</label>
                <div class="neighborhoods-container" id="neighborhoods-container">
                    @if($user->preferred_neighborhoods)
                        @foreach(json_decode($user->preferred_neighborhoods) as $neighborhood)
                            <div class="neighborhood-item">
                                <input type="text" name="preferred_neighborhoods[]" class="form-control" value="{{ $neighborhood }}">
                                <button type="button" class="btn btn-secondary" onclick="removeNeighborhood(this)">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="add-neighborhood" onclick="addNeighborhood()">
                    <i class="fas fa-plus"></i>
                    إضافة حي جديد
                </div>
            </div>
        </div>

        <div class="form-section">
            <h2 class="section-title">
                <i class="fas fa-lock"></i>
                تغيير كلمة المرور
            </h2>
            <div class="form-group">
                <label class="form-label">كلمة المرور الحالية</label>
                <div class="input-group">
                    <input type="password" name="current_password" class="form-control" id="current-password">
                    <i class="fas fa-eye toggle-password" onclick="togglePassword('current-password')"></i>
                </div>
                @error('current_password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">كلمة المرور الجديدة</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" id="new-password" onkeyup="checkPasswordStrength(this.value)">
                    <i class="fas fa-eye toggle-password" onclick="togglePassword('new-password')"></i>
                </div>
                <div class="password-strength" id="password-strength"></div>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">تأكيد كلمة المرور الجديدة</label>
                <div class="input-group">
                    <input type="password" name="password_confirmation" class="form-control" id="confirm-password">
                    <i class="fas fa-eye toggle-password" onclick="togglePassword('confirm-password')"></i>
                </div>
            </div>
        </div>

        <div class="action-buttons">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                حفظ التغييرات
            </button>
            <a href="{{ route('profile.show') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i>
                إلغاء
            </a>
        </div>
    </form>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('avatar-preview').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function addNeighborhood() {
    const container = document.getElementById('neighborhoods-container');
    const div = document.createElement('div');
    div.className = 'neighborhood-item';
    div.innerHTML = `
        <input type="text" name="preferred_neighborhoods[]" class="form-control">
        <button type="button" class="btn btn-secondary" onclick="removeNeighborhood(this)">
            <i class="fas fa-times"></i>
        </button>
    `;
    container.appendChild(div);
}

function removeNeighborhood(button) {
    button.parentElement.remove();
}

function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const icon = input.nextElementSibling;
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

function checkPasswordStrength(password) {
    const strengthDiv = document.getElementById('password-strength');
    const strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    const mediumRegex = new RegExp("^(?=.*[a-zA-Z])(?=.*[0-9])(?=.{6,})");
    
    if (strongRegex.test(password)) {
        strengthDiv.className = 'password-strength strength-strong';
        strengthDiv.textContent = 'قوية';
    } else if (mediumRegex.test(password)) {
        strengthDiv.className = 'password-strength strength-medium';
        strengthDiv.textContent = 'متوسطة';
    } else {
        strengthDiv.className = 'password-strength strength-weak';
        strengthDiv.textContent = 'ضعيفة';
    }
}

// التحقق من تطابق كلمات المرور
document.getElementById('profile-form').addEventListener('submit', function(e) {
    const newPassword = document.getElementById('new-password').value;
    const confirmPassword = document.getElementById('confirm-password').value;
    
    if (newPassword && newPassword !== confirmPassword) {
        e.preventDefault();
        alert('كلمات المرور غير متطابقة');
    }
});
</script>
@endsection
