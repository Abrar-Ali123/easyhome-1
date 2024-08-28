<!DOCTYPE html>
<html lang="ar">
<head>

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <meta charset="UTF-8">


     <link href="{{ asset('easyhome/css/front.css') }}" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة المثال</title>
</head>
<body>

    <header>
        <nav>
            <div>
                <a href="#">
                    <img src="image/1.png" alt="Logo" />
                </a>
                <button type="button" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">افتح القائمة</span>
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div id="navbar-default">
                    <ul>
                        <li><a href="#">الرئيسية</a></li>
                        <li><a href="#">العقارات</a></li>
                        <li><a href="#">من نحن</a></li>
                        <li><a href="#">اطلب عقارك</a></li>
                        <li><a href="#">طلب استثمار</a></li>
                        <li>
                             <a id="openPopup"><i class="fas fa-user"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-heart"></i></a>
                         </li>
                        <li>
                             <a class="toggle-theme-btn" onclick="toggleTheme()" id="themeIcon">☀️</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="content">
        @yield('content')
    </div>

    <footer>
        © 2024 جميع الحقوق محفوظة
    </footer>



    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const button = document.querySelector('nav button');
        const navbar = document.getElementById('navbar-default');

        button.addEventListener('click', function() {
            const isExpanded = button.getAttribute('aria-expanded') === 'true';
            button.setAttribute('aria-expanded', !isExpanded);
            navbar.classList.toggle('show');
        });

        function toggleTheme() {
            document.body.classList.toggle('dark-theme');
            var themeIcon = document.getElementById('themeIcon');
            if (document.body.classList.contains('dark-theme')) {
                themeIcon.textContent = '🌙';
            } else {
                themeIcon.textContent = '☀️';
            }
        }

        function toggleLanguage() {
            const currentLang = document.documentElement.getAttribute('lang');
            const newLang = currentLang === 'ar' ? 'en' : 'ar';
            document.documentElement.setAttribute('lang', newLang);
            document.documentElement.setAttribute('dir', newLang === 'ar' ? 'rtl' : 'ltr');
            document.getElementById('langButton').textContent = newLang === 'ar' ? 'English' : 'العربية';
        }

        document.addEventListener('scroll', function() {
            const nav = document.querySelector('header nav');
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });



    });
    </script>


<!-- نافذة تسجيل الدخول المنبثقة -->
<div id="popup">
    <div class="popup-content">
        <div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <span class="close">&times;</span>

                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('Abrar') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                                <a class="btn btn-link" href="{{ route('register.r') }}">
            {{ __('Don\'t have an account? Register here') }}
        </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>

<style>
/* نافذة تسجيل الدخول المنبثقة */
#popup {
    display: none; /* مخفية في البداية */
    position: fixed;
    z-index: 1000; /* فوق كل شيء */
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* خلفية شفافة */
    justify-content: center;
    align-items: center;
}

.popup-content {
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 100%;
     position: relative;

}

.popup-content .close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}

.inputBox {
    position: relative;
    margin: 10px 0;
}

.inputBox input {
    width: 100%;
    padding: 10px;
    background: none;
    border: none;
    border-bottom: 1px solid #000;
    outline: none;
}

.inputBox label {
    position: absolute;
    top: 10px;
    left: 0;
    pointer-events: none;
    transition: 0.5s;
}

.inputBox input:focus ~ label,
.inputBox input:valid ~ label {
    top: -20px;
    left: 0;
    color: #03a9f4;
    font-size: 12px;
}

.inputBox i {
    position: absolute;
    top: 10px;
    right: 0;
}

.links {
    display: flex;
    justify-content: space-between;
    margin: 10px 0;
}

.social-login {
    display: flex;
    justify-content: space-around;
    margin-top: 10px;
}

.google-icon::before {
    content: url('path/to/google-icon.png'); /* استبدل path/to/google-icon.png بمسار أيقونة Google */
}

.facebook-icon::before {
    content: url('path/to/facebook-icon.png'); /* استبدل path/to/facebook-icon.png بمسار أيقونة Facebook */
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('openPopup').addEventListener('click', function() {
        document.getElementById('popup').style.display = 'flex';
    });

    document.querySelector('.popup-content .close').addEventListener('click', function() {
        document.getElementById('popup').style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target == document.getElementById('popup')) {
            document.getElementById('popup').style.display = 'none';
        }
    });
});




</script>



<!-- إضافة روابط JS -->
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
    // تفعيل مكتبة GLightbox
    const lightbox = GLightbox();

    // تبديل الوضع الداكن والفاتح
    function toggleTheme() {
        document.body.classList.toggle('dark-mode');
    }

    // عرض الصور المصغرة في المعرض الرئيسي عند النقر عليها
    document.querySelectorAll('.property-gallery img').forEach(img => {
        img.addEventListener('click', function () {
            document.querySelector('.property-main img').src = this.src;
        });
    });
</script>









</body>
</html>
