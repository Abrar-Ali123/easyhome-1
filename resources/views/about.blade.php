@extends('home') <!-- تأكد من استخدام ملف التخطيط الرئيسي -->

@section('content')
<section class="flat-about">
    <div class="container">
        <div class="row">
            <!-- القسم النصي -->
            <div class="col-lg-7 col-md-7">
                <div class="heading-about">
                    <h2>نحن نحقق أحلام السكن المثالي</h2>
                    <h4>مرحبًا بكم في إيزي هوم العقارية، شريككم الموثوق لتحقيق أحلامكم السكنية والاستثمارية.</h4>
                    <p class="text-1 text-color-2">
                        في إيزي هوم العقارية، نقدم خدمات متكاملة في مجال العقارات، تشمل بيع وشراء العقارات السكنية والتجارية،
                        إدارة الممتلكات، والاستشارات العقارية. هدفنا هو تلبية احتياجاتكم بجودة واحترافية عالية.
                    </p>
                    <div class="text-box">
                        <p class="font-2 fw-5 font-italic text-color-2">
                            "لأن منزلك ليس مجرد مكان للسكن، بل هو استثمار في مستقبلك وحياتك."
                        </p>
                    </div>
                    <div class="author-box">
                        <h3>إيزي هوم العقارية</h3>
                        <p>الجهة الرائدة في السوق العقاري</p>

                        <img src="{{ asset('/images/9.png') }}" class="small-image">
                    </div>
                </div>
            </div>

            <!-- القسم المرئي -->
            <div class="col-lg-5 col-md-5">
                <div class="video-box center">
                    <div class="post-video flex-five">
                        <img class="img-2" src="assets/images/img-box/about-video.jpg" alt="فيديو تعريفي">
                        <a href="https://youtu.be/MLpWrANjFbI" class="lightbox-image">
                            <svg width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 7L3.41715e-07 14L9.53674e-07 -4.80825e-07L11 7Z" fill="#FFA920" />
                            </svg>
                            <i class="ripple"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .author-box .small-image {
    width: 50px;
    height: auto;
    display: block;
    margin: 10px auto;
}

    </style>
@endsection
