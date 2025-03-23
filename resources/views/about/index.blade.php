@extends('dashboard.layouts.app')

@section('title', 'من نحن')

@section('content')
<div class="container-fluid">
    <h1 class="text-left">من نحن</h1>

    @include('components.message')

    @if ($about)
        <h2>{{ $about->title }}</h2>
        <p>{{ $about->content }}</p>
    @else
        <p>لا توجد معلومات متاحة.</p>
    @endif

    <a href="{{ route('about.create') }}" class="btn btn-success">إضافة معلومات جديدة</a>
</div>
@endsection
