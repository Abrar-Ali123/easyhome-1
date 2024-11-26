<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<link rel="icon" href="{{ asset('/images/9.png') }}">


    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PWNWC86L');</script>

<meta charset="utf-8">

      <link href="{{ asset('css/home.css') }}" rel="stylesheet">
      <script src="{{ asset('js/site.js') }}"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <!-- Fonts -->
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>  easyhome</title>
     </head>
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
