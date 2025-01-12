@extends('dashboard.layout')

@section('title', 'عرض الطلبات')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}"> <!-- تأكد من وجود هذا العنصر -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- عرض الطلبات -->
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th><i class="fas fa-user"></i> العميل</th>
                <th><i class="fas fa-tag"></i> حالة الطلب</th>
                <th><i class="fas fa-calendar-alt"></i> تاريخ التحديث</th>
                <th><i class="fas fa-user"></i> محدث الحالة</th>
                <th><i class="fas fa-cog"></i> الإجراءات</th>
            </tr>
        </thead>
        <tbody id="orders-table">
            @foreach ($orders as $order)
            <tr id="order-{{ $order->id }}">
                <td>{{ $order->user->name ?? 'غير محدد' }}</td>
                <td>
                    <select class="form-control update-status" data-order-id="{{ $order->id }}">
                        @foreach ($statuses as $status)
                            <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="updated-at">{{ $order->updated_at->format('d-m-Y H:i') }}</td>
                <td class="updated-by">{{ $order->updatedBy->name ?? 'غير محدد' }}</td>
                <td>
                    <!-- أزرار إضافية إذا لزم الأمر -->
                    <button class="btn btn-danger delete-order" data-order-id="{{ $order->id }}">حذف</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
 document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.update-status').forEach(select => {
        select.addEventListener('change', function () {
            const orderId = this.dataset.orderId;
            const newStatus = this.value;

            // تأكد من وجود التوكين الخاص بـ CSRF
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                console.error('CSRF token not found');
                return;
            }

            fetch('{{ route('orders.update') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content')
                },
                body: JSON.stringify({
                    order_id: orderId,
                    status: newStatus
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const orderRow = document.getElementById(`order-${orderId}`);
                    if (orderRow) {
                        orderRow.querySelector('.updated-at').textContent = data.updated_at;
                        orderRow.querySelector('.updated-by').textContent = data.updated_by;
                        alert(data.message);
                    } else {
                        console.error('Order row not found for order ID:', orderId);
                    }
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('حدث خطأ أثناء الاتصال بالخادم');
            });
        });
    });
});

</script>

@endsection
