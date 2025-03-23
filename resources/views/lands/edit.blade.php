@extends('dashboard.layouts.app')

@section('title', 'تعديل الأرض')

@section('content')
    <div class="container-fluid">
        <h1 class="text-right">تعديل الأرض</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('lands.update', $land->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="parent_city">المدينة:</label>
                <select name="city_id" class="form-control" id="parent_city">
                    <option value="" disabled>اختر المدينة</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ old('city_id', $land->city_id) == $city->id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="neighborhood_id">الحي</label>
                <select name="neighborhood_id" class="form-control" id="sub_cities">
                    <option value="" disabled>اختر الحي</option>
                    @if($land->neighborhood)
                        <option value="{{ $land->neighborhood_id }}" selected>{{ $land->neighborhood->name }}</option>
                    @endif
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="title">العنوان</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $land->title) }}" required>
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="description">الوصف</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $land->description) }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="location">الموقع</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $land->location) }}">
            </div>

            <div class="form-group mb-3">
                <label for="price">السعر</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price', $land->price) }}">
            </div>

            <div class="form-group mb-3">
                <label for="area">المساحة (متر مربع)</label>
                <input type="number" name="area" id="area" class="form-control" value="{{ old('area', $land->area) }}">
            </div>

            <div class="form-group mb-3">
                <label for="property_usage">نوع الاستخدام</label>
                <select name="property_usage" id="property_usage" class="form-control">
                    <option value="" disabled>اختر نوع الاستخدام</option>
                    @foreach (App\Models\Land::PROPERTY_USAGE as $usage)
                        <option value="{{ $usage }}" {{ old('property_usage', $land->property_usage) == $usage ? 'selected' : '' }}>
                            {{ $usage }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="property_type">نوع العقار</label>
                <select name="property_type" id="property_type" class="form-control">
                    <option value="" disabled>اختر نوع العقار</option>
                    @foreach (App\Models\Land::PROPERTY_TYPES as $type)
                        <option value="{{ $type }}" {{ old('property_type', $land->property_type) == $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="image">الصورة الرئيسية</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                @if ($land->image)
                    <div class="mt-2">
                        <p>الصورة الحالية:</p>
                        <img src="{{ asset('storage/' . $land->image) }}" alt="صورة الأرض" style="max-width: 200px;">
                    </div>
                @endif
            </div>

            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // معاينة الصور
            function previewImage(input, previewId) {
                const preview = document.getElementById(previewId);
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.innerHTML = `<img src="${e.target.result}" style="max-width: 200px;">`;
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            // تفعيل معاينة الصور
            document.getElementById('image').addEventListener('change', function() {
                previewImage(this, 'image-preview');
            });

            // جلب الأحياء بناءً على المدينة
            document.getElementById('parent_city').addEventListener('change', function() {
                const parentCityId = this.value;
                fetch(`{{ url('/get-neighborhoods/') }}/${parentCityId}`)
                    .then(response => response.json())
                    .then(data => {
                        const subCities = document.getElementById('sub_cities');
                        subCities.innerHTML = '<option value="" disabled selected>اختر الحي</option>';
                        if (data.message) {
                            alert(data.message);
                        } else {
                            data.forEach(subCity => {
                                const option = document.createElement('option');
                                option.value = subCity.id;
                                option.textContent = subCity.name;
                                subCities.appendChild(option);
                            });
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
@endsection
