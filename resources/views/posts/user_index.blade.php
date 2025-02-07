@extends('home')

@section('content')
    <section class="posts-section">
        <div class="container">
            <h2 class="section-title">أحدث المقالات</h2>
            <div class="row">
                @foreach ($posts as $post)
                    <article class="post-card col-xl-4">

                        <div class="post">
                            <!-- شريط التاريخ -->
                            <div class="post-date-badge">
                                {{ $post->created_at->format('d M Y') }}
                            </div>

                            <!-- صورة المقال -->
                            <a href="{{ route('posts.show', $post->id) }}" class="w-100">

                                <img src="{{ $post->image ? url('/storage/app/public/' . $post->image) : 'https://via.placeholder.com/400x200' }}"
                                    alt="{{ $post->title }}">
                            </a>

                            <!-- محتوى البطاقة -->

                            <div class="post-content">

                                <h3 class="post-title">
                                    <a href="{{ route('posts.show', $post->id) }}">
                                        {{ $post->title }}
                                    </a>

                                </h3>

                                <!-- التصنيف -->
                                <div class="post-category-badge">
                                    <a href="{{ route('posts.show', $post->id) }}">

                                        {{ $post->category->name ?? 'غير مصنف' }}
                                    </a>

                                </div>

                                <!-- الكلمات المفتاحية -->
                                <div class="post-keywords">
                                    @if ($post->keywords)
                                        @foreach (explode(',', $post->keywords) as $keyword)
                                            <span class="keyword-tag">{{ trim($keyword) }}</span>
                                        @endforeach
                                    @else
                                        <span class="no-keywords">لا توجد كلمات مفتاحية</span>
                                    @endif
                                </div>
                                <p class="post-content-preview">
                                    <a href="{{ route('posts.show', $post->id) }}">

                                        <!-- مقتطف المحتوى -->
                                        {{ \Illuminate\Support\Str::limit($post->content, 100) }}


                                    </a>
                                </p>
                                <!-- زر اقرأ المزيد -->
                                <a href="{{ route('posts.show', $post->id) }}" class="read-more">اقرأ المزيد</a>
                            </div>

                        </div>
                    </article>
                @endforeach

            </div>
        </div>
    </section>

    <style>
        body {
            direction: rtl;
        }

    </style>
@endsection
