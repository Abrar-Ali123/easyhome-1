@extends('dashboard.layout')

@section('content')
<div class="container">
    <h1 class="my-4">لوحة تحكم الإحصائيات</h1>

    <!-- صف للبطاقات الأساسية -->
    <div class="row">
        <!-- إحصائية المنتجات -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3 shadow-lg">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">عدد العقارات</h5>
                            <p class="card-text display-4">{{ $productsCount }}</p>
                        </div>
                        <div>
                            <i class="fas fa-box fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- إحصائية المستخدمين -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3 shadow-lg">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">عدد المستخدمين</h5>
                            <p class="card-text display-4">{{ $usersCount }}</p>
                        </div>
                        <div>
                            <i class="fas fa-users fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- إحصائية الطلبات -->
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3 shadow-lg">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">عدد الطلبات حسب الحالة</h5>
                            @foreach($ordersCount as $status => $count)
                                <p>{{ $status }}: {{ $count }}</p>
                            @endforeach
                        </div>
                        <div>
                            <i class="fas fa-shopping-cart fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- صف لإحصائيات التواصل -->
    <div class="row mt-4">
    <!-- إحصائيات التواصل حسب المصدر -->
    <div class="col-md-6">
        <div class="card shadow-lg">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-phone-alt"></i> إحصائيات التواصل حسب المصدر</h5>
                <ul class="list-group">
                    @foreach($contactsBySource as $source => $count)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @if ($source == 'page1')
                                <i class="fas fa-phone-alt"></i> تواصل
                            @elseif ($source == 'page2')
                                <i class="fas fa-handshake"></i> برنامج إنجاز
                            @else
                                <i class="fas fa-question-circle"></i> مصدر غير معروف
                            @endif
                            <span class="badge badge-primary badge-pill">{{ $count }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- إحصائيات التواصل حسب الحالة -->
    <div class="col-md-6">
        <div class="card shadow-lg">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-handshake"></i> إحصائيات التواصل حسب الحالة</h5>
                <ul class="list-group">
                    @foreach($contactsByStatus as $status => $count)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $status }}
                            <span class="badge badge-success badge-pill">{{ $count }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
