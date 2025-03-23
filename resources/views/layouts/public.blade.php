<!DOCTYPE html>
<html lang="ar" dir="rtl">
@include('parts.head')

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PWNWC86L" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    @include('parts.header')

    <div id="wrapper">
        <div id="pagee" class="clearfix">
            @yield('content')
        </div>
    </div>

    @include('parts.footer')

    <div class="whatsapp-float" onclick="openWhatsApp()">
        <i class="fab fa-whatsapp"></i>
    </div>

    <div class="toggle-container">
        <button id="toggleMode" class="toggle-btn">
            <i id="modeIcon" class="fa-regular fa-sun"></i>
        </button>
    </div>

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

    <script>
        document.getElementById('toggleMode').addEventListener('click', function() {
            const html = document.documentElement;
            const icon = document.getElementById('modeIcon');

            if (html.classList.contains('light-mode')) {
                html.classList.remove('light-mode');
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            } else {
                html.classList.add('light-mode');
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
            }
        });

        function openWhatsApp() {
            const phoneNumber = "+966551421008";
            const message = encodeURIComponent("Hello, I would like to get in touch with you.");
            const whatsappUrl = `https://wa.me/${phoneNumber}?text=${message}`;

            window.open(whatsappUrl, '_blank');
        }
    </script>

</body>

</html>
