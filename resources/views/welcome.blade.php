<!DOCTYPE html>
<html lang="rtl">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>{{ __('messages.page_title') }}</title>
    <style>

html, body {
    font-family: '29LT Adir', sans-serif;
    direction: rtl;
    width: 100%;
display: cover;
box-sizing: border-box;
overflow-x: hidden

         }


        .bg-primary {
        background-color: #003E37;
        color: #BB9339;

    }

    .bg-primary {
        background-color: #003E37;
        color: #BB9339;

    }


    .text-primary {
        color: #BB9339;
    }



    .secondary {
        background-color: #003E37;
        color: #ffffff;

     }
       select {
        background-position: right 12px center;
        background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4 5"><path fill="none" stroke="currentColor" stroke-width="1.5" d="M0 0l2 2.5L4 0"/></svg>');
        background-repeat: no-repeat;
        background-size: 0.65em auto;
        padding-right: 1.25em;
    }

    </style>
</head>

<body>








    <div class="">
 <!-- Exi
  sting Headers -->

<!-- Navbar -->
<nav class="navbar-transparent fixed w-full z-50">
    <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('/images/9.png') }}" class="w-20 h-20" />
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">افتح القائمة</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">

                <li>
                    <a href="#"
                        class=" mr-4 ml-4 bg-primary block py-2 px-3 text-white rounded md:bg-transparent md:text-white md:p-0 dark:text-white md:dark:text-white hover:text-[#d4af37] md:hover:text-[#d4af37] dark:hover:text-[#d4af37]">الرئيسية</a>
                </li>


                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white rounded md:bg-transparent md:text-white md:p-0 dark:text-white md:dark:text-white hover:text-[#d4af37] md:hover:text-[#d4af37] dark:hover:text-[#d4af37]">العقارات</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white rounded md:bg-transparent md:text-white md:p-0 dark:text-white md:dark:text-white hover:text-[#d4af37] md:hover:text-[#d4af37] dark:hover:text-[#d4af37]">من نحن</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white rounded md:bg-transparent md:text-white md:p-0 dark:text-white md:dark:text-white hover:text-[#d4af37] md:hover:text-[#d4af37] dark:hover:text-[#d4af37]">اطلب عقارك</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white rounded md:bg-transparent md:text-white md:p-0 dark:text-white md:dark:text-white hover:text-[#d4af37] md:hover:text-[#d4af37] dark:hover:text-[#d4af37]">طلب استثمار</a>
                </li>
                <li>
                    <a href="{{route('login')}}"
                       class="block py-2 px-3 text-white rounded md:bg-transparent md:text-white md:p-0 dark:text-white md:dark:text-white hover:text-[#d4af37] md:hover:text-[#d4af37] dark:hover:text-[#d4af37]">التسجيل/تسجيل الدخول</a>
                </li>
                <li class="flex space-x-4 rtl:space-x-reverse mr-4 ml-4">
                    <a href="#" class="text-white hover:text-[#d4af37]">
                        <i class="fas fa-heart mr-4 ml-4"></i>
                    </a>



                    <!-- HTML for Dropdown Menu -->
                    <div class="dropdown" onmouseleave="hideDropdown()">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" onclick="toggleDropdown()" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user mr-4 ml-4 text-white"></i>
                        </button>
                        <div class="dropdown-menu" id="dropdownMenu" aria-labelledby="dropdownMenuButton" style="display: none;">
                            <a class="dropdown-item" href="{{route('login')}}">تسجيل الدخول </a>
                            <a class="dropdown-item" href="{{route('register')}}">التسجيل</a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('تسجيل الخروج') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                        </div>
                    </div>

                    <!-- JavaScript for Toggle Functionality -->
                    <script>
                        function toggleDropdown() {
                            const dropdownMenu = document.getElementById('dropdownMenu');
                            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
                        }

                        function hideDropdown() {
                            document.getElementById('dropdownMenu').style.display = 'none';
                        }
                    </script>

                    <!-- CSS for Basic Styling (Optional) -->
                    <style>
		                .dropdown-menu {
			                position: absolute;
			                background-color: #fff;
			                border: 1px solid #ccc;
			                border-radius: 4px;
			                width: 200px;
			                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
		                }
		                .dropdown-item {
			                padding: 10px;
			                text-align: right;
			                color: #333;
			                text-decoration: none;
			                display: block;
		                }
		                .dropdown-item:hover {
			                background-color: #f0f0f0;
		                }
                    </style>


                    {{--                    <a  id="openPopup" class="text-white hover:text-[#d4af37] mr-4 ml-4">--}}
{{--    <i class="fas fa-user mr-4 ml-4"></i>--}}
{{--</a>--}}

                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- زر فتح النافذة المنبثقة -->

<!-- نافذة منبثقة -->


            </div>
        </div>
    </div>
</div>

<!-- CSS للنافذة المنبثقة -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');



    #popup {
        display: none; /* المخفي بشكل افتراضي */
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 1000; /* تأكد من أن هذه القيمة أعلى من أي قيمة z-index أخرى */
    }

    .popup-content {
        background: #091716;
        padding: 40px;
        border-radius: 4px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.9);
        position: relative;
        width: 400px;
    }

    .popup-content .close {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 2em;
        color: #bb9339;
        cursor: pointer;
    }

    .popup-content .content {
        display: flex;
        flex-direction: column;
        gap: 40px;
    }

    .popup-content .content h2 {
        font-size: 2em;
        color: #bb9339;
        text-transform: uppercase;
    }

    .popup-content .content .form {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .popup-content .content .form .inputBox {
        position: relative;
        width: 100%;
    }

    .popup-content .content .form .inputBox input {
        position: relative;
        width: 100%;
        background: #003e37;

        border: none;
        outline: none;
        padding: 25px 10px 7.5px;
        border-radius: 4px;
        color: #bb9339;
        font-weight: 500;
        font-size: 1em;
    }

    .popup-content .content .form .inputBox i {
        position: absolute;
        left: 0;
        padding: 15px 10px;
        font-style: normal;
        color: #aaa;
        transition: 0.5s;
        pointer-events: none;
    }

    .popup-content .content .form .inputBox input:focus ~ i,
    .popup-content .content .form .inputBox input:valid ~ i {
        transform: translateY(-7.5px);
        font-size: 0.8em;
        color: #bb9339;
    }

    .popup-content .content .form .links {
        display: flex;
        justify-content: space-between;
    }

    .popup-content .content .form .links a {
        color: #bb9339;
        text-decoration: none;
    }

    .popup-content .content .form .links a:nth-child(2) {
        color: #bb9339;
        font-weight: 600;
    }

    .popup-content .content .form .inputBox input[type="submit"] {
        padding: 10px;
        background: #bb9339;
        color: #FFF;
        font-weight: 600;
        font-size: 1.35em;
        letter-spacing: 0.05em;
        cursor: pointer;
    }

    input[type="submit"]:active {
        opacity: 0.6;
    }

    /* خيارات تسجيل الدخول الاجتماعي */
.social-login {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 20px;
}

.social-login a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: #333;
    border-radius: 50%;
    color: #bb9339;
    font-size: 1.5em;
    text-decoration: none;
    transition: background 0.3s;
}

.social-login a:hover {
    background: #555;
}

/* أيقونات */
.google-icon::before {
    content: 'G'; /* رمز قوقل */
}

.facebook-icon::before {
    content: 'F'; /* رمز فيسبوك */
}

</style>

<!-- JavaScript للنافذة المنبثقة -->
<script>
    document.getElementById('openPopup').addEventListener('click', function() {
        document.getElementById('popup').style.display = 'flex';
    });

    document.querySelector('.popup-content.close').addEventListener('click', function() {
        document.getElementById('popup').style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target == document.getElementById('popup')) {
            document.getElementById('popup').style.display = 'none';
        }
    });
</script>


<section class="mb-12">
<header id="header" class="relative w-full h-screen mb-32">
    <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay muted loop>
        <source src="{{ asset('images/4.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="absolute bottom-12 right-0 p-8">
    <div class="text-right text-white">
        <h1 class="text-4xl md:text-4xl font-bold mb-4"> ايزي هوم حيث الحلول العقارية المبتكرة      </h1>
        <p class="text-xl md:text-2xl">اكتشف أفضل العقارات بأفضل الأسعار</p>
    </div>
</div>

</div>

    <br><br>
<br><br>

    <div class="absolute top-3/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4 text-center">ابحث عن عقار</h2>
        <p class="text-center mb-4">نساعدك علي إيجاد منزل أحلامك</p>
        <div class="mb-4">
            <input type="text" placeholder="ابحث عن عقار..." class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <select class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <option value="">نوع العقار</option>
                <option value="شقة">شقة</option>
                <option value="فيلا">فيلا</option>
                <option value="روف">روف</option>
                <option value="دور">دور</option>
                <option value="استثمار">استثمار</option>
            </select>
            <select class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <option value="">السعر</option>
                <option value="0-50000">0 - 50,000 ريال</option>
                <option value="50000-100000">50,000 - 100,000 ريال</option>
                <option value="100000-200000">100,000 - 200,000 ريال</option>
            </select>
            <select class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <option value="">عدد الغرف</option>
                <option value="1">1 غرفة</option>
                <option value="2">2 غرف</option>
                <option value="3">3 غرف</option>
                <option value="4">4 غرف</option>
            </select>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-4">
            <button class="bg-primary text-white px-4 py-2 rounded-lg flex items-center justify-center hover:bg-opacity-90 transition duration-300">
                <i class="fas fa-home mr-2 text-primary mr-4 ml-4"></i> <span class="ml-2 ">شقة</span>
            </button>
            <button class="bg-primary text-white px-4 py-2 rounded-lg flex items-center justify-center hover:bg-opacity-90 transition duration-300">
                <i class="fas fa-warehouse mr-2 text-primary mr-4 ml-4"></i> <span class="ml-2">فيلا</span>
            </button>
            <button class="bg-primary text-white px-4 py-2 rounded-lg flex items-center justify-center hover:bg-opacity-90 transition duration-300">
                <i class="fas fa-building mr-2 text-primary mr-4 ml-4"></i> <span class="ml-2">روف</span>
            </button>
            <button class="bg-primary text-white px-4 py-2 rounded-lg flex items-center justify-center hover:bg-opacity-90 transition duration-300">
                <i class="fas fa-layer-group mr-2 text-primary mr-4 ml-4"></i> <span class="ml-2">دور</span>
            </button>
            <button class="bg-primary text-white px-4 py-2 rounded-lg flex items-center justify-center hover:bg-opacity-90 transition duration-300">
                <i class="fas fa-business-time mr-2 text-primary mr-4 ml-4"></i> <span class="ml-2">استثمار</span>
            </button>
            <button class="bg-primary text-white px-4 py-2 rounded-lg flex items-center justify-center hover:bg-opacity-90 transition duration-300">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</header>

</section>

<br>
<br><br>


<section class="relative z-0 mb-12 pt-16 mb-4">
    <div class="m-8"> <!-- تغيير الهامش هنا ليكون متساوي من جميع الجهات -->
        <h2 class="text-2xl font-bold text-center ">قيمنا</h2>
        <div class="flex justify-center items-center gap-4 m-4"> <!-- استخدام gap بدلاً من space-x -->

            <div class="border max-w-sm bg-primary rounded-lg shadow-white-all p-4 text-center"> <!-- إزالة الهوامش هنا -->
                <div class="flex justify-center">
                    <i class="fas fa-award text-4xl text-white-500"></i>
                </div>
                <div class="mt-2">
                    <h3 class="text-lg font-semibold">التزام</h3>
                </div>
            </div>

            <div class="max-w-sm bg-primary rounded-lg shadow-white-all p-4 text-center"> <!-- إزالة الهوامش هنا -->
                <div class="flex justify-center">
                    <i class="fas fa-lightbulb text-4xl text-white-500"></i>
                </div>
                <div class="mt-2">
                    <h3 class="text-lg font-semibold">إبداع</h3>
                </div>
            </div>

            <div class="max-w-sm bg-primary rounded-lg shadow-white-all p-4 text-center"> <!-- إزالة الهوامش هنا -->
                <div class="flex justify-center">
                    <i class="fas fa-headset text-4xl text-white-500"></i>
                </div>
                <div class="mt-2">
                    <h3 class="text-lg font-semibold">خدمة العملاء</h3>
                </div>
            </div>

            <div class="max-w-sm bg-primary rounded-lg shadow-white-all p-4 text-center"> <!-- إزالة الهوامش هنا -->
                <div class="flex justify-center">
                    <i class="fas fa-users text-4xl text-white-500"></i>
                </div>
                <div class="mt-2">
                    <h3 class="text-lg font-semibold">التعاون</h3>
                </div>
            </div>

        </div>
    </div>
</section>


{{--    <section class="mb-12">--}}
{{--        <header id="header" class="relative w-full h-screen mb-32">--}}
{{--            <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay muted loop>--}}
{{--                <source src="{{ asset('images/4.mp4') }}" type="video/mp4">--}}
{{--                Your browser does not support the video tag.--}}
{{--            </video>--}}

{{--            <div class="absolute bottom-12 right-0 p-4 md:p-8 max-w-3xl">--}}
{{--                <div class="text-right text-white">--}}
{{--                    <h1 class="text-2xl md:text-4xl font-bold mb-4">ايزي هوم حيث الحلول العقارية المبتكرة</h1>--}}
{{--                    <p class="text-lg md:text-2xl">اكتشف أفضل العقارات بأفضل الأسعار</p>--}}
{{--                </div>--}}
{{--                <div class="absolute top-3/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md bg-white p-6 rounded-lg shadow-lg ">--}}
{{--                </div>--}}
{{--                <h2 class="text-xl md:text-2xl font-bold mb-4 text-center">ابحث عن عقار</h2>--}}
{{--                <p class="text-center mb-4">نساعدك علي إيجاد منزل أحلامك</p>--}}
{{--                <div class="mb-4">--}}
{{--                    <input type="text" placeholder="ابحث عن عقار..." class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">--}}
{{--                </div>--}}
{{--                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">--}}
{{--                    <select class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">--}}
{{--                        <option value="">نوع العقار</option>--}}
{{--                        <option value="شقة">شقة</option>--}}
{{--                        <option value="فيلا">فيلا</option>--}}
{{--                        <option value="روف">روف</option>--}}
{{--                        <option value="دور">دور</option>--}}
{{--                        <option value="استثمار">استثمار</option>--}}
{{--                    </select>--}}
{{--                    <select class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">--}}
{{--                        <option value="">السعر</option>--}}
{{--                        <option value="0-50000">0 - 50,000 ريال</option>--}}
{{--                        <option value="50000-100000">50,000 - 100,000 ريال</option>--}}
{{--                        <option value="100000-200000">100,000 - 200,000 ريال</option>--}}
{{--                    </select>--}}
{{--                    <select class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">--}}
{{--                        <option value="">عدد الغرف</option>--}}
{{--                        <option value="1">1 غرفة</option>--}}
{{--                        <option value="2">2 غرف</option>--}}
{{--                        <option value="3">3 غرف</option>--}}
{{--                        <option value="4">4 غرف</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">--}}
{{--                    <button class="bg-primary text-white px-4 py-2 rounded-lg flex items-center justify-center hover:bg-opacity-90 transition duration-300">--}}
{{--                        <i class="fas fa-home mr-2 text-primary mr-4 ml-4"></i> <span class="ml-2 ">شقة</span>--}}
{{--                    </button>--}}
{{--                    <button class="bg-primary text-white px-4 py-2 rounded-lg flex items-center justify-center hover:bg-opacity-90 transition duration-300">--}}
{{--                        <i class="fas fa-warehouse mr-2 text-primary mr-4 ml-4"></i> <span class="ml-2">فيلا</span>--}}
{{--                    </button>--}}
{{--                    <button class="bg-primary text-white px-4 py-2 rounded-lg flex items-center justify-center hover:bg-opacity-90 transition duration-300">--}}
{{--                        <i class="fas fa-building mr-2 text-primary mr-4 ml-4"></i> <span class="ml-2">روف</span>--}}
{{--                    </button>--}}
{{--                    <button class="bg-primary text-white px-4 py-2 rounded-lg flex items-center justify-center hover:bg-opacity-90 transition duration-300">--}}
{{--                        <i class="fas fa-layer-group mr-2 text-primary mr-4 ml-4"></i> <span class="ml-2">دور</span>--}}
{{--                    </button>--}}
{{--                    <button class="bg-primary text-white px-4 py-2 rounded-lg flex items-center justify-center hover:bg-opacity-90 transition duration-300">--}}
{{--                        <i class="fas fa-business-time mr-2 text-primary mr-4 ml-4"></i> <span class="ml-2">استثمار</span>--}}
{{--                    </button>--}}
{{--                    <button class="bg-primary text-white px-4 py-2 rounded-lg flex items-center justify-center hover:bg-opacity-90 transition duration-300">--}}
{{--                        <i class="fas fa-search"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </header>--}}
{{--    </section>--}}

{{--    <section class="relative z-0 mb-12 pt-16">--}}
{{--        <div class="container mx-auto px-4">--}}
{{--            <h2 class="text-2xl font-bold text-center mb-8">قيمنا</h2>--}}
{{--            <div class="flex flex-wrap justify-center items-center gap-4">--}}
{{--                <div class="border bg-primary rounded-lg shadow-lg p-4 text-center max-w-sm">--}}
{{--                    <div class="flex justify-center">--}}
{{--                        <i class="fas fa-award text-4xl text-white-500"></i>--}}
{{--                    </div>--}}
{{--                    <div class="mt-2">--}}
{{--                        <h3 class="text-lg font-semibold">التزام</h3>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="border bg-primary rounded-lg shadow-lg p-4 text-center max-w-sm">--}}
{{--                    <div class="flex justify-center">--}}
{{--                        <i class="fas fa-lightbulb text-4xl text-white-500"></i>--}}
{{--                    </div>--}}
{{--                    <div class="mt-2">--}}
{{--                        <h3 class="text-lg font-semibold">إبداع</h3>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="border bg-primary rounded-lg shadow-lg p-4 text-center max-w-sm">--}}
{{--                    <div class="flex justify-center">--}}
{{--                        <i class="fas fa-headset text-4xl text-white-500"></i>--}}
{{--                    </div>--}}
{{--                    <div class="mt-2">--}}
{{--                        <h3 class="text-lg font-semibold">خدمة العملاء</h3>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="border bg-primary rounded-lg shadow-lg p-4 text-center max-w-sm">--}}
{{--                    <div class="flex justify-center">--}}
{{--                        <i class="fas fa-users text-4xl text-white-500"></i>--}}
{{--                    </div>--}}
{{--                    <div class="mt-2">--}}
{{--                        <h3 class="text-lg font-semibold">التعاون</h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <section class="mt-8 px-4">
    <h2 class="text-2xl font-bold mb-4 text-center">عقارات مميزة</h2>
    <div class="max-w-screen-xl mx-auto grid grid-cols-1 sm:grid-cols-3 gap-8">
        @foreach($products as $product)
            <div class="relative group overflow-hidden rounded-lg shadow-lg">

                <img src="{{ url('/storage/app/public/' . $product->image) }}" alt="Property Image" class="w-full h-full object-cover rounded-t-lg">
                <div class="absolute top-4 right-4">
                    <div class="relative">
                        <i class="far fa-heart text-white text-2xl rounded-full"></i>
                        <div class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 bg-primary text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold">
                            {{ $product->likes_count ?? 0 }} <!-- عدد الإعجابات (يمكن أن تكون صفر إذا لم يتم تقديمها) -->
                        </div>
                    </div>
                </div>
                <div class="absolute top-4 left-4">
                    <div class="relative">
                        <i class="far fa-comment text-white text-2xl rounded-full"></i>
                        <div class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 bg-primary text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold">
                            {{ $product->comments_count ?? 0 }} <!-- عدد التعليقات (يمكن أن تكون صفر إذا لم يتم تقديمها) -->
                        </div>
                    </div>
                </div>
                <div class="absolute inset-x-0 bottom-0 text-white transition-all duration-300 transform translate-y-full group-hover:translate-y-0" style="background-color: rgba(0, 62, 55, 0.85);">
                    <div class="p-4">
                       <a href="{{route('single')}}"><h3 class="text-lg font-semibold">{{ $product->title }}</h3></a>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-map-marker-alt mr-2 ml-2"></i>
                            <p class="ml-2">{{ $product->location }}</p>
                        </div>
                        <div class="flex items-center mb-2">
                            <i class="fas fa-bed mr-2 ml-2"></i>
                            <p class="ml-2">{{ $product->bedrooms }} غرف </p>
                            <span class="mx-2">|</span>
                            <i class="fas fa-bath mr-2 ml-2"></i>
                            <p class="ml-2">{{ $product->bathrooms }} حمام</p>
                        </div>
                        <div class="flex items-center mb-2 ml-2">
                            <i class="fas fa-ruler-combined mr-2 ml-2"></i>
                            <p class="ml-2">{{ $product->area }}  م</p>
                            <span class="mx-2">|</span>
                            <i class="fas fa-money-bill-wave mr-2 ml-2"></i>
                            <p class="ml-2">{{ number_format($product->price) }} ريال</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>


<section class="mt-8 px-4">
    <h2 class="text-2xl font-bold mb-4 text-center">عقارات مميزة</h2>
    <div class="max-w-screen-xl mx-auto grid grid-cols-1 sm:grid-cols-3 gap-8">
        <!-- Property Card -->
        <div class="relative group overflow-hidden rounded-lg shadow-lg">
            <img src="{{ asset('images/3.png') }}" alt="Property Image" class="w-full h-full object-cover rounded-t-lg">
            <div class="absolute top-4 right-4">
                <div class="relative">
                    <i class="far fa-heart text-white text-2xl rounded-full"></i>
                    <div class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 bg-primary text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold">
                        2
                    </div>
                </div>
            </div>
            <div class="absolute top-4 left-4">
                <div class="relative">
                    <i class="far fa-comment text-white text-2xl rounded-full"></i>
                    <div class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 bg-primary text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold">
                        20
                    </div>
                </div>
            </div>
            <div class="absolute inset-x-0 bottom-0 text-white transition-all duration-300 transform translate-y-full group-hover:translate-y-0" style="background-color: rgba(0, 62, 55, 0.85);">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">عنوان العقار</h3>
                </div>
                <div class="p-4">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-map-marker-alt mr-2 ml-2"></i>
                        <p class="ml-2">موقع العقار</p>
                    </div>
                    <div class="flex items-center mb-2">
                        <i class="fas fa-bed mr-2 ml-2"></i>
                        <p class="ml-2">2 غرف نوم</p>
                        <span class="mx-2">|</span>
                        <i class="fas fa-bath mr-2 ml-2"></i>
                        <p class="ml-2">1 حمام</p>
                    </div>
                    <div class="flex items-center mb-2 ml-2">
                        <i class="fas fa-ruler-combined mr-2 ml-2"></i>
                        <p class="ml-2">100 متر مربع</p>
                        <span class="mx-2">|</span>
                        <i class="fas fa-money-bill-wave mr-2 ml-2"></i>
                        <p class="ml-2">300,000 ريال</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative group overflow-hidden rounded-lg shadow-lg">
            <img src="{{ asset('images/3.png') }}" alt="Property Image" class="w-full h-full object-cover rounded-t-lg">
            <div class="absolute top-4 right-4">
                <div class="relative">
                    <i class="far fa-heart text-white text-2xl rounded-full"></i>
                    <div class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 bg-primary text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold">
                        2
                    </div>
                </div>
            </div>
            <div class="absolute top-4 left-4">
                <div class="relative">
                    <i class="far fa-comment text-white text-2xl rounded-full"></i>
                    <div class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 bg-primary text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold">
                        20
                    </div>
                </div>
            </div>
            <div class="absolute inset-x-0 bottom-0 text-white transition-all duration-300 transform translate-y-full group-hover:translate-y-0" style="background-color: rgba(0, 62, 55, 0.85);">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">عنوان العقار</h3>
                </div>
                <div class="p-4">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-map-marker-alt mr-2 ml-2"></i>
                        <p class="ml-2">موقع العقار</p>
                    </div>
                    <div class="flex items-center mb-2">
                        <i class="fas fa-bed mr-2 ml-2"></i>
                        <p class="ml-2">2 غرف نوم</p>
                        <span class="mx-2">|</span>
                        <i class="fas fa-bath mr-2 ml-2"></i>
                        <p class="ml-2">1 حمام</p>
                    </div>
                    <div class="flex items-center mb-2 ml-2">
                        <i class="fas fa-ruler-combined mr-2 ml-2"></i>
                        <p class="ml-2">100 متر مربع</p>
                        <span class="mx-2">|</span>
                        <i class="fas fa-money-bill-wave mr-2 ml-2"></i>
                        <p class="ml-2">300,000 ريال</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative group overflow-hidden rounded-lg shadow-lg">
            <img src="{{ asset('images/3.png') }}" alt="Property Image" class="w-full h-full object-cover rounded-t-lg">
            <div class="absolute top-4 right-4">
                <div class="relative">
                    <i class="far fa-heart text-white text-2xl rounded-full"></i>
                    <div class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 bg-primary text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold">
                        2
                    </div>
                </div>
            </div>
            <div class="absolute top-4 left-4">
                <div class="relative">
                    <i class="far fa-comment text-white text-2xl rounded-full"></i>
                    <div class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 bg-primary text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold">
                        20
                    </div>
                </div>
            </div>
            <div class="absolute inset-x-0 bottom-0 text-white transition-all duration-300 transform translate-y-full group-hover:translate-y-0" style="background-color: rgba(0, 62, 55, 0.85);">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">عنوان العقار</h3>
                </div>
                <div class="p-4">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-map-marker-alt mr-2 ml-2"></i>
                        <p class="ml-2">موقع العقار</p>
                    </div>
                    <div class="flex items-center mb-2">
                        <i class="fas fa-bed mr-2 ml-2"></i>
                        <p class="ml-2">2 غرف نوم</p>
                        <span class="mx-2">|</span>
                        <i class="fas fa-bath mr-2 ml-2"></i>
                        <p class="ml-2">1 حمام</p>
                    </div>
                    <div class="flex items-center mb-2 ml-2">
                        <i class="fas fa-ruler-combined mr-2 ml-2"></i>
                        <p class="ml-2">100 متر مربع</p>
                        <span class="mx-2">|</span>
                        <i class="fas fa-money-bill-wave mr-2 ml-2"></i>
                        <p class="ml-2">300,000 ريال</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat for other properties -->
    </div>
</section>


<br>
<br>
<br>

<section class="mt-8 flex ">
    <button class="relative bg-primary font-bold py-4 px-8 rounded hover:bg-opacity-90 duration-300">
        <span class="ml-12 text-white ">عرض المزيد</span>
        <i class="fas fa-arrow-left absolute left-0 transform -translate-x-1/2 text-gold text-4xl  "></i>
    </button>
</section>


<br>
<br>
<br>
<section id="section" class="relative w-full bg-primary">
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96 bg-gray-100 flex items-center bg-primary">
        <div class="bg-primary w-1/2 h-full bg-cover bg-center" style="background-image: url('{{ asset('images/5.png') }}');"></div>
        <div class="bg-primary w-1/2 h-full flex flex-col justify-center items-start p-8 bg-gray-800 text-white">
            <a href="#about" class="px-6 py-3 bg-primary text-white font-bold rounded hover:bg-blue-600 transition duration-200 mb-4 text-2xl underline decoration-solid">رؤيتنـــــا</a>
            <h1 class="text-2xl mb-4 text-white">أن نصبح الشركة الرائدة في قطاع العقارات من خلال تقديم أعلى مستويات الخدمة لعملائنا وتحقيق أقصى قيمة مضافة لهم.</h1>
            <p class="text-lg mb-8">اكتشف أفضل العقارات بأفضل الأسعار</p>
        </div>
    </div>
</section>

<br>
<br>
<br>
<section class="bg-white py-12 px-4 md:px-12">
    <div class="max-w-screen-xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <div>
            <h2 class="text-3xl font-bold mb-6">استثمارك في العقارات يبدأ من هنا</h2>
            <ul class="space-y-6 text-lg">
                <li class="flex items-center space-x-4 rtl:space-x-reverse">
                    <span class="bg-primary text-white p-3 rounded-full mr-4 ml-4">
                        <i class="fas fa-chart-line text-2xl"></i>
                    </span>
                    <span class="text-xl">خطط استثمارية مبتكرة لتحقيق أعلى عائد.</span>
                </li>
                <li class="flex items-center space-x-4 rtl:space-x-reverse">
                    <span class="bg-primary text-white p-3 rounded-full mr-4 ml-4">
                        <i class="fas fa-city text-2xl "></i>
                    </span>
                    <span class="text-xl">مواقع استراتيجية في أهم المدن.</span>
                </li>
                <li class="flex items-center space-x-4 rtl:space-x-reverse">
                    <span class="bg-primary text-white p-3 rounded-full mr-4 ml-4">
                        <i class="fas fa-shield-alt text-2xl"></i>
                    </span>
                    <span class="text-xl">أمان وضمان لعقاراتك المستقبلية.</span>
                </li>
            </ul>
        </div>
        <div>
            <img src="{{ asset('images/44.png') }}" alt="Real Estate" class="rounded-lg shadow-lg">
        </div>
    </div>
</section>



<style>
    .group:hover .translate-y-full {
        transform: translateY(0);
    }
    .translate-y-full {
        transform: translateY(calc(100% - 4rem)); /* يظهر جزء صغير فقط لعنوان العقار */
    }

 </style>



<!-- تأكد من تضمين مكتبة Font Awesome -->





<br>
            </div>
        </div>
     <!-- Footer -->
     <footer class="bg-gray-900 text-white py-8 bg-primary">
    <div class="max-w-screen-xl mx-auto px-4 md:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
            <h3 class="text-lg font-bold mb-4">معلومات عنا</h3>
            <p class="text-gray-400">نحن شركة عقارية رائدة تقدم أفضل الخدمات والحلول لعملائنا لتحقيق أهدافهم الاستثمارية.</p>
        </div>
        <div>
            <h3 class="text-lg font-bold mb-4">روابط سريعة</h3>
            <ul class="space-y-2">
                <li><a href="#" class="text-gray-400 hover:text-white">الرئيسية</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white">العقارات</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white">من نحن</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white">اطلب عقارك</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white">طلب استثمار</a></li>
                <li><a href="{{route('login')}}" class="text-gray-400 hover:text-white">التسجيل/تسجيل الدخول</a></li>
            </ul>
        </div>
        <div>
            <h3 class="text-lg font-bold mb-4">تواصل معنا</h3>
            <ul class="space-y-2">
                <li class="flex items-center space-x-2 rtl:space-x-reverse">
                    <i class="fas fa-phone-alt text-primary ml-4"></i>
                    <span class="text-gray-400 ml-4">+966 1234 5678</span>
                </li>
                <li class="flex items-center space-x-2 rtl:space-x-reverse">
                    <i class="fas fa-envelope text-primary ml-4"></i>
                    <span class="text-gray-400">info@example.com</span>
                </li>
                <li class="flex items-center space-x-2 rtl:space-x-reverse">
                    <i class="fas fa-map-marker-alt text-primary ml-4"></i>
                    <span class="text-gray-400">1234 شارع الملك، جدة</span>
                </li>
            </ul>
        </div>
        <div>
            <h3 class="text-lg font-bold mb-4">تابعنا</h3>
            <ul class="flex space-x-4 rtl:space-x-reverse">
                <li><a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter mr-4"></i></a></li>
                <li><a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="mt-8 border-t border-gray-700 pt-4 text-center text-gray-500">
        <p>&copy; 2024 جميع الحقوق محفوظة. شركة puzzle.</p>
    </div>
</footer>


    </div>

</body>

</html>
