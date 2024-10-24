@extends('dashboard.layout')

@section('content')
<div class="container">
    <h1>Dashboard Overview</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">عدد المنتجات</h5>
                    <p class="card-text">{{ $productsCount }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">عدد المستخدمين</h5>
                    <p class="card-text">{{ $usersCount }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">عدد الطلبات حسب الحالة</h5>
                    @foreach($ordersCount as $status => $count)
                        <p>{{ $status }}: {{ $count }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- إحصائيات الاتصالات حسب المصدر -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">إحصائيات الاتصالات حسب المصدر</h5>
                    @foreach($contactsBySource as $source => $count)
                        <p>{{ $source }}: {{ $count }}</p>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- إحصائيات الاتصالات حسب الحالة -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">إحصائيات الاتصالات حسب الحالة</h5>
                    @foreach($contactsByStatus as $status => $count)
                        <p>{{ $status }}: {{ $count }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
