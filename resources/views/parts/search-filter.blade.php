<section class="search-filter-section">
    <form id="searchForm" method="GET" action="{{ route('products.index') }}">
        <div class="filter-grid">
            <input type="text" name="search" class="form-input" placeholder="ابحث عن عقار" value="{{ request()->input('search') }}">

            <select name="city_id" class="form-select">
                <option value="">اختر المدينة</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ request()->input('city_id') == $city->id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>

            <div class="price-range">
                <input type="number" name="min_price" class="form-input" placeholder="أقل سعر" value="{{ request()->input('min_price') }}">
                <input type="number" name="max_price" class="form-input" placeholder="أعلى سعر" value="{{ request()->input('max_price') }}">
            </div>

            <input type="number" name="bedrooms" class="form-input" placeholder="عدد الغرف" value="{{ request()->input('bedrooms') }}">
            <input type="number" name="bathrooms" class="form-input" placeholder="عدد الحمامات" value="{{ request()->input('bathrooms') }}">

            <div class="area-range">
                <input type="number" name="min_area" class="form-input" placeholder="أقل مساحة (م²)" value="{{ request()->input('min_area') }}">
                <input type="number" name="max_area" class="form-input" placeholder="أعلى مساحة (م²)" value="{{ request()->input('max_area') }}">
            </div>

            <button type="submit" class="search-button">
                <i class="fas fa-search"></i> ابحث
            </button>
        </div>
    </form>
</section>



<script>
    $(document).ready(function () {
        $('#searchForm').on('submit', function (e) {
            e.preventDefault(); // منع التحديث الافتراضي للصفحة

            $.ajax({
                url: $(this).attr('action'),
                type: 'GET',
                data: $(this).serialize(),
                success: function (data) {
                    $('#productsContainer').html(data);
                },
                error: function (xhr, status, error) {
                    console.error('حدث خطأ أثناء الفلترة:', error);
                }
            });
        });
    });
</script>
