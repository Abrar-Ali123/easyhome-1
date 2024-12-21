@php
    $features = App\Models\Product::$featuresList;
@endphp

<div class="flat-tabs themesflat-tabs">
    <div class="box-tab center">
    </div>
    <div class="content-tab">
        <div class="content-inner tab-content">
            <div class="form-sl">
                <form id="searchForm" method="GET" action="{{ route('products.index') }}">
                    <div class="wd-find-select flex">
                        <div class="inner-group">
                            <div class="form-group-1 search-form form-style">
                                <input type="text" class="search-field" placeholder="ابحث عن عقار" name="search"
                                    value="{{ request()->input('search') }}" required>
                            </div>

                            <div class="form-group-2 form-style">
                                <div class="group-select">
                                    <div class="tf-select">
                                        <select class="nice-select" name="city_id" id="parent_city" required>
                                            <option value="" disabled {{ old('city_id') ? '' : 'selected' }}>اختر
                                                المدينة الرئيسية</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}"
                                                    {{ old('city_id') == $city->id ? 'selected' : '' }}>
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
                                            <option value="" disabled selected>اختر الحي</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="button-search sc-btn-top">
                            <a class="sc-button" href="#">
                                <span>ابحث الان</span>
                                <i class="far fa-search text-color-1"></i>
                            </a>
                        </div>
                    </div>

                    <div class="wd-find-select wd-search-form ">
                        <div class="box1 flex flex-wrap form-wg">
                            <div class="form-group wg-box3">
                                <div class="group-select">
                                    <div class="tf-select">
                                        <select class="nice-select" name="bedrooms" id="bedrooms">
                                            <option value="" {{ request()->input('bedrooms') ? '' : 'selected' }}>
                                                حدد عدد الغرف</option>
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
                                            <option value=""
                                                {{ request()->input('bathrooms') ? '' : 'selected' }}>حدد عدد دورات
                                                المياه</option>
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

                            <div class="form-group wg-box3">
                                <div class="widget widget-price">
                                    <div class="caption flex-two">
                                        <div>
                                            <span class="fw-6">السعر</span>
                                            <span id="slider-range-value1">{{ request('min_price', 0) }}</span>
                                            <span id="slider-range-value2">{{ request('max_price', 1000000) }}</span>
                                        </div>
                                    </div>
                                    <div id="slider-range"></div>
                                    <div class="slider-labels">
                                        <input type="hidden" name="min_price" id="min_price"
                                            value="{{ request('min_price', 0) }}">
                                        <input type="hidden" name="max_price" id="max_price"
                                            value="{{ request('max_price', 1000000) }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="boder-wg"></div>
                        <div class="box2 flex flex-wrap form-wg">
                            <div class="form-group wg-box3">
                                <div class="tf-amenities bg-white">
                                    @foreach ($features as $key => $feature)
                                        <label class="flex">
                                            <input type="checkbox" name="features[]" value="{{ $key }}"
                                                {{ in_array($key, request()->input('features', [])) ? 'checked' : '' }} />
                                            <span class="btn-checkbox"></span>
                                            <span class="fs-13">{{ $feature }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
    });
</script>
