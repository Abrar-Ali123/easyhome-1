<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم - إدارة العقارات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap{{ app()->getLocale() === 'ar' ? '.rtl' : '' }}.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* تهيئة الوضع الداكن */
        body, html { height: 100%; margin: 0; }
        body.dark-mode { background-color: #121212; color: #ffffff; transition: background-color 0.3s, color 0.3s; }
        .dark-mode .navbar, .dark-mode .sidebar, .dark-mode .footer { background-color: #333 !important; color: #fff; }

        /* ضبط الهيدر ليكون ثابتًا أعلى الصفحة */
        .navbar {
            width: 100%;
            height: 8vh; /* ارتفاع نسبي للهيدر */
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1050;
        }

        /* الشريط الجانبي يبدأ من أسفل الهيدر */
        .sidebar {
            width: 20vw;
            height: calc(100vh - 8vh);
            margin-top: 8vh;
            position: fixed;
            background-color: #f8f9fa;
            transition: width 0.3s;
            z-index: 1000;
        }
        /* عرض الشريط الجانبي على اليمين إذا كان الاتجاه RTL */
        [dir="rtl"] .sidebar {
            right: 0;
        }
        /* عرض الشريط الجانبي على اليسار إذا كان الاتجاه LTR */
        [dir="ltr"] .sidebar {
            left: 0;
        }

        .sidebar.collapsed { width: 8vw; }
        .sidebar .menu-text { display: inline-block; transition: opacity 0.3s; }
        .sidebar.collapsed .menu-text { opacity: 0; }

        /* ضبط محتوى الصفحة */
        .content-wrapper {
            padding-top: 2vh;
            padding-bottom: 8vh;
            transition: margin-left 0.3s;
        }
        [dir="ltr"] .content-wrapper { margin-left: 20vw; }
        [dir="rtl"] .content-wrapper { margin-right: 20vw; }
        .sidebar.collapsed + .content-wrapper { margin-left: 8vw; }

        /* التأكد من أن الفوتر يمتد لعرض الشاشة بالكامل */
        .footer {
            width: 100%;
            height: 8vh;
            position: fixed;
            bottom: 0;
            left: 0;
            text-align: center;
            padding: 1vh;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body class="{{ session('theme', 'light-mode') }}">
    <div id="app" class="d-flex">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <button onclick="toggleSidebar()" class="btn btn-outline-primary w-100 mt-2"><i class="fas fa-bars"></i></button>
            <!-- روابط القائمة -->
            <a href="#" class="d-flex align-items-center p-3 {{ request()->is('dashboard') ? 'active-link' : '' }}"><i class="fas fa-tachometer-alt me-2"></i><span class="menu-text">الرئيسية</span></a>
            <!-- بقية الروابط -->
            <button onclick="toggleTheme()" class="btn btn-secondary w-100 mt-3"><i id="themeIcon" class="fas fa-sun"></i></button>
            <button onclick="toggleLanguage()" class="btn btn-info w-100 mt-2">{{ app()->getLocale() === 'ar' ? 'English' : 'العربية' }}</button>
        </div>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="content-wrapper">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light {{ session('theme') === 'dark-mode' ? 'dark-mode' : '' }}">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-bell"></i> إشعارات</a>
                            </li>
                            <!-- باقي العناصر -->
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="p-4">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="footer bg-light {{ session('theme') === 'dark-mode' ? 'dark-mode' : '' }}">
                &copy; {{ date('Y') }} جميع الحقوق محفوظة
            </footer>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function toggleTheme() {
        document.body.classList.toggle('dark-mode');
        const theme = document.body.classList.contains('dark-mode') ? 'dark-mode' : 'light-mode';
        localStorage.setItem('theme', theme);
    }

    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('collapsed');
        localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed') ? 'true' : 'false');
    }

    function toggleLanguage() {
        const currentLang = document.documentElement.getAttribute('lang');
        const newLang = currentLang === 'ar' ? 'en' : 'ar';
        document.documentElement.setAttribute('lang', newLang);
        document.documentElement.setAttribute('dir', newLang === 'ar' ? 'rtl' : 'ltr');
    }

    window.addEventListener('load', () => {
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) document.body.classList.toggle('dark-mode', savedTheme === 'dark-mode');
        const sidebar = document.getElementById('sidebar');
        const sidebarCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
        if (sidebarCollapsed) sidebar.classList.add('collapsed');
    });
    </script>
</body>
</html>
