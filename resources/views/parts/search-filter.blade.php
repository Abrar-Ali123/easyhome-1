<section class="search-filter-section">
    <h2 class="search-filter-title">البحث والفلترة</h2>

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
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>
</section>

<style>
.search-filter-section {
    margin-top: 2rem;
    padding: 1rem;
    background-color: var(--primary-color);
    border-radius: 8px;
    transition: background-color 0.3s;
}

body.dark-theme .search-filter-section {
    background-color: var(--primary-color-dark);
}

.search-filter-title {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 1rem;
    text-align: center;
    color: var(--secondary-color);
    transition: color 0.3s;
}

body.dark-theme .search-filter-title {
    color: var(--highlight-color);
}

.filter-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr) auto; /* تعديل ليظهر زر البحث بجانب الحقول */
    gap: 1rem;
    align-items: center;
}

@media (min-width: 640px) {
    .filter-grid {
        grid-template-columns: repeat(3, 1fr) auto; /* لضبط الشبكة في الشاشات الأكبر */
    }
}

.form-input, .form-select {
    padding: 0.5rem;
    border: 1px solid var(--secondary-color);
    border-radius: 0.5rem;
    background-color: var(--primary-color);
    color: var(--secondary-color);
    transition: background-color 0.3s, color 0.3s;
}

body.dark-theme .form-input, body.dark-theme .form-select {
    background-color: var(--primary-color-dark);
    color: var(--highlight-color);
    border-color: var(--highlight-color);
}

.price-range, .area-range {
    display: flex;
    gap: 0.5rem;
}

.search-button {
    background-color: var(--accent-color);
    color: var(--highlight-color);
    padding: 0.75rem 1.5rem; /* تكبير حجم الزر */
    border-radius: 0.5rem;
    border: none;
    cursor: pointer;
    font-size: 1.25rem; /* تكبير الأيقونة */
    transition: background-color 0.3s ease;
}

.search-button:hover {
    background-color: var(--accent-color);
}

body.dark-theme .search-button {
    background-color: var(--accent-color);
    color: var(--highlight-color);
}

/* التأكد من أن كل شيء يبقى داخل الفورم */
form {
    max-width: 800px; /* أقصى عرض للفورم */
    margin: 0 auto; /* مركزة الفورم في الوسط */
    padding: 20px; /* التباعد الداخلي للفورم */
    background-color: var(--primary-color); /* لون الخلفية */
    border-radius: 10px; /* حواف مستديرة */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* ظل خفيف */
    transition: background-color 0.3s, box-shadow 0.3s; /* انتقال سلس للألوان */
    box-sizing: border-box; /* لحساب الحدود والتباعد الداخلي */
    overflow: hidden; /* منع العناصر من الخروج خارج حدود الفورم */
}
</style>
