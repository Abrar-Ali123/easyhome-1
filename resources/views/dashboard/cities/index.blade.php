@extends('dashboard.layout')

@section('title', 'إدارة المدن')

@section('content')

<!-- زر لفتح مودال إضافة مدينة جديدة -->
<button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addCityModal">
    إضافة مدينة جديدة
</button>

<!-- شريط البحث والفرز -->
<div class="row mb-3">
    <div class="col-md-4">
        <label for="searchName"><i class="fas fa-search"></i> اسم المدينة:</label>
        <input type="text" id="searchName" name="name" class="form-control" placeholder="اسم المدينة" onkeyup="searchCity()">
    </div>
</div>

<!-- عرض المدن -->
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>اسم المدينة</th>
                <th>المدينة الرئيسية</th>
                <th>الصورة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody id="cityTableBody">
            @foreach ($cities as $city)
            <tr id="city-row-{{ $city->id }}">
                <td>{{ $city->name }}</td>
                <td>{{ $city->parent ? $city->parent->name : 'لا توجد' }}</td> <!-- المدينة الرئيسية -->
                <td>
                    @if ($city->image)
                        <img src="{{ asset('storage/' . $city->image) }}" alt="City Image" style="height: 50px; object-fit: cover;">
                    @else
                        لا توجد صورة
                    @endif
                </td>
                <td>
                    <!-- زر تعديل المدينة -->
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editCityModal{{ $city->id }}">
                        <i class="fas fa-edit"></i>
                    </button>

                    <!-- زر فتح مودال تأكيد الحذف -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCityModal{{ $city->id }}">
                        <i class="fas fa-trash"></i>
                    </button>

                    <!-- مودال تأكيد الحذف -->
                    <div class="modal fade" id="deleteCityModal{{ $city->id }}" tabindex="-1" aria-labelledby="deleteCityModalLabel{{ $city->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteCityModalLabel{{ $city->id }}">تأكيد الحذف</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    هل أنت متأكد أنك تريد حذف المدينة "{{ $city->name }}"؟
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                                    <form action="{{ route('cities.destroy', $city->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">تأكيد الحذف</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

            <!-- مودال تعديل المدينة -->
            <div class="modal fade" id="editCityModal{{ $city->id }}" tabindex="-1" aria-labelledby="editCityModalLabel{{ $city->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCityModalLabel{{ $city->id }}">تعديل المدينة</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('cities.update', $city->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">اسم المدينة</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $city->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="parent_id" class="form-label">المدينة الرئيسية (اختياري)</label>
                                    <select class="form-control" id="parent_id" name="parent_id">
                                        <option value="">اختر المدينة الرئيسية</option>
                                        @foreach($cities as $parent)
                                            <option value="{{ $parent->id }}" {{ $city->parent_id == $parent->id ? 'selected' : '' }}>
                                                {{ $parent->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">صورة المدينة</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    @if($city->image)
                                        <img src="{{ asset('storage/' . $city->image) }}" alt="صورة المدينة" style="width: 100px; height: 100px; margin-top: 10px;">
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">تعديل</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- مودال إضافة مدينة جديدة -->
<div class="modal fade" id="addCityModal" tabindex="-1" aria-labelledby="addCityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCityModalLabel">إضافة مدينة جديدة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">اسم المدينة</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="parent_id" class="form-label">المدينة الرئيسية (اختياري)</label>
                        <select class="form-control" id="parent_id" name="parent_id">
                            <option value="">اختر المدينة الرئيسية</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">صورة المدينة</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">إضافة</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function searchCity() {
        var name = $('#searchName').val();
        $.ajax({
            url: '/cities',
            type: 'GET',
            data: { name: name },
            success: function(result) {
                $('#cityTableBody').html(result);
            }
        });
    }
</script>

@endsection
