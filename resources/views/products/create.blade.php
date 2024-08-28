@extends('dashboardlayout')

@section('title', 'عرض العقارات')

@section('content')
<div class="container">
    <h1>إضافة منتج جديد</h1>

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

        <div class="form-group">
            <label for="title">العنوان</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="description">الوصف</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="location">الموقع</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}" required>
        </div>

        <div class="form-group">
            <label for="video">رابط فيديو من اليوتيوب</label>
            <input type="text" name="video" id="location" class="form-control" value="{{ old('video') }}" required>
        </div>

        <div class="form-group">
            <label for="price">السعر</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price') }}" required>
        </div>

        <div class="form-group">
            <label for="bedrooms">عدد غرف النوم</label>
            <input type="number" name="bedrooms" id="bedrooms" class="form-control" value="{{ old('bedrooms') }}" required>
        </div>

        <div class="form-group">
            <label for="bathrooms">عدد الحمامات</label>
            <input type="number" name="bathrooms" id="bathrooms" class="form-control" value="{{ old('bathrooms') }}" required>
        </div>

        <div class="form-group">
            <label for="area">المساحة (بالمتر المربع)</label>
            <input type="number" name="area" id="area" class="form-control" value="{{ old('area') }}" required>
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
    <input type="hidden" name="features" id="features">
</div>

        <div class="form-group">
            <label for="category">التصنيف</label>
            <div class="dropdown">
                <button type="button" class="dropdown-button" id="dropdown-button">اختر التصنيف</button>
                <div class="dropdown-content" id="dropdown-content">
                    <div class="dropdown-item" data-value="apartment"><i class="fas fa-home"></i> <span class="dropdown-text">شقة</span></div>
                    <div class="dropdown-item" data-value="house"><i class="fas fa-house-user"></i> <span class="dropdown-text">منزل</span></div>
                    <div class="dropdown-item" data-value="commercial"><i class="fas fa-store"></i> <span class="dropdown-text">تجاري</span></div>
                    <div class="dropdown-item" data-value="land"><i class="fas fa-landmark"></i> <span class="dropdown-text">أرض</span></div>
                </div>
            </div>
            <input type="hidden" name="category" id="category">
        </div>

        <div class="form-group">
            <label for="image">الصورة الرئيسية</label>

            <input type="file" name="image" id="image" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="images">الصور الإضافية</label>
            <input type="file" name="images[]" id="images" class="form-control-file" multiple>
        </div>

        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>

<style>
    .dropdown {
        position: relative;
        display: inline-block;
        width: 100%;
    }
    .dropdown-button {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        background-color: #fff;
        text-align: left;
        cursor: pointer;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #fff;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        width: 100%;
    }
    .dropdown-content .dropdown-item {
        padding: 10px;
        cursor: pointer;
    }
    .dropdown-content .dropdown-item:hover {
        background-color: #f1f1f1;
    }
</style>

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
        let selectedFeatures = [];

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
