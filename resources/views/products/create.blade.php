@extends('dashboard.layouts.app')

@section('title', 'عرض العقارات')

@section('content')
    <div class="container-fluid">
        <h1 class="text-left">أضف عقار جديد</h1>

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

            <div class="form-group mb-3">
                <label for="parent_city"> مدينة :</label>
                <select name="city_id" class="form-control" id="parent_city">
                    <option value="" disabled {{ old('city_id') ? '' : 'selected' }}>اختر المدينة</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="neighborhood_id">الحي</label>
                <select name="neighborhood_id" class="form-control" id="sub_cities">
                    <option value="" disabled selected>اختر الحي</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="title">العنوان</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="description">وصف</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="location">الموقع</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}">
            </div>

            <div class="form-group mb-3">
                <label for="video">رابط فيديو من اليوتيوب</label>
                <input type="text" name="video" id="video" class="form-control" value="{{ old('video') }}">
            </div>

            <div class="form-group mb-3">
                <label for="price">السعر</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price') }}">
            </div>

            <div class="form-group mb-3">
                <label for="bedrooms">الغرف</label>
                <input type="number" name="bedrooms" id="bedrooms" class="form-control" value="{{ old('bedrooms') }}">
            </div>

            <div class="form-group mb-3">
                <label for="bathrooms">عددالحمامات</label>
                <input type="number" name="bathrooms" id="bathrooms" class="form-control" value="{{ old('bathrooms') }}">
            </div>

            <div class="form-group mb-3">
                <label for="area">المساحة (مترمربع)</label>
                <input type="number" name="area" id="area" class="form-control" value="{{ old('area') }}">
            </div>

            <!-- مميزات العقار -->
            <div class="form-group mb-4">
                <label class="mb-3">مميزات العقار</label>
                <div class="features-grid">
                    @foreach (App\Models\Product::$propertyFeatures as $key => $feature)
                        <label class="feature-item">
                            <input type="checkbox" name="property_features[]" value="{{ $key }}"
                                {{ in_array($key, old('property_features', [])) ? 'checked' : '' }}>
                            <span class="checkmark"></span>
                            <i class="{{ $feature['icon'] }} feature-icon"></i>
                            <span class="feature-name">{{ $feature['name'] }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- مميزات الموقع -->
            <div class="form-group mb-4">
                <label class="mb-3">مميزات الموقع</label>
                <div class="features-grid">
                    @foreach (App\Models\Product::$locationFeatures as $key => $feature)
                        <label class="feature-item">
                            <input type="checkbox" name="location_features[]" value="{{ $key }}"
                                {{ in_array($key, old('location_features', [])) ? 'checked' : '' }}>
                            <span class="checkmark"></span>
                            <i class="{{ $feature['icon'] }} feature-icon"></i>
                            <span class="feature-name">{{ $feature['name'] }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <style>
                .features-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                    gap: 15px;
                    background: #f8f9fa;
                    padding: 20px;
                    border-radius: 10px;
                }

                .feature-item {
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    padding: 10px;
                    background: white;
                    border-radius: 8px;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    margin: 0;
                }

                .feature-item:hover {
                    background: #e9ecef;
                }

                .feature-icon {
                    color: #0d6efd;
                    width: 20px;
                    text-align: center;
                }

                .feature-name {
                    flex: 1;
                }

                .feature-item input[type="checkbox"] {
                    display: none;
                }

                .checkmark {
                    width: 18px;
                    height: 18px;
                    border: 2px solid #dee2e6;
                    border-radius: 4px;
                    position: relative;
                    transition: all 0.3s ease;
                }

                .feature-item:hover .checkmark {
                    border-color: #0d6efd;
                }

                .feature-item input[type="checkbox"]:checked + .checkmark {
                    background: #0d6efd;
                    border-color: #0d6efd;
                }

                .feature-item input[type="checkbox"]:checked + .checkmark::after {
                    content: '';
                    position: absolute;
                    left: 5px;
                    top: 2px;
                    width: 5px;
                    height: 10px;
                    border: solid white;
                    border-width: 0 2px 2px 0;
                    transform: rotate(45deg);
                }
            </style>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

            <div id="features-checkboxes">
                @foreach (App\Models\Product::$featuresList as $feature => $icon)
                    <div>
                        <input type="checkbox" name="features[]" value="{{ $feature }}" id="feature_{{ $feature }}">
                        <label for="feature_{{ $feature }}">
                            <i class="{{ $icon }}"></i> {{ $feature }}
                        </label>
                    </div>
                @endforeach
            </div>

            <!-- حقل مخفي لجمع الميزات المحددة -->
            <input type="hidden" name="features" id="features" value="{{ old('features') }}">

            <br>

            <label for="category">التصنيف</label>
            <select name="category" id="category" class="form-control">
                @foreach (App\Models\Product::CATEGORIES as $category)
                    <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                        {{ $category }}
                    </option>
                @endforeach
            </select>
            <br>

            <div class="form-group mb-3">
                <label for="property_usage">استخدام العقار</label>
                <select name="property_usage" id="property_usage" class="form-control">
                    <option value="" disabled {{ old('property_usage') ? '' : 'selected' }}>اختر نوع الاستخدام</option>
                    @foreach (App\Models\Product::PROPERTY_USAGE as $usage)
                        <option value="{{ $usage }}" {{ old('property_usage') == $usage ? 'selected' : '' }}>
                            {{ $usage }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="property_type">نوع العقار</label>
                <select name="property_type" id="property_type" class="form-control">
                    <option value="" disabled {{ old('property_type') ? '' : 'selected' }}>اختر نوع العقار</option>
                    @foreach (App\Models\Product::PROPERTY_TYPES as $type)
                        <option value="{{ $type }}" {{ old('property_type') == $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="property_facade">واجهة العقار</label>
                <select name="property_facade" class="form-control" id="property_facade">
                    <option value="" disabled {{ old('property_facade') ? '' : 'selected' }}>اختر واجهة العقار</option>
                    <option value="شرق" {{ old('property_facade') == 'شرق' ? 'selected' : '' }}>شرق</option>
                    <option value="غرب" {{ old('property_facade') == 'غرب' ? 'selected' : '' }}>غرب</option>
                    <option value="شمال" {{ old('property_facade') == 'شمال' ? 'selected' : '' }}>شمال</option>
                    <option value="جنوب" {{ old('property_facade') == 'جنوب' ? 'selected' : '' }}>جنوب</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="image">الصورة الرئيسية</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                <div id="image-preview" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
            </div>

            <div class="form-group mb-3">
                <label for="images">صور إضافية</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple accept="image/*">
                <div id="images-preview" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
            </div>

            <div class="form-group mb-3">
                <label for="croquis">الكروكي</label>
                <input type="file" name="croquis" id="croquis" class="form-control" accept="image/*">
                <div id="croquis-preview" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
            </div>

            <div class="form-group mb-3">
                <label for="profile_project">ملف تعريف المشروع</label>
                <input type="file" name="profile_project" id="profile_project" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="monthly_installment">القسط </label>
                <input type="text" name="monthly_installment" id="monthly_installment" class="form-control"
                    value="{{ old('monthly_installment') }}">
            </div>

            <div class="form-group mb-3">
                <label for="ad_number">رقم الاعلان </label>
                <input type="number" name="ad_number" id="ad_number" class="form-control"
                    value="{{ old('ad_number') }}">
            </div>

            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">حفظ </button>
            </div>

        </form>
    </div>

    <script>
        // الكود الخاص بمعاينة الصور، جلب الأحياء عند اختيار المدينة وغيرها
        document.addEventListener('DOMContentLoaded', function() {
            // الدوال الخاصة بالمعاينة والتنقل
            previewImages('image', 'image-preview');
            previewImages('images', 'images-preview');
            previewImages('croquis', 'croquis-preview');

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
                    .catch(error => console.error('Error fetching subcities:', error));
            });
        });

        function previewImages(inputId, previewContainerId) {
            const input = document.getElementById(inputId);
            const previewContainer = document.getElementById(previewContainerId);

            input.addEventListener('change', function(event) {
                previewContainer.innerHTML = '';
                Array.from(event.target.files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = e => {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '100px';
                        img.style.height = '100px';
                        img.style.objectFit = 'cover';
                        img.style.borderRadius = '8px';
                        img.style.border = '1px solid #ddd';
                        img.style.padding = '5px';
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                });
            });
        }
    </script>
@endsection
