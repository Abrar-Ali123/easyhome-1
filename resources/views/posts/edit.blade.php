<!-- resources/views/post/edit.blade.php -->

@extends('dashboard.layouts.app')

@section('title', 'Edit post')

@section('content')
    <div class="container-fluid">
        <h1>تحرير المنشور</h1>

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title">العنوان</label>
                <input type="text" name="title" id="title" value="{{ $post->title }}" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="meta_description">الوصف (SEO)</label>
                <input type="text" name="meta_description" id="meta_description" value="{{ $post->meta_description }}"
                    class="form-control" maxlength="160">
            </div>

            <div class="form-group mb-3">
                <label for="keywords">الكلمات الرئيسية (SEO)</label>
                <input type="text" name="keywords" id="keywords" value="{{ $post->keywords }}" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="category_blog_id">تصنيف</label>
                <select name="category_blog_id" id="category_blog_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $post->category_blog_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="content">محتوى</label>
                <textarea name="content" id="content" class="form-control" required>{{ $post->content }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">تحديث</button>
        </form>
    </div>
@endsection
