<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'لارافيل') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->

    <meta charset="UTF-8">


     <link href="{{ asset('css/front.css') }}" rel="stylesheet">

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

                    <li><!-- زر فتح النافذة المنبثقة -->
                    <button id="filter-button" class="filter-btn icon-container">
    <i class="fas fa-sliders-h"></i>
</button>



</li>
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




<!-- النافذة المنبثقة للبحث والفلترة -->
<div id="filter-modal" class="modal hidden">
    <div class="modal-content">
        <span class="close" id="close-modal">&times;</span>
        <h2>خيارات البحث والفرز</h2>
        <input type="text" placeholder="ابحث عن عقار..." class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
        <div class="search-filters mt-3">
            <select class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <option value="">نوع العقار</option>
                <option value="شقة">شقة</option>
                <option value="فيلا">فيلا</option>
                <option value="روف">روف</option>
                <option value="دور">دور</option>
                <option value="استثمار">استثمار</option>
            </select>
            <!-- يمكنك إضافة المزيد من الحقول هنا -->
        </div>
    </div>
</div>

<!-- CSS للزر والنافذة المنبثقة -->
<style>

.filter-btn {

     background: rgba(255, 255, 255, 0.5); /* خلفية شفافة */
    padding: 10px; /* المسافة الداخلية حول الأيقونة */
    border: none; /* إزالة الحدود الافتراضية للزر */
    border-radius: 50%; /* جعل الخلفية دائرية */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* إضافة ظل خفيف */
    cursor: pointer; /* مؤشر اليد عند التمرير */
    z-index: 1000; /* لضمان بقاء الأيقونة فوق العناصر الأخرى */
}

.filter-btn i {
    font-size: 24px; /* حجم الأيقونة */
    color: #003e37; /* لون الأيقونة */
}

/* النافذة المنبثقة */
.modal {
    display: none; /* مخفية بشكل افتراضي */
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 1001;
}

.modal-content {
    background: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    width: 400px;
    position: relative;
}

.modal-content .close {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 1.5em;
    cursor: pointer;
    color: #333;
}
</style>

<!-- JavaScript للنافذة المنبثقة -->
<script>
// عرض النافذة المنبثقة عند الضغط على زر الفلترة
document.getElementById('filter-button').addEventListener('click', function() {
    document.getElementById('filter-modal').style.display = 'flex';
});

// إغلاق النافذة عند الضغط على زر الإغلاق
document.getElementById('close-modal').addEventListener('click', function() {
    document.getElementById('filter-modal').style.display = 'none';
});

// إغلاق النافذة عند الضغط خارج المحتوى
window.addEventListener('click', function(event) {
    const modal = document.getElementById('filter-modal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});
</script>



    <div class="content">
        @yield('content')
    </div>

    <footer>
        © 2024 جميع الحقوق محفوظة
    </footer>

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
    // التحكم في زر القائمة في التنقل
    const button = document.querySelector('nav button');
    const navbar = document.getElementById('navbar-default');

    button.addEventListener('click', function() {
        const isExpanded = button.getAttribute('aria-expanded') === 'true';
        button.setAttribute('aria-expanded', !isExpanded);
        navbar.classList.toggle('show');
    });

    // تبديل الوضع بين الداكن والفاتح
    function toggleTheme() {
        document.body.classList.toggle('dark-theme');
        const themeIcon = document.getElementById('themeIcon');
        if (document.body.classList.contains('dark-theme')) {
            themeIcon.textContent = '🌙'; // تغيير الأيقونة إلى القمر في الوضع الداكن
        } else {
            themeIcon.textContent = '☀️'; // تغيير الأيقونة إلى الشمس في الوضع الفاتح
        }
    }

    // ربط زر تبديل الوضع بالوظيفة
    document.getElementById('themeIcon')?.addEventListener('click', toggleTheme);

    // التحكم في القائمة المتحركة عند التمرير
    document.addEventListener('scroll', function() {
        const nav = document.querySelector('header nav');
        if (window.scrollY > 50) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    });

    // عرض قائمة المستخدم عند تسجيل الدخول
    document.getElementById('userMenuToggle')?.addEventListener('click', function(event) {
        event.preventDefault();
        const userMenu = document.getElementById('userMenu');
        userMenu.style.display = userMenu.style.display === 'none' ? 'block' : 'none';
    });

    // التحكم في ظهور النافذة المنبثقة لتسجيل الدخول
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

    // تفعيل مكتبة GLightbox
    const lightbox = GLightbox();

    // عرض الصور المصغرة في المعرض الرئيسي عند النقر عليها
    document.querySelectorAll('.property-gallery img').forEach(img => {
        img.addEventListener('click', function () {
            document.querySelector('.property-main img').src = this.src;
        });
    });
});
</script>


</body>
</html>
