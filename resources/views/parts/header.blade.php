

<style>
    /* زر القائمة (الهامبرجر) */
button[aria-controls="navbar-default"] {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px; /* عرض الزر */
    height: 40px; /* ارتفاع الزر */
    padding: 8px;
     border: none; /* إزالة الإطار */
    cursor: pointer;
    z-index: 1001; /* لضمان ظهوره فوق العناصر الأخرى */

}

/* أيقونة SVG داخل الزر */
button[aria-controls="navbar-default"] svg {
    width: 24px; /* عرض الأيقونة */
    height: 24px; /* ارتفاع الأيقونة */
    stroke: var(--accent-color); /* لون الأيقونة */
    transition: stroke 0.3s ease;
}

/* تغيير لون الأيقونة عند التفاعل (hover) */
button[aria-controls="navbar-default"]:hover svg {
    stroke: var(--accent-color); /* تغيير لون الأيقونة عند التفاعل */
}

/* إظهار زر القائمة على الشاشات الصغيرة فقط */
@media (max-width: 768px) {
    button[aria-controls="navbar-default"] {
        display: inline-flex; /* إظهار الزر على الشاشات الصغيرة */
    }

    #navbar-default {
        display: none; /* إخفاء القائمة على الشاشات الصغيرة افتراضيًا */
    }

    #navbar-default.show {
        display: block; /* إظهار القائمة عند النقر على الزر */
    }
}

/* إخفاء الزر على الشاشات الكبيرة */
@media (min-width: 768px) {
    button[aria-controls="navbar-default"] {
        display: none;
    }
}

    </style>
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

                    <li><a href="{{ url('/') }}">الرئيسية</a></li>
                    <li><a href="{{ route('products.index1') }}">العقارات</a></li>
                    <li><a href="#about-us">من نحن</a></li>
                    <li><a href="{{ route('contact.page2') }}">انجاز</a></li>
                    <li><a href="{{ route('contact.page1') }}"> تواصل معانا</a></li>

                        <li>
                            @guest
                            <a id="openLoginPopup"><i class="fas fa-user"></i></a>
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
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="logout-form d-none">
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

    <script>

    // دالة لإظهار وإخفاء النافذة المنبثقة
function togglePopup() {
    var popup = document.getElementById('loginPopup');
    popup.classList.toggle('hidden'); // تبديل بين إظهار وإخفاء النافذة
}

// إظهار النافذة عند الضغط على الأيقونة
document.getElementById('openLoginPopup').addEventListener('click', function() {
    togglePopup(); // استدعاء دالة إظهار النافذة
});

// التحقق من وجود أخطاء في النموذج وعرض النافذة إذا كانت هناك أخطاء
document.addEventListener('DOMContentLoaded', function() {
    @if ($errors->any())
        togglePopup(); // إظهار النافذة إذا كانت هناك أخطاء
    @endif
});

</script>

