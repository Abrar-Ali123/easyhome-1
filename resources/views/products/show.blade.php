@extends('layout')

@section('title', 'عرض العقارات')

@section('content')
<!-- إضافة روابط Font Awesome و GLightbox CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

<!-- إضافة CSS -->
<style>
    h1, h2 {
        color: var(--secondary-color-light);
        margin-top: 30px;
        font-size: 2.2em;
        border-bottom: 2px solid var(--accent-color-light);
        padding-bottom: 10px;
        transition: color 0.3s, border-color 0.3s;
    }

    body.dark-mode h1, body.dark-mode h2 {
        color: var(--secondary-color-dark);
        border-color: var(--accent-color-dark);
    }

    .property-main img {
        width: 100%;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .property-gallery {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin: 20px 0;
    }

    .property-gallery img {
        width: 60px;
        height: 40px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .property-gallery img:hover {
        transform: scale(1.1);
    }

    .property-info {
        padding: 30px;
        background: var(--primary-color-light);
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        transition: background 0.3s, color 0.3s;
    }

    body.dark-mode .property-info {
        background: var(--primary-color-dark);
        color: var(--secondary-color-dark);
    }

    .property-info h2 {
        margin-top: 0;
        font-size: 2.5em;
        color: var(--secondary-color-light);
        transition: color 0.3s;
    }

    body.dark-mode .property-info h2 {
        color: var(--secondary-color-dark);
    }

    .property-info p {
        margin: 15px 0;
        line-height: 1.6;
    }

    .property-info .price {
        font-size: 2em;
        color: var(--accent-color-light);
        margin-bottom: 15px;
        transition: color 0.3s;
    }

    body.dark-mode .property-info .price {
        color: var(--accent-color-dark);
    }

    .property-details {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
        padding: 10px;
        background: var(--primary_2-color-light);
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: background 0.3s;
    }

    body.dark-mode .property-details {
        background: var(--primary_2-color-dark);
    }

    .property-details div {
        display: flex;
        align-items: center;
        font-size: 1.1em;
    }

    .property-details i {
        margin-right: 10px;
        color: var(--accent-color-light);
        transition: color 0.3s;
    }

    body.dark-mode .property-details i {
        color: var(--accent-color-dark);
    }

    .property-video {
        margin-bottom: 30px;
    }

    .property-video h2 {
        margin-bottom: 15px;
        color: var(--secondary-color-light);
        transition: color 0.3s;
    }

    body.dark-mode .property-video h2 {
        color: var(--secondary-color-dark);
    }

    .like-section,
    .comment-section {
        background: var(--primary-color-light);
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        transition: background 0.3s, color 0.3s;
    }

    body.dark-mode .like-section,
    body.dark-mode .comment-section {
        background: var(--primary-color-dark);
        color: var(--secondary-color-dark);
    }

    .like-section button {
        background: var(--secondary-color-light);
        color: var(--primary-color-light);
        border: none;
        padding: 12px 25px;
        font-size: 1.1em;
        cursor: pointer;
        border-radius: 8px;
        transition: background 0.3s ease, color 0.3s ease;
    }

    .like-section button:hover {
        background: var(--secondary-color-light);
    }

    body.dark-mode .like-section button {
        background: var(--secondary-color-dark);
        color: var(--primary-color-dark);
    }

    .like-section .icon {
        margin-right: 8px;
    }

    .like-count {
        font-size: 1.3em;
        color: var(--accent-color-light);
        margin-top: 10px;
        transition: color 0.3s;
    }

    body.dark-mode .like-count {
        color: var(--accent-color-dark);
    }

    .comment-form textarea {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ddd;
        margin-bottom: 15px;
        font-size: 1em;
        transition: background 0.3s, color 0.3s, border 0.3s;
    }

    body.dark-mode .comment-form textarea {
        background: var(--primary_2-color-dark);
        color: var(--secondary-color-dark);
        border: 1px solid var(--primary_2-color-dark);
    }

    .comment-form button {
        background: var(--secondary-color-light);
        color: var(--primary-color-light);
        border: none;
        padding: 12px 25px;
        font-size: 1.1em;
        cursor: pointer;
        border-radius: 8px;
        transition: background 0.3s ease, color 0.3s ease;
    }

    .comment-form button:hover {
        background: var(--accent-color-light);
    }

    body.dark-mode .comment-form button {
        background: var(--secondary-color-dark);
        color: var(--primary-color-dark);
    }

    .comments-list {
        margin-top: 20px;
    }

    .comments-list .comment {
        padding: 10px 15px;
        background: var(--primary_2-color-light);
        border-radius: 8px;
        margin-bottom: 10px;
        transition: background 0.3s, color 0.3s;
    }

    body.dark-mode .comments-list .comment {
        background: var(--primary_2-color-dark);
        color: var(--secondary-color-dark);
    }

    .comment h4 {
        margin-top: 0;
        margin-bottom: 5px;
    }

    .comment p {
        margin: 0;
        line-height: 1.4;
    }

    .property-controls {
        display: flex;
        justify-content: space-between;
        padding: 10px 20px;
        background: var(--primary_2-color-light);
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: background 0.3s;
    }

    body.dark-mode .property-controls {
        background: var(--primary_2-color-dark);
    }

    .property-controls .likes,
    .property-controls .comments {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .property-controls .likes .count,
    .property-controls .comments .count {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .property-controls .likes .count span,
    .property-controls .comments .count span {
        background: var(--secondary-color-light);
        border-radius: 50%;
        padding: 5px 10px;
        transition: background 0.3s;
    }

    body.dark-mode .property-controls .likes .count span,
    body.dark-mode .property-controls .comments .count span {
        background: var(--secondary-color-dark);
    }

    h1, h3, h4, h5 {
        color: var(--secondary-color-light);
        margin-top: 30px;
        font-size: 2.2em;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--accent-color-light);
        transition: color 0.3s, border-color 0.3s;
        width: 100%;
    }

    body.dark-mode h1, body.dark-mode h2 {
        color: var(--secondary-color-dark);
        border-color: var(--accent-color-dark);
    }

    .features-list {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
    }

    .section-title {
        font-size: 1.5em;
        margin-bottom: 10px;
        position: relative;
        padding-bottom: 5px;
    }

    .section-title::after {
        content: '';
        display: block;
        width: 100%;
        height: 2px;
        background-color: var(--accent-color-light);
        margin-top: 5px;
    }

    .feature-item {
        font-size: 1.1em;
        display: flex;
        align-items: center;
        margin: 5px;
    }

    .feature-item i {
        margin: 5px;
        color: var(--accent-color-light);
    }

    body.dark-mode .feature-item i {
        color: var(--accent-color-dark);
    }

    .custom-section {
        margin: 20px 0;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .section-content {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        gap: 10px;
        align-items: center;
    }

    .detail-item {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .detail-item i {
        margin-right: 8px;
    }
</style>

<!-- إضافة محتوى الصفحة -->
<div class="container">
    <header class="header">
        <h2>{{ $product->title }}</h2>
    </header>

    <section class="property-main">
        <img src="{{ url('/storage/app/public/' . $product->image) }}" alt="صورة العقار الرئيسية">
    </section>

    <section class="property-gallery">
        @if($product->images)
            @php
                $images = json_decode($product->images, true);
            @endphp
            @foreach($images as $image)
                <a href="{{ url('/storage/app/public/' . $image) }}" class="glightbox">
                    <img src="{{ url('/storage/app/public/' . $image) }}" alt="صورة العقار">
                </a>
            @endforeach
        @else
            <p>لا توجد صور مرفوعة.</p>
        @endif
    </section>

    <section class="property-info">
        <p>{{ $product->description }}</p>
        <p class="price">السعر: {{ number_format($product->price, 2) }} ريال</p>
    </section>

    <section class="custom-section">
        <h2>التفاصيل</h2>
        <div class="section-content">
            <div class="feature-item">
                <i class="fas fa-bed"></i> {{ $product->bedrooms }} غرف
            </div>
            <div class="feature-item">
                <i class="fas fa-bath"></i> {{ $product->bathrooms }} دورات مياه
            </div>
            <div class="feature-item">
                <i class="fas fa-ruler-combined"></i> {{ $product->area }} المساحة
            </div>
            <div class="feature-item">
                <i class="fas fa-city"></i> {{ $product->location }} المدينة
            </div>
            <div class="feature-item">
                <i class="fas fa-map-marker-alt"></i> {{ $product->category }} الحي
            </div>
        </div>

        <h2>المميزات</h2>
        <div class="section-content">
            @if($product->features)
                @php
                    $features = is_array($product->features) ? $product->features : json_decode($product->features, true);
                @endphp
                @foreach($features as $feature)
                    <div class="feature-item">
                        <i class="{{ $product->getFeatureIcon($feature) }}"></i> {{ $feature }}
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <section class="property-video">
        <h2>فيديو العقار</h2>
        <iframe width="661" height="372" src="https://www.youtube.com/embed/{{ str_replace('https://youtu.be/', '', $product->video) }}"
        title="فيديو العقار" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </section>

    <section class="like-section">
        <button>
            <i class="fas fa-thumbs-up icon"></i> أعجبني
        </button>
        <p class="like-count">الإعجابات: 25</p>
    </section>

    <section class="comment-section">
    @include('comments', ['product' => $product])

    </section>
</div>

@include('parts.login_popup')

@endsection
