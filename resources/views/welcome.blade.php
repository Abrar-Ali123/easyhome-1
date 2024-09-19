@extends('home')
@section('title', 'عرض العقارات')
@section('content')
<!-- Font Awesome CDN -->

<!-- الزر لفتح النافذة المنبثقة -->
<div class="prat">
        <video autoplay muted loop>
        <source src="{{ asset('images/4.mp4') }}" type="video/mp4">
            متصفحك لا يدعم عرض الفيديو.
        </video>
        <div class="overlay"></div>
        <div class="absolute bottom-12 right-0 p-8">
    <div class="text-right text-white">
        <h1 class="text-4xl md:text-4xl font-bold mb-4"> ايزي هوم حيث الحلول العقارية المبتكرة      </h1>
        <p class="text-xl md:text-2xl">اكتشف أفضل العقارات بأفضل الأسعار</p>
    </div>
</div>
    </div>

    <div class="values-section" id="values">
        <h2>قيمنا</h2>
        <div class="value-box">
            <i class="fas fa-balance-scale"></i>
            <p>النزاهة</p>
        </div>
        <div class="value-box">
            <i class="fas fa-lightbulb"></i>
            <p>الابتكار</p>
        </div>
        <div class="value-box">
            <i class="fas fa-gem"></i>
            <p>الجودة</p>
        </div>
        <div class="value-box">
            <i class="fas fa-handshake"></i>
            <p>الالتزام</p>
        </div>
    </div>









{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

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

<div id="loginPopup" style="display: none;">
    <!-- محتوى نافذة تسجيل الدخول -->
    <form action="/login" method="POST">
        @csrf
        <input type="email" name="email" placeholder="البريد الإلكتروني" required>
        <input type="password" name="password" placeholder="كلمة المرور" required>
        <button type="submit">تسجيل الدخول</button>
    </form>
</div>




@include('parts.search-filter') <!-- تضمين البحث والفلترة -->
    @include('parts.property-list') <!-- تضمين عرض العقارات -->





<section class="mt-8 flex ">
    <button class="relative bg-primary font-bold py-4 px-8 rounded hover:bg-opacity-90 duration-300">
        <span class="ml-12 text-white ">عرض المزيد</span>
        <i class="fas fa-arrow-left absolute left-0 transform -translate-x-1/2 text-gold text-4xl  "></i>
    </button>
</section>


<br>
<br>
<br>



<section id="section" class="section-container">
    <div class="section-inner">
    <div class="section-image" style="background-image: url('{{ asset('images/5.png') }}');">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

     <div></div>

        </div>
        <div class="section-content">
            <a href="#about" class="section-link">رؤيتنـــــا</a>
            <h1 class="section-title">أن نصبح الشركة الرائدة في قطاع العقارات من خلال تقديم أعلى مستويات الخدمة لعملائنا وتحقيق أقصى قيمة مضافة لهم.</h1>
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
                    <span class="bg-primary  p-3 rounded-full mr-4 ml-4">
                        <i class="fas fa-chart-line text-2xl"></i>
                    </span>
                    <span class="text-xl">خطط استثمارية مبتكرة لتحقيق أعلى عائد.</span>
                </li>
                <li class="flex items-center space-x-4 rtl:space-x-reverse">
                    <span class="bg-primary p-3 rounded-full mr-4 ml-4">
                        <i class="fas fa-city text-2xl "></i>
                    </span>
                    <span class="text-xl">مواقع استراتيجية في أهم المدن.</span>
                </li>
                <li class="flex items-center space-x-4 rtl:space-x-reverse">
                    <span class="bg-primary  p-3 rounded-full mr-4 ml-4">
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






<!-- تأكد من تضمين مكتبة Font Awesome -->





<br>
            </div>
        </div>



    </div>



@endsection
