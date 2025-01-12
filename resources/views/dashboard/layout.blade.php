<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<link rel="icon" href="{{ asset('/images/9.png') }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>easyhome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --sidebar-width: 250px;
            --transition-speed: 0.3s;
        }

        body {
            font-family: Arial, sans-serif;
            transition: background-color var(--transition-speed), color var(--transition-speed);
        }

        .dark-mode {
            background-color: #121212;
            color: #f1f1f1;
        }

        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            color: white;
            overflow-y: auto;
            transition: width var(--transition-speed);
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar .nav-link {
            color: white;
            transition: color var(--transition-speed);
        }

        .sidebar .nav-link:hover {
            color: #17a2b8;
        }

        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: margin-left var(--transition-speed);
        }

        .content.full {
            margin-left: 80px;
        }

        .dark-mode .sidebar {
            background-color: #222;
        }

        .toggle-btn {
            cursor: pointer;
        }

        .rtl {
            direction: rtl;
        }

        .rtl .sidebar {
            left: auto;
            right: 0;
        }

        .rtl .content {
            margin-left: 0;
            margin-right: var(--sidebar-width);
        }

        .rtl .content.full {
            margin-right: 80px;
        }
    </style>
</head>
<body>

<div class="sidebar" id="sidebar">
    <div class="p-3">
        <div class="sidebar-logo">
        <a href="{{ route('dashboard.index') }}">
            <img src="{{ asset('/images/9.png') }}" alt="Logo" class="logo-small">
        </a>
    </div>

    <h5>لوحة التحكم</h5>


        </li>


     <button id="toggleSidebar" class="btn btn-secondary dark-mode-toggle">
    <i class="fas fa-bars"></i>
</button>

<button  id="toggleDarkMode" class="btn btn-secondary dark-mode-toggle">
    <i class="fas fa-moon"></i>
</button>



    </div>
    <nav class="nav flex-column">
        <a href="#" class="nav-link"><i class="fas fa-home"></i> <span>الرئيسية</span></a>
        <a href="{{ route('category_blog.index') }}" class="nav-link">
    <i class="fas fa-table"></i> <span>تصنيفات المدونة</span>
</a>


<a href="{{ route('posts.index') }}" class="nav-link">
    <i class="fas fa-table"></i> <span>المدونة</span>
</a>


        <!-- رابط المنتجات -->
        <li class="nav-item">
            <a href="{{ route('products.index') }}" class="nav-link">
                <i class="fas fa-box"></i> <span>العقارات</span>
            </a>
        </li>

        <!-- رابط المدن -->
        <li class="nav-item">
            <a href="{{ route('cities.index') }}" class="nav-link">
                <i class="fas fa-city"></i> <span>المدن</span>
            </a>
        </li>

        <!-- رابط جهات الاتصال -->
        <li class="nav-item">
            <a href="{{ route('admin.contacts.index') }}" class="nav-link">
                <i class="fas fa-address-book"></i> <span> الاتصال</span>
            </a>
        </li>





     </nav>
</div>

<div class="content" id="content">
    <div class="container-fluid">

        @yield('content')


 <script src="https://cdnjs.cloudflare.com/ajax/libs/sortable/1.15.0/Sortable.min.js"></script>
<script>
    const galleryContainer = document.getElementById('galleryContainer');

    // Add Images to Gallery
    function addImages(event) {
        const files = event.target.files;
        Array.from(files).forEach(file => {
            const reader = new FileReader();
            reader.onload = () => {
                const imageContainer = document.createElement('div');
                imageContainer.classList.add('image-wrapper');
                imageContainer.innerHTML = `
                    <div class="image-thumbnail" style="background-image: url('${reader.result}')"></div>
                    <button class="btn btn-sm btn-danger remove-btn" onclick="removeImage(this)">Remove</button>
                `;
                galleryContainer.appendChild(imageContainer);
            };
            reader.readAsDataURL(file);
        });
    }

    // Remove Image from Gallery
    function removeImage(button) {
        const imageWrapper = button.parentElement;
        galleryContainer.removeChild(imageWrapper);
    }

    // Make Gallery Sortable
    new Sortable(galleryContainer, {
        animation: 150,
    });
</script>

<style>
    #galleryContainer {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .image-wrapper {
        position: relative;
        width: 150px;
        height: 150px;
    }

    .image-thumbnail {
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .remove-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: rgba(255, 0, 0, 0.8);
        border: none;
        padding: 3px 8px;
        color: white;
        font-size: 12px;
        cursor: pointer;
        border-radius: 5px;
    }

    .remove-btn:hover {
        background-color: rgba(255, 0, 0, 1);
    }

    .sidebar-logo {
    text-align: left; /* محاذاة الشعار إلى اليسار */
    padding: 10px;
    padding-left: 15px; /* مسافة من اليسار لتناسب التصميم */
}

.sidebar-logo img.logo-small {
    max-width: 50px; /* حجم الشعار */
    height: auto;
    display: inline-block;
}


</style>




    </div>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');
    const toggleSidebar = document.getElementById('toggleSidebar');
    const toggleDarkMode = document.getElementById('toggleDarkMode');
    toggleSidebar.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        content.classList.toggle('full');
    });
    toggleDarkMode.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
    });
    // RTL Toggle Example
    document.body.classList.toggle('rtl', navigator.language === 'ar');
</script>

</body>
</html>
