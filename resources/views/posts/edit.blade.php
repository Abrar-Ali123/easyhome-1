<!-- resources/views/post/edit.blade.php -->

@extends('layouts.app')

@section('title', 'تعديل المقال')

@section('content')
<div class="container">
    <h1>تعديل المقال</h1>

    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">العنوان</label>
            <input type="text" name="title" id="title" value="{{ $post->title }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="meta_description">الوصف المختصر (SEO)</label>
            <input type="text" name="meta_description" id="meta_description" value="{{ $post->meta_description }}" class="form-control" maxlength="160">
        </div>

        <div class="form-group">
            <label for="keywords">الكلمات المفتاحية (SEO)</label>
            <input type="text" name="keywords" id="keywords" value="{{ $post->keywords }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="category_blog_id">التصنيف</label>
            <select name="category_blog_id" id="category_blog_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_blog_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="content">المحتوى</label>
            <textarea name="content" id="content" class="form-control" required>{{ $post->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
</div>
@endsection
