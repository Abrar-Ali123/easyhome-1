@extends('dashboard.layout')

@section('title', 'تعديل المنتج')

@section('content')
<div class="container">
    <h1>تعديل المنتج</h1>

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

        <div class="form-group">
            <label for="title">العنوان</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $product->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">الوصف</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="location">الموقع</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $product->location) }}" required>
        </div>

        <div class="form-group">
            <label for="video">رابط فيديو من اليوتيوب</label>
            <input type="text" name="video" id="video" class="form-control" value="{{ old('video', $product->video) }}" required>
        </div>

        <div class="form-group">
            <label for="price">السعر</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="form-group">
            <label for="bedrooms">عدد غرف النوم</label>
            <input type="number" name="bedrooms" id="bedrooms" class="form-control" value="{{ old('bedrooms', $product->bedrooms) }}" required>
        </div>

        <div class="form-group">
            <label for="bathrooms">عدد الحمامات</label>
            <input type="number" name="bathrooms" id="bathrooms" class="form-control" value="{{ old('bathrooms', $product->bathrooms) }}" required>
        </div>

        <div class="form-group">
            <label for="area">المساحة (بالمتر المربع)</label>
            <input type="number" name="area" id="area" class="form-control" value="{{ old('area', $product->area) }}" required>
        </div>

        <div class="form-group">
            <label for="features">المميزات</label>
            <div class="dropdown">
                <button type="button" class="dropdown-button" id="features-button">اختر المميزات</button>
                <div class="dropdown-content" id="features-content">
                    @foreach($featuresList as $feature => $icon)
                        <div class="dropdown-item" data-value="{{ $feature }}">
                            <i class="{{ $icon }}"></i> <span class="dropdown-text">{{ $feature }}</span></div>
                    @endforeach
                </div>
            </div>
            <input type="hidden" name="features" id="features" value="{{ old('features', json_encode($product->features)) }}">
        </div>

        <div class="form-group">
            <label for="category">التصنيف</label>
            <div class="dropdown">
                <button type="button" class="dropdown-button" id="dropdown-button">
                    <i class="{{ $product->getCategoryIcon() }}"></i> {{ old('category', $product->category) }}
                </button>
                <div class="dropdown-content" id="dropdown-content">
                    @foreach($product::CATEGORIES as $category)
                        <div class="dropdown-item" data-value="{{ $category }}">
                            <i class="{{ $product::CATEGORY_ICONS[$category] }}"></i> <span class="dropdown-text">{{ $category }}</span></div>
                    @endforeach
                </div>
            </div>
            <input type="hidden" name="category" id="category" value="{{ old('category', $product->category) }}">
        </div>

        <div class="form-group">
            <label for="image">الصورة الرئيسية</label>
            <input type="file" name="image" id="image" class="form-control-file">
            @if($product->image)
                <p>الصورة الحالية:</p>
                <img src="{{ url('storage/' . $product->image) }}" alt="صورة المنتج" width="150">
            @endif
        </div>

        <div class="form-group">
            <label for="images">الصور الإضافية</label>
            <input type="file" name="images[]" id="images" class="form-control-file" multiple>
            @if($product->images)
                <p>الصور الحالية:</p>
                @foreach(json_decode($product->images, true) as $image)
                    <img src="{{ url('storage/' . $image) }}" alt="صورة إضافية" width="100">
                @endforeach
            @endif
        </div>

        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdownButton = document.getElementById('dropdown-button');
        const dropdownContent = document.getElementById('dropdown-content');
        const categoryInput = document.getElementById('category');

        dropdownButton.addEventListener('click', function () {
            dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
        });

        dropdownContent.addEventListener('click', function (e) {
            if (e.target.classList.contains('dropdown-item')) {
                const value = e.target.getAttribute('data-value');
                const text = e.target.querySelector('.dropdown-text').innerText;

                dropdownButton.innerHTML = `<i class="${e.target.querySelector('i').className}"></i> ${text}`;
                categoryInput.value = value;
                dropdownContent.style.display = 'none';
            }
        });

        const featuresButton = document.getElementById('features-button');
        const featuresContent = document.getElementById('features-content');
        const featuresInput = document.getElementById('features');
        let selectedFeatures = JSON.parse(featuresInput.value) || [];

        featuresButton.addEventListener('click', function () {
            featuresContent.style.display = featuresContent.style.display === 'block' ? 'none' : 'block';
        });

        featuresContent.addEventListener('click', function (e) {
            if (e.target.classList.contains('dropdown-item')) {
                const value = e.target.getAttribute('data-value');
                const text = e.target.querySelector('.dropdown-text').innerText;

                if (selectedFeatures.includes(value)) {
                    selectedFeatures = selectedFeatures.filter(item => item !== value);
                } else {
                    selectedFeatures.push(value);
                }

                featuresButton.innerHTML = selectedFeatures.map(feature => {
                    const item = featuresContent.querySelector(`[data-value="${feature}"]`);
                    return `<i class="${item.querySelector('i').className}"></i> ${item.querySelector('.dropdown-text').innerText}`;
                }).join(', ');

                featuresInput.value = JSON.stringify(selectedFeatures);
            }
        });

        document.addEventListener('click', function (e) {
            if (!dropdownButton.contains(e.target) && !dropdownContent.contains(e.target)) {
                dropdownContent.style.display = 'none';
            }
            if (!featuresButton.contains(e.target) && !featuresContent.contains(e.target)) {
                featuresContent.style.display = 'none';
            }
        });
    });
</script>
@endsection
