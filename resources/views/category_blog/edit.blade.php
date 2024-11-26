<!-- resources/views/category_blog/edit.blade.php -->

@extends('layouts.app')

@section('title', 'تعديل التصنيف')

@section('content')
<div class="container">
    <h1>تعديل التصنيف</h1>

    <form action="{{ route('category_blog.update', $categoryBlog->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">اسم التصنيف</label>
            <input type="text" name="name" id="name" value="{{ $categoryBlog->name }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">الوصف</label>
            <textarea name="description" id="description" class="form-control">{{ $categoryBlog->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
</div>
@endsection
