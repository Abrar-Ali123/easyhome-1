<section class="search-filter-section">
    <form id="searchForm" method="GET" action="{{ route('products.index') }}">
        <div class="filter-grid">
            <!-- حقل البحث -->
            <div>
                <input type="text" name="search" class="form-input" placeholder="ابحث عن عقار" value="{{ request()->input('search') }}">
            </div>

            <!-- المدينة والحي -->
            <div>
                <select name="city_id" id="parent_city" class="form-input" required>
                    <option value="" disabled {{ old('city_id') ? '' : 'selected' }}>اختر المدينة الرئيسية</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <select name="neighborhood_id" id="sub_cities" class="form-input">
                    <option value="" disabled selected>اختر الحي</option>
                </select>
            </div>

            <!-- السعر -->
            <div class="price-range">
                <input type="number" name="min_price" class="form-input" placeholder="أقل سعر" value="{{ request()->input('min_price') }}">
                <input type="number" name="max_price" class="form-input" placeholder="أعلى سعر" value="{{ request()->input('max_price') }}">
            </div>

            <!-- عدد الغرف والحمامات -->
            <div>
                <input type="number" name="bedrooms" class="form-input" placeholder="عدد الغرف" value="{{ request()->input('bedrooms') }}">
            </div>
            <div>
                <input type="number" name="bathrooms" class="form-input" placeholder="عدد الحمامات" value="{{ request()->input('bathrooms') }}">
            </div>

            <!-- المساحة -->
            <div class="area-range">
                <input type="number" name="min_area" class="form-input" placeholder="أقل مساحة (م²)" value="{{ request()->input('min_area') }}">
                <input type="number" name="max_area" class="form-input" placeholder="أعلى مساحة (م²)" value="{{ request()->input('max_area') }}">
            </div>

            <!-- زر البحث -->
            <div>
                <button type="submit" class="search-button">
                    <i class="fas fa-search"></i> ابحث
                </button>
            </div>
        </div>
    </form>
</section>

<style>
    /* تنسيق القسم */
    .search-filter-section {
        padding: 20px;
        margin: 20px auto;
        max-width: 800px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* تنسيق الحقول */
    .filter-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        align-items: center;
    }

    .form-input {
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 5px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        width: 100%;
        box-sizing: border-box;
    }

    .form-input:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        outline: none;
    }

    /* السعر والمساحة */
    .price-range,
    .area-range {
        display: flex;
        gap: 10px;
    }

    /* زر البحث */
    .search-button {
        background-color: #003e37;;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .search-button:hover {
        background-color: #0056b3;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // جلب الأحياء بناءً على المدينة المختارة
        document.getElementById('parent_city').addEventListener('change', function () {
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

        // AJAX لإعادة تحميل المنتجات بناءً على الفلترة
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
