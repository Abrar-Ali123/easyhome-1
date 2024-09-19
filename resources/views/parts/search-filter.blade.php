<section class="search-filter-section">
    <form method="GET" action="{{ route('products.index1') }}">
        <div class="filter-grid">
            <!-- البحث بالكلمة -->
            <input type="text" name="search" class="form-input" placeholder="ابحث عن عقار" value="{{ request()->input('search') }}">

            <!-- الفلترة بالمدينة -->
            <select name="city_id" class="form-select">
                <option value="">اختر المدينة</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ request()->input('city_id') == $city->id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>

            <!-- الفلترة بالسعر -->
            <div class="price-range">
                <input type="number" name="min_price" class="form-input" placeholder="أقل سعر" value="{{ request()->input('min_price') }}">
                <input type="number" name="max_price" class="form-input" placeholder="أعلى سعر" value="{{ request()->input('max_price') }}">
            </div>

            <!-- الفلترة بعدد الغرف -->
            <input type="number" name="bedrooms" class="form-input" placeholder="عدد الغرف" value="{{ request()->input('bedrooms') }}">

            <!-- الفلترة بعدد الحمامات -->
            <input type="number" name="bathrooms" class="form-input" placeholder="عدد الحمامات" value="{{ request()->input('bathrooms') }}">

            <!-- الفلترة بالمساحة -->
            <div class="area-range">
                <input type="number" name="min_area" class="form-input" placeholder="أقل مساحة (م²)" value="{{ request()->input('min_area') }}">
                <input type="number" name="max_area" class="form-input" placeholder="أعلى مساحة (م²)" value="{{ request()->input('max_area') }}">
            </div>

            <!-- زر البحث -->
            <button type="submit" class="search-button">
                <i class="fas fa-search"></i> ابحث
            </button>
        </div>
    </form>
</section>


<style>
   :root {
    --primary-color: #fff; /* اللون الأساسي للخلفية العامة */
    --primary-color-dark: #091716; /* اللون الأساسي للخلفية العامة في الوضع الداكن */
    --highlight-color: #fff6e0; /* اللون المميز لإبراز العناصر */
    --secondary-color: #003e37; /* لون النصوص والخلفيات الأخرى */
    --accent-color: #bb9339; /* اللون المميز للتأكيد */
}

.search-filter-section {
    background-color: var(--primary-color);
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-right: 20%;
    margin-left: 20%;
    margin-top: 10%;
    color: var(--secondary-color);
}

.search-filter-section .filter-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

.search-filter-section .form-input,
.search-filter-section .form-select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    background-color: var(--primary-color);
    color: var(--secondary-color);
    transition: border-color 0.3s ease;
}

.search-filter-section .form-input:focus,
.search-filter-section .form-select:focus {
    border-color: var(--accent-color);
    outline: none;
}

.search-filter-section .price-range,
.search-filter-section .area-range {
    display: flex;
    gap: 10px;
}

.search-filter-section .price-range input,
.search-filter-section .area-range input {
    flex: 1;
    background-color: var(--primary-color);
    color: var(--secondary-color);
}

.search-filter-section .search-button {
    background-color: var(--accent-color);
    color: var(--primary-color);
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.search-filter-section .search-button i {
    margin-right: 8px;
}

.search-filter-section .search-button:hover {
    background-color: darken(var(--accent-color), 10%);
}

/* الوضع الداكن */
body.dark-theme .search-filter-section {
    background-color: var(--primary-color-dark);
    color: var(--highlight-color);
    box-shadow: 0 2px 10px rgba(255, 255, 255, 0.5); /* ظل أبيض مع شفافية */

}

body.dark-theme .search-filter-section .form-input,
body.dark-theme .search-filter-section .form-select {
    background-color: var(--primary-color-dark);
    border: 1px solid var(--highlight-color);
    color: var(--highlight-color);
}

body.dark-theme .search-filter-section .form-input:focus,
body.dark-theme .search-filter-section .form-select:focus {
    border-color: var(--accent-color);
}

body.dark-theme .search-filter-section .price-range input,
body.dark-theme .search-filter-section .area-range input {
    background-color: var(--primary-color-dark);
    color: var(--highlight-color);
}

body.dark-theme .search-filter-section .search-button {
    background-color: var(--accent-color);
    color: var(--primary-color-dark);
}

body.dark-theme .search-filter-section .search-button:hover {
    background-color: darken(var(--accent-color), 10%);
}


    </style>
