@extends('layout')

@section('title', 'عرض العقارات')

@section('content')
<!-- إضافة روابط Font Awesome و GLightbox CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

<!-- إضافة محتوى الصفحة -->
<div class="container my-4">
    <header class="text-center mb-4">
        <h2>{{ $product->title }}</h2>
    </header>

    <section class="property-main1 d-flex justify-content-center align-items-center" style="flex-wrap: wrap; gap: 20px;">
        <!-- الصورة الرئيسية -->
        <div class="main-image-wrapper d-flex justify-content-center align-items-center" style="flex-direction: column;">
            <img src="{{ url('/storage/app/public/' . $product->image) }}" alt="صورة العقار الرئيسية" class="main-image" style="max-width: 300px; border-radius: 16px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);">
        </div>

        <!-- معرض الصور -->
        <div class="property-gallery d-flex justify-content-start align-items-center flex-column" style="margin-left: 20px;">
            @if($product->images)
                @php
                    $images = json_decode($product->images, true);
                @endphp
                <div class="d-flex flex-column gap-2" style="align-items: center;">
                    @foreach($images as $image)
                        <!-- استخدام GLightbox فقط للصور الصغيرة -->
                        <a href="{{ url('/storage/app/public/' . $image) }}" class="glightbox">
                            <img src="{{ url('/storage/app/public/' . $image) }}" alt="صورة العقار" class="gallery-image" style="width: 60px; height: 60px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); cursor: pointer; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        </a>
                    @endforeach
                </div>
            @else
                <p>لا توجد صور مرفوعة.</p>
            @endif
        </div>
    </section>

<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
    // إعداد GLightbox للصور الصغيرة فقط
    const lightbox = GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        loop: false,
        closeOnOutsideClick: true
    });
</script>

    <section class="property-info my-4">
        <p>{{ $product->description }}</p>
        <p class="price">السعر: {{ number_format($product->price, 2) }} ريال</p>
    </section>

    <section class="custom-section my-4">
        <h2>التفاصيل</h2>
        <div class="details-grid">
            <div class="detail-item">
                <i class="fas fa-bed"></i> {{ $product->bedrooms }} غرف
            </div>
            <div class="detail-item">
                <i class="fas fa-bath"></i> {{ $product->bathrooms }} دورات مياه
            </div>
            <div class="detail-item">
                <i class="fas fa-ruler-combined"></i> {{ $product->area }} المساحة
            </div>
            <div class="detail-item">
                <i class="fas fa-city"></i> {{ $product->location }} المدينة
            </div>
            <div class="detail-item">
                <i class="fas fa-map-marker-alt"></i> {{ $product->category }} الحي
            </div>
        </div>

        <h2 class="mt-4">المميزات</h2>
        <div class="features-grid">
            @if(!empty($product->features))
            @php
                $features = is_array($product->features) ? $product->features : json_decode($product->features, true);
            @endphp
            @if(is_array($features))
                @foreach($features as $feature)
                    <div class="feature-item">
                        <i class="{{ $product->getFeatureIcon($feature) }}"></i> {{ $feature }}
                    </div>
                @endforeach
            @else
                <p>لا توجد مميزات متاحة.</p>
            @endif
            @endif
        </div>
    </section>

    <section class="property-video text-center my-4">
        <h2>فيديو العقار</h2>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ str_replace('https://youtu.be/', '', $product->video) }}"
            title="فيديو العقار" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </section>

    <section class="like-section text-center my-4">
        <button>
            <i class="fas fa-thumbs-up icon"></i> أعجبني
        </button>
        <p class="like-count">الإعجابات: 25</p>
    </section>

    <section class="comment-section">
        @include('comments', ['product' => $product])
    </section>

    <section class="comment-section my-4">
        @include('parts.order_form', ['product' => $product])
    </section>
</div>

@endsection
