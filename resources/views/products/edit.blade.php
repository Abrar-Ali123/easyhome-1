@extends('dashboard.layouts.app')

@section('title', 'تعديل المنتج')

@section('content')
    <div class="container-fluid">
        <h1>Product modification</h1>

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

            <div class="form-group mb-3">
                <label for="title">the address</label>
                <input type="text" name="title" id="title" class="form-control"
                    value="{{ old('title', $product->title) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="location">الموقع</label>
                <input type="text" name="location" id="location" class="form-control"
                    value="{{ old('location', $product->location) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="video">Video link from YouTube</label>
                <input type="text" name="video" id="video" class="form-control"
                    value="{{ old('video', $product->video) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="price">the price</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01"
                    value="{{ old('price', $product->price) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="bedrooms">The number of bedrooms</label>
                <input type="number" name="bedrooms" id="bedrooms" class="form-control"
                    value="{{ old('bedrooms', $product->bedrooms) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="bathrooms">Number of bathrooms</label>
                <input type="number" name="bathrooms" id="bathrooms" class="form-control"
                    value="{{ old('bathrooms', $product->bathrooms) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="area">The area (in square meter)</label>
                <input type="number" name="area" id="area" class="form-control"
                    value="{{ old('area', $product->area) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="features">Features</label>
                <select name="features[]" id="features" class="form-control" multiple>
                    @foreach ($featuresList as $feature => $icon)
                        <option value="{{ $feature }}"
                            {{ in_array($feature, old('features', $product->features ?? [])) ? 'selected' : '' }}>
                            {{ $feature }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="category">Classification</label>
                <select name="category" id="category" class="form-control">
                    @foreach ($product::CATEGORIES as $category)
                        <option value="{{ $category }}"
                            {{ old('category', $product->category) == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="property_usage">نوع الاستخدام</label>
                <select name="property_usage" id="property_usage" class="form-control">
                    <option value="" disabled>اختر نوع الاستخدام</option>
                    @foreach (App\Models\Product::PROPERTY_USAGE as $usage)
                        <option value="{{ $usage }}" {{ old('property_usage', $product->property_usage) == $usage ? 'selected' : '' }}>
                            {{ $usage }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="property_type">نوع العقار</label>
                <select name="property_type" id="property_type" class="form-control">
                    <option value="" disabled>اختر نوع العقار</option>
                    @foreach (App\Models\Product::PROPERTY_TYPES as $type)
                        <option value="{{ $type }}" {{ old('property_type', $product->property_type) == $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="property_facade">واجهة العقار</label>
                <select name="property_facade" id="property_facade" class="form-control">
                    <option value="" disabled>اختر واجهة العقار</option>
                    <option value="شرق" {{ old('property_facade', $product->property_facade) == 'شرق' ? 'selected' : '' }}>شرق</option>
                    <option value="غرب" {{ old('property_facade', $product->property_facade) == 'غرب' ? 'selected' : '' }}>غرب</option>
                    <option value="شمال" {{ old('property_facade', $product->property_facade) == 'شمال' ? 'selected' : '' }}>شمال</option>
                    <option value="جنوب" {{ old('property_facade', $product->property_facade) == 'جنوب' ? 'selected' : '' }}>جنوب</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="image">Main image</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($product->image)
                    <p>الصورة الحالية:</p>
                    <img src="{{ url('storage/' . $product->image) }}" alt="صورة المنتج" width="150">
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="images">Additional photos</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple>
                @if ($product->images)
                    <p>الصور الحالية:</p>
                    @foreach (json_decode($product->images, true) as $image)
                        <img src="{{ url('storage/' . $image) }}" alt="صورة إضافية" width="100">
                    @endforeach
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="profile_project">Project profile</label>
                <input type="file" name="profile_project" id="profile_project" class="form-control">
                @if ($product->profile_project)
                    <a href="{{ asset('storage/' . $product->profile_project) }}" target="_blank">عرض الملف الحالي</a>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="monthly_installment">Monthly installment</label>
                <input type="text" name="monthly_installment" id="monthly_installment" class="form-control"
                    value="{{ old('monthly_installment', $product->monthly_installment) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="ad_number">Vehicle ID</label>
                <input type="number" name="ad_number" id="ad_number" class="form-control"
                    value="{{ old('ad_number', $product->ad_number) }}" required>
            </div>

            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
@endsection
