@extends('layout')

@section('title', 'عرض العقارات')

@section('content')
<!-- إضافة روابط Font Awesome و GLightbox CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

<!-- إضافة CSS -->
<style>
    :root {
        --primary-color-light: #fff;
        --primary_2-color-light: #fff6e0;
        --secondary-color-light: #003e37;
        --accent-color-light: #bb9339;

        --primary-color-dark: #091716;
        --primary_2-color-dark: #08201e;
        --secondary-color-dark: #fff;
        --accent-color-dark: #bb9339;
    }

    body {
        font-family: 'Cairo', sans-serif;
        margin: 0;
        padding: 0;
        background-color: var(--primary-color-light);
        color: var(--secondary-color-light);
        transition: background-color 0.3s, color 0.3s;
    }

    body.dark-mode {
        background-color: var(--primary-color-dark);
        color: var(--secondary-color-dark);
    }

    .container {
        width: 85%;
        margin: auto;
        overflow: hidden;
    }

    .header {
        background: var(--secondary-color-light);
        color: var(--primary-color-light);
        padding: 20px 0;
        text-align: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        transition: background 0.3s, color 0.3s;
    }

    body.dark-mode .header {
        background: var(--secondary-color-dark);
        color: var(--primary-color-dark);
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
</style>

<!-- إضافة محتوى الصفحة -->
<div class="container">
    <header class="header">
        <h1>عرض العقارات</h1>
    </header>

    <section class="property-main">
        <img src="{{ url('/storage/app/public/' . $product->image) }}" alt="صورة العقار الرئيسية">
    </section>

    <section class="property-gallery">
        <img src="https://via.placeholder.com/800x400" alt="صورة العقار المصغرة 1">
        <img src="https://via.placeholder.com/800x400" alt="صورة العقار المصغرة 2">
        <img src="https://via.placeholder.com/800x400" alt="صورة العقار المصغرة 3">
    </section>

    <section class="property-info">
        <h2>العنوان العقار</h2>
        <p>وصف العقار ومميزاته بالتفصيل مع معلومات إضافية تجذب العميل.</p>
        <p class="price">السعر: 500,000 ريال</p>
    </section>

    <section class="property-details">
        <div>
            <i class="fas fa-bed"></i> 3 غرف نوم
        </div>
        <div>
            <i class="fas fa-bath"></i> 2 حمام
        </div>
        <div>
            <i class="fas fa-car"></i> موقف سيارات
        </div>
    </section>

    <section class="property-video">
        <h2>فيديو العقار</h2>
        <video src="https://via.placeholder.com/800x400" controls></video>
    </section>

    <section class="like-section">
        <button>
            <i class="fas fa-thumbs-up icon"></i> أعجبني
        </button>
        <p class="like-count">الإعجابات: 25</p>
    </section>

    <section class="comment-section">
        <h2>التعليقات</h2>
        <div class="comment-form">
            <textarea placeholder="اكتب تعليقك هنا..."></textarea>
            <button>إرسال</button>
        </div>
        <div class="comments-list">
            <div class="comment">
                <h4>مستخدم</h4>
                <p>تعليق رائع!</p>
            </div>
            <div class="comment">
                <h4>مستخدم آخر</h4>
                <p>معلومات مفيدة وشاملة.</p>
            </div>
        </div>
    </section>

 </div>

@endsection
