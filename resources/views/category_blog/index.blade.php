<!-- resources/views/category_blog/index.blade.php -->

@extends('dashboard.layout')

@section('title', 'قائمة التصنيفات')

@section('content')
<div class="container">
    <h1>قائمة التصنيفات</h1>
    <a href="{{ route('category_blog.create') }}" class="btn btn-primary">إضافة تصنيف جديد</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>الاسم</th>
                 <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                     <td>
                         <a href="{{ route('category_blog.edit', $category->id) }}" class="btn btn-warning">تعديل</a>
                        <form action="{{ route('category_blog.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}
</div>
@endsection
