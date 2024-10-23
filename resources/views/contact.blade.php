@extends('home')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" crossorigin="anonymous">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- فيديو مختلف لكل صفحة بناءً على المصدر -->
<video autoplay muted loop id="background-video">
    @if($source == 'page1')
    <source src="{{ asset('images/4.mp4') }}" type="video/mp4">

     @elseif($source == 'page2')

     <source src="{{ asset('images/4.mp4') }}" type="video/mp4">
     <div class="injaz-section">
    <h2>برنامج إنجاز</h2>
    <div class="features">
        <div class="feature-item">
            <p>إنجاز جميع الإجراءات في البنوك في أقل وقت.</p>
        </div>
        <div class="feature-item">
            <p>حلول في الدفعة الأولى.</p>
        </div>
        <div class="feature-item">
            <p>توحيد الأقساط في قسط واحد.</p>
        </div>
        <div class="feature-item">
            <p>الاستفادة بأقل ربح وأعلى مبلغ تمويل.</p>
        </div>
        <div class="feature-item">
            <p>إمكانية وسرعة تحويل الراتب إلى بنك آخر.</p>
        </div>
        <div class="feature-item">
            <p>إمكانية التضامن والاستفادة من دعم سكني.</p>
        </div>
        <div class="feature-item">
            <p>التعامل مع جميع القطاعات الحكومية والقطاع الخاص المعتمد وغير المعتمد.</p>
        </div>
    </div>
</div>

     @endif
    متصفحك لا يدعم عرض الفيديو.
</video>

<div class="page-content">
    @if($source == 'page1')
        <h2>مع ايزي هوم، تملك منزلك بكل سهولة ويسر!</h2>
        <h3>نحن هنا لنساعدك على إيجاد العقار المثالي الذي يلبي احتياجاتك وميزانيتك. سواء كنت تبحث عن شقة، فيلا، أو مكتب، نوفر لك مجموعة واسعة من الخيارات لتختار منها. مع خدمة عملاء متميزة وفريق من المتخصصين في العقارات، تصبح رحلة شراء أو استئجار عقارك تجربة سهلة.</h3>
    @elseif($source == 'page2')
        <h2>برنامج إنجاز للتمويل العقاري</h2>
        <h3>حقق أحلامك العقارية من خلال حلول التمويل المتنوعة. مع برنامج إنجاز، نساعدك في الحصول على التمويل المناسب للعقار الذي تحلم به
            . نقدم لك خطط تمويلية مرنة تناسب احتياجاتك المختلفة.</h3>

            <style>
:root {
    --primary-color: #fff;
    --primary-color-dark: #091716;
    --highlight-color: #fff6e0;
    --secondary-color: #003e37;
    --accent-color: #bb9339;
    --matching-green: rgba(210, 245, 220, 0.7);
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

.brand-section {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 20px;
     border-radius: 8px;
}

.brand-section .brand-item {
    display: flex;
    align-items: center;
    gap: 10px; /* المسافة بين الأيقونة والنص */
    flex: 1 1 45%; /* عرض العنصر ليكون 45% من العرض الكلي */
    max-width: 45%;
    padding: 15px;
    background-color: var(--matching-green);
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.brand-item i {
    color: #28a745;
    font-size: 2.5rem; /* حجم الأيقونة */
}

.brand-item p {
    font-size: 16px;
    margin: 0;
    font-weight: 500;
    color: var(--secondary-color);
    text-align: start; /* محاذاة النص إلى اليسار */
}

/* تأثير الخلفية في الوضع الداكن */
body.dark-theme .brand-section .brand-item {
    background-color: rgba(34, 139, 34, 0.3); /* درجة أغمق للأخضر في الوضع الداكن */
    color: var(--highlight-color);
}



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

<div class="title">مميزات برنامج انجاز </div>

<section class="brand-section">
    <div class="brand-item">
        <i class="fas fa-check-circle"></i>
        <p>إنجاز جميع الإجراءات في البنوك في أقل وقت.</p>
    </div>
    <div class="brand-item">
        <i class="fas fa-hand-holding-usd"></i>
        <p>حلول في الدفعة الأولى.</p>
    </div>
    <div class="brand-item">
        <i class="fas fa-calculator"></i>
        <p>توحيد الأقساط في قسط واحد.</p>
    </div>
    <div class="brand-item">
        <i class="fas fa-chart-line"></i>
        <p>الاستفادة بأقل ربح وأعلى مبلغ تمويل.</p>
    </div>
    <div class="brand-item">
        <i class="fas fa-exchange-alt"></i>
        <p>إمكانية وسرعة تحويل الراتب إلى بنك آخر.</p>
    </div>
    <div class="brand-item">
        <i class="fas fa-home"></i>
        <p>إمكانية التضامن والاستفادة من دعم سكني.</p>
    </div>
    <div class="brand-item">
        <i class="fas fa-building"></i>
        <p>التعامل مع جميع القطاعات الحكومية والقطاع الخاص المعتمد وغير المعتمد.</p>
    </div>
</section>

    @endif
    <form action="{{ route('contacts.store') }}" method="POST">
    @csrf
    <input type="hidden" name="source" value="{{ $source }}"> <!-- لتحديد مصدر الصفحة -->

    <div>
        <label for="name">الاسم:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="phone">رقم الهاتف:</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
        @error('phone')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="message">الرسالة:</label>
        <textarea name="message" id="message">{{ old('message') }}</textarea>
        @error('message')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit">إرسال</button>
</form>

</div>

@if (session('success'))
   <script>
       document.addEventListener('DOMContentLoaded', function() {
           Swal.fire({
               title: 'شكراً لتواصلك معنا!',
               text: 'تم إرسال رسالتك بنجاح، وسنكون على اتصال بك قريباً.',
               icon: 'success',
               confirmButtonText: 'موافق',
               confirmButtonColor: '#556B2F'
           }).then((result) => {
               if (result.isConfirmed) {
                   document.querySelector('form').reset();
               }
           });
       });
   </script>


@endif

@endsection
