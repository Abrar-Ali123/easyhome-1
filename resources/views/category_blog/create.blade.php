<!-- resources/views/category_blog/create.blade.php -->

@extends('dashboard.layout')

@section('title', 'إضافة تصنيف جديد')

@section('content')
<div class="container">
    <h1>إضافة تصنيف جديد</h1>

    <form action="{{ route('category_blog.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">اسم التصنيف</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>



        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>
@endsection
