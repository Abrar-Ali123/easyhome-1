<!-- resources/views/category_blog/show.blade.php -->

@extends('layouts.app')

@section('title', 'عرض التصنيف')

@section('content')
<div class="container">
    <h1>عرض التصنيف</h1>

    <div class="card">
        <div class="card-body">
            <h3>{{ $categoryBlog->name }}</h3>
            <p>{{ $categoryBlog->description }}</p>
        </div>
    </div>

    <a href="{{ route('category_blog.index') }}" class="btn btn-secondary mt-3">العودة إلى القائمة</a>
</div>
@endsection
