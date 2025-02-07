@extends('dashboard.layouts.app')

@section('title', 'إضافة عقار جديد')

@section('content')
<div class="container-fluid">
    <h1 class="text-left">إضافة عقار جديد</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card mb-4">
            <div class="card-header">بيانات العقار</div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="title">العنوان:</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="description">الوصف:</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="location">الموقع:</label>
                    <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="price">السعر:</label>
                    <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="video">رابط الفيديو:</label>
                    <input type="text" name="video" id="video" class="form-control" value="{{ old('video') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="profile_project">ملف تعريف المشروع:</label>
                    <input type="file" name="profile_project" id="profile_project" class="form-control" accept=".pdf">
                </div>

                <div class="form-group mb-3">
                    <label for="croquis">الكروكي:</label>
                    <input type="file" name="croquis" id="croquis" class="form-control" accept="image/*">
                </div>

                <div class="form-group mb-3">
                    <label for="image">الصورة الرئيسية:</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                </div>

                <div class="form-group mb-3">
                    <label for="images">صور إضافية:</label>
                    <input type="file" name="images[]" id="images" class="form-control" multiple accept="image/*">
                </div>

                <div class="form-group mb-3">
                    <label for="parent_city">المدينة:</label>
                    <select name="city_id" class="form-control" id="parent_city">
                        <option value="" disabled {{ old('city_id') ? '' : 'selected' }}>اختر المدينة</option>
                        @foreach ($mainCities as $city)
                            <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="neighborhood_id">الحي:</label>
                    <select name="neighborhood_id" class="form-control" id="sub_cities">
                        <option value="" disabled selected>اختر الحي</option>
                        @foreach ($subCities as $subCity)
                            <option value="{{ $subCity->id }}" {{ old('neighborhood_id') == $subCity->id ? 'selected' : '' }}>
                                {{ $subCity->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group mb-3 text-center">
            <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
    </form>
</div>
@endsection
