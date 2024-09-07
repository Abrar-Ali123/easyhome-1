<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض العقارات</title>

     <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<!-- Add these to the head section of your main layout file -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
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

        document.addEventListener('DOMContentLoaded', function() {
            const currentLang = document.documentElement.getAttribute('lang');
            document.body.classList.add(currentLang === 'ar' ? '' : 'dark-theme');
        });
    </script>

</head>
<body>




    <!-- شريط جانبي -->
    <div class="sidebar">

    <div>

    <a href="#">
    <div class="company-logo">
    <img src="{{ asset('/images/9.png') }}" class="w-20 h-20" />
    </div>
    </a>
            <a  onclick="toggleTheme()" id="themeIcon">☀️</a>
         </div>

         <a href="{{ route('products.index') }}">
    <div class="icon"><i class="fas fa-home"></i></div>
    <span>العقارات</span>
</a>
<a href="{{ route('orders.index') }}">
    <div class="icon"><i class="fas fa-tags"></i></div>
    <span>الطلبات</span>
</a>


    <a href="{{route('cities.index')}}">
        <div class="icon"><i class="fas fa-city"></i></div>
        <span>المدن</span>
    </a>
    <a href="{{url('/')}}">
        <div class="icon"><i class="fas fa-building"></i></div>
        <span>العقارات</span>
    </a>
    <a href="#">
        <div class="icon"><i class="fas fa-th-list"></i></div>
        <span>تصنيفات المدونة</span>
    </a>
    <a href="#">
        <div class="icon"><i class="fas fa-blog"></i></div>
        <span>المدونة</span>
    </a>
    </div>
    <header>
    <div class="header-content">

    <div class="user-info">

    <div class="avatar">
        <img src="image/7.png" alt="Avatar">
    </div>
{{--    <div class="dropdown">--}}
{{--        <div class="dropdown-toggle">Username</div>--}}
{{--        <div class="dropdown-menu">--}}
{{--            <a href="#">View Profile</a>--}}
{{--            <a href="#">Messages</a>--}}
{{--            <a href="#">Logout</a>--}}
{{--        </div>--}}
{{--    </div>--}}
        <!-- Dropdown Container -->
        <div class="dropdown">
            <!-- Dropdown Toggle -->
            <div class="dropdown-toggle" id="userMenuToggle" style="display: flex; align-items: center; cursor: pointer;">
                <!-- User Image -->
{{--                <img src="{{ asset(Auth::user()->avatar) }}" alt="صورة المستخدم" style="width: 30px; height: 30px; border-radius: 50%; margin-right: 5px;">--}}
                <!-- User Name -->
                <span>{{ Auth::user()->name }}</span>
            </div>

            <!-- Dropdown Menu -->
            <div class="dropdown-menu" id="userDropdownMenu" style="display: none; position: absolute; background: #fff; border: 1px solid #ddd; border-radius: 4px; padding: 10px; min-width: 160px; box-shadow: 0px 8px 16px rgba(0,0,0,0.2);">
                <a href="{{route('profile.show')}}" style="display: block; padding: 8px 16px; color: #333; text-decoration: none;">الملف الشخصي</a>
                <a href="#" style="display: block; padding: 8px 16px; color: #333; text-decoration: none;">Messages</a>
                <a href="{{route('logout')}}" style="display: block; padding: 8px 16px; color: #333; text-decoration: none;">تسجيل الخروج</a>

            </div>
        </div>

        <!-- Optional JavaScript to toggle the dropdown -->
        <script>
            document.getElementById('userMenuToggle').addEventListener('click', function() {
                var menu = document.getElementById('userDropdownMenu');
                if (menu.style.display === 'none' || menu.style.display === '') {
                    menu.style.display = 'block';
                } else {
                    menu.style.display = 'none';
                }
            });

            // Optional: Close dropdown if clicking outside of it
            window.addEventListener('click', function(event) {
                var menu = document.getElementById('userDropdownMenu');
                if (!event.target.matches('#userMenuToggle')) {
                    if (menu.style.display === 'block') {
                        menu.style.display = 'none';
                    }
                }
            });
        </script>

        <div class="icon">
        <i class="fas fa-bell"></i>
        <span class="badge">5</span>
    </div>
    <div class="icon">
        <i class="fas fa-envelope"></i>
        <span class="badge">3</span>
    </div>
</div>
    </div>




</header>



    <!-- محتوى الصفحة -->
    <div class="content">
        <div class="container mt-5">

        @yield('content')


        </div>
    </div>

    <script>
        function toggleView(view) {
            document.getElementById('tableView').classList.toggle('d-none', view !== 'table');
            document.getElementById('gridView').classList.toggle('d-none', view !== 'grid');
        }
    </script>
</body>
</html>
