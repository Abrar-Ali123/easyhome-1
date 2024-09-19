<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- مسار ملف CSS الأساسي -->

    <!-- Additional CSS -->
    @stack('styles') <!-- يمكن استخدام هذه لإضافة CSS إضافي في الصفحات الأخرى -->

</head>
<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="bg-white shadow-sm">
            <div class="container mx-auto px-4">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <a href="{{ url('/') }}" class="flex items-center space-x-2">
                            <img src="{{ asset('images/logo.png') }}" class="h-8 w-auto" alt="Logo">
                            <span class="text-lg font-semibold text-gray-800">{{ config('app.name', 'Laravel') }}</span>
                        </a>
                    </div>
                    <div class="flex items-center">
                        @guest
                            <a href="{{ route('login') }}" class="text-gray-800 hover:text-gray-600 ml-4">تسجيل الدخول</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-gray-800 hover:text-gray-600 ml-4">إنشاء حساب</a>
                            @endif
                        @else
                            <div class="relative">
                                <button class="text-gray-800 hover:text-gray-600 focus:outline-none" id="userMenuToggle">
                                    {{ Auth::user()->name }}
                                    <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <ul class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20 hidden" id="userMenu">
                                    <li>
                                        <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">الملف الشخصي</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            تسجيل الخروج
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="py-4">
            @yield('content') <!-- سيتم تضمين محتوى الصفحة هنا -->
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script> <!-- مسار ملف JavaScript الأساسي -->

    <!-- Additional Scripts -->
    @stack('scripts') <!-- يمكن استخدام هذه لإضافة JavaScript إضافي في الصفحات الأخرى -->

    <script>
        // Script for toggling the user menu
        document.addEventListener('DOMContentLoaded', function() {
            const userMenuToggle = document.getElementById('userMenuToggle');
            const userMenu = document.getElementById('userMenu');

            userMenuToggle?.addEventListener('click', function() {
                userMenu.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>
