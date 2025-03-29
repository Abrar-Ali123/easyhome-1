@php
    $propertyFeatures = App\Models\Product::$propertyFeatures;
    $locationFeatures = App\Models\Product::$locationFeatures;
    $mainCities = App\Models\City::whereNull('parent_id')->get();
    $categories = App\Models\Product::CATEGORIES;
@endphp

<div class="flat-tabs themesflat-tabs">
    <div class="box-tab center">
    </div>
    <div class="content-tab">
        <div class="content-inner tab-content">
            <div class="form-sl">
                <form id="searchForm" method="GET" action="{{ route('products.search') }}">
                    <div class="wd-find-select flex">
                        <div class="inner-group">
                            <div class="form-group-1 search-form form-style">
                                <div class="group-select">
                                    <div class="tf-select">
                                        <select class="nice-select" name="category" id="category">
                                            <option value="">اختر نوع العقار</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category }}"
                                                    {{ request()->input('category') == $category ? 'selected' : '' }}>
                                                    {{ $category }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
<!--
                            <div class="form-group-1 search-form form-style">
                                <input type="text" class="search-field" placeholder="ابحث عن عقار" name="search"
                                    value="{{ request()->input('search') }}">
                            </div>
-->
                            <div class="form-group-2 form-style">
                                <div class="group-select">
                                    <div class="tf-select">
                                        <select class="nice-select" name="city_id" id="parent_city">
                                            <option value="">اختر المدينة الرئيسية</option>
                                            @foreach ($mainCities as $city)
                                                <option value="{{ $city->id }}"
                                                    {{ request()->input('city_id') == $city->id ? 'selected' : '' }}>
                                                    {{ $city->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-3 form-style">
                                <div class="group-select">
                                    <div class="tf-select">
                                        <select class="nice-select" name="neighborhood_id" id="sub_cities">
                                            <option value="">اختر الحي</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-5 form-style">
                            <a href="#" class="icon-filter pull-right">
                                <i class="fas fa-sliders-h"></i>
                            </a>
                        </div>

                        <div class="button-search sc-btn-top">
                            <button type="submit" class="sc-button">
                                <span>ابحث الان</span>
                                <i class="fas fa-search text-color-1"></i>
                            </button>
                        </div>
                    </div>

                    <div class="advanced-search {{ request()->has('search') || request()->has('city_id') || request()->has('neighborhood_id') || request()->has('bedrooms') || request()->has('bathrooms') || request()->has('min_price') || request()->has('max_price') || request()->has('property_features') || request()->has('location_features') || request()->has('category') ? 'active' : '' }}">
                        <div class="box1 flex flex-wrap form-wg">
                            <div class="form-group wg-box3">
                                <div class="widget widget-price">
                                    <div class="caption flex-two">
                                        <div>
                                            <span class="fw-6">نطاق السعر:</span>
                                            <span id="slider-range-value1">{{ number_format(request('min_price', 0)) }}</span>
                                            <span> - </span>
                                            <span id="slider-range-value2">{{ number_format(request('max_price', 1000000)) }}</span>
                                            <span> ريال </span>
                                        </div>
                                    </div>
                                    <div id="slider-range" class="mt-2"></div>
                                    <input type="hidden" name="min_price" id="min_price" value="{{ request('min_price', 0) }}">
                                    <input type="hidden" name="max_price" id="max_price" value="{{ request('max_price', 1000000) }}">
                                </div>
                            </div>

                            <div class="form-group wg-box3">
                                <div class="group-select">
                                    <div class="tf-select">
                                        <select class="nice-select" name="bedrooms" id="bedrooms">
                                            <option value="">حدد عدد الغرف</option>
                                            @foreach (range(1, 10) as $room)
                                                <option value="{{ $room }}"
                                                    {{ request()->input('bedrooms') == $room ? 'selected' : '' }}>
                                                    {{ $room }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group wg-box3">
                                <div class="group-select">
                                    <div class="tf-select">
                                        <select class="nice-select" name="bathrooms" id="bathrooms">
                                            <option value="">حدد عدد دورات المياه</option>
                                            @foreach (range(1, 10) as $bath)
                                                <option value="{{ $bath }}"
                                                    {{ request()->input('bathrooms') == $bath ? 'selected' : '' }}>
                                                    {{ $bath }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- قسم المميزات -->
                        <div class="features-section mt-4">
                            <div class="row">
                                <!-- مميزات العقار -->
                                <div class="col-md-6 mb-4">
                                    <div class="widget-features">
                                        <h4 class="title-features">مميزات العقار</h4>
                                        <div class="features-list">
                                            @foreach ($propertyFeatures as $feature => $icon)
                                                <div class="feature-item">
                                                    <label class="checkbox-item">
                                                        <input type="checkbox" name="property_features[]" value="{{ $feature }}"
                                                            {{ in_array($feature, (array)request('property_features')) ? 'checked' : '' }}>
                                                        <span class="custom-checkbox"></span>
                                                        <i class="{{ $icon }} ml-2"></i>
                                                        {{ $feature }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <!-- مميزات الموقع -->
                                <div class="col-md-6 mb-4">
                                    <div class="widget-features">
                                        <h4 class="title-features">مميزات الموقع</h4>
                                        <div class="features-list">
                                            @foreach ($locationFeatures as $feature => $icon)
                                                <div class="feature-item">
                                                    <label class="checkbox-item">
                                                        <input type="checkbox" name="location_features[]" value="{{ $feature }}"
                                                            {{ in_array($feature, (array)request('location_features')) ? 'checked' : '' }}>
                                                        <span class="custom-checkbox"></span>
                                                        <i class="{{ $icon }} ml-2"></i>
                                                        {{ $feature }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="boder-wg"></div>
                        <div class="box2 flex flex-wrap form-wg">
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .flat-tabs {
        padding: 25px;
        border-radius: 10px;
        margin-bottom: 30px;
    }

    .flat-tabs .content-inner {
        padding: 20px;
    }

    .flat-tabs .tab-content {
        padding: 20px;
    }

    .form-sl {
        padding: 20px;
        border-radius: 8px;
    }

    .wd-find-select {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        border-bottom: 1px solid rgba(0,0,0,0.1);
    }

    .inner-group {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .form-group-1, .form-group-2, .form-group-3, .form-group-4 {
        flex: 1;
        min-width: 200px;
    }

    .form-group-1.search-form {
        padding: 10px;
        border: 1px solid rgba(0,0,0,0.1);
        border-radius: 8px;
    }

    .form-group-1.search-form input {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 8px;
    }

    .form-group-2, .form-group-3 {
        padding: 10px;
        border: 1px solid rgba(0,0,0,0.1);
        border-radius: 8px;
    }

    .form-group-2 select, .form-group-3 select {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 8px;
    }

    .form-group-4 {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .icon-filter {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: #FFA920;
        color: #fff;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .icon-filter:hover {
        background: #ff9900;
    }

    .icon-filter i {
        font-size: 18px;
    }

    .button-search {
        margin-top: 15px;
    }

    .advanced-search {
        padding: 20px;
        border-radius: 8px;
        margin-top: 15px;
    }

    .advanced-search.active {
        display: block;
    }

    .form-wg {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .form-group {
        flex: 1;
        min-width: 200px;
    }

    .widget-price .ui-slider-horizontal {
        height: 4px;
        background: #e5e5e5;
        border: none;
        border-radius: 2px;
    }

    .widget-price .ui-slider-horizontal .ui-slider-range {
        background: #FFA920;
        border-radius: 2px;
    }

    .widget-price .ui-slider .ui-slider-handle {
        width: 15px;
        height: 15px;
        background: #FFA920;
        border: 2px solid;
        border-radius: 50%;
        cursor: pointer;
        top: -6px;
        outline: none;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .widget-price .caption {
        margin-bottom: 15px;
    }

    .widget-price .caption span {
        font-size: 14px;
    }

    .widget-price .caption .fw-6 {
        font-weight: 600;
        margin-left: 5px;
    }

    /* تنسيقات البحث المتقدم */
    .advanced-search {
        padding: 20px;
        border-radius: 8px;
        margin-top: 15px;
    }

    .advanced-search.active {
        display: block;
    }

    .form-wg {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .form-group {
        flex: 1;
        min-width: 200px;
    }

    .icon-filter {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: #FFA920;
        color: #fff;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .icon-filter:hover {
        background: #ff9900;
    }

    .icon-filter i {
        font-size: 18px;
    }

    /* تنسيقات قسم المميزات */
    .features-section {
        padding: 20px 0;
        border-top: 1px solid rgba(0,0,0,0.1);
    }

    .widget-features {
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .title-features {
        color: #333;
        font-size: 18px;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .title-features::before {
        content: '';
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 4px;
        height: 20px;
        background: #FFA920;
        border-radius: 2px;
    }

    .features-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 10px;
    }

    .feature-item {
        margin-bottom: 10px;
    }

    .checkbox-item {
        display: flex;
        align-items: center;
        cursor: pointer;
        font-size: 14px;
        color: #555;
    }

    .checkbox-item:hover {
        color: #FFA920;
    }

    .checkbox-item input[type="checkbox"] {
        display: none;
    }

    .custom-checkbox {
        width: 18px;
        height: 18px;
        border: 2px solid #FFA920;
        border-radius: 4px;
        margin-left: 8px;
        position: relative;
        transition: all 0.3s ease;
    }

    .checkbox-item input[type="checkbox"]:checked + .custom-checkbox {
        background: #FFA920;
    }

    .checkbox-item input[type="checkbox"]:checked + .custom-checkbox::after {
        content: '';
        position: absolute;
        left: 5px;
        top: 2px;
        width: 5px;
        height: 10px;
        border: solid #fff;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }

    .checkbox-item i {
        color: #FFA920;
        width: 20px;
        text-align: center;
        margin-left: 5px;
    }

    .flat-tabs {
        padding: 25px;
        border-radius: 10px;
        margin-bottom: 30px;
    }

    .form-sl {
        padding: 20px;
        border-radius: 8px;
    }

    .advanced-search {
        padding: 20px;
        border-radius: 8px;
        margin-top: 15px;
    }

    .sc-button {
        background: #2756FF;
        color: #fff;
        border: none;
        padding: 12px 25px;
        border-radius: 6px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .sc-button:hover {
        background: #1a41d8;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const parentCitySelect = document.getElementById('parent_city');
        const subCitiesSelect = document.getElementById('sub_cities');
        const searchForm = document.getElementById('searchForm');
        
        if (parentCitySelect && subCitiesSelect) {
            // تحميل الأحياء عند تحميل الصفحة إذا كانت هناك مدينة محددة
            if (parentCitySelect.value) {
                loadNeighborhoods(parentCitySelect.value);
            }

            parentCitySelect.addEventListener('change', function() {
                loadNeighborhoods(this.value);
            });

            function loadNeighborhoods(cityId) {
                if (!cityId) {
                    subCitiesSelect.innerHTML = '<option value="">اختر الحي</option>';
                    return;
                }

                fetch(`{{ url('/get-neighborhoods') }}/${cityId}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        let options = '<option value="">اختر الحي</option>';
                        const currentNeighborhoodId = '{{ request()->input("neighborhood_id") }}';
                        if (Array.isArray(data)) {
                            data.forEach(city => {
                                const selected = currentNeighborhoodId && currentNeighborhoodId == city.id ? 'selected' : '';
                                options += `<option value="${city.id}" ${selected}>${city.name}</option>`;
                            });
                        }
                        subCitiesSelect.innerHTML = options;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        subCitiesSelect.innerHTML = '<option value="">حدث خطأ في تحميل الأحياء</option>';
                    });
            }
        }

        // معالجة نطاق السعر
        const minPriceInput = document.getElementById('min_price');
        const maxPriceInput = document.getElementById('max_price');
        const sliderRangeValue1 = document.getElementById('slider-range-value1');
        const sliderRangeValue2 = document.getElementById('slider-range-value2');
        
        if (minPriceInput && maxPriceInput && sliderRangeValue1 && sliderRangeValue2) {
            const initialMinPrice = parseInt(minPriceInput.value) || 0;
            const initialMaxPrice = parseInt(maxPriceInput.value) || 1000000;

            sliderRangeValue1.textContent = initialMinPrice.toLocaleString();
            sliderRangeValue2.textContent = initialMaxPrice.toLocaleString();

            try {
                $("#slider-range").slider({
                    range: true,
                    min: 0,
                    max: 1000000,
                    step: 1000,
                    values: [initialMinPrice, initialMaxPrice],
                    slide: function(event, ui) {
                        minPriceInput.value = ui.values[0];
                        maxPriceInput.value = ui.values[1];
                        sliderRangeValue1.textContent = ui.values[0].toLocaleString();
                        sliderRangeValue2.textContent = ui.values[1].toLocaleString();
                    }
                });
            } catch (error) {
                console.error('Error initializing slider:', error);
            }
        }

        // معالجة تقديم النموذج
        if (searchForm) {
            searchForm.addEventListener('submit', function(e) {
                // لا نمنع السلوك الافتراضي للنموذج
                // نقوم فقط بتعطيل الحقول الفارغة
                const formData = new FormData(this);
                for (const pair of formData.entries()) {
                    if (!pair[1]) {
                        const input = this.querySelector(`[name="${pair[0]}"]`);
                        if (input) {
                            input.disabled = true;
                        }
                    }
                }
            });
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // معالجة زر الفلترة
        $('.icon-filter').on('click', function(e) {
            e.preventDefault(); // منع السلوك الافتراضي للرابط
            console.log('تم النقر على زر الفلترة'); // للتأكد من عمل الحدث
            $('.advanced-search').slideToggle('fast', function() {
                console.log('اكتمل التبديل'); // للتأكد من اكتمال التأثير
            });
        });

        // تهيئة باقي الوظائف
        const parentCitySelect = document.getElementById('parent_city');
        const subCitiesSelect = document.getElementById('sub_cities');

        if (parentCitySelect && subCitiesSelect) {
            // تحميل الأحياء عند تحميل الصفحة إذا كانت هناك مدينة محددة
            if (parentCitySelect.value) {
                loadNeighborhoods(parentCitySelect.value);
            }

            parentCitySelect.addEventListener('change', function() {
                loadNeighborhoods(this.value);
            });

            function loadNeighborhoods(cityId) {
                if (!cityId) {
                    subCitiesSelect.innerHTML = '<option value="">اختر الحي</option>';
                    return;
                }

                fetch(`{{ url('/get-neighborhoods') }}/${cityId}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        let options = '<option value="">اختر الحي</option>';
                        const currentNeighborhoodId = '{{ request()->input("neighborhood_id") }}';
                        if (Array.isArray(data)) {
                            data.forEach(city => {
                                const selected = currentNeighborhoodId && currentNeighborhoodId == city.id ? 'selected' : '';
                                options += `<option value="${city.id}" ${selected}>${city.name}</option>`;
                            });
                        }
                        subCitiesSelect.innerHTML = options;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        subCitiesSelect.innerHTML = '<option value="">حدث خطأ في تحميل الأحياء</option>';
                    });
            }
        }

        // معالجة نطاق السعر
        const minPriceInput = document.getElementById('min_price');
        const maxPriceInput = document.getElementById('max_price');
        const sliderRangeValue1 = document.getElementById('slider-range-value1');
        const sliderRangeValue2 = document.getElementById('slider-range-value2');
        
        if (minPriceInput && maxPriceInput && sliderRangeValue1 && sliderRangeValue2) {
            const initialMinPrice = parseInt(minPriceInput.value) || 0;
            const initialMaxPrice = parseInt(maxPriceInput.value) || 1000000;

            sliderRangeValue1.textContent = initialMinPrice.toLocaleString();
            sliderRangeValue2.textContent = initialMaxPrice.toLocaleString();

            try {
                $("#slider-range").slider({
                    range: true,
                    min: 0,
                    max: 1000000,
                    step: 1000,
                    values: [initialMinPrice, initialMaxPrice],
                    slide: function(event, ui) {
                        minPriceInput.value = ui.values[0];
                        maxPriceInput.value = ui.values[1];
                        sliderRangeValue1.textContent = ui.values[0].toLocaleString();
                        sliderRangeValue2.textContent = ui.values[1].toLocaleString();
                    }
                });
            } catch (error) {
                console.error('Error initializing slider:', error);
            }
        }

        // معالجة تقديم النموذج
        const searchForm = document.getElementById('searchForm');
        if (searchForm) {
            searchForm.addEventListener('submit', function(e) {
                // لا نمنع السلوك الافتراضي للنموذج
                // نقوم فقط بتعطيل الحقول الفارغة
                const formData = new FormData(this);
                for (const pair of formData.entries()) {
                    if (!pair[1]) {
                        const input = this.querySelector(`[name="${pair[0]}"]`);
                        if (input) {
                            input.disabled = true;
                        }
                    }
                }
            });
        }

        $('#searchForm').on('submit', function (e) {
            // لا نمنع السلوك الافتراضي للنموذج
            // نقوم فقط بإرسال طلب AJAX
            let formData = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'), // الرابط الموجود في form
                method: 'GET', // طريقة الإرسال
                data: formData,
                beforeSend: function () {
                    // يمكنك هنا إضافة مؤشر تحميل
                    $('#searchResults').html('<p>جاري البحث...</p>');
                },
                success: function (response) {
                    // عرض النتائج في div
                    $('#searchResults').html(response);
                },
                error: function (xhr, status, error) {
                    console.error('حدث خطأ:', error);
                    $('#searchResults').html('<p>حدث خطأ أثناء البحث. الرجاء المحاولة مرة أخرى.</p>');
                }
            });
        });
    });
</script>
