@extends('home')

@section('content')
<div class="container">
    <h1>البوستات</h1>
    <div class="row">
        @forelse($posts as $post)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">عرض المزيد</a>
                    </div>
                </div>
            </div>
        @empty
            <p>لا توجد بوستات متاحة.</p>
        @endforelse
    </div>
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>
@endsection
