@extends('dashboard.layout')

@section('content')
<h2>إدارة الاتصالات</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>الاسم</th>
            <th>رقم الهاتف</th>
            <th>الحالة</th>
            <th>ملاحظة</th>
            <th>الرسالة</th>
            <th>المصدر</th>
            <th>آخر تحديث بواسطة</th> <!-- العمود الجديد -->
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->phone }}</td>
            <td>
                <select class="status" data-id="{{ $contact->id }}">
                    <option value="تم التواصل" {{ $contact->status == 'تم التواصل' ? 'selected' : '' }}>تم التواصل</option>
                    <option value="لم يتم التواصل" {{ $contact->status == 'لم يتم التواصل' ? 'selected' : '' }}>لم يتم التواصل</option>
                </select>
            </td>
            <td>
                <input type="text" class="note" data-id="{{ $contact->id }}" value="{{ $contact->note }}">
            </td>
            <td>{{ $contact->message }}</td>
            <td>

            <div class="card text-white bg-info mb-3 shadow-lg">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h5 class="card-title">عدد الطلبات</h5>
                <p class="card-text display-4">{{ $totalOrders }}</p>
            </div>
            <div>
                <i class="fas fa-shopping-cart fa-3x"></i>
            </div>
        </div>
    </div>
</div>

</td>
            <td>{{ $contact->updatedBy ? $contact->updatedBy->name : 'غير معروف' }}</td> <!-- يعرض اسم الشخص الذي قام بالتحديث -->
            <td>
                <button type="button" class="btn btn-primary update" data-id="{{ $contact->id }}">تحديث</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    document.querySelectorAll('.update').forEach(button => {
        button.onclick = () => {
            const id = button.dataset.id;
            const status = document.querySelector(`.status[data-id="${id}"]`).value;
            const note = document.querySelector(`.note[data-id="${id}"]`).value;

            fetch(`/easyhome/admin/contacts/${id}/update`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ status, note })
            })
            .then(response => response.json())
            .then(data => alert(data.success ? 'تم التحديث بنجاح!' : 'حدث خطأ أثناء التحديث'))
            .catch(() => alert('حدث خطأ في الاتصال بالخادم'));
        };
    });
</script>

@endsection
