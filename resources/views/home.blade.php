<!DOCTYPE html>
<html lang="ar" dir="rtl">
@include('parts.head')

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PWNWC86L" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    @include('parts.header')
    @include('parts.login_popup')




    <div id="wrapper">
        <div id="pagee" class="clearfix">
            @yield('content')
        </div>
    </div>

    @include('parts.footer')




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
