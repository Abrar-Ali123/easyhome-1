@extends('layouts.dashboard') <!-- الامتداد من Layout الخاص بالـ Dashboard -->

@section('content')
<div class="container">
    <h1>عرض طلبات المنتجات</h1>

    <!-- جدول عرض الطلبات -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>رقم الطلب</th>
                <th>اسم المستخدم</th>
                <th>المدينة</th>
                <th>الأحياء</th>
                <th>التصنيف</th>
                <th>الوصف</th>
                <th>تاريخ الإنشاء</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productRequests as $request)
                <tr>
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->user->name }}</td>
                    <td>{{ $request->city->name }}</td>
                    <td>{{ $request->neighborhoods }}</td>
                    <td>{{ $request->category->name }}</td>
                    <td>{{ $request->description }}</td>
                    <td>{{ $request->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
