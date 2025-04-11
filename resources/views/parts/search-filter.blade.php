@php
    $mainCities = App\Models\City::whereNull('parent_id')->get();
    $categories = App\Models\Product::CATEGORIES;
    $propertyFeatures = [
        'مكيف مركزي',
        'مطبخ مجهز',
        'غرفة خادمة',
        'مسبح خاص',
        'موقف خاص',
        'مصعد',
        'مفروش بالكامل',
        'خدمة تنظيف',
        'انترنت',
        'شرفة',
        'غرفة غسيل',
        'نظام أمني',
        'واجهات زجاجية',
        'أبواب كبيرة',
        'ارتفاع عالي',
        'نظام إطفاء',
        'نظام مراقبة',
        'تكييف صناعي'
    ];
    
    $locationFeatures = [
        'قريب من المدارس',
        'قريب من المستشفيات',
        'قريب من المسجد',
        'قريب من الأسواق',
        'قريب من المنتزهات',
        'قريب من البحر',
        'قريب من المطاعم',
        'قريب من المولات',
        'منطقة راقية',
        'على الشارع الرئيسي',
        'قريب من المترو',
        'منطقة حيوية',
        'سهولة الوصول',
        'منطقة صناعية',
        'قرب الطرق السريعة',
        'خدمات لوجستية',
        'أمن على مدار الساعة'
    ];
@endphp

<div class="search-section">
    <div class="container">
        <form id="searchForm" method="GET" action="{{ route('products.search') }}">
            <!-- البحث الرئيسي -->
            <div class="main-search">
                <div class="search-row">
                    <!-- حقل البحث -->
                    <div class="search-input">
                        <i class="fas fa-search input-icon"></i>
                        <input type="text" name="search" value="{{ request()->input('search') }}"
                            placeholder="ابحث عن عقار..." class="form-control">
                    </div>

                    <!-- نوع العقار -->
                    <div class="select-group">
                        <i class="fas fa-home input-icon"></i>
                        <select class="form-select" name="category" id="category">
                            <option value="">نوع العقار</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category }}"
                                    {{ request()->input('category') == $category ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- المدينة -->
                    <div class="select-group">
                        <i class="fas fa-map-marker-alt input-icon"></i>
                        <select class="form-select" name="city_id" id="city">
                            <option value="">المدينة</option>
                            @foreach ($mainCities as $city)
                                <option value="{{ $city->id }}"
                                    {{ request()->input('city_id') == $city->id ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- الحي -->
                    <div class="select-group">
                        <i class="fas fa-map input-icon"></i>
                        <select class="form-select" name="neighborhood_id" id="neighborhood" disabled>
                            <option value="">الحي</option>
                        </select>
                    </div>

                    <!-- زر البحث -->
                    <button type="submit" class="search-btn">
                        <i class="fas fa-search"></i>
                        <span>ابحث</span>
                    </button>

                    <!-- زر الفلتر -->
                    <button type="button" class="filter-btn" id="filterToggle">
                        <i class="fas fa-sliders-h"></i>
                    </button>
                </div>
            </div>

            <!-- البحث المتقدم -->
            <div class="advanced-search" id="advancedSearch">
                <div class="filter-grid">
                    <!-- نوع العرض -->
                    <div class="filter-group">
                        <label>نوع العرض</label>
                        <div class="btn-group">
                            <input type="radio" name="property_type" value="sale" id="sale" 
                                {{ request()->input('property_type') == 'sale' ? 'checked' : '' }}>
                            <label for="sale" class="btn-option">للبيع</label>
                            
                            <input type="radio" name="property_type" value="rent" id="rent"
                                {{ request()->input('property_type') == 'rent' ? 'checked' : '' }}>
                            <label for="rent" class="btn-option">للإيجار</label>
                        </div>
                    </div>

                    <!-- حالة العقار -->
                    <div class="filter-group">
                        <label>حالة العقار</label>
                        <div class="btn-group">
                            <input type="radio" name="property_status" value="new" id="new"
                                {{ request()->input('property_status') == 'new' ? 'checked' : '' }}>
                            <label for="new" class="btn-option">جديد</label>
                            
                            <input type="radio" name="property_status" value="used" id="used"
                                {{ request()->input('property_status') == 'used' ? 'checked' : '' }}>
                            <label for="used" class="btn-option">مستعمل</label>
                        </div>
                    </div>

                    <!-- عدد الغرف -->
                    <div class="filter-group">
                        <label>عدد الغرف</label>
                        <div class="number-input">
                            <select name="bedrooms" class="form-select">
                                <option value="">الكل</option>
                                @for($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}" {{ request()->input('bedrooms') == $i ? 'selected' : '' }}>
                                        {{ $i }} {{ $i == 1 ? 'غرفة' : 'غرف' }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <!-- عدد دورات المياه -->
                    <div class="filter-group">
                        <label>دورات المياه</label>
                        <div class="number-input">
                            <select name="bathrooms" class="form-select">
                                <option value="">الكل</option>
                                @for($i = 1; $i <= 7; $i++)
                                    <option value="{{ $i }}" {{ request()->input('bathrooms') == $i ? 'selected' : '' }}>
                                        {{ $i }} {{ $i == 1 ? 'دورة مياه' : 'دورات مياه' }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <!-- المساحة -->
                    <div class="filter-group">
                        <label>المساحة (متر مربع)</label>
                        <div class="range-group">
                            <input type="number" name="min_area" value="{{ request()->input('min_area') }}"
                                placeholder="من" class="form-control">
                            <span class="range-separator">-</span>
                            <input type="number" name="max_area" value="{{ request()->input('max_area') }}"
                                placeholder="إلى" class="form-control">
                        </div>
                    </div>

                    <!-- السعر -->
                    <div class="filter-group">
                        <label>السعر</label>
                        <div class="range-group">
                            <input type="number" name="min_price" value="{{ request()->input('min_price') }}"
                                placeholder="من" class="form-control">
                            <span class="range-separator">-</span>
                            <input type="number" name="max_price" value="{{ request()->input('max_price') }}"
                                placeholder="إلى" class="form-control">
                        </div>
                    </div>

                    <!-- مميزات العقار -->
                    <div class="filter-group features-section">
                        <label class="section-title">
                            <i class="fas fa-home me-2"></i>
                            مميزات العقار
                        </label>
                        <div class="features-grid">
                            @foreach ($propertyFeatures as $feature)
                                <div class="feature-item">
                                    <input type="checkbox" name="property_features[]" value="{{ $feature }}" id="pf_{{ $loop->index }}"
                                        {{ in_array($feature, (array)request()->input('property_features', [])) ? 'checked' : '' }}>
                                    <label for="pf_{{ $loop->index }}" class="feature-label">
                                        <i class="{{ (new App\Models\Product)->getFeatureIcon($feature) }}"></i>
                                        <span>{{ $feature }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- مميزات الموقع -->
                    <div class="filter-group features-section">
                        <label class="section-title">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            مميزات الموقع
                        </label>
                        <div class="features-grid">
                            @foreach ($locationFeatures as $feature)
                                <div class="feature-item">
                                    <input type="checkbox" name="location_features[]" value="{{ $feature }}" id="lf_{{ $loop->index }}"
                                        {{ in_array($feature, (array)request()->input('location_features', [])) ? 'checked' : '' }}>
                                    <label for="lf_{{ $loop->index }}" class="feature-label">
                                        <i class="{{ (new App\Models\Product)->getFeatureIcon($feature) }}"></i>
                                        <span>{{ $feature }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
/* القسم الرئيسي */
.search-section {
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(10px);
    padding: 30px 0;
    border-radius: 20px;
    z-index: 1000;

    top: 50%;
    
     width: 90%;
    max-width: 1400px;
}

/* تحسين تجاوب العرض على الشاشات الصغيرة */
@media (max-width: 768px) {
    .search-section {
        position: relative;
        transform: none;
        top: 0;
        left: 0;
        width: 95%;
        margin: 20px auto;
        padding: 15px;
    }
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

/* البحث الرئيسي */
.main-search {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 15px;
    padding: 20px;
    margin-bottom: 20px;
}

.search-row {
    display: grid;
    grid-template-columns: 1.5fr repeat(3, 1fr) auto auto;
    gap: 15px;
    align-items: center;
}

/* حقول الإدخال */
.search-input,
.select-group {
    position: relative;
}

.input-icon {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #DAA520;
    font-size: 16px;
    z-index: 1;
}

.form-control,
.form-select {
    width: 100%;
    height: 50px;
    padding: 0 45px 0 15px;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #fff;
    font-size: 14px;
    transition: all 0.3s ease;
}

.form-control:focus,
.form-select:focus {
    background: rgba(255, 255, 255, 0.15);
    border-color: #DAA520;
    outline: none;
    box-shadow: 0 0 0 3px rgba(218, 165, 32, 0.1);
}

/* الأزرار */
.search-btn,
.filter-btn {
    height: 50px;
    border-radius: 10px;
    border: none;
    padding: 0 20px;
    font-size: 14px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.search-btn {
    background: #DAA520;
    color: #fff;
}

.search-btn:hover {
    background: #c99412;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(218, 165, 32, 0.2);
}

.filter-btn {
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.filter-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: #DAA520;
}

.filter-btn.active {
    background: #DAA520;
    border-color: #DAA520;
}

/* البحث المتقدم */
.advanced-search {
    display: none;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 15px;
    padding: 20px;
    margin-top: 20px;
    animation: slideDown 0.3s ease;
}

.advanced-search.active {
    display: block;
}

/* الفلاتر */
.filter-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.filter-group {
    background: rgba(0, 0, 0, 0.2);
    padding: 20px;
    border-radius: 10px;
}

.filter-group label {
    display: block;
    color: #fff;
    margin-bottom: 10px;
    font-size: 14px;
    font-weight: 500;
}

/* مجموعة الأزرار */
.btn-group {
    display: flex;
    gap: 10px;
}

.btn-group input[type="radio"] {
    display: none;
}

.btn-option {
    flex: 1;
    padding: 10px;
    text-align: center;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 8px;
    color: #fff;
    cursor: pointer;
    transition: all 0.3s ease;
}

input[type="radio"]:checked + .btn-option {
    background: #DAA520;
    border-color: #DAA520;
}

/* حقول المدى */
.range-group {
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    gap: 10px;
    align-items: center;
}

.range-separator {
    color: #fff;
    font-weight: bold;
}

.features-section {
    padding: 20px !important;
}

.section-title {
    font-size: 18px;
    margin-bottom: 15px;
    color: #fff;
    display: flex;
    align-items: center;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 8px;
}

.feature-item {
    position: relative;
}

.feature-item input[type="checkbox"] {
    display: none;
}

.feature-label {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 6px 8px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 6px;
    color: #fff;
    cursor: pointer;
    transition: all 0.3s ease;
    margin: 0;
    height: 100%;
    font-size: 12px;
}

.feature-label i {
    font-size: 14px;
    min-width: 16px;
    text-align: center;
    margin-left: 6px;
}

.feature-label span {
    font-size: 12px;
    line-height: 1.2;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* التجاوب */
@media (max-width: 1200px) {
    .search-row {
        grid-template-columns: 1fr 1fr 1fr;
    }
    
    .search-input {
        grid-column: 1 / -1;
    }
}

@media (max-width: 768px) {
    .search-section {
        padding: 15px;
    }

    .search-row {
        grid-template-columns: 1fr;
    }

    .search-btn,
    .filter-btn {
        width: 100%;
        justify-content: center;
    }

    .filter-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .features-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 480px) {
    .features-grid {
        grid-template-columns: 1fr;
    }
}

.images.po-content-one {
    z-index: -1;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const citySelect = document.getElementById('city');
    const neighborhoodSelect = document.getElementById('neighborhood');
    const filterBtn = document.querySelector('.filter-btn');
    const advancedSearch = document.querySelector('.advanced-search');
    
    // تحميل الأحياء عند تغيير المدينة
    if (citySelect) {
        citySelect.addEventListener('change', function() {
            const cityId = this.value;
            neighborhoodSelect.innerHTML = '<option value="">اختر الحي</option>';
            neighborhoodSelect.disabled = true;
            
            if (cityId) {
                fetch(`/neighborhoods/${cityId}`)
                    .then(response => response.json())
                    .then(data => {
                        let options = '<option value="">اختر الحي</option>';
                        data.forEach(neighborhood => {
                            const selected = neighborhood.id == {{ request()->input('neighborhood_id', 'null') }} ? 'selected' : '';
                            options += `<option value="${neighborhood.id}" ${selected}>${neighborhood.name}</option>`;
                        });
                        neighborhoodSelect.innerHTML = options;
                        neighborhoodSelect.disabled = false;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        neighborhoodSelect.innerHTML = '<option value="">حدث خطأ في تحميل الأحياء</option>';
                    });
            }
        });

        // تحميل الأحياء عند تحميل الصفحة إذا كانت هناك مدينة محددة
        if (citySelect.value) {
            citySelect.dispatchEvent(new Event('change'));
        }
    }

    // تبديل البحث المتقدم
    if (filterBtn && advancedSearch) {
        filterBtn.addEventListener('click', function() {
            advancedSearch.classList.toggle('active');
            this.classList.toggle('active');
        });
    }
});
</script>
