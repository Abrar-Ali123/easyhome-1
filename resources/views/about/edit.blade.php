@extends('dashboard.layouts.app')

@section('title', 'تعديل معلومات من نحن')

@section('content')
<div class="container-fluid">
    <h1 class="text-left">تعديل معلومات من نحن</h1>

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

    <form action="{{ route('about.update', $about->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="title">العنوان:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $about->title }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="content">المحتوى:</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ $about->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
</div>
@endsection
