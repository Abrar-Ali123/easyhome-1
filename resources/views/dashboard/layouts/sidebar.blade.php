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
                <li class="menu-title"><span data-key="t-menu">القائمة</span></li>
                
                <!-- الرئيسية -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('dashboard.index') }}">
                        <i class="ri-home-line"></i> <span data-key="t-widgets">الرئيسية</span>
                    </a>
                </li>

                <!-- إدارة العقارات -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarProperties" data-bs-toggle="collapse" role="button" aria-expanded="false">
                        <i class="ri-building-line"></i> <span data-key="t-properties">إدارة العقارات</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarProperties">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('products.index') }}" class="nav-link">العقارات</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('lands.index') }}" class="nav-link">الأراضي</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cities.index') }}" class="nav-link">المدن</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('product-requests.index') }}" class="nav-link">طلبات العقارات</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('favorites.index') }}" class="nav-link">المفضلة</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- المحتوى -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarContent" data-bs-toggle="collapse" role="button" aria-expanded="false">
                        <i class="ri-article-line"></i> <span data-key="t-content">المحتوى</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarContent">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('category_blog.index') }}" class="nav-link">فئات المدونة</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('posts.index') }}" class="nav-link">المدونة</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.section-titles.index') }}" class="nav-link">عناوين الأقسام</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('about.index') }}" class="nav-link">من نحن</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- الواجهة الأمامية -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarFrontend" data-bs-toggle="collapse" role="button" aria-expanded="false">
                        <i class="ri-layout-line"></i> <span data-key="t-frontend">الواجهة الأمامية</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarFrontend">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.sliders.index') }}" class="nav-link">الشرائح</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.why-choose-us.index') }}" class="nav-link">لماذا تختارنا</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.partners.index') }}" class="nav-link">الشركاء</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.testimonials.index') }}" class="nav-link">الشهادات</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.company-values.index') }}" class="nav-link">قيم الشركة</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- المستخدمين -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarUsers" data-bs-toggle="collapse" role="button" aria-expanded="false">
                        <i class="ri-user-line"></i> <span data-key="t-users">المستخدمين</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarUsers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link">إدارة المستخدمين</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}" class="nav-link">الصلاحيات</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- الإعدادات والتواصل -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarSettings" data-bs-toggle="collapse" role="button" aria-expanded="false">
                        <i class="ri-settings-line"></i> <span data-key="t-settings">الإعدادات</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarSettings">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('settings.index') }}" class="nav-link">الإعدادات العامة</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.contacts.index') }}" class="nav-link">رسائل التواصل</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
