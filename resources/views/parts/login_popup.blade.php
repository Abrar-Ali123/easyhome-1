<!-- resources/views/parts/login-popup.blade.php -->
<div id="loginPopup" class="popup-overlay hidden">
    <div class="overlay"></div>
    <div class="popup-content">
        <button class="close-button" onclick="togglePopup()">&times;</button>
        <h2 class="popup-title">تسجيل الدخول</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="label">البريد الإلكتروني</label>
                <input id="email" type="email" class="input @error('email') error-input @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="label">كلمة المرور</label>
                <input id="password" type="password" class="input @error('password') error-input @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group remember-group">
                <div class="checkbox-group">
                    <input class="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="checkbox-label" for="remember">تذكرني</label>
                </div>
                @if (Route::has('password.request'))
                    <a class="forgot-link" href="{{ route('password.request') }}">نسيت كلمة المرور؟</a>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="submit-button">تسجيل الدخول</button>
            </div>
            <div class="text-center">
                <a class="register-link" href="{{ route('register') }}">ليس لديك حساب؟ سجل هنا</a>
            </div>
        </form>
    </div>
</div>

<style>
    .popup-overlay {
        position: fixed;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 50;
    }

    .overlay {
        position: absolute;
        inset: 0;
     }

    .popup-content {
        background-color: white;
        border-radius: 0.5rem;
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15);
        padding: 1.5rem;
        width: 100%;
        max-width: 28rem;
        z-index: 10;
        position: relative;
    }

    .close-button {
        position: absolute;
        top: 0.75rem;
        right: 0.75rem;
        color: #091716;
        cursor: pointer;
    }

    .close-button:hover {
        color: #091716;
    }

    .popup-title {
        font-size: 1.5rem;
        font-weight: bold;
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .label {
        display: block;
        color: #091716;
        font-size: 0.875rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
        text-align: right;
    }

    .input {
        box-shadow: 0 0 0 1px #091716;
        border-radius: 0.25rem;
        width: 100%;
        padding: 0.5rem 0.75rem;
        color: #374151;
        text-align: center;
        outline: none;
    }

    .input:focus {
        box-shadow: 0 0 0 2px #091716;
    }

    .error-input {
        border-color: #091716;
    }

    .error-message {
        color: #091716;
        font-size: 0.75rem;
        text-align: right;
        margin-top: 0.5rem;
    }

    .remember-group {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .checkbox-group {
        display: flex;
        align-items: center;
    }

    .checkbox {
        height: 1rem;
        width: 1rem;
        text-color: #2563eb;
        border-color: #091716;
    }

    .checkbox-label {
        margin-left: 0.5rem;
        color: #1f2937;
        font-size: 0.875rem;
    }

    .forgot-link {
        color: #091716;
        font-weight: bold;
        font-size: 0.875rem;
        text-align: right;
    }

    .forgot-link:hover {
        color: #091716;
    }

    .submit-button {
        background-color: #091716;
        color: white;
        font-weight: bold;
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
        width: 100%;
        cursor: pointer;
        border: none;
    }

    .submit-button:hover {
        background-color: #091716;
    }

    .text-center {
        text-align: center;
    }

    .register-link {
        color: #091716;
        font-size: 0.875rem;
    }

    .register-link:hover {
        color: #1e3a8a;
    }

    .hidden {
        display: none;
    }
</style>

<script>
    // دالة لإظهار وإخفاء النافذة المنبثقة باستخدام زر الإغلاق فقط
    function togglePopup() {
        var popup = document.getElementById('loginPopup');
        popup.classList.toggle('hidden'); // تبديل بين إظهار وإخفاء النافذة فقط عند النقر على زر الإغلاق
    }

    // التحقق من وجود أخطاء في النموذج وعرض النافذة إذا كانت هناك أخطاء
    document.addEventListener('DOMContentLoaded', function() {
        @if ($errors->any())
            togglePopup(true); // إظهار النافذة إذا كانت هناك أخطاء
        @endif
    });


    // دالة لإظهار وإخفاء النافذة المنبثقة
function togglePopup() {
    var popup = document.getElementById('loginPopup');
    popup.classList.toggle('hidden'); // تبديل بين إظهار وإخفاء النافذة
}

// تفعيل النافذة عند الضغط على أيقونة المستخدم
document.getElementById('loginPopupButton').addEventListener('click', function() {
    togglePopup();
});

</script>
