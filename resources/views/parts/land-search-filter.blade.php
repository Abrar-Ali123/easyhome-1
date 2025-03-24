@php
    $mainCities = App\Models\City::whereNull('parent_id')->get();
@endphp

<div class="flat-tabs themesflat-tabs">
    <div class="box-tab center">
    </div>
    <div class="content-tab">
        <div class="content-inner tab-content">
            <div class="form-sl">
                <form id="landSearchForm" method="GET" action="{{ route('lands.search') }}">
                    <div class="wd-find-select flex">
                        <div class="inner-group">
                            <div class="form-group-1 search-form form-style">
                                <div class="group-select">
                                    <div class="tf-select">
                                        <select class="nice-select" name="land_type" id="land_type">
                                            <option value="">نوع الأرض</option>
                                            <option value="سكني" {{ request()->input('land_type') == 'سكني' ? 'selected' : '' }}>سكني</option>
                                            <option value="تجاري" {{ request()->input('land_type') == 'تجاري' ? 'selected' : '' }}>تجاري</option>
                                            <option value="صناعي" {{ request()->input('land_type') == 'صناعي' ? 'selected' : '' }}>صناعي</option>
                                            <option value="زراعي" {{ request()->input('land_type') == 'زراعي' ? 'selected' : '' }}>زراعي</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

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
                        <div class="form-group-4 form-style">
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

                    <div class="advanced-search">
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
                                        <select class="nice-select" name="min_area" id="min_area">
                                            <option value="">الحد الأدنى للمساحة</option>
                                            @foreach ([100, 200, 300, 400, 500, 750, 1000, 1500, 2000, 2500, 3000] as $area)
                                                <option value="{{ $area }}"
                                                    {{ request()->input('min_area') == $area ? 'selected' : '' }}>
                                                    {{ $area }} م²
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group wg-box3">
                                <div class="group-select">
                                    <div class="tf-select">
                                        <select class="nice-select" name="max_area" id="max_area">
                                            <option value="">الحد الأعلى للمساحة</option>
                                            @foreach ([200, 300, 400, 500, 750, 1000, 1500, 2000, 2500, 3000, 4000, 5000] as $area)
                                                <option value="{{ $area }}"
                                                    {{ request()->input('max_area') == $area ? 'selected' : '' }}>
                                                    {{ $area }} م²
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- خصائص الأرض -->
                        <div class="features-section mt-4">
                            <div class="row">
                                <!-- مميزات الأرض -->
                                <div class="col-md-6 mb-4">
                                    <div class="widget-features">
                                        <h4 class="title-features">مميزات الأرض</h4>
                                        <div class="features-list">
                                            <div class="feature-item">
                                                <label class="checkbox-item">
                                                    <input type="checkbox" name="land_features[]" value="مخطط"
                                                        {{ in_array('مخطط', (array)request('land_features')) ? 'checked' : '' }}>
                                                    <span class="custom-checkbox"></span>
                                                    <i class="fas fa-map ml-2"></i>
                                                    مخطط
                                                </label>
                                            </div>
                                            <div class="feature-item">
                                                <label class="checkbox-item">
                                                    <input type="checkbox" name="land_features[]" value="كهرباء"
                                                        {{ in_array('كهرباء', (array)request('land_features')) ? 'checked' : '' }}>
                                                    <span class="custom-checkbox"></span>
                                                    <i class="fas fa-bolt ml-2"></i>
                                                    كهرباء
                                                </label>
                                            </div>
                                            <div class="feature-item">
                                                <label class="checkbox-item">
                                                    <input type="checkbox" name="land_features[]" value="مياه"
                                                        {{ in_array('مياه', (array)request('land_features')) ? 'checked' : '' }}>
                                                    <span class="custom-checkbox"></span>
                                                    <i class="fas fa-tint ml-2"></i>
                                                    مياه
                                                </label>
                                            </div>
                                            <div class="feature-item">
                                                <label class="checkbox-item">
                                                    <input type="checkbox" name="land_features[]" value="صرف صحي"
                                                        {{ in_array('صرف صحي', (array)request('land_features')) ? 'checked' : '' }}>
                                                    <span class="custom-checkbox"></span>
                                                    <i class="fas fa-water ml-2"></i>
                                                    صرف صحي
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- مميزات الموقع -->
                                <div class="col-md-6 mb-4">
                                    <div class="widget-features">
                                        <h4 class="title-features">مميزات الموقع</h4>
                                        <div class="features-list">
                                            <div class="feature-item">
                                                <label class="checkbox-item">
                                                    <input type="checkbox" name="location_features[]" value="شارع تجاري"
                                                        {{ in_array('شارع تجاري', (array)request('location_features')) ? 'checked' : '' }}>
                                                    <span class="custom-checkbox"></span>
                                                    <i class="fas fa-store ml-2"></i>
                                                    شارع تجاري
                                                </label>
                                            </div>
                                            <div class="feature-item">
                                                <label class="checkbox-item">
                                                    <input type="checkbox" name="location_features[]" value="قريب من المدارس"
                                                        {{ in_array('قريب من المدارس', (array)request('location_features')) ? 'checked' : '' }}>
                                                    <span class="custom-checkbox"></span>
                                                    <i class="fas fa-school ml-2"></i>
                                                    قريب من المدارس
                                                </label>
                                            </div>
                                            <div class="feature-item">
                                                <label class="checkbox-item">
                                                    <input type="checkbox" name="location_features[]" value="قريب من المساجد"
                                                        {{ in_array('قريب من المساجد', (array)request('location_features')) ? 'checked' : '' }}>
                                                    <span class="custom-checkbox"></span>
                                                    <i class="fas fa-mosque ml-2"></i>
                                                    قريب من المساجد
                                                </label>
                                            </div>
                                            <div class="feature-item">
                                                <label class="checkbox-item">
                                                    <input type="checkbox" name="location_features[]" value="قريب من الخدمات"
                                                        {{ in_array('قريب من الخدمات', (array)request('location_features')) ? 'checked' : '' }}>
                                                    <span class="custom-checkbox"></span>
                                                    <i class="fas fa-concierge-bell ml-2"></i>
                                                    قريب من الخدمات
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .widget-features {
        background: #f8f8f8;
        padding: 20px;
        border-radius: 8px;
    }

    .title-features {
        margin-bottom: 15px;
        font-size: 18px;
        color: #333;
    }

    .features-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 15px;
    }

    .feature-item {
        display: flex;
        align-items: center;
    }

    .checkbox-item {
        display: flex;
        align-items: center;
        cursor: pointer;
        user-select: none;
    }

    .checkbox-item input[type="checkbox"] {
        display: none;
    }

    .custom-checkbox {
        width: 18px;
        height: 18px;
        border: 2px solid #ddd;
        border-radius: 4px;
        margin-left: 8px;
        position: relative;
    }

    .checkbox-item input[type="checkbox"]:checked + .custom-checkbox::after {
        content: '✓';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #2ecc71;
        font-size: 14px;
    }

    .checkbox-item i {
        margin-left: 8px;
        color: #666;
    }

    .advanced-search {
        display: none;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        margin-top: 20px;
    }

    .advanced-search.active {
        display: block;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const parentCitySelect = document.getElementById('parent_city');
        const subCitiesSelect = document.getElementById('sub_cities');

        parentCitySelect.addEventListener('change', function() {
            const cityId = this.value;
            
            // تفريغ قائمة الأحياء
            subCitiesSelect.innerHTML = '<option value="">اختر الحي</option>';
            
            if (cityId) {
                // إحضار الأحياء للمدينة المختارة
                fetch(`/api/cities/${cityId}/neighborhoods`)
                    .then(response => response.json())
                    .then(neighborhoods => {
                        neighborhoods.forEach(neighborhood => {
                            const option = document.createElement('option');
                            option.value = neighborhood.id;
                            option.textContent = neighborhood.name;
                            subCitiesSelect.appendChild(option);
                        });
                        
                        // تحديث Select2
                        $(subCitiesSelect).niceSelect('update');
                    });
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        // معالجة زر الفلترة
        $('.icon-filter').on('click', function(e) {
            e.preventDefault();
            $('.advanced-search').slideToggle('fast');
        });

        // تهيئة شريط نطاق السعر
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 1000000,
            values: [{{ request('min_price', 0) }}, {{ request('max_price', 1000000) }}],
            slide: function (event, ui) {
                $("#slider-range-value1").text(ui.values[0].toLocaleString());
                $("#slider-range-value2").text(ui.values[1].toLocaleString());
                $("#min_price").val(ui.values[0]);
                $("#max_price").val(ui.values[1]);
            }
        });

        // تحديث قيم النص عند تحميل الصفحة
        $("#slider-range-value1").text($("#slider-range").slider("values", 0).toLocaleString());
        $("#slider-range-value2").text($("#slider-range").slider("values", 1).toLocaleString());
    });
</script>
