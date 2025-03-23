@extends('dashboard.layouts.app')

@section('title', 'حذف المنتج')

@section('content')
<div class="container-fluid">
    <h1 class="text-right">تأكيد الحذف</h1>

    <p>هل أنت متأكد أنك تريد حذف هذا المنتج؟</p>

    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">نعم، احذف المنتج</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div>
@endsection
