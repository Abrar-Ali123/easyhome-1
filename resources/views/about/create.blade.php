@extends('dashboard.layouts.app')

@section('title', 'إضافة معلومات من نحن')

@section('content')
<div class="container-fluid">
    <h1 class="text-left">إضافة معلومات من نحن</h1>

    @include('components.message')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('about.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="title">العنوان:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="content">المحتوى:</label>
            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>
@endsection
