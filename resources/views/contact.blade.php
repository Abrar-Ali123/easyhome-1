@extends('home')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" crossorigin="anonymous">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<video autoplay muted loop id="background-video">
    <source src="{{ asset('images/9.mp4') }}" type="video/mp4">
    متصفحك لا يدعم عرض الفيديو.
</video>

<div class="page-content">
    <h2>مع ايزي هوم، تملك منزلك بكل سهولة ويسر!</h2>
    <h3>نحن هنا لنساعدك على إيجاد العقار المثالي الذي يلبي احتياجاتك وميزانيتك. سواء كنت تبحث عن شقة، فيلا، أو مكتب، <br>
    نوفر لك مجموعة واسعة من الخيارات لتختار منها. مع خدمة عملاء متميزة وفريق من المتخصصين في العقارات، تصبح رحلة شراء
    أو استئجار عقارك تجربة سهلة .</h3>

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
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
               text: 'تم إرسال رسالتك بنجاح، وسنكون على اتصال بك قريباً لتحقيق أحلامك العقارية!',
               icon: 'success',
               confirmButtonText: 'موافق',
               confirmButtonColor: '#556B2F' // كود اللون الأخضر الزيتي
           }).then((result) => {
               if (result.isConfirmed) {
                   // تفريغ النموذج بعد الموافقة
                   document.querySelector('form').reset();
               }
           });
       });
   </script>
@endif


@endsection
