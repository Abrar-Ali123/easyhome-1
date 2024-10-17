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




<section class="section-investment">
    <div class="container">
        <div class="investment-content">
            <div class="text-content">
                <h2>استثمارك في العقارات يبدأ من هنا</h2>
                <ul>
                    <li class="item">
                        <span class="icon-bg">
                            <i class="fas fa-chart-line"></i>
                        </span>
                        <span class="text">خطط استثمارية مبتكرة لتحقيق أعلى عائد.</span>
                    </li>
                    <li class="item">
                        <span class="icon-bg">
                            <i class="fas fa-city"></i>
                        </span>
                        <span class="text">مواقع استراتيجية في أهم المدن.</span>
                    </li>
                    <li class="item">
                        <span class="icon-bg">
                            <i class="fas fa-shield-alt"></i>
                        </span>
                        <span class="text">أمان وضمان لعقاراتك المستقبلية.</span>
                    </li>
                </ul>
            </div>
            <div class="image-container">
                <img src="{{ asset('images/44.png') }}" alt="Real Estate" class="image">
            </div>
        </div>
    </div>
</section>




<div class="engage-program">
    <div class="engage-header">
        <img src="{{ asset('images/44.png') }}" alt="صورة برنامج إنجاز">
        <h1 class="engage-title">برنامج إنجاز</h1>
    </div>
    <p class="engage-description">استفد من خيارات تمويل مرنة ودعم متخصص لتحقيق أهدافك بسهولة وسرعة. تعرف على المزيد عن البرنامج الآن!</p>
    <a href="{{ route('request.product.form') }}" class="details-button">اكتشف المزيد</a>

</div>
<br>
<br>
<br>
<style>
:root {
    --primary-color: #fff;
    --primary-color-dark: #091716;
    --highlight-color: #fff6e0;
    --secondary-color: #003e37;
    --accent-color: #bb9339;
    --matching-green: rgba(210, 245, 220, 0.7); /* درجة الأخضر الفاتح المتناسقة */
}

body {
    font-family: 'Amiri', serif;
    background-color: var(--primary-color);
    color: var(--secondary-color);
    transition: background-color 0.3s, color 0.3s;
}

body.dark-theme {
    background-color: var(--primary-color-dark);
    color: var(--highlight-color);
}

/* قسم العلامات التجارية */
.brand-section {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 20px;
    background-color: var(--primary-color);
    border-radius: 8px;
}

/* العناصر داخل قسم العلامات التجارية */
.brand-section .brand-item {
    flex: 1 1 calc(25% - 20px);
    max-width: calc(10% - 20px);
    text-align: center;
    padding: 15px;
    background-color: var(--matching-green); /* الخلفية بلون الأخضر الفاتح */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

/* تخصيص المزيد من التنسيق للصور */
.brand-section .brand-item img {
    width: 100px;
    height: auto;
    object-fit: contain;
    margin-bottom: 10px;
}

/* تأثير الخلفية في الوضع الداكن */
body.dark-theme .brand-section .brand-item {
    background-color: rgba(34, 139, 34, 0.3); /* درجة أغمق للأخضر في الوضع الداكن */
    color: var(--highlight-color);
}
</style>


<style>
.title {
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Tajawal', sans-serif;
    font-size: 1.5rem;
    font-weight: bold;
    color: var(--secondary-color);
    margin: 20px 0;
}

.title:before,
.title:after {
    content: "";
    flex: 1;
    border-top: 1px solid var(--secondary-color);
    margin: 0 15px;
}

body.dark-theme .title {
    color: var(--highlight-color);
}

body.dark-theme .title:before,
body.dark-theme .title:after {
    border-top-color: var(--highlight-color);
}
</style>

<div class="title">شركاؤنا</div>

<section class="brand-section">
    <div class="brand-item">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaTuKGUsLIUueHg63S0KjgMzEJK-x2QhfQtA&s" alt="Logo 1">
    </div>
    <div class="brand-item">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSl2PS5UJs4iC3od99LjgxS3xGGqWuy7AUSQ&s" alt="Logo 2">
    </div>
    <div class="brand-item">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRh9pK5bARj_q5nbl1xg4HZjt-uFcZ6adMOUQ&s" alt="Logo 3">
    </div>
    <div class="brand-item">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMRjesYcOXvYvgzaxxPI_qjFpxipoSoXiQfA&s" alt="Logo 4">
    </div>



    <div class="brand-item">
        <img src="https://www.wadhefa.com/logo/company/62c1a6d7b46fb.png" alt="Logo 1">
    </div>

    <div class="brand-item">
        <img src="https://pbs.twimg.com/profile_images/1445656983332216833/2pUbqSUu_400x400.jpg" alt="Logo 3">
    </div>
    <div class="brand-item">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMRjesYcOXvYvgzaxxPI_qjFpxipoSoXiQfA&s" alt="Logo 4">
    </div>
</section>

<style>
    .engage-program {
        position: relative;
        padding: 60px 30px;
        color: var(--highlight-color);
        text-align: center;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 8px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        margin: 20px auto;
        width: 95%;
    }

    .engage-program::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(rgba(0, 100, 0, 0.5), rgba(0, 100, 0, 0.5)),
                    url('https://www.emaratalyoum.com/polopoly_fs/1.1246830.1567186592!/image/image.jpg');
        background-size: cover;
        background-position: center;
        z-index: -1;
        border-radius: 8px;
    }

    .engage-header {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .engage-header img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin-bottom: 15px;
    }

    .engage-title {
        font-family: 'Pacifico', cursive;
        font-size: 2.2rem;
        color: var(--accent-color);
        margin: 0;
    }

    .engage-description {
        font-size: 1.2rem;
        margin: 20px 0;
        color: var(--secondary-color);
    }

    .details-button {
        display: inline-block;
        padding: 12px 25px;
        font-size: 1.1rem;
        background: var(--accent-color);
        color: var(--highlight-color);
        border-radius: 30px;
        text-decoration: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: background 0.3s, box-shadow 0.3s, transform 0.3s;
    }

    .details-button:hover {
        background: var(--secondary-color);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        transform: translateY(-3px);
    }
</style>





<!-- إضافة مكتبة Font Awesome للأيقونات -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">





<br>
            </div>
        </div>



    </div>



@endsection
