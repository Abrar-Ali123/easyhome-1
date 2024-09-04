@extends('dashboardlayout')

@section('title', 'عرض الطلبات')

@section('content')

<!-- شريط البحث والفرز -->
<div class="row mb-3 search_part">
    <div class="col-md-3">
        <label for="employee"><i class="fas fa-user icon"></i> الموظف:</label>
        <select id="employee" name="employee" class="form-control">
            <option value="">اختر موظفًا</option>
            @foreach ($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label for="status"><i class="fas fa-filter icon"></i> حالة الطلب:</label>
        <select id="status" name="status" class="form-control">
            <option value="">اختر حالة</option>
            @foreach ($statuses as $status)
                <option value="{{ $status }}">{{ $status }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label for="customer_name"><i class="fas fa-user-circle icon"></i> اسم العميل:</label>
        <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="اسم العميل">
    </div>
    <div class="col-md-3">
        <label for="customer_phone"><i class="fas fa-phone icon"></i> رقم الجوال:</label>
        <input type="text" id="customer_phone" name="customer_phone" class="form-control" placeholder="رقم الجوال">
    </div>
</div>

<!-- عرض الطلبات -->
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th><i class="fas fa-user"></i> العميل</th>
                <th><i class="fas fa-phone"></i> رقم الجوال</th>
                <th><i class="fas fa-user"></i> الموظف</th>
                <th><i class="fas fa-tag"></i> حالة الطلب</th>
                <th><i class="fas fa-calendar-alt"></i> تاريخ التحديث</th>
                <th><i class="fas fa-cog"></i> الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->customer->name ?? 'غير محدد' }}</td>
                <td>{{ $order->customer->phone ?? 'غير محدد' }}</td>
                <td>{{ $order->employee->name ?? 'غير محدد' }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->updated_at->format('d-m-Y H:i') }}</td>
                <td>
                    <a href="{{ route('orders.show', $order) }}" class="btn"><i class="fas fa-eye"></i></a>
                    <!-- يمكنك إضافة أزرار أخرى هنا إذا لزم الأمر -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
