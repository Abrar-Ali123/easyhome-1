@extends('dashboard.layout')

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



            <div>
                <label for="parent_city"> المدينة :</label>
                <select name="city_id" id="parent_city" required>
                    <option value="" disabled {{ old('city_id') ? '' : 'selected' }}>اختر المدينة الرئيسية</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="neighborhood_id">الحي :</label>
                <select name="neighborhood_id" id="sub_cities">
                    <option value="" disabled selected>اختر الحي</option>
                </select>
            </div>




            <div class="form-group">
                <label for="title">العنوان</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}"
                    required>
            </div>

            <div class="form-group">
                <label for="description">الوصف</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="location">الموقع</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}"
                    required>
            </div>

            <div class="form-group">
                <label for="video">رابط فيديو من اليوتيوب</label>
                <input type="text" name="video" id="location" class="form-control" value="{{ old('video') }}"
                    required>
            </div>

            <div class="form-group">
                <label for="price">السعر</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01"
                    value="{{ old('price') }}" required>
            </div>

            <div class="form-group">
                <label for="bedrooms">عدد غرف النوم</label>
                <input type="number" name="bedrooms" id="bedrooms" class="form-control" value="{{ old('bedrooms') }}"
                    required>
            </div>

            <div class="form-group">
                <label for="bathrooms">عدد الحمامات</label>
                <input type="number" name="bathrooms" id="bathrooms" class="form-control" value="{{ old('bathrooms') }}"
                    required>
            </div>

            <div class="form-group">
                <label for="area">المساحة (بالمتر المربع)</label>
                <input type="number" name="area" id="area" class="form-control" value="{{ old('area') }}"
                    required>
            </div>



            <div id="features-checkboxes">
                @foreach (App\Models\Product::$featuresList as $feature => $icon)
                    <div>
                        <input type="checkbox" name="features[]" value="{{ $feature }}"
                            id="feature_{{ $feature }}">
                        <label for="feature_{{ $feature }}">
                            <i class="{{ $icon }}"></i> {{ $feature }}
                        </label>
                    </div>
                @endforeach
            </div>


            <!-- حقل مخفي لجمع الميزات المحددة -->
            <input type="hidden" name="features" id="features" value="{{ old('features') }}">







            <select name="category" id="category" class="form-control">
    @foreach (App\Models\Product::CATEGORIES as $category)
        <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
            {{ $category }}
        </option>
    @endforeach
</select>


            <div class="form-group">
                <label for="image">الصورة الرئيسية</label>

                <input type="file" name="image" id="image" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="images">الصور الإضافية</label>
                <input type="file" name="images[]" id="images" class="form-control-file" multiple
                    onchange="previewImages(event)">
                <div id="image-preview" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
            </div>

            <div class="form-group">
                <label for="profile_project">بروفايل المشروع</label>

                <input type="file" name="profile_project" id="profile_project" class="form-control-file">
            </div>


            <div class="form-group">
                <label for="monthly_installment">القسط الشهري</label>
                <input type="text" name="monthly_installment" id="monthly_installment" class="form-control"
                    value="{{ old('monthly_installment') }}" required>
            </div>


            <div class="form-group">
                <label for="ad_number">رقم الاعلان</label>
                <input type="number" name="ad_number" id="ad_number" class="form-control"
                    value="{{ old('ad_number') }}" required>
            </div>

            <div class="form-group">
                <label for="property_usage">استخدام العقار</label>
                <input type="text" name="property_usage" id="property_usage" class="form-control"
                    value="{{ old('property_usage') }}" required>
            </div>

            <div class="form-group">
                <label for="property_facade">واجهة العقار</label>
                <select name="property_facade" id="property_facade">
                    <option value="شرق">شرق</option>
                    <option value="غرب">غرب</option>
                    <option value="شمال">شمال</option>
                    <option value="جنوب">جنوب</option>

                </select>
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
        document.addEventListener('DOMContentLoaded', function() {
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

            document.getElementById('images').addEventListener('change', function(event) {
                const previewContainer = document.getElementById('image-preview');
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
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                });
            });

            document.querySelectorAll('input[name="features[]"]').forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    const selectedFeatures = Array.from(document.querySelectorAll(
                            'input[name="features[]"]:checked'))
                        .map(checkbox => checkbox.value)
                        .join(',');
                    document.getElementById('features').value = selectedFeatures;
                });
            });


            // القائمة المنسدلة للتصنيف
            const dropdownButton = document.getElementById('dropdown-button');
            const dropdownContent = document.getElementById('dropdown-content');
            const categoryInput = document.getElementById('category');

            dropdownButton.addEventListener('click', () => {
                dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' :
                    'block';
            });

            dropdownContent.addEventListener('click', (e) => {
                if (e.target.classList.contains('dropdown-item')) {
                    const value = e.target.getAttribute('data-value');
                    const text = e.target.querySelector('.dropdown-text').innerText;
                    dropdownButton.innerHTML =
                        `<i class="${e.target.querySelector('i').className}"></i> ${text}`;
                    categoryInput.value = value;
                    dropdownContent.style.display = 'none';
                }
            });

            // إغلاق القوائم عند النقر خارجها
            document.addEventListener('click', (e) => {
                if (!dropdownButton.contains(e.target) && !dropdownContent.contains(e.target)) {
                    dropdownContent.style.display = 'none';
                }
            });
        });
    </script>




@endsection
