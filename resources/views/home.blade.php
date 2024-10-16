<!DOCTYPE html>
<html lang="ar">
<head>
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
 @include('parts.header')
 @include('parts.login_popup')




    <div class="content">
        @yield('content')
    </div>


    @include('parts.footer')






</body>
</html>
