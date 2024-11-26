@extends('home')

@section('title', $post->title)

@section('content')

<!-- الروابط المطلوبة -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- القسم العلوي مع الفيديو أو الصورة -->
<div class="relative h-screen overflow-hidden">
    @if($post->image)
        <img src="{{ url('/storage/app/public/' . $post->image) }}" class="absolute inset-0 w-full h-full object-cover opacity-70 transition-transform duration-500 hover:scale-105" alt="{{ $post->title }}">
    @else
        <div class="absolute inset-0 w-full h-full bg-gray-300 flex items-center justify-center">
            <span class="text-3xl font-bold text-gray-700">لا توجد صورة</span>
        </div>
    @endif
    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80"></div>
    <div class="absolute bottom-12 left-0 p-8 text-left text-white z-10">
        <h1 class="text-4xl md:text-5xl font-bold animate-fade-in">{{ $post->title }}</h1>
        <p class="text-lg md:text-xl mt-2"><i class="fas fa-clock"></i> {{ $post->created_at->format('Y-m-d') }}</p>
    </div>
</div>

<!-- محتوى الصفحة -->
<div class="container mt-10">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <!-- صورة البوست -->
                @if($post->image)
                 @else
                <img src="https://via.placeholder.com/800x400?text=No+Image" class="card-img-top" alt="No Image" style="height: 300px; object-fit: cover;">
                @endif
                <!-- محتوى البوست -->
                <div class="card-body">
                    <h1 class="card-title text-secondary mb-4 text-center text-xl font-bold">{{ $post->title }}</h1>
                    <p class="text-muted text-center mb-4"><i class="fas fa-clock"></i> تم النشر بتاريخ {{ $post->created_at->format('Y-m-d') }}</p>
                    <div class="card-text text-dark text-justify" style="line-height: 1.8;">
                        {!! $post->content !!}
                    </div>
                </div>
                <!-- معلومات إضافية -->
                <div class="card-footer bg-light">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted"><strong>التصنيف:</strong> {{ $post->categoryBlog->name }}</span>
                        <span class="text-muted"><strong>الكلمات المفتاحية:</strong> {{ $post->keywords ?? 'لا توجد' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- زر العودة -->
    <div class="mt-6 text-center">
        <a href="{{ route('posts.index') }}" class="btn btn-primary text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600">
            <i class="fas fa-arrow-left"></i> العودة إلى القائمة
        </a>
    </div>
</div>

@endsection
