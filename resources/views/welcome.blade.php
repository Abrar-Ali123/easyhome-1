@extends('home')
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



<section id="about-us" class="section-container">
    <div class="section-inner">
        <div class="section-image" style="background-image: url('{{ asset('images/5.png') }}');">
            <br><br><br><br><br><br><br>
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







<!-- تأكد من تضمين مكتبة Font Awesome -->





<br>
            </div>
        </div>



    </div>



@endsection
