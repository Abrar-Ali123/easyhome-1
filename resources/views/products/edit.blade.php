@extends('dashboard.layouts.app')

@section('title', 'تعديل العقار')

@section('content')
    <div class="container-fluid">
        <h1 class="text-left">تعديل العقار</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- المدينة -->
            <div class="form-group mb-3">
                <label for="parent_city">مدينة:</label>
                <select name="city_id" class="form-control" id="parent_city">
                    <option value="" disabled {{ old('city_id', $product->city_id) ? '' : 'selected' }}>اختر المدينة</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ old('city_id', $product->city_id) == $city->id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- الحي -->
            <div class="form-group mb-3">
                <label for="neighborhood_id">الحي:</label>
                <select name="neighborhood_id" class="form-control" id="sub_cities">
                    <option value="" disabled {{ old('neighborhood_id', $product->neighborhood_id) ? '' : 'selected' }}>اختر الحي</option>
                    @foreach ($neighborhoods as $neighborhood)
                        <option value="{{ $neighborhood->id }}" {{ old('neighborhood_id', $product->neighborhood_id) == $neighborhood->id ? 'selected' : '' }}>
                            {{ $neighborhood->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- العنوان -->
            <div class="form-group mb-3">
                <label for="title">العنوان:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $product->title) }}">
            </div>

            <!-- الوصف -->
            <div class="form-group mb-3">
                <label for="description">الوصف:</label>
                <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
            </div>

            <!-- الموقع -->
            <div class="form-group mb-3">
                <label for="location">الموقع:</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $product->location) }}">
            </div>

            <!-- الفيديو -->
            <div class="form-group mb-3">
                <label for="video">رابط فيديو:</label>
                <input type="text" name="video" id="video" class="form-control" value="{{ old('video', $product->video) }}">
            </div>

            <!-- السعر -->
            <div class="form-group mb-3">
                <label for="price">السعر:</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price', $product->price) }}">
            </div>

            <!-- الميزات -->
            <div class="form-group mb-3">
                <label for="features">الميزات:</label>
                <div id="features-checkboxes">
                    @php
                        $selectedFeatures = is_array($product->features) ? $product->features : json_decode($product->features, true) ?? [];
                    @endphp
                    @foreach (App\Models\Product::$featuresList as $feature => $icon)
                        <div>
                            <input type="checkbox" name="features[]" value="{{ $feature }}" id="feature_{{ $feature }}"
                                {{ in_array($feature, $selectedFeatures) ? 'checked' : '' }}>
                            <label for="feature_{{ $feature }}">
                                <i class="{{ $icon }}"></i> {{ $feature }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- التصنيف -->
            <div class="form-group mb-3">
                <label for="category">التصنيف:</label>
                <select name="category" id="category" class="form-control">
                    @foreach (App\Models\Product::CATEGORIES as $category)
                        <option value="{{ $category }}" {{ old('category', $product->category) == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- الصورة الرئيسية -->
            <div class="form-group mb-3">
                <label for="image">الصورة الرئيسية:</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="الصورة الحالية" style="width: 100px; height: 100px;">
                @endif
            </div>

            <!-- الصور الإضافية -->
            <div class="form-group mb-3">
                <label for="images">صور إضافية:</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple accept="image/*">
                @if ($product->images)
                    @php
                        $images = is_array($product->images) ? $product->images : json_decode($product->images, true) ?? [];
                    @endphp
                    @foreach ($images as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="صورة إضافية" style="width: 100px; height: 100px; margin: 5px;">
                    @endforeach
                @endif
            </div>

            <!-- الكروكي -->
            <div class="form-group mb-3">
                <label for="croquis">الكروكي:</label>
                <input type="file" name="croquis" id="croquis" class="form-control" accept="image/*">
                @if ($product->croquis)
                    <img src="{{ asset('storage/' . $product->croquis) }}" alt="الكروكي الحالي" style="width: 100px; height: 100px;">
                @endif
            </div>

            <!-- زر الحفظ -->
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
            </div>
        </form>
    </div>
@endsection
