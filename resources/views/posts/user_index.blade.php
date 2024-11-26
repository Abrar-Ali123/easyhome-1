@extends('home')

@section('title', 'المدونة')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<video autoplay muted loop id="background-video">
    <source src="{{ asset('images/4.mp4') }}" type="video/mp4">
    متصفحك لا يدعم عرض الفيديو.
</video>
<div class="page-content">
<h2>منشورات تهمك</h2>
 <div class="container my-5" style=" color: var(--secondary-color);">
     <div class="row g-4 justify-content-center">
        @forelse($posts as $post)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm" style="border: 1px solid var(--secondary-color); ">
                    <!-- صورة البوست -->
                    @if($post->image)
                        <img src="{{ url('/storage/app/public/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/400x250?text=No+Image" class="card-img-top" alt="No Image" style="height: 200px; object-fit: cover;">
                    @endif
                    <!-- محتوى البطاقة -->
                    <div class="card-body text-center">
                        <h5 class="card-title text-truncate" title="{{ $post->title }}" style="color>{{ $post->title }}</h5>
                        <p class="card-text small" style="color: var(--secondary-color);">
                            {{ \Illuminate\Support\Str::limit(strip_tags($post->content), 50, '...') }}
                        </p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn" style="background-color: var(--secondary-color); color: var(--primary-color);">قراءة المزيد</a>
                    </div>
                    <!-- تذييل البطاقة -->
                    <div class="card-footer text-center" style="background-color: var(--primary-color-dark); color: var(--highlight-color);">
                        <span><i class="fas fa-clock"></i> {{ $post->created_at->format('Y-m-d') }}</span>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">لا توجد منشورات حالياً.</p>
        @endforelse
    </div>

    <!-- روابط التصفح -->
    <div class="mt-5 d-flex justify-content-center">
        {{ $posts->links('pagination::bootstrap-4') }}
    </div>
</div>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
