@extends('home')
@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="relative h-screen overflow-hidden">
    <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover opacity-70 transition-transform duration-500 hover:scale-105">
        <source src="{{ asset('images/4.mp4') }}" type="video/mp4">
        متصفحك لا يدعم عرض الفيديو.
    </video>
    <div class="overlay absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80"></div>
    <div class="absolute bottom-12 right-0 p-8 text-right text-white z-10 text-container">
        <h1 class="text-4xl md:text-5xl font-bold animate-fade-in">{{ $product->title }}</h1>
        <p class="text-lg md:text-xl mt-2">{{ $product->description }}</p>
    </div>
</div>



<div class="values-section py-12 bg-gray-100" id="values">
    <h2 class="text-4xl font-bold text-center mb-12 text-primary animate-fade-in-up">مميزات </h2>
    <div class="features grid grid-cols-2 sm:grid-cols-4 gap-8 px-4 max-w-5xl mx-auto">
        @foreach ($product->features as $feature)
            <div class="value-box bg-white p-6 rounded-xl shadow-md text-center transition-transform duration-300 hover:scale-105 hover:shadow-lg">
                <i class="{{ $product->getFeatureIcon($feature) }} text-4xl text-primary mb-4"></i>
                <p class="text-lg font-semibold text-gray-700">{{ trim($feature) }}</p>
            </div>
        @endforeach
    </div>
</div>
<div class="product-info-container mx-auto mt-8 p-6 rounded-lg shadow-md bg-white">

<div class="container_1 mt-16 px-4">

    <div class="text-center text-2xl font-bold text-green-600 mb-6">{{ number_format($product->price) }} ريال</div>

    <!-- قسم الصور -->
    <section class="property-main mt-10 flex justify-center">
        <img src="{{ url('/storage/app/public/' . $product->image) }}" alt="صورة العقار الرئيسية" class="w-full sm:w-3/4 lg:w-1/2 rounded-lg shadow-lg transition-transform duration-500 hover:scale-105">
    </section>

    <section class="property-gallery mt-8 flex flex-wrap justify-center gap-4">
    @if($product->images)
        @foreach(json_decode($product->images, true) as $image)
            <a href="{{ url('/storage/app/public/' . $image) }}" class="glightbox" data-gallery="gallery">
                <img src="{{ url('/storage/app/public/' . $image) }}" alt="صورة العقار" class="w-24 h-24 sm:w-32 sm:h-32 object-cover rounded-md shadow-md transition-transform duration-300 hover:scale-105">
            </a>
        @endforeach
    @else
        <p class="text-center">لا توجد صور مرفوعة.</p>
    @endif
</section>


    <div class="section-title mt-12 text-3xl font-semibold text-primary flex items-center justify-center">
        <i class="fas fa-info-circle mr-2"></i> تفاصيل
    </div>




    <!-- باقي التفاصيل بتصميم الشبكة -->
    <div class="details-grid grid grid-cols-2 sm:grid-cols-3 gap-6 mt-8 max-w-5xl mx-auto">
        @if ($product->city)
            <div class="list-group-item flex items-center p-4 bg-white rounded-lg shadow-md">
                <i class="fas fa-city text-primary text-2xl mr-4"></i>
                <span><strong>المدينة:</strong> {{ $product->city->name }}</span>
            </div>
        @endif
        @if ($product->neighborhood)
            <div class="list-group-item flex items-center p-4 bg-white rounded-lg shadow-md">
                <i class="fas fa-building text-primary text-2xl mr-4"></i>
                <span><strong>الحي:</strong> {{ $product->neighborhood->name }}</span>
            </div>
        @endif
        <div class="list-group-item flex items-center p-4 bg-white rounded-lg shadow-md">
            <i class="fas fa-bed text-primary text-2xl mr-4"></i>
            <span><strong>عدد الغرف:</strong> {{ $product->bedrooms }}</span>
        </div>
        <div class="list-group-item flex items-center p-4 bg-white rounded-lg shadow-md">
            <i class="fas fa-bath text-primary text-2xl mr-4"></i>
            <span><strong>عدد الحمامات:</strong> {{ $product->bathrooms }}</span>
        </div>
        <div class="list-group-item flex items-center p-4 bg-white rounded-lg shadow-md">
            <i class="fas fa-ruler-combined text-primary text-2xl mr-4"></i>
            <span><strong>المساحة:</strong> {{ $product->area }} متر مربع</span>
        </div>
        <div class="list-group-item flex items-center p-4 bg-white rounded-lg shadow-md">
            <i class="fas fa-tag text-primary text-2xl mr-4"></i>
            <span><strong>الفئة:</strong> {{ $product->category }}</span>
        </div>

    </div>

    <!-- قسم الفيديو -->
    @php
        $videoUrl = $product->video;
        $videoId = substr($videoUrl, strrpos($videoUrl, '/') + 1);
    @endphp

    <div class="video-container mt-12 flex justify-center">
    <iframe class="rounded-lg shadow-md fit-video"
            src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&mute=1"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
    </iframe>
</div>

 <style>
 .video-container {
    position: relative;
    width: 100%;
    max-width: 800px;
    aspect-ratio: 16/9; /* لضبط نسبة العرض إلى الارتفاع */
    overflow: hidden;
}

.video-container iframe {
    width: 100%;
    height: 100%;
    object-fit: cover; /* تغطية الإطار بالكامل */
    transform: scale(2.1); /* تكبير الفيديو قليلاً لتغطية المساحات السوداء */
}



.product-info-container {
    max-width: 90%; /* العرض النسبي لجعل الديف متجاوبًا */
    background-color: #ffffff; /* خلفية بيضاء */
    border-radius: 12px; /* زوايا مستديرة */
    padding: 20px; /* حشوة داخلية */
    margin-bottom: 20px; /* هوامش سفلية */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* ظل لطيف */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* تأثير عند التفاعل */
}

.product-info-container:hover {
    transform: translateY(-5px); /* رفع العنصر عند التمرير */
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15); /* زيادة الظل */
}

@media (min-width: 768px) {
    .product-info-container {
        max-width: 80%; /* زيادة العرض قليلاً على الشاشات المتوسطة */
    }
}

@media (min-width: 1024px) {
    .product-info-container {
        max-width: 70%; /* عرض أكبر للشاشات الكبيرة */
    }
}

    </style>

</div>
<br>
<br>

<br>
<br>
<br>
<br>

<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<!-- إضافة رابط CSS لـ GLightbox -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lightbox = GLightbox({
            selector: '.glightbox',
            touchNavigation: true,
            loop: true,
            closeOnOutsideClick: true
        });
    });
</script>


 <!-- نموذج التواصل -->
 <div class="max-w-3xl mx-auto p-4 bg-white shadow-lg rounded-lg">

 <section class="contact-section">
        <div class="text-center">
            <h2>قدم طلب او استفسر </h2>
         </div>

        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf
            <input type="hidden" name="source" value="product"> <!-- تحديد أن المصدر هو المنتج -->
            <input type="hidden" name="product_id" value="{{ $product->id }}"> <!-- ID المنتج -->
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
                <textarea name="message" id="message"></textarea>
                @error('message')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit">إرسال</button>
        </form>
    </section>
</div>

</din>
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
