<!DOCTYPE html>
<html lang="ar" dir="rtl">
@include('parts.head')

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PWNWC86L"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

 @include('parts.header')
 @include('parts.login_popup')




    <div class="content">
        @yield('content')
    </div>


    @include('parts.footer')






</body>
</html>
