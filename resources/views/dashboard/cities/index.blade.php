@extends('dashboardlayout')

@section('title', 'إدارة المدن')

@section('content')

<!-- زر إضافة مدينة جديدة -->
<button class="btn btn-primary mb-3" onclick="openCreateModal()">إضافة مدينة جديدة</button>

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
                <th><i class="fas fa-city"></i> اسم المدينة</th>
                <th><i class="fas fa-image"></i> الصورة</th>
                <th><i class="fas fa-cog"></i> الإجراءات</th>
            </tr>
        </thead>
        <tbody id="cityTableBody">
            @foreach ($cities as $city)
            <tr id="city-row-{{ $city->id }}">
                <td>{{ $city->name }}</td>
                <td>
                    @if ($city->image)
                        <img src="{{ url('storage/' . $city->image) }}" alt="City Image" style="height: 50px; object-fit: cover;">
                    @else
                        لا توجد صورة
                    @endif
                </td>
                <td>
                    <button class="btn btn-warning" onclick="openEditModal({{ $city->id }})"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger" onclick="deleteCity({{ $city->id }})"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal لإنشاء وتعديل المدن -->
<div class="modal fade" id="cityModal" tabindex="-1" aria-labelledby="cityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">إضافة مدينة جديدة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="cityForm" enctype="multipart/form-data">
                    <input type="hidden" id="cityId" name="cityId">
                    <div class="form-group">
                        <label for="cityName">اسم المدينة:</label>
                        <input type="text" id="cityName" name="name" class="form-control" required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="cityImage">الصورة:</label>
                        <input type="file" id="cityImage" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">حفظ</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function openCreateModal() {
        $('#cityForm')[0].reset();
        $('#cityId').val('');
        $('#modalTitle').text('إضافة مدينة جديدة');
        $('#cityModal').modal('show');
    }

    function openEditModal(id) {
        $.get(`/cities/${id}/edit`, function(data) {
            $('#cityName').val(data.name);
            $('#cityId').val(id);
            $('#modalTitle').text('تعديل المدينة');
            $('#cityModal').modal('show');
        });
    }

    function deleteCity(id) {
        if (confirm('هل أنت متأكد من حذف هذه المدينة؟')) {
            $.ajax({
                url: `/cities/${id}`,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function() {
                    $(`#city-row-${id}`).remove();
                }
            });
        }
    }

    $('#cityForm').on('submit', function(e) {
        e.preventDefault();
        var id = $('#cityId').val();
        var url = id ? `/cities/${id}` : '/cities';
        var method = id ? 'PUT' : 'POST';
        var formData = new FormData(this);

        $.ajax({
            url: url,
            type: method,
            data: formData,
            contentType: false,
            processData: false,
            success: function(result) {
                $('#cityModal').modal('hide');
                if (id) {
                    $(`#city-row-${id}`).replaceWith(result);
                } else {
                    $('#cityTableBody').append(result);
                }
            }
        });
    });

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
