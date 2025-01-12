<!-- resources/views/category_blog/create.blade.php -->

@extends('dashboard.layouts.app')

@section('title', 'Add a new classification')

@section('content')
    <div class="container-fluid">
        <h1>أضف تصنيفًا جديدًا</h1>

        <form action="{{ route('category_blog.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">تصنيف</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>


            <div class="form-group mb-3">

                <button type="submit" class="btn btn-primary">يحفظ</button>
            </div>

        </form>
    </div>
@endsection
