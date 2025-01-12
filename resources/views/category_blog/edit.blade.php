<!-- resources/views/category_blog/edit.blade.php -->

@extends('dashboard.layouts.app')

@section('title', 'Classification modification')

@section('content')
    <div class="container-fluid">
        <h1>تعديل التصنيف </h1>
        <form action="{{ route('category_blog.update', $categoryBlog->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="name">تصنيف</label>
                <input type="text" name="name" id="name" value="{{ $categoryBlog->name }}" class="form-control"
                    required>
            </div>

            <div class="form-group mb-3">
                <label for="description">وصف</label>
                <textarea name="description" id="description" class="form-control">{{ $categoryBlog->description }}</textarea>
            </div>

            <div class="form-group mb-3">

                <button type="submit" class="btn btn-primary">تحديث</button>
            </div>

        </form>
    </div>
@endsection
