@extends('home')
@section('content')

<!-- Importing Bootstrap 5, FontAwesome, and other necessary CSS libraries -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Hero Section with Background Image -->
<section class="hero-section position-relative">
    <img src="{{ asset('images/hero-bg.jpg') }}" class="w-100 h-100 object-cover" alt="Property Image" style="filter: brightness(50%);">
    <div class="overlay position-absolute w-100 h-100 bg-dark opacity-75"></div>
    <div class="container position-absolute text-center text-white" style="top: 50%; transform: translateY(-50%);">
        <h1 class="display-3 font-weight-bold">{{ $product->title }}</h1>
        <p class="lead">{{ $product->description }}</p>
    </div>
</section>





<!-- Property Features Section -->
<section class="features py-5">
    <div class="container text-center">
        <h2 class="text-primary font-weight-bold mb-4">مميزات العقار</h2>
        <div class="row">
            @foreach ($product->features as $feature)
            <div class="col-md-4 mb-4">
                <div class="feature-box p-4 bg-white shadow-sm rounded-lg hover-shadow-lg transition duration-300">
                    <i class="{{ $product->getFeatureIcon($feature) }} fa-3x text-primary mb-3"></i>
                    <h5 class="font-weight-bold">{{ trim($feature) }}</h5>
                </div>
            </div>
            @endforeach
            <!-- Adding mock features for testing -->
            <div class="col-md-4 mb-4">
                <div class="feature-box p-4 bg-white shadow-sm rounded-lg hover-shadow-lg transition duration-300">
                    <i class="fas fa-wifi fa-3x text-primary mb-3"></i>
                    <h5 class="font-weight-bold">إنترنت فائق السرعة</h5>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-box p-4 bg-white shadow-sm rounded-lg hover-shadow-lg transition duration-300">
                    <i class="fas fa-car fa-3x text-primary mb-3"></i>
                    <h5 class="font-weight-bold">موقف سيارات خاص</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Property Image Gallery Section -->
<section class="gallery py-5">
    <div class="container">
        <h2 class="text-primary font-weight-bold text-center mb-4">معرض الصور</h2>
        <div class="row">
            @foreach(json_decode($product->images, true) as $image)
            <div class="col-md-3 mb-4">
                <a href="{{ url('/storage/app/public/' . $image) }}" class="glightbox">
                    <img src="{{ url('/storage/app/public/' . $image) }}" class="w-100 rounded shadow-sm" alt="Property Image">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Property Details Section -->
<section class="details py-5 bg-light">
    <div class="container">
        <h2 class="text-primary font-weight-bold text-center mb-4">تفاصيل العقار</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>السعر:</strong> {{ number_format($product->price) }} ريال
            </div>
            <div class="col-md-6 mb-3">
                <strong>المساحة:</strong> {{ $product->area }} متر مربع
            </div>
            <div class="col-md-6 mb-3">
                <strong>عدد الغرف:</strong> {{ $product->bedrooms }}
            </div>
            <div class="col-md-6 mb-3">
                <strong>عدد الحمامات:</strong> {{ $product->bathrooms }}
            </div>
            <div class="col-md-6 mb-3">
                <strong>الحي:</strong> {{ $product->neighborhood->name ?? 'غير محدد' }}
            </div>
            <div class="col-md-6 mb-3">
                <strong>الفئة:</strong> {{ $product->category }}
            </div>
        </div>
    </div>
</section>

<!-- Property Video Section -->
<section class="video-section py-5">
    <div class="container text-center">
        <h2 class="text-primary font-weight-bold mb-4">شاهد الفيديو</h2>
        @php
            $videoUrl = $product->video;
            $videoId = substr($videoUrl, strrpos($videoUrl, '/') + 1);
        @endphp
        <iframe class="w-100 rounded shadow-lg" height="450" src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&mute=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</section>

<!-- Contact Section -->
<section class="contact py-5 bg-primary text-white">
    <div class="container">
        <h2 class="font-weight-bold text-center mb-4">قدم طلب أو استفسار</h2>
        <form action="{{ route('contacts.store') }}" method="POST" class="row">
            @csrf
            <input type="hidden" name="source" value="product">
            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <div class="col-md-6 mb-3">
                <label for="name">الاسم:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone">رقم الهاتف:</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="message">الرسالة:</label>
                <textarea name="message" id="message" class="form-control">{{ old('message') }}</textarea>
                @error('message') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-light btn-block">إرسال</button>
            </div>
        </form>
    </div>
</section>

<!-- Include JS libraries -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/glightbox@3.0.0/dist/js/glightbox.min.js"></script>

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

@if (session('success'))
<script>
    Swal.fire({
        title: 'شكراً لتواصلك معنا!',
        text: 'تم إرسال رسالتك بنجاح، وسنكون على اتصال بك قريباً.',
        icon: 'success',
        confirmButtonText: 'موافق',
        confirmButtonColor: '#556B2F'
    });
</script>
@endif

@endsection
