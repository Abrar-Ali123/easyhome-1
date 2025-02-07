@extends('home')


@section('content')
    <style>
        .product-link {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 10;
            display: block;
        }

        .box {
            position: relative;
        }
    </style>
    <!-- slider -->
    <section class="slider home">
        <div class="slider-item">
            <div class="container3  relative">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content po-content-two">
                            <div class="heading">
                                <h1 class="">ايزي هوم</h1>

                                <h1> حيث الحلول العقارية المبتكرة</h1>
                                <p class="fs-16 lh-24 text-color-2 wow fadeInUp" data-wow-delay="100ms"
                                    data-wow-duration="2000ms">
                                    اكتشف مجموعة متنوعة من العقارات التي تناسبك بكل سهولة، وتجاوز جميع الصعوبات
                                    في العثور على المنزل المثالي لك.
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
                                        <img src="{{ asset('/images/banks/1.png') }}" alt="Logo 1">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slogan-logo">
                                    <a href="#">
                                        <img src="{{ asset('/images/banks/2.png') }}" alt="Logo 2">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slogan-logo">
                                    <a href="#">
                                        <img src="{{ asset('/images/banks/3.png') }}" alt="Logo 3">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slogan-logo">
                                    <a href="#">
                                        <img src="{{ asset('/images/banks/4.png') }}" alt="Logo 4">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slogan-logo">
                                    <a href="#">
                                        <img src="{{ asset('/images/banks/5.png') }}" alt="Logo 5">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slogan-logo">
                                    <a href="#">
                                        <img src="{{ asset('/images/banks/6.png') }}" alt="Logo 6">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slogan-logo">
                                    <a href="#">
                                        <img src="{{ asset('/images/banks/7.png') }}" alt="Logo 7">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slogan-logo">
                                    <a href="#">
                                        <img src="{{ asset('/images/banks/8.png') }}" alt="Logo 8">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slogan-logo">
                                    <a href="#">
                                        <img src="{{ asset('/images/banks/9.png') }}" alt="Logo 9">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slogan-logo">
                                    <a href="#">
                                        <img src="{{ asset('/images/banks/10.png') }}" alt="Logo 10">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flat-service tf-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section center">
                        <h2>قيمنا</h2>
                        <p class="text-1 text-color-4">قيمنا الأساسية التي نؤمن بها ونعمل لتحقيقها</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="box">
                        <div class="icon">
                            <!-- أيقونة النزاهة -->
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M32.8125 10.9375C34.4701 10.9375 36.0598 11.596 37.2319 12.7681C38.404 13.9402 39.0625 15.5299 39.0625 17.1875M45.3125 17.1875C45.3128 19.0106 44.9142 20.8118 44.1448 22.4646C43.3754 24.1175 42.2537 25.582 40.8585 26.7555C39.4632 27.9291 37.8282 28.7832 36.0679 29.258C34.3077 29.7328 32.4649 29.8168 30.6687 29.5041C29.4958 29.3021 28.2542 29.5583 27.4125 30.4L21.875 35.9375H17.1875V40.625H12.5V45.3125H4.6875V39.4416C4.6875 38.1979 5.18125 37.0041 6.06042 36.1271L19.6 22.5875C20.4417 21.7458 20.6979 20.5041 20.4958 19.3312C20.2004 17.6253 20.2626 15.8766 20.6784 14.196C21.0942 12.5154 21.8546 10.9395 22.9114 9.56815C23.9682 8.19681 25.2983 7.05996 26.8175 6.22963C28.3367 5.39931 30.0118 4.89362 31.7367 4.74462C33.4616 4.59562 35.1986 4.80656 36.8377 5.36406C38.4768 5.92156 39.9822 6.81347 41.2585 7.98327C42.5348 9.15307 43.5542 10.5752 44.252 12.1597C44.9499 13.7441 45.311 15.4562 45.3125 17.1875Z"
                                    stroke="#FFA920" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <h3 class="">النزاهة</h3>
                        <p class="text-color-2">نلتزم بالشفافية والمصداقية في جميع تعاملاتنا.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="box">
                        <div class="icon">
                            <!-- أيقونة الابتكار -->
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.1875 43.75V33.5937C17.1875 32.3 18.2375 31.25 19.5312 31.25H24.2187C25.5125 31.25 26.5625 32.3 26.5625 33.5937V43.75M26.5625 43.75H35.9375V7.38542M26.5625 43.75H42.1875V22.3958M35.9375 7.38542L39.0625 6.25M35.9375 7.38542L14.0625 15.3417M42.1875 22.3958L35.9375 20.3125M42.1875 22.3958L45.3125 23.4375M4.6875 43.75H7.8125M7.8125 43.75H45.3125M7.8125 43.75V6.25H14.0625V15.3417M4.6875 18.75L14.0625 15.3417"
                                    stroke="#FFA920" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <h3 class="">الابتكار</h3>
                        <p class="text-color-2">نسعى دائمًا لتقديم حلول إبداعية ومبتكرة.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="box">
                        <div class="icon">
                            <!-- أيقونة الجودة -->
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M25.001 37.4999V26.5624M25.001 26.5624C26.0551 26.5633 27.1051 26.431 28.126 26.1687M25.001 26.5624C23.947 26.5633 22.897 26.431 21.876 26.1687M29.6885 41.7479C26.5912 42.336 23.4109 42.336 20.3135 41.7479M28.126 46.7124C26.0484 46.93 23.9537 46.93 21.876 46.7124M29.6885 37.4999V37.0999C29.6885 35.052 31.0594 33.302 32.8302 32.2749C35.8052 30.5521 38.129 27.8962 39.4415 24.7188C40.754 21.5413 40.9819 18.0197 40.0899 14.6996C39.198 11.3795 37.236 8.44622 34.5078 6.35428C31.7797 4.26235 28.4379 3.12854 25 3.12854C21.5622 3.12854 18.2203 4.26235 15.4922 6.35428C12.7641 8.44622 10.802 11.3795 9.91006 14.6996C9.01811 18.0197 9.24604 21.5413 10.5585 24.7188C11.871 27.8962 14.1948 30.5521 17.1698 32.2749C18.9406 33.302 20.3135 35.052 20.3135 37.0999V37.4999"
                                    stroke="#FFA920" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <h3 class="">الجودة</h3>
                        <p class="text-color-2">نوفر خدمات ومنتجات بأعلى معايير الجودة.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="box">
                        <div class="icon">
                            <!-- أيقونة الالتزام -->





                            <svg width="50" height="50" viewBox="0 0 70 70" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M50.9612 38.5358C43.6947 38.5358 37.7829 44.4477 37.7829 51.7142C37.7829 58.9802 43.6956 64.8906 50.9612 64.8906C58.2264 64.8906 64.1395 58.9799 64.1395 51.7142C64.1395 44.4478 58.2273 38.5358 50.9612 38.5358ZM12.2786 11.5294H4.25781L12.2786 3.50781V11.5294ZM66.5128 51.7142C66.5128 60.2897 59.5368 67.2658 50.9612 67.2658C42.3854 67.2658 35.4089 60.2901 35.4089 51.7142C35.4089 43.1381 42.385 36.1613 50.9612 36.1613C59.5372 36.1612 66.5128 43.1383 66.5128 51.7142Z"
                                    fill="#FFF5E0"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M43.6344 51.7141C43.6344 52.2416 43.2054 52.6708 42.6771 52.6708H42.1033C41.5752 52.6708 41.146 52.2416 41.146 51.7141C41.146 51.5884 41.1707 51.4639 41.2188 51.3478C41.2669 51.2316 41.3374 51.126 41.4263 51.0371C41.5152 50.9482 41.6208 50.8777 41.7369 50.8296C41.8531 50.7815 41.9776 50.7568 42.1033 50.7568H42.6771C42.8029 50.7568 42.9274 50.7815 43.0435 50.8296C43.1597 50.8777 43.2652 50.9482 43.3541 51.0371C43.443 51.126 43.5135 51.2316 43.5616 51.3478C43.6097 51.4639 43.6345 51.5884 43.6344 51.7141ZM50.004 43.4299V42.8561C50.0039 42.7304 50.0285 42.6058 50.0766 42.4896C50.1247 42.3734 50.1952 42.2678 50.2841 42.1789C50.373 42.09 50.4786 42.0195 50.5948 41.9714C50.711 41.9233 50.8356 41.8987 50.9613 41.8988C51.087 41.8988 51.2115 41.9235 51.3277 41.9716C51.4438 42.0197 51.5493 42.0902 51.6382 42.1791C51.727 42.268 51.7975 42.3736 51.8455 42.4898C51.8935 42.6059 51.9181 42.7304 51.9179 42.8561V43.4299C51.9195 43.5566 51.8958 43.6822 51.8484 43.7997C51.801 43.9171 51.7308 44.024 51.6417 44.114C51.5527 44.2041 51.4467 44.2757 51.3299 44.3245C51.213 44.3733 51.0876 44.3984 50.961 44.3984C50.8343 44.3984 50.709 44.3733 50.5921 44.3245C50.4752 44.2757 50.3692 44.2041 50.2802 44.114C50.1912 44.024 50.121 43.9171 50.0736 43.7997C50.0261 43.6822 50.0025 43.5566 50.004 43.4299ZM44.0211 46.1262C43.6467 45.7531 43.648 45.147 44.0211 44.7727C44.3942 44.3996 45.0015 44.3996 45.3746 44.7727L45.7805 45.1786C46.1536 45.5536 46.1536 46.159 45.7793 46.5322C45.6909 46.6215 45.5857 46.6923 45.4697 46.7404C45.3537 46.7886 45.2293 46.8131 45.1037 46.8126C44.9781 46.8132 44.8535 46.7886 44.7374 46.7405C44.6213 46.6923 44.516 46.6215 44.4275 46.5322L44.0211 46.1262ZM45.7793 56.8943C46.1537 57.2687 46.1537 57.8747 45.7793 58.2478L45.3746 58.6537C45.2859 58.7428 45.1804 58.8134 45.0642 58.8615C44.9481 58.9097 44.8236 58.9343 44.6978 58.9341C44.5721 58.9344 44.4476 58.9097 44.3314 58.8616C44.2153 58.8135 44.1098 58.7428 44.0211 58.6537C43.9321 58.5649 43.8615 58.4594 43.8133 58.3433C43.7651 58.2271 43.7403 58.1026 43.7403 57.9769C43.7403 57.8512 43.7651 57.7267 43.8133 57.6105C43.8615 57.4944 43.9321 57.3889 44.0211 57.3001L44.4277 56.8941C44.6069 56.7149 44.85 56.6143 45.1035 56.6143C45.357 56.6143 45.6001 56.715 45.7793 56.8943ZM60.776 51.7141C60.7757 51.9678 60.6748 52.2109 60.4955 52.3903C60.3161 52.5696 60.073 52.6705 59.8193 52.6708H59.2448C58.9911 52.6707 58.7477 52.57 58.5682 52.3906C58.3887 52.2112 58.2878 51.9679 58.2875 51.7141C58.2875 51.5884 58.3122 51.4639 58.3603 51.3477C58.4083 51.2315 58.4789 51.126 58.5678 51.0371C58.6567 50.9482 58.7622 50.8776 58.8784 50.8296C58.9946 50.7815 59.1191 50.7568 59.2448 50.7568H59.8193C60.0731 50.7569 60.3165 50.8579 60.4959 51.0374C60.6753 51.2169 60.776 51.4603 60.776 51.7141ZM51.9179 59.9977V60.5709C51.918 60.6966 51.8934 60.821 51.8453 60.9371C51.7973 61.0532 51.7268 61.1587 51.638 61.2476C51.5491 61.3364 51.4436 61.4069 51.3275 61.4549C51.2114 61.5029 51.087 61.5276 50.9613 61.5275C50.8356 61.5277 50.7111 61.5031 50.5949 61.4551C50.4788 61.4071 50.3732 61.3366 50.2843 61.2478C50.1954 61.1589 50.1249 61.0534 50.0768 60.9372C50.0287 60.8211 50.004 60.6966 50.004 60.5709V59.9977C50.004 59.872 50.0287 59.7475 50.0768 59.6313C50.1249 59.5152 50.1954 59.4097 50.2843 59.3208C50.3732 59.232 50.4788 59.1615 50.5949 59.1135C50.7111 59.0655 50.8356 59.0409 50.9613 59.041C51.087 59.0409 51.2114 59.0656 51.3275 59.1137C51.4436 59.1617 51.5491 59.2322 51.638 59.321C51.7268 59.4099 51.7973 59.5154 51.8453 59.6315C51.8934 59.7476 51.918 59.872 51.9179 59.9977ZM57.9009 44.7725C58.2754 45.1469 58.2754 45.7529 57.9009 46.126L57.495 46.532C57.4066 46.6212 57.3014 46.6919 57.1854 46.74C57.0694 46.7882 56.945 46.8128 56.8195 46.8124C56.6935 46.8128 56.5687 46.7882 56.4523 46.7401C56.3359 46.6919 56.2302 46.6212 56.1413 46.532C55.7682 46.1588 55.7682 45.5535 56.1413 45.1783L56.5472 44.7724C56.9217 44.3994 57.5278 44.3994 57.9009 44.7725ZM57.9009 57.3002C58.2754 57.6733 58.2754 58.2794 57.9009 58.6538C57.715 58.841 57.4686 58.9343 57.2241 58.9343C56.9797 58.9343 56.7346 58.841 56.5474 58.6538L56.1427 58.2479C55.7682 57.8748 55.7682 57.2687 56.1413 56.8944C56.5158 56.5213 57.1217 56.5213 57.4948 56.8944L57.9009 57.3002ZM54.4791 53.7445C54.4163 53.8534 54.3326 53.9488 54.2329 54.0253C54.1332 54.1018 54.0194 54.1579 53.898 54.1904C53.7766 54.2229 53.65 54.2311 53.5254 54.2147C53.4009 54.1983 53.2807 54.1574 53.1719 54.0946L51.4877 53.1225C51.3236 53.1836 51.1455 53.2197 50.9615 53.2197C50.1328 53.2197 49.4561 52.5429 49.4561 51.7143C49.456 51.4924 49.5052 51.2732 49.5999 51.0725C49.6947 50.8718 49.8328 50.6946 50.0042 50.5537V47.3936C50.0043 47.1398 50.1052 46.8964 50.2847 46.717C50.4642 46.5376 50.7077 46.4369 50.9615 46.4369C51.2152 46.437 51.4585 46.5378 51.6379 46.7172C51.8173 46.8966 51.918 47.1399 51.9181 47.3936V50.5537C52.1915 50.7789 52.3832 51.1005 52.445 51.4653L54.1292 52.4374C54.5871 52.701 54.7428 53.2864 54.4791 53.7445ZM50.9613 63.3868C57.3979 63.3868 62.6359 58.1507 62.6359 51.7141C62.6359 45.2756 57.3979 40.0396 50.9613 40.0396C44.5242 40.0396 39.2875 45.2756 39.2875 51.7141C39.2873 58.1506 44.5241 63.3868 50.9613 63.3868ZM50.9613 38.1257C43.4691 38.1257 37.3729 44.2206 37.3729 51.7141C37.3729 59.2065 43.4691 65.3007 50.9613 65.3007C58.453 65.3007 64.5498 59.2065 64.5498 51.7141C64.5498 44.2206 58.4528 38.1257 50.9613 38.1257ZM50.9613 66.8556C59.3105 66.8556 66.1028 60.0633 66.1028 51.7141C66.1028 43.3643 59.3105 36.5714 50.9613 36.5714C42.6115 36.5714 35.8192 43.3643 35.8192 51.7141C35.8192 60.0633 42.6115 66.8556 50.9613 66.8556ZM3.8944 13.0331V62.0428H37.3986C35.208 59.1749 33.9046 55.5941 33.9046 51.7141C33.9046 48.4653 34.8181 45.4262 36.4008 42.8381H21.5224C21.3967 42.8382 21.2722 42.8135 21.1561 42.7655C21.0399 42.7174 20.9344 42.647 20.8455 42.5581C20.7566 42.4693 20.6861 42.3638 20.6379 42.2477C20.5898 42.1316 20.5651 42.0071 20.5651 41.8815C20.5651 41.6276 20.666 41.3841 20.8455 41.2046C21.025 41.0251 21.2685 40.9242 21.5224 40.9242H37.7607C40.7014 37.3324 45.0767 34.9586 50.004 34.6845V3.14439H13.7824V12.0758C13.7825 12.3296 13.6818 12.573 13.5024 12.7526C13.323 12.9321 13.0796 13.033 12.8258 13.0331H3.8944ZM11.8685 4.49805V11.1192H5.24805L11.8685 4.49805ZM51.9179 34.6845V2.18777C51.918 2.06209 51.8934 1.93762 51.8453 1.82148C51.7973 1.70534 51.7268 1.5998 51.638 1.5109C51.5492 1.422 51.4437 1.35147 51.3276 1.30335C51.2115 1.25524 51.087 1.23047 50.9613 1.23047H12.8258C12.7001 1.23048 12.5757 1.25525 12.4596 1.30336C12.3434 1.35147 12.2379 1.42199 12.1491 1.51088L2.26033 11.3991C2.08102 11.5786 1.98036 11.8221 1.98047 12.0758V63.0001C1.98031 63.1258 2.00494 63.2503 2.05295 63.3665C2.10095 63.4827 2.1714 63.5883 2.26025 63.6772C2.34911 63.7661 2.45462 63.8366 2.57076 63.8847C2.6869 63.9328 2.81139 63.9575 2.93709 63.9574H39.0995C42.1714 66.9348 46.355 68.7695 50.9613 68.7695C60.3662 68.7695 68.0167 61.119 68.0167 51.7141C68.0167 42.6303 60.8801 35.1824 51.9179 34.6845ZM20.5651 31.0804C20.5651 30.8265 20.666 30.5831 20.8455 30.4036C21.025 30.2241 21.2685 30.1232 21.5224 30.1231H44.2211C44.475 30.1231 44.7185 30.224 44.898 30.4035C45.0775 30.583 45.1784 30.8265 45.1784 31.0804C45.1784 31.3343 45.0775 31.5778 44.898 31.7573C44.7185 31.9369 44.475 32.0377 44.2211 32.0377H21.5224C21.3966 32.0378 21.2721 32.013 21.156 31.9649C21.0398 31.9168 20.9343 31.8463 20.8454 31.7574C20.7565 31.6685 20.686 31.563 20.6379 31.4468C20.5898 31.3306 20.565 31.2061 20.5651 31.0804ZM20.5651 20.2789C20.5652 20.0251 20.6661 19.7818 20.8456 19.6024C21.0251 19.423 21.2686 19.3223 21.5224 19.3223H44.2211C44.4748 19.3225 44.718 19.4233 44.8974 19.6027C45.0767 19.782 45.1776 20.0253 45.1777 20.2789C45.1777 20.5327 45.077 20.7761 44.8976 20.9556C44.7182 21.1351 44.4749 21.2361 44.2211 21.2362H21.5224C21.3966 21.2363 21.2721 21.2115 21.156 21.1635C21.0398 21.1154 20.9343 21.0448 20.8454 20.9559C20.7565 20.867 20.686 20.7615 20.6379 20.6453C20.5898 20.5292 20.565 20.4047 20.5651 20.2789ZM15.2821 22.6026H10.6353V17.9558H15.2821V22.6026ZM16.2387 16.0419C16.3645 16.0419 16.489 16.0666 16.6051 16.1147C16.7213 16.1628 16.8268 16.2333 16.9157 16.3222C17.0046 16.4111 17.0751 16.5167 17.1232 16.6328C17.1713 16.749 17.1961 16.8735 17.196 16.9992V23.5599C17.1959 23.8137 17.095 24.0571 16.9155 24.2365C16.736 24.4159 16.4925 24.5166 16.2387 24.5165H9.67801C9.14986 24.5165 8.7207 24.0881 8.7207 23.5599V16.9992C8.72074 16.7453 8.82161 16.5018 9.00113 16.3223C9.18065 16.1428 9.42413 16.0419 9.67801 16.0419H16.2387ZM15.2821 33.4042H10.6353V28.7574H15.2821V33.4042ZM16.2387 26.8435C16.4925 26.8434 16.736 26.9442 16.9155 27.1236C17.095 27.303 17.1959 27.5463 17.196 27.8001V34.3608C17.1961 34.4866 17.1713 34.6111 17.1232 34.7272C17.0751 34.8434 17.0046 34.9489 16.9157 35.0378C16.8268 35.1267 16.7213 35.1973 16.6051 35.2453C16.489 35.2934 16.3645 35.3182 16.2387 35.3181H9.67801C9.42414 35.3181 9.18069 35.2172 9.00117 35.0377C8.82166 34.8582 8.72078 34.6147 8.7207 34.3608V27.8001C8.72089 27.5463 8.82182 27.303 9.00133 27.1236C9.18084 26.9443 9.42423 26.8435 9.67801 26.8435H16.2387ZM15.2821 44.2051H10.6353V39.5583H15.2821V44.2051ZM16.2387 37.6444C16.4925 37.6443 16.736 37.7451 16.9155 37.9245C17.095 38.1039 17.1959 38.3472 17.196 38.601V45.1623C17.1959 45.4161 17.0949 45.6594 16.9154 45.8388C16.7359 46.0182 16.4925 46.1189 16.2387 46.1189H9.67801C9.14986 46.1189 8.7207 45.6898 8.7207 45.1623V38.601C8.72089 38.3473 8.82182 38.1039 9.00133 37.9246C9.18084 37.7452 9.42423 37.6444 9.67801 37.6444H16.2387Z"
                                    fill="#FFA920"></path>
                            </svg>




                        </div>
                        <h3 class="">الالتزام</h3>
                        <p class="text-color-2">نحترم الوقت ونفي بوعودنا.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="flat-featured wg-dream home">
        <div class="container3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section center mb-4">
                        <h2>العقارات</h2>
                    </div>
                    <div class="flat-tabs themesflat-tabs mt-4">
                        {{-- <div class="box-tab center">
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
                                    </div> --}}

                        <div class="content-tab">
                            <div class="content-inner tab-content">
                                <div id="searchResults" class="wrap-item flex">

                                    @foreach ($products as $product)
                                        <!-- col 1 -->
                                        <div class="box box-dream hv-one">

                                            <a href="{{ route('products.show', ['product' => $product->id]) }}"
                                                class="product-link"></a>

                                            <div class="image-group relative ">
                                                <span class="featured fs-12 fw-6">{{ $product->category }}</span>
                                                <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                                <div class="swiper-container carousel-2 img-style">

                                                    <div class="swiper-wrapper ">

                                                        <div class="swiper-slide"><img
                                                                src="{{ url('/storage/app/public/' . $product->image) }}"
                                                                alt="images"></div>

                                                        @foreach (array_slice(json_decode($product->images, true), 0, 5) as $image)
                                                            <div class="swiper-slide">
                                                                <img src="{{ url('/storage/app/public/' . $image) }}"
                                                                    alt="images">
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                    <div class="pagi2">
                                                        <div class="swiper-pagination2"> </div>
                                                    </div>
                                                    <div class="swiper-button-next2 "><i class="fal fa-arrow-right"></i>
                                                    </div>
                                                    <div class="swiper-button-prev2 "><i class="fal fa-arrow-left"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h3 class="link-style-1"><a
                                                        href="{{ route('products.show', ['product' => $product->id]) }}">{{ $product->title }}</a>
                                                </h3>
                                                <div class="text-address">
                                                    <p class="p-12"> {{ $product->city->name }} ,
                                                        {{ $product->neighborhood->name }} </p>
                                                </div>
                                                <div class="money fs-18 fw-6 text-color-3"><a
                                                        href="property-detail-v1.html">{{ number_format($product->price) }}
                                                        ريال</a></div>
                                                <div class="icon-box flex">

                                                    <div class="icons icon-1 flex"><span>غرف: </span><span
                                                            class="fw-6">{{ $product->bedrooms }} </span>
                                                    </div>
                                                    <div class="icons icon-2 flex"><span>حمام: </span><span
                                                            class="fw-6">{{ $product->bathrooms }} </span>
                                                    </div>
                                                    <div class="icons icon-3 flex"><span>م²: </span><span
                                                            class="fw-6">{{ $product->area }} </span></div>

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

    <section class="testimonial text-center">
        <div class="container">

            <div class="heading white-heading">
                اراء العملاء
            </div>

            <div id="testimonial4"
                class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x"
                data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">

                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="testimonial4_slide">
                            <img class="img-item" src="{{ asset('/images/img/IMG-20241201-WA0037.jpg') }}"
                                alt="رأي العميل 1">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img class="img-item" src="{{ asset('/images/img/IMG-20241201-WA0038.jpg') }}"
                                alt="رأي العميل 2">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img class="img-item" src="{{ asset('/images/img/IMG-20241201-WA0039.jpg') }}"
                                alt="رأي العميل 3">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img class="img-item" src="{{ asset('/images/img/IMG-20241201-WA0040.jpg') }}"
                                alt="رأي العميل 4">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img class="img-item" src="{{ asset('/images/img/IMG-20241201-WA0041.jpg') }}"
                                alt="رأي العميل 5">
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#testimonial4" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </section>



    <section class="flat-blog tf-section home">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section center">
                        <h2>المدونة</h2>
                    </div>
                </div>

                @php
                    $posts = App\Models\Post::all();
                @endphp
                @foreach ($posts as $post)
                    <article class="post-card col-xl-4">

                        <div class="post">
                            <!-- شريط التاريخ -->
                            <div class="post-date-badge">
                                {{ $post->created_at->format('d M Y') }}
                            </div>

                            <!-- صورة المقال -->
                            <a href="{{ route('posts.show', $post->id) }}" class="w-100">

                                <img src="{{ $post->image ? url('/storage/app/public/' . $post->image) : 'https://via.placeholder.com/400x200' }}"
                                    alt="{{ $post->title }}">
                            </a>

                            <!-- محتوى البطاقة -->

                            <div class="post-content">

                                <h3 class="post-title">
                                    <a href="{{ route('posts.show', $post->id) }}">
                                        {{ $post->title }}
                                    </a>

                                </h3>

                                <!-- التصنيف -->
                                <div class="post-category-badge">
                                    <a href="{{ route('posts.show', $post->id) }}">

                                        {{ $post->category->name ?? 'غير مصنف' }}
                                    </a>

                                </div>

                                <!-- الكلمات المفتاحية -->
                                <div class="post-keywords">
                                    @if ($post->keywords)
                                        @foreach (explode(',', $post->keywords) as $keyword)
                                            <span class="keyword-tag">{{ trim($keyword) }}</span>
                                        @endforeach
                                    @else
                                        <span class="no-keywords">لا توجد كلمات مفتاحية</span>
                                    @endif
                                </div>
                                <p class="post-content-preview">
                                    <a href="{{ route('posts.show', $post->id) }}">

                                        <!-- مقتطف المحتوى -->
                                        {{ \Illuminate\Support\Str::limit($post->content, 100) }}


                                    </a>
                                </p>
                                <!-- زر اقرأ المزيد -->
                                <a href="{{ route('posts.show', $post->id) }}" class="read-more">اقرأ المزيد</a>
                            </div>

                        </div>
                    </article>
                @endforeach

            </div>
        </div>
    </section>


    <section class="flat-why-choose2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-5">
                    <div class="images">

                        <img class="img-item" src="{{ asset('/images/img-box/why-choose-home4.png') }}" alt="">


                    </div>
                </div>
                <div class="col-lg-6 col-md-7">
                    <div class="heading-section">
                        <h2>لماذا تختار شركتنا؟</h2>
                        <p class="text-color-4">نحن نقدم خدمات متكاملة لتلبية احتياجاتك العقارية</p>
                    </div>
                    <div class="wrap-icon">
                        <div class="box flex">
                            <div class="content">
                                <h3>موثوقية وخبرة</h3>
                                <p class="text-color-2">نعمل بخبرة سنوات لضمان تقديم أفضل الخيارات العقارية</p>
                            </div>
                        </div>
                        <div class="box flex">
                            <div class="content">
                                <h3>دعم شخصي</h3>
                                <p class="text-color-2">فريقنا يساعدك في كل خطوة من البحث حتى الشراء</p>
                            </div>
                        </div>
                        <div class="box flex">
                            <div class="content">
                                <h3>خدمات ما بعد البيع</h3>
                                <p class="text-color-2">دعم متواصل لضمان رضاك التام عن خدماتنا</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="flat-contact2 relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section">
                        <h2>برنامج إنجاز
                        </h2>
                        <p class="text-color-2 fs-18 font-2">استفد من خيارات تمويل مرنة ودعم متخصص لتحقيق أهدافك بسهولة
                            وسرعة. تعرف على المزيد عن البرنامج الآن!

                        </p>
                        <div class="button-footer">
                            <a class="sc-button center btn-icon" href="{{ route('contact.page2') }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.25 6.75C2.25 15.034 8.966 21.75 17.25 21.75H19.5C20.0967 21.75 20.669 21.5129 21.091 21.091C21.5129 20.669 21.75 20.0967 21.75 19.5V18.128C21.75 17.612 21.399 17.162 20.898 17.037L16.475 15.931C16.035 15.821 15.573 15.986 15.302 16.348L14.332 17.641C14.05 18.017 13.563 18.183 13.122 18.021C11.4849 17.4191 9.99815 16.4686 8.76478 15.2352C7.53141 14.0018 6.58087 12.5151 5.979 10.878C5.817 10.437 5.983 9.95 6.359 9.668L7.652 8.698C8.015 8.427 8.179 7.964 8.069 7.525L6.963 3.102C6.90214 2.85869 6.76172 2.6427 6.56405 2.48834C6.36638 2.33397 6.1228 2.25008 5.872 2.25H4.5C3.90326 2.25 3.33097 2.48705 2.90901 2.90901C2.48705 3.33097 2.25 3.90326 2.25 4.5V6.75Z"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                                <span>اكتشف المزيد</span>
                            </a>
                        </div>
                    </div>
                    <div class="mark-img">
                        <img src="{{ asset('') }}/images/mark/mark-contact2.png" alt="images">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
