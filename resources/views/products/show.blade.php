@extends('layout')

@section('title', 'عرض العقارات')

@section('content')
<!-- إضافة روابط Font Awesome و GLightbox CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">


<section class="text-center my-4">
     <div class="embed-responsive embed-responsive-16by9">
        <iframe class="property-video" src="https://www.youtube.com/embed/{{ str_replace('https://youtu.be/', '', $product->video) }}?autoplay=1&mute=1"
            title="فيديو العقار" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
</section>


<style>
     .property-video {
        top: 0;
left:0;
right: 0;;
        position: absolute;
      width: 100%;
    height: 100%;
    object-fit: cover;
     z-index: -1;
    }


/* تنسيقات زر التشغيل */
.play-video-btn {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

button.play-video-btn {
    background-color: var(--accent-color);
    color: var(--highlight-color);
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

button.play-video-btn:hover {
    background-color: var(--secondary-color);
    color: var(--highlight-color);
    transform: translateY(-3px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
}

button.play-video-btn:active {
    transform: translateY(-1px);
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
}

body.dark-theme button.play-video-btn {
    background-color: var(--highlight-color);
    color: var(--secondary-color);
}

body.dark-theme button.play-video-btn:hover {
    background-color: var(--accent-color);
    color: var(--primary-color-dark);
}



</style>



 <div class="container my-4">
    <div class=" property-info text-center mb-4">
        <h1>{{ $product->title }}</h1>
    </div>

    <section class="property-info my-4">
        <p>{{ $product->description }}</p>
        <p class="price">السعر: {{ number_format($product->price, 2) }} ريال</p>
    </section>

    <section class="custom-section my-4">
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
                <p>       </p>
            @endif
            @endif
        </div>
    </section>

    <section class="property-main1 d-flex justify-content-center align-items-center" style="flex-wrap: wrap; gap: 20px;">
         <div class="main-image-wrapper d-flex justify-content-center align-items-center" style="flex-direction: column;">
            <img src="{{ url('/storage/app/public/' . $product->image) }}" alt="صورة العقار الرئيسية" class="main-image" style="max-width: 300px; border-radius: 16px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);">
        </div>

         <div class="property-gallery d-flex justify-content-start align-items-center flex-column" style="margin-left: 20px;">
            @if($product->images)
                @php
                    $images = json_decode($product->images, true);
                @endphp
                <div class="d-flex flex-column gap-2" style="align-items: center;">
                    @foreach($images as $image)
                         <a href="{{ url('/storage/app/public/' . $image) }}" class="glightbox">
                            <img src="{{ url('/storage/app/public/' . $image) }}" alt="صورة العقار" class="gallery-image" style="width: 60px; height: 60px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); cursor: pointer; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        </a>
                    @endforeach
                </div>
            @else
                <p>       .</p>
            @endif
        </div>
    </section>
    <section class="text-center my-4">
    <button id="play-video-button" class="play-video-btn">تشغيل الفيديو</button>
</section>

<!-- إعداد GLightbox -->
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
    // إعداد GLightbox للصور الصغيرة
    const lightbox = GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        loop: false,
        closeOnOutsideClick: true
    });

    // إعداد GLightbox لتشغيل الفيديو في نافذة منبثقة عند الضغط على الزر
    document.getElementById('play-video-button').addEventListener('click', function() {
        const videoLightbox = GLightbox({
            href: "https://www.youtube.com/embed/{{ str_replace('https://youtu.be/', '', $product->video) }}",
            type: 'video',
            source: 'youtube',
            width: 900,
            autoplayVideos: true
        });
        videoLightbox.open();
    });
</script>

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





    <section class="comment-section">
        @include('comments', ['product' => $product])
    </section>

    <section class="comment-section my-4">
        @include('parts.order_form', ['product' => $product])
    </section>
</div>

@endsection
