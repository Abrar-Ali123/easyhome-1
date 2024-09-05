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


    <a href="#">
        <div class="icon"><i class="fas fa-city"></i></div>
        <span>المدن</span>
    </a>
    <a href="#">
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
    <div class="dropdown">
        <div class="dropdown-toggle">Username</div>
        <div class="dropdown-menu">
            <a href="#">View Profile</a>
            <a href="#">Messages</a>
            <a href="#">Logout</a>
        </div>
    </div>
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
