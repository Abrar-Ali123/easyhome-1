@extends('layout')

@section('title', 'قائمة الطلبات')

@section('content')
<div class="container">
    <h1>قائمة الطلبات</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">إنشاء طلب جديد</a>
    <ul>
        @foreach($orders as $order)
            <li>{{ $order->description }} - حالة: {{ $order->status }}</li>
        @endforeach
    </ul>
</div>
@endsection
