<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض العقارات</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">



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
    <div class="company-logo">
        <img src="image/1.png" alt="Company Logo">
    </div>
    <div>
        <a  onclick="toggleTheme()" id="themeIcon">☀️</a>
    </div>
    <a href="#">
        <div class="icon"><i class="fas fa-home"></i></div>
        <span>الرئيسية</span>
    </a>
    <a href="#">
        <div class="icon"><i class="fas fa-tags"></i></div>
        <span>التصنيفات</span>
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


<style>
    .user-info {
        display: flex;
        align-items: center;
    }

    .user-info .icon {
        margin-right: 20px;
        position: relative;
    }

    .user-info .icon .badge {
        position: absolute;
        top: -5px;
        right: -10px;
        background-color: red;
        color: white;
        border-radius: 50%;
        padding: 3px 7px;
        font-size: 12px;
    }

    .user-info .avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
        margin-left: 10px;
    }

    .user-info .avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .user-info .dropdown {
        margin-left: 10px;
        position: relative;
    }

    .user-info .dropdown .dropdown-toggle {
        cursor: pointer;
    }

    .user-info .dropdown .dropdown-menu {
        display: none;
        position: absolute;
        right: 0;
        top: 30px;
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 150px;
    }

    .user-info .dropdown .dropdown-menu a {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: black;
    }

    .user-info .dropdown .dropdown-menu a:hover {
        background-color: #f1f1f1;
    }

    .user-info .dropdown:hover .dropdown-menu {
        display: block;
    }

</style>
<!-- محتوى الصفحة -->
<div class="content">
    <div class="container mt-5">

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
