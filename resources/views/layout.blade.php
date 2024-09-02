<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'لارافيل') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <meta charset="UTF-8">


     <link href="{{ asset('/css/front.css') }}" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة المثال</title>
</head>
<body>
@include('parts.login_popup')

    <header>
        <nav>
            <div>
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('/images/9.png') }}" class="w-20 h-20" />
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
                            @guest
                                <a id="openPopup"><i class="fas fa-user"></i></a>
                            @else
                                <a href="#" id="userMenuToggle" style="display: flex; align-items: center;">
                                    <img src="{{ Auth::user()->avatar }}" alt="صورة المستخدم" style="width: 30px; height: 30px; border-radius: 50%; margin-right: 5px;">
                                    <span>{{ Auth::user()->name }}</span>
                                </a>
                                <ul id="userMenu" class="dropdown-menu" style="display: none; position: absolute; background-color: white; list-style: none; padding: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                                    <li>
                                        <a class="dropdown-item" href="#">الملف الشخصي</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            تسجيل الخروج
                                        </a>
                                    </li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endguest
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
    document.getElementById('openPopup')?.addEventListener('click', function() {
        document.getElementById('popup').style.display = 'flex';
    });

    document.querySelector('.popup-content .close')?.addEventListener('click', function() {
        document.getElementById('popup').style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target == document.getElementById('popup')) {
            document.getElementById('popup').style.display = 'none';
        }
    });

    // عرض قائمة المستخدم عند تسجيل الدخول
    document.getElementById('userMenuToggle')?.addEventListener('click', function(event) {
        event.preventDefault();
        const userMenu = document.getElementById('userMenu');
        if (userMenu.style.display === 'none') {
            userMenu.style.display = 'block';
        } else {
            userMenu.style.display = 'none';
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
