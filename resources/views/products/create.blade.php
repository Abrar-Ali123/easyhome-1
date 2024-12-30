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
    <input type="file" name="image" id="image" class="form-control-file" accept="image/*">
    <div id="image-preview" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
</div>

<div class="form-group">
    <label for="images">الصور الإضافية</label>
    <input type="file" name="images[]" id="images" class="form-control-file" multiple accept="image/*">
    <div id="images-preview" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
</div>

<div class="form-group">
    <label for="croquis">الكروكي</label>
    <input type="file" name="croquis" id="croquis" class="form-control-file" accept="image/*">
    <div id="croquis-preview" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;"></div>
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
    <select name="property_usage" id="property_usage" class="form-control" required>
        <option value="" disabled {{ old('property_usage') ? '' : 'selected' }}>اختر نوع الاستخدام</option>
        <option value="سكني" {{ old('property_usage') == 'سكني' ? 'selected' : '' }}>سكني</option>
        <option value="تجاري" {{ old('property_usage') == 'تجاري' ? 'selected' : '' }}>تجاري</option>
    </select>
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
    const previewContainer = document.getElementById('images-preview'); // ربط بمعاينة الصور الإضافية
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


<style>
    body {
        font-family: 'Tajawal', sans-serif; /* خط مناسب للغة العربية */
        background-color: #f8f9fa; /* لون خلفية خفيف */
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 24px;
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
        color: #555;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    select,
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        font-size: 14px;
        background-color: #f9f9f9;
    }

    input:focus,
    select:focus,
    textarea:focus {
        border-color: #007bff;
        background-color: #fff;
        outline: none;
    }

    button {
        display: block;
        width: 100%;
        padding: 12px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }

    .alert {
        margin-bottom: 20px;
        padding: 15px;
        border-radius: 4px;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #842029;
    }

    #features-checkboxes {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    #features-checkboxes div {
        flex: 1 1 45%;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }

    .form-control-file {
        border: none;
        padding: 5px;
    }

    #image-preview img {
        border: 1px solid #ddd;
        padding: 5px;
        border-radius: 8px;
    }

    select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    select:invalid {
        color: #6c757d;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .form-group select,
    .form-group input,
    .form-group textarea {
        margin-top: 5px;
    }

    .form-group label i {
        color: #007bff;
    }
</style>


<script>
    document.addEventListener('DOMContentLoaded', function () {
    // دالة عامة لمعاينة الصور
    function previewImages(inputId, previewContainerId) {
        const input = document.getElementById(inputId);
        const previewContainer = document.getElementById(previewContainerId);

        input.addEventListener('change', function (event) {
            // تفريغ الصور القديمة لضمان عدم التكرار
            previewContainer.innerHTML = '';

            const files = event.target.files;

            // التحقق إذا كانت هناك ملفات مرفوعة
            if (files.length > 0) {
                Array.from(files).forEach(file => {
                    // التحقق من أن الملف صورة
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();

                        reader.onload = function (e) {
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
                    } else {
                        alert('يرجى إضافة ملفات صور فقط!');
                    }
                });
            }
        });
    }

    // تطبيق المعاينة لكل حقل بشكل منفصل
    previewImages('image', 'image-preview'); // الصورة الرئيسية
    previewImages('images', 'images-preview'); // الصور الإضافية
    previewImages('croquis', 'croquis-preview'); // الكروكي
});


</script>
