<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('/images/9.png') }}" alt="" height="40">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('/images/9.png') }}" alt="" height="70">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('/images/9.png') }}" alt="" height="40">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('/images/9.png') }}" alt="" height="70">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">


            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">القائمة </span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('dashboard.index') }}">
                        <i class="ri-home-line"></i> <span data-key="t-widgets">الرئيسية</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('category_blog.index') }}">
                        <i class="ri-folder-line"></i> <span data-key="t-widgets">فئات المدونة</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('posts.index') }}">
                        <i class="ri-article-line"></i> <span data-key="t-widgets">مدونة</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('products.index') }}">
                        <i class="ri-building-line"></i> <span data-key="t-widgets">العقارات</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('cities.index') }}">
                        <i class="ri-map-pin-line"></i> <span data-key="t-widgets">المدن</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.contacts.index') }}">
                        <i class="ri-contacts-line"></i> <span data-key="t-widgets">تواصل</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
