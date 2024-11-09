@extends('home')
@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="relative h-screen prat overflow-hidden">
    <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover opacity-70 transition-all duration-500 hover:scale-105">
        <source src="{{ asset('images/4.mp4') }}" type="video/mp4">
        متصفحك لا يدعم عرض الفيديو.
    </video>
    <div class="overlay absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80"></div>
    <div class="absolute bottom-12 right-0 p-8 text-right text-white z-10">
        <h1 class="text-4xl md:text-5xl font-bold animate-fade-in">مرحباً بك في أفضل العقارات</h1>
        <p class="text-lg md:text-xl mt-2">اكتشف تفاصيل العقار بكل سهولة وراحة</p>
    </div>
</div>

<div class="values-section py-12 bg-gray-100" id="values">
    <h2 class="text-4xl font-bold text-center mb-12 text-primary animate-fade-in-up">مميزات المنتج</h2>
    <div class="features grid grid-cols-2 sm:grid-cols-3 gap-8 px-4 max-w-5xl mx-auto">
        @foreach ($product->features as $feature)
            <div class="value-box bg-white p-6 rounded-lg shadow-lg text-center transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                <i class="{{ $product->getFeatureIcon($feature) }} text-4xl text-primary mb-4"></i>
                <p class="text-lg font-semibold text-gray-700">{{ trim($feature) }}</p>
            </div>
        @endforeach
    </div>
</div>

<div class="container_1 mt-16 px-4">
    <h1 class="text-3xl sm:text-4xl font-bold text-center mb-4 text-primary">
        <i class="fas fa-home"></i> {{ $product->title }}
    </h1>
    <div class="text-center text-2xl font-bold text-green-600 mb-6">{{ number_format($product->price) }} ريال</div>

    <!-- قسم الصور -->
    <section class="property-main mt-10 flex justify-center">
        <img src="{{ url('/storage/app/public/' . $product->image) }}" alt="صورة العقار الرئيسية" class="w-full sm:w-3/4 lg:w-1/2 rounded-lg shadow-lg transition-transform duration-500 hover:scale-105">
    </section>

    <section class="property-gallery mt-8 flex flex-wrap justify-center gap-4">
        @if($product->images)
            @foreach(json_decode($product->images, true) as $image)
                <a href="{{ url('/storage/app/public/' . $image) }}" class="glightbox transform hover:scale-105 transition duration-300">
                    <img src="{{ url('/storage/app/public/' . $image) }}" alt="صورة العقار" class="w-24 h-24 sm:w-32 sm:h-32 object-cover rounded-md shadow-md">
                </a>
            @endforeach
        @else
            <p class="text-center">لا توجد صور مرفوعة.</p>
        @endif
    </section>

    <div class="section-title mt-12 text-3xl font-semibold text-primary flex items-center justify-center">
        <i class="fas fa-info-circle mr-2"></i> تفاصيل المنتج
    </div>

    <!-- الموقع والوصف خارج الشبكة -->
    <ul class="list-group bg-white rounded-lg shadow-lg p-6 mt-8 max-w-3xl mx-auto space-y-4">
        <li class="list-group-item flex items-center">
            <i class="fas fa-align-left text-primary text-2xl mr-4"></i>
            <span class="text-base sm:text-lg"><strong>الوصف:</strong> {{ $product->description }}</span>
        </li>
        <li class="list-group-item flex items-center">
            <i class="fas fa-map-marker-alt text-primary text-2xl mr-4"></i>
            <span class="text-base sm:text-lg"><strong>الموقع:</strong> {{ $product->location }}</span>
        </li>
    </ul>

    <!-- باقي التفاصيل بتصميم الشبكة -->
    <div class="details-grid grid grid-cols-2 sm:grid-cols-3 gap-6 mt-8 max-w-5xl mx-auto">
        @if ($product->city)
            <div class="list-group-item flex items-center p-4 bg-white rounded-lg shadow-lg">
                <i class="fas fa-city text-primary text-2xl mr-4"></i>
                <span><strong>المدينة:</strong> {{ $product->city->name }}</span>
            </div>
        @endif
        @if ($product->neighborhood)
            <div class="list-group-item flex items-center p-4 bg-white rounded-lg shadow-lg">
                <i class="fas fa-building text-primary text-2xl mr-4"></i>
                <span><strong>الحي:</strong> {{ $product->neighborhood->name }}</span>
            </div>
        @endif
        <div class="list-group-item flex items-center p-4 bg-white rounded-lg shadow-lg">
            <i class="fas fa-bed text-primary text-2xl mr-4"></i>
            <span><strong>عدد الغرف:</strong> {{ $product->bedrooms }}</span>
        </div>
        <div class="list-group-item flex items-center p-4 bg-white rounded-lg shadow-lg">
            <i class="fas fa-bath text-primary text-2xl mr-4"></i>
            <span><strong>عدد الحمامات:</strong> {{ $product->bathrooms }}</span>
        </div>
        <div class="list-group-item flex items-center p-4 bg-white rounded-lg shadow-lg">
            <i class="fas fa-ruler-combined text-primary text-2xl mr-4"></i>
            <span><strong>المساحة:</strong> {{ $product->area }} متر مربع</span>
        </div>
        <div class="list-group-item flex items-center p-4 bg-white rounded-lg shadow-lg">
            <i class="fas fa-tag text-primary text-2xl mr-4"></i>
            <span><strong>الفئة:</strong> {{ $product->category }}</span>
        </div>
        <div class="list-group-item flex items-center p-4 bg-white rounded-lg shadow-lg">
            <i class="fas fa-video text-primary text-2xl mr-4"></i>
            <span><strong>فيديو:</strong>
                @if ($product->video)
                    <a href="{{ $product->video }}" target="_blank" class="text-decoration-none text-blue-600 underline">رابط الفيديو</a>
                @endif
            </span>
        </div>
    </div>

    <!-- قسم الفيديو -->
    @php
        $videoUrl = $product->video;
        $videoId = substr($videoUrl, strrpos($videoUrl, '/') + 1);
    @endphp

    <div class="video-container mt-12 flex justify-center">
        <iframe class="w-full max-w-2xl aspect-video rounded-lg shadow-lg transition-transform duration-500 hover:scale-105"
                src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&mute=1"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
        </iframe>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
    const lightbox = GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        loop: false,
        closeOnOutsideClick: true
    });
</script>

@endsection
