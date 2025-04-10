<!-- Header -->
<header id="header" class="main-header header header-fixed">
    <!-- Header Lower -->
    <div class="header-lower">
        <div class="container6">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-container flex justify-space align-center" style="padding-right: 0;">
                        <!-- Logo Box -->
                        <div class="logo-box flex" style="margin: 0;">
                            <div class="logo" style="margin: 0;"><a href="{{ url('/') }}"><img src="{{ asset('/images/9.png') }}"
                                        alt="" width="70"></a></div>
                        </div>
                        <div class="nav-outer flex align-center">
                            <!-- Main Menu -->
                            <nav class="main-menu show navbar-expand-md">
                                <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li><a href="{{ url('/') }}">الرئيسية</a></li>
                                        <li><a href="{{ route('products.properties') }}">العقارات</a></li>
                                        <li><a href="{{ route('lands.index') }}">الأراضي</a></li>
                                        <li><a href="{{ route('blog.index') }}">مدونتنا</a></li>
                                        <li><a href="{{ route('contact.page2') }}">برنامج انجاز</a></li>
                                        <li><a href="{{ route('contact.page1') }}">تواصل معنا</a></li>
                                        <li><a href="{{ route('about') }}">من نحن</a></li>
                                    </ul>
                                </div>
                            </nav>
                            <!-- Main Menu End-->
                        </div>
                        <div class="header-account flex align-center">
                            <div class="register">
                            </div>
                            <div class="flat-bt-top sc-btn-top">
                                @if (Auth::check())
                                    @if (Auth::user()->role == 0)
                                        <a class="sc-button btn-icon fa-regular fa-user"
                                            href="{{ route('dashboard.index') }}">لوحة التحكم</a>
                                    @endif
                                    <a class="sc-button btn-icon fa-regular fa-user" href="{{ route('logout') }}">
                                        تسجيل الخروج
                                    </a>
                                @else
                                    <a class="sc-button btn-icon fa-regular fa-user" data-toggle="modal"
                                        data-target="#popup_bid" href="{{ route('login') }}">
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="mobile-nav-toggler"><span></span></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Lower -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <nav class="menu-box">
            <div class="menu-header">
                <div class="logo-wrapper">
                    <img src="{{ asset('/images/9.png') }}" alt="Easy Home" class="logo">
                </div>
                <button type="button" class="menu-close">×</button>
            </div>
            <div class="menu-outer">
                <ul class="navigation">
                    <li><a href="{{ url('/') }}">الرئيسية</a></li>
                    <li><a href="{{ route('products.properties') }}">العقارات</a></li>
                    <li><a href="{{ route('lands.index') }}">الأراضي</a></li>
                    <li><a href="{{ route('blog.index') }}">مدونتنا</a></li>
                    <li><a href="{{ route('contact.page2') }}">برنامج انجاز</a></li>
                    <li><a href="{{ route('contact.page1') }}">تواصل معنا</a></li>
                    <li><a href="{{ route('about') }}">من نحن</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End Mobile Menu -->
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileNavToggler = document.querySelector('.mobile-nav-toggler');
    const mobileMenu = document.querySelector('.mobile-menu');
    const menuBackdrop = document.querySelector('.menu-backdrop');
    const menuClose = document.querySelector('.menu-close');

    function toggleMobileMenu() {
        mobileMenu.classList.toggle('visible');
        document.body.classList.toggle('mobile-menu-visible');
    }

    mobileNavToggler.addEventListener('click', toggleMobileMenu);
    menuClose.addEventListener('click', toggleMobileMenu);
    menuBackdrop.addEventListener('click', toggleMobileMenu);
});
</script>

<style>
.mobile-menu {
    position: fixed;
    right: 0;
    top: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    visibility: hidden;
    z-index: 999999;
    transition: all 0.3s ease;
}

.mobile-menu.visible {
    opacity: 1;
    visibility: visible;
}

.mobile-menu .menu-backdrop {
    position: fixed;
    right: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    background: rgba(0, 0, 0, 0.8);
    -webkit-backdrop-filter: blur(2px);
    backdrop-filter: blur(2px);
}

.mobile-menu .menu-box {
    position: absolute;
    right: 0;
    top: 0;
    width: 300px;
    height: 100%;
    max-height: 100%;
    overflow-y: auto;
    background: #000;
    padding: 0;
    z-index: 5;
    opacity: 0;
    visibility: hidden;
    border-radius: 0;
    transform: translateX(100%);
    transition: all 0.4s ease;
}

.mobile-menu.visible .menu-box {
    opacity: 1;
    visibility: visible;
    transform: translateX(0);
}

.mobile-menu .menu-header {
    position: relative;
    padding: 20px;
    text-align: right;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.mobile-menu .menu-header .logo-wrapper {
    flex: 1;
    text-align: right;
}

.mobile-menu .menu-header .logo {
    width: 100px;
    height: auto;
    display: inline-block;
}

.mobile-menu .menu-header .menu-close {
    width: 32px;
    height: 32px;
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
    border: none;
    border-radius: 50%;
    font-size: 24px;
    line-height: 32px;
    padding: 0;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-right: 15px;
}

.mobile-menu .menu-header .menu-close:hover {
    background: rgba(255, 255, 255, 0.2);
}

.mobile-menu .menu-outer {
    padding: 0;
    margin-top: 15px;
}

.mobile-menu .navigation {
    position: relative;
    display: block;
    width: 100%;
    padding: 0;
    margin: 0;
    list-style: none;
}

.mobile-menu .navigation li {
    position: relative;
    display: block;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.mobile-menu .navigation li a {
    position: relative;
    display: block;
    padding: 16px 25px;
    font-size: 16px;
    font-weight: 500;
    color: #fff;
    text-align: right;
    transition: all 0.3s ease;
}

.mobile-menu .navigation li:hover > a {
    color: #DAA520;
    background: rgba(255, 255, 255, 0.05);
    padding-right: 30px;
}

.mobile-nav-toggler {
    position: relative;
    float: right;
    padding: 10px;
    margin-left: 15px;
    margin-top: 5px;
    display: none;
    cursor: pointer;
}

@media only screen and (max-width: 991px) {
    .mobile-nav-toggler {
        display: block;
    }
    
    .main-menu {
        display: none;
    }
}

.mobile-nav-toggler span {
    position: relative;
    display: block;
    width: 25px;
    height: 2px;
    background: #333;
}

.mobile-nav-toggler span:before,
.mobile-nav-toggler span:after {
    content: '';
    position: absolute;
    left: 0;
    width: 100%;
    height: 2px;
    background: #333;
    transition: all 0.3s ease;
}

.mobile-nav-toggler span:before {
    top: -8px;
}

.mobile-nav-toggler span:after {
    bottom: -8px;
}

/* تحسين التمرير */
.mobile-menu .menu-box::-webkit-scrollbar {
    width: 5px;
}

.mobile-menu .menu-box::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
}

.mobile-menu .menu-box::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 5px;
}

.mobile-menu .menu-box::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.3);
}
</style>
