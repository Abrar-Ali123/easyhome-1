<!DOCTYPE html>

<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>DreamHome - Real Estate HTML Template</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/JhBX9KZ7bXFOjT5x4bxGgAK3EBkIqzMeqK6F2F7Hz4abFTpXNolPqSHRAcAwdsjCHD8u1J9Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/JhBX9KZ7bXFOjT5x4bxGgAK3EBk

    <link href="{{ asset('css/dist/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dist/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dist/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dist/owl.css') }}" rel="stylesheet">


    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="assets/images/logo/Favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/logo/Favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="body  counter-scroll">


    <!-- /preload -->

    <div id="wrapper">
        <div id="pagee" class="clearfix">

        <header id="header" class="main-header header header-fixed ">
                <!-- Header Lower -->
                <div class="header-lower">
                    <div class="container6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-container flex justify-space align-center">
                                    <!-- Logo Box -->
                                    <div class="logo-box flex">


                                        <div class="logo"><a href="index.html"><img src="{{ asset('/images/9.png') }}" alt="" width="197" height="48"></a></div>
                                    </div>
                                    <div class="nav-outer flex align-center">
                                        <!-- Main Menu -->
                                        <nav class="main-menu show navbar-expand-md">
                                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                                <ul class="navigation clearfix">
                                                <li><a href="{{ url('/') }}">الرئيسية</a></li>
      <li><a href="{{ route('blog.index') }}">مدونتنا</a></li>
      <li><a href="{{ route('contact.page2') }}">برنامج انجاز</a></li>
      <li><a href="{{ route('contact.page1') }}">تواصل معنا</a></li>



                                            </div>
                                        </nav>
                                        <!-- Main Menu End-->
                                    </div>
                                    <div class="header-account flex align-center">
                                        <div class="register">
                                            <ul class="flex align-center">
                                                <li>
                                                 <li class="">
                                                    <a href="#" data-toggle="modal" data-target="#popup_bid2">     966551421008+    </a>
                                                    <i class="fa-solid fa-phone"></i>                                                </li>

                                                </li>




                                            </ul>
                                        </div>

                                        <div class="flat-bt-top sc-btn-top ">

<ul>
                                            @if(Auth::check())
        <li class="user-info" onclick="toggleDropdown()">

        @if (Auth::user()->avatar)

 @else


    <i class="fa fa-user-circle " aria-hidden="true"></i>
@endif

        <div class="dropdown-menu" id="dropdown-menu">
            <a href="#">الملف الشخصي</a>
            <a href="{{ route('logout') }}">تسجيل الخروج</a>
            @if(Auth::user()->role == 0)
    <a href="{{ route('dashboard.index') }}">لوحة التحكم</a>
@endif

          </div>
        </li>
      @else
        <li>
          <a href="{{ route('login') }}">

          <i class="fa fa-user-circle avatar-icon" aria-hidden="true"></i>

           </a>
        </li>
      @endif
 </li>


                                        </div>


                                    </div>

                                    <div class="mobile-nav-toggler mobile-button"><span></span></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Header Lower -->

                <!-- Mobile Menu  -->
                <div class="close-btn"><span class="icon flaticon-cancel-1"></span></div>
                <div class="mobile-menu">
                    <div class="menu-backdrop"></div>
                    <nav class="menu-box">

                        <div class="nav-logo"><a href="index.html"><img src="{{ asset('/images/logo/logo@2x.png') }}" alt="" width="197" height="48"></a></div>
                        <div class="bottom-canvas">
                            <div class="login-box flex align-center">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.62501 18.5744H2.70418C2.65555 18.5744 2.60892 18.5551 2.57454 18.5207C2.54016 18.4863 2.52084 18.4397 2.52084 18.3911V17.0619C2.52084 16.3002 3.06443 15.6292 3.90226 15.059C5.39826 14.0378 7.81918 13.3943 10.5417 13.3943C10.9908 13.3943 11.4318 13.4127 11.8626 13.4466C11.9537 13.4558 12.0457 13.4466 12.1332 13.4198C12.2207 13.3929 12.3019 13.3489 12.3722 13.2902C12.4424 13.2315 12.5003 13.1594 12.5423 13.0781C12.5843 12.9968 12.6097 12.9079 12.6169 12.8166C12.6241 12.7254 12.613 12.6336 12.5842 12.5467C12.5555 12.4598 12.5097 12.3795 12.4495 12.3105C12.3893 12.2416 12.316 12.1853 12.2338 12.1451C12.1516 12.1048 12.0621 12.0814 11.9708 12.0762C11.4954 12.038 11.0186 12.0191 10.5417 12.0193C7.49651 12.0193 4.80059 12.7811 3.12676 13.9223C1.84984 14.7932 1.14584 15.8996 1.14584 17.061V18.3911C1.14609 18.8042 1.31037 19.2003 1.60259 19.4924C1.89481 19.7844 2.29104 19.9485 2.70418 19.9485L9.62501 19.9494C9.80735 19.9494 9.98221 19.877 10.1111 19.748C10.2401 19.6191 10.3125 19.4443 10.3125 19.2619C10.3125 19.0796 10.2401 18.9047 10.1111 18.7758C9.98221 18.6468 9.80735 18.5744 9.62501 18.5744ZM10.5417 1.14583C7.75868 1.14583 5.50001 3.4045 5.50001 6.1875C5.50001 8.9705 7.75868 11.2292 10.5417 11.2292C13.3247 11.2292 15.5833 8.9705 15.5833 6.1875C15.5833 3.4045 13.3247 1.14583 10.5417 1.14583ZM10.5417 2.52083C12.5657 2.52083 14.2083 4.1635 14.2083 6.1875C14.2083 8.2115 12.5657 9.85416 10.5417 9.85416C8.51768 9.85416 6.87501 8.2115 6.87501 6.1875C6.87501 4.1635 8.51768 2.52083 10.5417 2.52083Z" fill="#1C1C1E"/>
                                    <path d="M16.6393 18.524C17.2592 18.618 17.8928 18.5515 18.4796 18.3311C19.0665 18.1106 19.5871 17.7434 19.9918 17.2646C20.3965 16.7858 20.6717 16.2112 20.7913 15.5958C20.9109 14.9804 20.8707 14.3446 20.6748 13.7491C20.4788 13.1536 20.1335 12.6182 19.6719 12.194C19.2102 11.7698 18.6476 11.471 18.0377 11.326C17.4277 11.1811 16.7908 11.1948 16.1877 11.3659C15.5846 11.537 15.0353 11.8598 14.5924 12.3035C14.186 12.7095 13.8807 13.2053 13.7013 13.751C13.5218 14.2967 13.4732 14.877 13.5593 15.4449L11.4308 17.5725C11.3669 17.6364 11.3161 17.7123 11.2815 17.7958C11.2469 17.8793 11.2291 17.9688 11.2292 18.0593V20.1667C11.2292 20.5462 11.5372 20.8542 11.9167 20.8542H14.0241C14.1145 20.8542 14.204 20.8364 14.2875 20.8018C14.3711 20.7672 14.4469 20.7165 14.5108 20.6525L16.6393 18.524ZM16.5917 17.1123C16.4753 17.0813 16.3528 17.0814 16.2365 17.1127C16.1202 17.1439 16.0141 17.2051 15.9289 17.2902L13.7399 19.4792H12.6042V18.3434L14.7932 16.1544C14.8782 16.0692 14.9395 15.9631 14.9707 15.8468C15.0019 15.7305 15.002 15.608 14.971 15.4917C14.8415 15.0042 14.8762 14.4878 15.0697 14.022C15.2632 13.5563 15.6046 13.1672 16.0413 12.915C16.478 12.6627 16.9857 12.5613 17.4858 12.6264C17.9859 12.6915 18.4506 12.9195 18.8082 13.2752C19.1638 13.6327 19.3918 14.0975 19.4569 14.5976C19.522 15.0977 19.4206 15.6053 19.1684 16.042C18.9161 16.4787 18.5271 16.8202 18.0613 17.0136C17.5956 17.2071 17.0791 17.2418 16.5917 17.1123Z" fill="#FFA920"/>
                                    <path d="M16.4835 15.5998C16.3877 15.5083 16.3111 15.3984 16.2583 15.2768C16.2055 15.1552 16.1775 15.0243 16.1761 14.8917C16.1746 14.7592 16.1996 14.6276 16.2497 14.5049C16.2998 14.3822 16.374 14.2707 16.4678 14.177C16.5616 14.0833 16.6732 14.0093 16.796 13.9594C16.9188 13.9095 17.0503 13.8846 17.1829 13.8862C17.3154 13.8879 17.4463 13.916 17.5679 13.9689C17.6894 14.0219 17.7991 14.0986 17.8906 14.1946C18.0698 14.3826 18.1683 14.6333 18.1651 14.893C18.1619 15.1527 18.0572 15.4009 17.8734 15.5845C17.6896 15.768 17.4413 15.8724 17.1816 15.8752C16.9219 15.8781 16.6713 15.7793 16.4835 15.5998Z" fill="#FFA920"/>
                                </svg>
                                <a href="#" data-toggle="modal" data-target="#popup_bid" class="fw-7 font-2">Login</a>
                            </div>
                            <div class="menu-outer"></div>
                            <div class="button-mobi-sell">
                                <a class="sc-button btn-icon center" href="properties-list.html">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.25 15.75V15H11.375C10.7547 15 10.25 14.4953 10.25 13.875V12.375C10.25 11.7547 10.7547 11.25 11.375 11.25H11.75V10.5H13.25V11.25H14C14.1989 11.25 14.3897 11.329 14.5303 11.4697C14.671 11.6103 14.75 11.8011 14.75 12C14.75 12.1989 14.671 12.3897 14.5303 12.5303C14.3897 12.671 14.1989 12.75 14 12.75H11.75V13.5H13.625C14.2453 13.5 14.75 14.0047 14.75 14.625V16.125C14.75 16.7453 14.2453 17.25 13.625 17.25H13.25V18H11.75V17.25H11C10.8011 17.25 10.6103 17.171 10.4697 17.0303C10.329 16.8897 10.25 16.6989 10.25 16.5C10.25 16.3011 10.329 16.1103 10.4697 15.9697C10.6103 15.829 10.8011 15.75 11 15.75H13.25Z" fill="white"/>
                                        <path d="M22.469 10.6447L14.315 2.96925C13.8234 2.50736 13.1742 2.25024 12.4996 2.25024C11.825 2.25024 11.1759 2.50736 10.6842 2.96925L8.74998 4.791V3C8.74998 2.80109 8.67096 2.61032 8.53031 2.46967C8.38966 2.32902 8.19889 2.25 7.99998 2.25H4.99998C4.80107 2.25 4.6103 2.32902 4.46965 2.46967C4.329 2.61032 4.24998 2.80109 4.24998 3V9.027L2.55273 10.6252C2.03748 11.0722 1.86348 11.784 2.10798 12.4387C2.34873 13.0837 2.93823 13.5 3.60948 13.5H4.24998V21C4.24998 21.1989 4.329 21.3897 4.46965 21.5303C4.6103 21.671 4.80107 21.75 4.99998 21.75H20C20.1989 21.75 20.3897 21.671 20.5303 21.5303C20.671 21.3897 20.75 21.1989 20.75 21V13.5H21.389C22.061 13.5 22.6512 13.083 22.892 12.438C23.1357 11.7832 22.961 11.0715 22.469 10.6447ZM5.74998 3.75H7.24998V6.2025L5.74998 7.61475V3.75ZM21.4865 11.9138C21.4542 12 21.4047 12 21.389 12H20C19.8011 12 19.6103 12.079 19.4697 12.2197C19.329 12.3603 19.25 12.5511 19.25 12.75V20.25H5.74998V12.75C5.74998 12.5511 5.67096 12.3603 5.53031 12.2197C5.38966 12.079 5.19889 12 4.99998 12H3.60948C3.59373 12 3.54498 12 3.51273 11.9138C3.50022 11.8834 3.49792 11.8498 3.50617 11.818C3.51442 11.7862 3.53278 11.7579 3.55848 11.7375L11.7125 4.062C11.9257 3.86178 12.2071 3.75032 12.4996 3.75032C12.7921 3.75032 13.0735 3.86178 13.2867 4.062L21.4625 11.7578C21.5187 11.8058 21.4977 11.883 21.4865 11.9138Z" fill="white"/>
                                    </svg>
                                    <span>Sell Property</span>
                                </a>
                            </div>
                            <div class="mobi-icon-box">
                                <h3>Contact</h3>
                                <div class="box flex">
                                    <div class="icon">
                                        <svg width="40" height="41" viewBox="0 0 50 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M26.4648 13.7812C26.4648 14.5902 27.1207 15.2461 27.9297 15.2461C28.7387 15.2461 29.3945 14.5902 29.3945 13.7812C29.3945 12.9723 28.7387 12.3164 27.9297 12.3164C27.1207 12.3164 26.4648 12.9723 26.4648 13.7812Z" fill="#E5E5EA"></path>
                                            <path d="M32.3242 13.7812C32.3242 14.5902 32.9801 15.2461 33.7891 15.2461C34.598 15.2461 35.2539 14.5902 35.2539 13.7812C35.2539 12.9723 34.598 12.3164 33.7891 12.3164C32.9801 12.3164 32.3242 12.9723 32.3242 13.7812Z" fill="#E5E5EA"></path>
                                            <path d="M38.1836 13.7812C38.1836 14.5902 38.8395 15.2461 39.6484 15.2461C40.4574 15.2461 41.1133 14.5902 41.1133 13.7812C41.1133 12.9723 40.4574 12.3164 39.6484 12.3164C38.8395 12.3164 38.1836 12.9723 38.1836 13.7812Z" fill="#E5E5EA"></path>
                                            <path d="M22.6771 37.2188L27.0716 34.2891L35.8398 37.2188V43.0781C35.8398 44.6961 34.549 46.0078 32.931 46.0078C16.7508 46.0078 1.46484 30.8195 1.46484 14.6394C1.46484 13.0214 2.77656 11.7305 4.39453 11.7305H10.2539L13.1836 20.4987L10.2539 24.8933C12.1247 29.5703 18 35.3479 22.6771 37.2188Z" stroke="#E5E5EA" stroke-width="1.7" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M19.1406 13.7812C19.1406 18.6354 23.0756 22.5703 27.9297 22.5703V28.4297L33.7891 22.5703H39.6484C44.5025 22.5703 48.5352 18.6354 48.5352 13.7812C48.5352 8.92715 44.5025 4.99219 39.6484 4.99219H27.9297C23.0756 4.99219 19.1406 8.92715 19.1406 13.7812Z" stroke="#E5E5EA" stroke-width="1.7" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <div class="content fs-13">
                                        Call us:
                                        <h5>(201) 555-0124</h5>
                                    </div>
                                </div>
                                <div class="box flex">
                                    <div class="icon">
                                        <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M36.6559 17.8341L36.6559 17.8341L36.6609 17.8392C36.8315 18.0113 37.0549 18.0969 37.2788 18.0969C37.5021 18.0969 37.7258 18.0116 37.8976 17.8411C38.2409 17.5005 38.241 16.9425 37.8996 16.5985C37.5586 16.2548 37.0037 16.2526 36.66 16.5934L36.6559 17.8341ZM36.6559 17.8341L36.6551 17.8332M36.6559 17.8341L36.6551 17.8332M36.6551 17.8332C36.3141 17.4895 36.3163 16.9345 36.66 16.5935L36.6551 17.8332Z" fill="#E5E5EA" stroke="white" stroke-width="0.2"></path>
                                            <path d="M46.4639 27.8825H46.7054L46.5346 27.7118L39.3343 20.5115C38.992 20.1691 38.992 19.6141 39.3343 19.2718C39.6767 18.9296 40.2317 18.9296 40.574 19.2718L49.6441 28.3419C49.8085 28.5063 49.9009 28.7294 49.901 28.9618C49.901 29.1943 49.8086 29.4172 49.6442 29.5816L34.0757 45.1502C33.9114 45.3145 33.6884 45.4069 33.4559 45.4069C33.2235 45.4069 33.0005 45.3145 32.8361 45.1502L9.34306 21.6572C9.34306 21.6572 9.34305 21.6572 9.34305 21.6572C9.00075 21.3148 9.00076 20.7598 9.34305 20.4175L24.9114 4.84884C25.2537 4.50664 25.8087 4.50664 26.151 4.84884C26.151 4.84884 26.151 4.84884 26.1511 4.84884L34.9723 13.67C35.3146 14.0124 35.3146 14.5675 34.9723 14.9098C34.6299 15.252 34.0749 15.2519 33.7326 14.9098L26.7811 7.95839L26.6104 7.78768V8.0291V25.1994C26.6104 26.679 27.8139 27.8825 29.2935 27.8825H46.4639ZM24.8575 7.62373V7.38231L24.6868 7.55302L12.2497 19.9901L12.079 20.1608H12.3204H24.7575H24.8575V20.0608V7.62373ZM32.4087 42.2434L32.5794 42.4141V42.1727V29.7356V29.6356H32.4794H29.2937C26.8477 29.6356 24.8575 27.6455 24.8575 25.1994V22.0139V21.9139H24.7575H12.3204H12.079L12.2497 22.0846L32.4087 42.2434ZM34.3324 42.1728V42.4142L34.5031 42.2435L46.9401 29.8064L47.1108 29.6356H46.8694H34.4324H34.3324V29.7356V42.1728Z" fill="#E5E5EA" stroke="white" stroke-width="0.2"></path>
                                            <path d="M0.976562 24.9047H6.70225C7.18637 24.9047 7.57881 25.2972 7.57881 25.7812C7.57881 26.2654 7.18637 26.6578 6.70225 26.6578H0.976562C0.492442 26.6578 0.1 26.2653 0.1 25.7812C0.1 25.2972 0.492442 24.9047 0.976562 24.9047Z" fill="#E5E5EA" stroke="white" stroke-width="0.2"></path>
                                            <path d="M9.59961 24.9047H9.61426C10.0984 24.9047 10.4908 25.2972 10.4908 25.7812C10.4908 26.2653 10.0984 26.6578 9.61426 26.6578H9.59961C9.11549 26.6578 8.72305 26.2653 8.72305 25.7812C8.72305 25.2972 9.11549 24.9047 9.59961 24.9047Z" fill="#E5E5EA" stroke="white" stroke-width="0.2"></path>
                                            <path d="M0.978516 14.6508H4.10381C4.58793 14.6508 4.98037 15.0433 4.98037 15.5273C4.98037 16.0114 4.58793 16.4039 4.10381 16.4039H0.978516C0.494395 16.4039 0.101953 16.0114 0.101953 15.5273C0.101953 15.0433 0.494395 14.6508 0.978516 14.6508Z" fill="#E5E5EA" stroke="white" stroke-width="0.2"></path>
                                            <path d="M7.29315 14.6508H10.9873C11.4714 14.6508 11.8639 15.0433 11.8639 15.5273C11.8639 16.0114 11.4714 16.4039 10.9873 16.4039H7.29315C6.80903 16.4039 6.41659 16.0114 6.41659 15.5273C6.41659 15.0433 6.80903 14.6508 7.29315 14.6508Z" fill="#E5E5EA" stroke="white" stroke-width="0.2"></path>
                                            <path d="M7.64453 30.2758H13.1132C13.5972 30.2758 13.9897 30.6683 13.9897 31.1523C13.9897 31.6364 13.5973 32.0289 13.1132 32.0289H7.64453C7.16041 32.0289 6.76797 31.6364 6.76797 31.1523C6.76797 30.6683 7.16041 30.2758 7.64453 30.2758Z" fill="#E5E5EA" stroke="white" stroke-width="0.2"></path>
                                            <path d="M3.61328 36.5258H17.3827C17.8668 36.5258 18.2593 36.9183 18.2593 37.4023C18.2593 37.8864 17.8668 38.2789 17.3827 38.2789H3.61328C3.12916 38.2789 2.73672 37.8864 2.73672 37.4023C2.73672 36.9183 3.12916 36.5258 3.61328 36.5258Z" fill="#E5E5EA" stroke="white" stroke-width="0.2"></path>
                                        </svg>
                                    </div>
                                    <div class="content fs-13 lh-16">
                                        Email:
                                        <h5>themesflat@gmail.com</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <!-- End Mobile Menu -->

            </header>
              <!-- slider -->

              <section class="slider home">
                <div class="slider-item">
                    <div class="img-slider">
                    <img class="img-item" src="{{ asset('/images/slider/bg-slider-1.png') }}" alt="">

                    </div>

                    <div class="container3  relative">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="content po-content-two">
                                    <div class="heading">
                                    <h1 class="wow slideInDown js-letters" data-wow-delay="0ms" data-wow-duration="1200ms">ايزي هوم</h1>

                                        <h1 class="wow slideInDown js-letters" data-wow-delay="0ms" data-wow-duration="1200ms"> حيث الحلول العقارية المبتكرة</h1>
                                        <p class="fs-16 lh-24 text-color-2 wow fadeInUp" data-wow-delay="100ms" data-wow-duration="2000ms">
    اكتشف مجموعة متنوعة من العقارات التي تناسبك بكل سهولة، وتجاوز جميع الصعوبات في العثور على المنزل المثالي لك.
</p>
                                    </div>



@include('parts.search-filter')




                                </div>
                                <div class="images po-content-one">
                                    <div class="image">
                                    <img class="img-item" src="{{ asset('/images/slider/slider-1.jpg') }}" alt="">
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>


<section class="flat-brand tf-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-section">
                    <h4>موثوق من قبل أكثر من 150 شركة كبرى</h4>
                </div>
                <div class="swiper-container carousel-5">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="slogan-logo">
                                <a href="#">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaTuKGUsLIUueHg63S0KjgMzEJK-x2QhfQtA&s" alt="Logo 1">
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slogan-logo">
                                <a href="#">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSl2PS5UJs4iC3od99LjgxS3xGGqWuy7AUSQ&s" alt="Logo 2">
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slogan-logo">
                                <a href="#">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRh9pK5bARj_q5nbl1xg4HZjt-uFcZ6adMOUQ&s" alt="Logo 3">
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slogan-logo">
                                <a href="#">
                                    <img src="https://www.wadhefa.com/logo/company/62c1a6d7b46fb.png" alt="Logo 4">
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slogan-logo">
                                <a href="#">
                                    <img src="https://pbs.twimg.com/profile_images/1445656983332216833/2pUbqSUu_400x400.jpg" alt="Logo 5">
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slogan-logo">
                                <a href="#">
                                    <img src="https://pbs.twimg.com/profile_images/1716072957003304960/z20nwYIU_400x400.jpg" alt="Logo 6">
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slogan-logo">
                                <a href="#">
                                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgMxRhNnl57TcmqHi1EFTxgFDRRQ4YMHbprMnECr2pili1wRgS8F-0-egk_ncIRXOGePCdzeosFKOOhBDH_d2ie-jss5JSwmzwlUvzkJvNNjp7hFxazsNcqB0fMg9tchKrGhTBiI8hW0eU/s1600/%25D8%25A8%25D9%2586%25D9%2583+%25D8%25A7%25D9%2584%25D8%25B1%25D9%258A%25D8%25A7%25D8%25B6.jpg" alt="Logo 7">
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slogan-logo">
                                <a href="#">
                                    <img src="https://pbs.twimg.com/profile_images/1574351106846646272/OqMQuKsM_400x400.jpg" alt="Logo 8">
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slogan-logo">
                                <a href="#">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQa-96sxtQkOb0eKu7VhkrlTqxaY0IdRtsTJQ&s" alt="Logo 9">
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slogan-logo">
                                <a href="#">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8-aNFDh73kNsg7kKW3iBCmEcZ0fO1ugprPQ&s" alt="Logo 10">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





            <section class="flat-featured wg-dream home">
                <div class="container3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section center">
                                <h2>Featured properties</h2>
                                <p class="text-color-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel lobortis justo</p>
                            </div>
                            <div class="flat-tabs themesflat-tabs">
                                <div class="box-tab center">
                                    <ul class="menu-tab tab-title flex justify-center">
                                        <li class="item-title active hv-tool" data-tooltip="8 Property">
                                            <h5 class="inner">Houses</h5>
                                        </li>
                                        <li class="item-title hv-tool" data-tooltip="6 Property">
                                            <h5 class="inner"> Smart home </h5>
                                        </li>
                                        <li class="item-title hv-tool" data-tooltip="5 Property">
                                            <h5 class="inner ">Apartments</h5>
                                        </li>
                                        <li class="item-title hv-tool" data-tooltip="7 Property">
                                            <h5 class="inner"> Office </h5>
                                        </li>
                                        <li class="item-title hv-tool" data-tooltip="6 Property">
                                            <h5 class="inner">Villa</h5>
                                        </li>
                                        <li class="item-title hv-tool" data-tooltip="3 Property">
                                            <h5 class="inner"> Bungalow </h5>
                                        </li>
                                    </ul>
                                </div>

                                <div class="content-tab">
                                    <div class="content-inner tab-content">
                                        <div class="wrap-item flex">

                                        @foreach($products as $product)



                                            <!-- col 1 -->
                                            <div class="box box-dream hv-one">
                                                <div class="image-group relative ">
                                                    <span class="featured fs-12 fw-6">Featured</span>
                                                    <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                                    <div class="swiper-container carousel-2 img-style">

                                                        <a href="property-detail-v1.html" class="icon-plus"><img src="{{ asset('/images/icon/plus.svg') }}" alt="images"></a>
                                                        <div class="swiper-wrapper ">

                                                        <div class="swiper-slide"><img src="{{ url('/storage/app/public/' . $product->image) }}" alt="images"></div>

                                                        <div class="swiper-slide"><img src="{{ asset('/images/house/featured-1.jpg') }}" alt="images"></div>
                                                        <div class="swiper-slide"><img src="{{ asset('/images/house/featured-2.jpg') }}" alt="images"></div>
                                                        <div class="swiper-slide"><img src="{{ asset('/images/house/featured-3.jpg') }}" alt="images"></div>
                                                        <div class="swiper-slide"><img src="{{ asset('/images/house/featured-4.jpg') }}" alt="images"></div>

                                                            </div>
                                                        <div class="pagi2">
                                                            <div class="swiper-pagination2"> </div>
                                                        </div>
                                                        <div class="swiper-button-next2 "><i class="fal fa-arrow-right"></i></div>
                                                        <div class="swiper-button-prev2 "><i class="fal fa-arrow-left"></i> </div>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h3 class="link-style-1"><a href="{{ route('products.show', ['product' => $product->id]) }}">{{ $product->title }}</a> </h3>
                                                    <div class="text-address">
                                                        <p class="p-12"> {{ $product->city->name }} , {{ $product->neighborhood->name }}   </p>
                                                    </div>
                                                    <div class="money fs-18 fw-6 text-color-3"><a href="property-detail-v1.html">{{ number_format($product->price) }} ريال</a></div>
                                                    <div class="icon-box flex">

                                                        <div class="icons icon-1 flex"><span>غرف: </span><span class="fw-6">{{ $product->bedrooms }} </span></div>
                                                        <div class="icons icon-2 flex"><span>حمام: </span><span class="fw-6">{{ $product->bathrooms }} </span></div>
                                                        <div class="icons icon-3 flex"><span>م²: </span><span class="fw-6">{{ $product->area }} </span></div>

                                                    </div>

                                                </div>
                                            </div>

                                            @endforeach

                                        </div>

                                    </div>

                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </section>



    <!-- Javascript -->
     <script src="{{ asset('css/js/jquery.min.js') }}"></script>

    <script src="{{ asset('css/js/jquery.easing.js') }}"></script>

    <script src="{{ asset('css/js/jquery.nice-select.min.js') }}"></script>

    <script src="{{ asset('css/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('css/js/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('css/js/owl.js') }}"></script>

    <script src="{{ asset('css/js/swiper.js') }}"></script>

    <script src="{{ asset('css/js/price-ranger.js') }}"></script>

    <script src="{{ asset('css/js/curved.js') }}"></script>

    <script src="{{ asset('css/js/main.js') }}"></script>

    <script src="{{ asset('css/js/shortcodes.js') }}"></script>

    <script src="{{ asset('css/js/plugin.js') }}"></script>

    <script src="{{ asset('css/js/countto.js') }}"></script>

    <script src="{{ asset('css/js/jquery-validate.js') }}"></script>








</body>

</html>
