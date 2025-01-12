@extends('dashboard.layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">إدارة الاتصالات</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>رقم التليفون</th>
                                    <th>الحالة</th>
                                    <th>ملحوظة</th>
                                    <th>رسالة</th>
                                    <th>مصدر</th>
                                    <th>التحديث الأخير بواسطة</th>
                                    <th>إجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>
                                            <select class="status" data-id="{{ $contact->id }}">
                                                <option value="تم التواصل"
                                                    {{ $contact->status == 'تم التواصل' ? 'selected' : '' }}>تم التواصل
                                                </option>
                                                <option value="لم يتم التواصل"
                                                    {{ $contact->status == 'لم يتم التواصل' ? 'selected' : '' }}>لم يتم
                                                    التواصل</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="note" data-id="{{ $contact->id }}"
                                                value="{{ $contact->note }}">
                                        </td>
                                        <td>{{ $contact->message }}</td>
                                        <td>

                                            @if ($contact->source == 'page1')
                                                <i class="fas fa-phone-alt"></i> تواصل
                                            @elseif ($contact->source == 'page2')
                                                <i class="fas fa-handshake"></i> برنامج إنجاز
                                            @else
                                                <i class="fas fa-question-circle"></i> مصدر غير معروف
                                            @endif
                                        </td>
                                        <td>{{ $contact->updatedBy ? $contact->updatedBy->name : 'غير معروف' }}</td>
                                        <!-- يعرض اسم الشخص الذي قام بالتحديث -->
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a type="button" data-id="{{ $contact->id }}"
                                                            class="dropdown-item edit-item-btn"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            تحديث</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        document.querySelectorAll('.update').forEach(button => {
            button.onclick = () => {
                const id = button.dataset.id;
                const status = document.querySelector(`.status[data-id="${id}"]`).value;
                const note = document.querySelector(`.note[data-id="${id}"]`).value;

                fetch(`{{ url('/admin/contacts') }}/${id}/update`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            status,
                            note
                        })
                    })
                    .then(response => response.json())
                    .then(data => alert(data.success ? 'تم التحديث بنجاح!' : 'حدث خطأ أثناء التحديث'))
                    .catch(() => alert('حدث خطأ في الاتصال بالخادم'));
            };
        });
    </script>
@endsection
