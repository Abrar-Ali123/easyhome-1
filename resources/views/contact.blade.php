@extends('home')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<video autoplay muted loop id="background-video">
    <source src="{{ asset('images/4.mp4') }}" type="video/mp4">
    متصفحك لا يدعم عرض الفيديو.
</video>

<div class="page-content">
    @if($source == 'page1')
        <section class="contact-section">
            <div class="text-center">
                <h2>تواصل معنا</h2>
                <p>نحن هنا لمساعدتك! لا تتردد في التواصل معنا لأي استفسارات أو ملاحظات.</p>
            </div>
        </section>

    @elseif($source == 'page2')
        <section class="etmam-section">
            <div class="text-center mb-4">
                <h2 class="etmam-title">مزايا برنامج إنجاز</h2>
                <p class="etmam-subtitle">لضمان راحتك وراحة عائلتك، بينك وبين بيتك خطوة</p>
            </div>

            <div class="feature-grid">
                <div class="feature-item">
                    <i class="fas fa-check-circle"></i>
                    <p>إنجاز جميع الإجراءات في البنوك في أقل وقت.</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-hand-holding-usd"></i>
                    <p>حلول في الدفعة الأولى.</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-calculator"></i>
                    <p>توحيد الأقساط في قسط واحد.</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-chart-line"></i>
                    <p>الاستفادة بأقل ربح وأعلى مبلغ تمويل.</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-exchange-alt"></i>
                    <p>إمكانية وسرعة تحويل الراتب إلى بنك آخر.</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-home"></i>
                    <p> التضامن والاستفادة من دعم سكني.</p>
                </div>
            </div>
        </section>
    @endif

    <form action="{{ route('contacts.store') }}" method="POST">
    @csrf
    <input type="hidden" name="source" value="{{ $source }}">
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
</div>

<style>
body {
    font-family: 'Tajawal', sans-serif;
}

#background-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 130%;
    z-index: -1;
    opacity: 0.7;
    object-fit: cover;
}

@media (max-width: 768px) {
    #background-video {
        height: 90%;
    }
}

.etmam-section {
    padding: 80px 0;
    text-align: center;
}

.etmam-title {
    font-size: 30px;
    font-weight: bold;
    color: #fff;
}

.etmam-subtitle {
    font-size: 16px;
    color: #fff;
    margin-bottom: 40px;
}

.feature-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin: 0 20px;
}

.feature-item {
    background-color: white;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.feature-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

.feature-item i {
    font-size: 25px;
    color: #bb9339;
    margin-left: 3%;
}

.feature-item p {
    font-size: 14px;
    font-weight: 600;
    margin-top: 15px;
    color: var(--secondary-color);
}

body.dark-theme .feature-item {
    background-color: rgba(34, 139, 34, 0.3);
}

body.dark-theme .feature-item i {
    color: var(--accent-color);
}

body.dark-theme .feature-item p {
    color: var(--highlight-color);
}

@media (max-width: 768px) {
    .feature-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .feature-item {
        padding: 10px;
    }

    .etmam-title {
        font-size: 24px;
    }

    .etmam-subtitle {
        font-size: 14px;
    }

    .feature-item i {
        font-size: 22px;
        margin-left: 3%;
    }

    .feature-item p {
        font-size: 12px;
        margin-top: 10px;
    }
}
</style>
@endsection
