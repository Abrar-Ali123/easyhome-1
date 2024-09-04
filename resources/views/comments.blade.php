<!-- resources/views/dashboard/cities/index.blade.php -->

@extends('dashboardlayout')

@section('title', 'إدارة المدن')

@section('content')

<!-- زر إضافة مدينة جديدة -->
<button class="btn" id="add-city-btn">إضافة مدينة جديدة</button>

<!-- شريط البحث والفرز -->
<div class="row mb-3 search_part">
    <div class="col-md-4">
        <label for="search-name"><i class="fas fa-search icon"></i> اسم المدينة:</label>
        <input type="text" id="search-name" name="name" class="form-control" placeholder="اسم المدينة">
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
        <tbody id="cities-list">
            @foreach ($cities as $city)
            <tr data-id="{{ $city->id }}">
                <td class="city-name">{{ $city->name }}</td>
                <td>
                    @if ($city->image)
                        <img src="{{ url('/storage/app/public/' . $city->image) }}" alt="City Image" style="height: 50px; object-fit: cover;">
                    @else
                        لا توجد صورة
                    @endif
                </td>
                <td>
                    <button class="btn edit-btn">تعديل</button>
                    <button class="btn delete-btn">حذف</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- نموذج إضافة/تعديل المدينة -->
<div id="city-modal" style="display:none;">
    <form id="city-form">
        @csrf
        <input type="hidden" name="id" id="city-id">
        <div class="form-group">
            <label for="city-name">اسم المدينة:</label>
            <input type="text" id="city-name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="city-image">الصورة:</label>
            <input type="file" id="city-image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">حفظ</button>
        <button type="button" id="cancel-btn" class="btn btn-secondary">إلغاء</button>
    </form>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // عرض نموذج إضافة/تعديل المدينة
    $('#add-city-btn').on('click', function() {
        $('#city-form')[0].reset();
        $('#city-id').val('');
        $('#city-modal').show();
    });

    // إلغاء عرض النموذج
    $('#cancel-btn').on('click', function() {
        $('#city-modal').hide();
    });

    // إضافة أو تعديل المدينة
    $('#city-form').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        let cityId = $('#city-id').val();
        let url = cityId ? `{{ url('/cities') }}/${cityId}` : '{{ route('cities.store') }}';
        let method = cityId ? 'PUT' : 'POST';

        $.ajax({
            type: method,
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (cityId) {
                    // تعديل المدينة
                    let cityRow = $(`tr[data-id="${cityId}"]`);
                    cityRow.find('.city-name').text(response.name);
                    if (response.image) {
                        cityRow.find('img').attr('src', `{{ url('/storage/app/public/') }}/${response.image}`);
                    }
                } else {
                    // إضافة مدينة جديدة
                    let newCity = `
                    <tr data-id="${response.id}">
                        <td class="city-name">${response.name}</td>
                        <td>
                            ${response.image ? `<img src="{{ url('/storage/app/public/') }}/${response.image}" style="height: 50px; object-fit: cover;">` : 'لا توجد صورة'}
                        </td>
                        <td>
                            <button class="btn edit-btn">تعديل</button>
                            <button class="btn delete-btn">حذف</button>
                        </td>
                    </tr>`;
                    $('#cities-list').append(newCity);
                }
                $('#city-modal').hide();
            },
            error: function(xhr) {
                alert('حدث خطأ أثناء معالجة الطلب.');
            }
        });
    });

    // عرض نموذج التعديل
    $(document).on('click', '.edit-btn', function() {
        let cityRow = $(this).closest('tr');
        let cityId = cityRow.data('id');
        let cityName = cityRow.find('.city-name').text();

        $('#city-id').val(cityId);
        $('#city-name').val(cityName);
        $('#city-modal').show();
    });

    // حذف المدينة
    $(document).on('click', '.delete-btn', function() {
        let cityRow = $(this).closest('tr');
        let cityId = cityRow.data('id');

        if (confirm('هل أنت متأكد من حذف هذه المدينة؟')) {
            $.ajax({
                type: 'DELETE',
                url: `{{ url('/cities') }}/${cityId}`,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        cityRow.remove();
                    }
                },
                error: function(xhr) {
                    alert('حدث خطأ أثناء حذف المدينة.');
                }
            });
        }
    });

    // البحث عن المدينة
    $('#search-name').on('input', function() {
        let searchTerm = $(this).val().toLowerCase();
        $('#cities-list tr').each(function() {
            let cityName = $(this).find('.city-name').text().toLowerCase();
            $(this).toggle(cityName.indexOf(searchTerm) > -1);
        });
    });
});
</script>
@endsection

@section('styles')
<style>
#city-modal {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    z-index: 1000;
}

#city-modal input[type="file"] {
    display: block;
    margin-bottom: 10px;
}

#city-modal .btn {
    margin-right: 10px;
}

#city-modal .btn-secondary {
    background-color: #6c757d;
    color: #fff;
}
</style>
@endsection
