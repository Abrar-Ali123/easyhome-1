<div class="flat-tabs themesflat-tabs">
                                        <div class="box-tab center">

                                        </div>
                                        <div class="content-tab">
                                            <div class="content-inner tab-content">
                                                <div class="form-sl">

                                                <form id="searchForm" method="GET" action="{{ route('products.index') }}">
    <div class="wd-find-select flex">
        <div class="inner-group">
            <!-- حقل البحث -->
            <div class="form-group-1 search-form form-style">
                <input type="text" class="search-field" placeholder="ابحث عن عقار" name="search" value="{{ request()->input('search') }}" required>
            </div>

            <!-- المدينة -->
            <div class="form-group-2 form-style">
                <div class="group-select">
                    <div class="tf-select">
                        <select class="nice-select" name="city_id" id="parent_city" required>
                            <option value="" disabled {{ old('city_id') ? '' : 'selected' }}>اختر المدينة الرئيسية</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- الحي -->
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


                                                            <div class="form-group-4 form-style">
                                                                <a class="icon-filter pull-right ">
                                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M3 10.5V0.75M3 10.5C3.39782 10.5 3.77936 10.658 4.06066 10.9393C4.34196 11.2206 4.5 11.6022 4.5 12C4.5 12.3978 4.34196 12.7794 4.06066 13.0607C3.77936 13.342 3.39782 13.5 3 13.5M3 10.5C2.60218 10.5 2.22064 10.658 1.93934 10.9393C1.65804 11.2206 1.5 11.6022 1.5 12C1.5 12.3978 1.65804 12.7794 1.93934 13.0607C2.22064 13.342 2.60218 13.5 3 13.5M3 17.25V13.5M15 10.5V0.75M15 10.5C15.3978 10.5 15.7794 10.658 16.0607 10.9393C16.342 11.2206 16.5 11.6022 16.5 12C16.5 12.3978 16.342 12.7794 16.0607 13.0607C15.7794 13.342 15.3978 13.5 15 13.5M15 10.5C14.6022 10.5 14.2206 10.658 13.9393 10.9393C13.658 11.2206 13.5 11.6022 13.5 12C13.5 12.3978 13.658 12.7794 13.9393 13.0607C14.2206 13.342 14.6022 13.5 15 13.5M15 17.25V13.5M9 4.5V0.75M9 4.5C9.39782 4.5 9.77936 4.65804 10.0607 4.93934C10.342 5.22064 10.5 5.60218 10.5 6C10.5 6.39782 10.342 6.77936 10.0607 7.06066C9.77936 7.34196 9.39782 7.5 9 7.5M9 4.5C8.60218 4.5 8.22064 4.65804 7.93934 4.93934C7.65804 5.22064 7.5 5.60218 7.5 6C7.5 6.39782 7.65804 6.77936 7.93934 7.06066C8.22064 7.34196 8.60218 7.5 9 7.5M9 17.25V7.5" stroke="#FFA920" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        </svg>
                                                                    </a>
                                                            </div>
                                                            <div class="button-search sc-btn-top">
                                                                <a class="sc-button" href="#">
                                                                        <span>Search Now</span>
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

<option value="" {{ request()->input('bedrooms') ? '' : 'selected' }}>حدد عدد الغرف</option>
@foreach (range(1, 10) as $room)
    <option value="{{ $room }}" {{ request()->input('bedrooms') == $room ? 'selected' : '' }}>
        {{ $room }}
    </option>
@endforeach
</select>
</select>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group wg-box3">
                                                                    <div class="group-select">
                                                                        <div class="tf-select">









            <select class="nice-select" name="bathrooms" id="bathrooms">
    <option value="" {{ request()->input('bathrooms') ? '' : 'selected' }}>حدد عدد دورات المياه</option>
    @foreach (range(1, 10) as $bath)
        <option value="{{ $bath }}" {{ request()->input('bathrooms') == $bath ? 'selected' : '' }}>
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
            <input type="hidden" name="min_price" id="min_price" value="{{ request('min_price', 0) }}">
            <input type="hidden" name="max_price" id="max_price" value="{{ request('max_price', 1000000) }}">
        </div>
    </div>
</div>

<div class="form-group wg-box3">
    <div class="widget widget-price">
        <div class="caption flex-two">
            <div>
                <span class="fw-6">المساحة</span>
                <span id="slider-range-value01">{{ request('min_area', 0) }}</span>
                <span id="slider-range-value02">{{ request('max_area', 50000) }}</span>
            </div>
        </div>
        <div id="slider-range2"></div>
        <div class="slider-labels">
            <input type="hidden" name="min_area" id="min_area" value="{{ request('min_area', 0) }}">
            <input type="hidden" name="max_area" id="max_area" value="{{ request('max_area', 50000) }}">
        </div>
    </div>
</div>





                                                            </div>
                                                            <div class="boder-wg"></div>
                                                            <div class="box2 flex flex-wrap form-wg">
                                                                <div class="form-group wg-box3">
                                                                    <div class="tf-amenities bg-white">
                                                                        <label class="flex"><input name="newsletter" type="checkbox"  />
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Swimming pool</span>
                                                                            </label>
                                                                        <label class="flex"><input name="newsletter" type="checkbox" />
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Garage</span>
                                                                            </label>
                                                                        <label class="flex"><input name="newsletter" type="checkbox"  />
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Alarm system</span>
                                                                            </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group wg-box3">
                                                                    <div class="tf-amenities bg-white">
                                                                        <label class="flex"><input name="newsletter" type="checkbox"  />
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Balcony</span>
                                                                            </label>
                                                                        <label class="flex"><input name="newsletter" type="checkbox"  />
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Outdoor area</span>
                                                                            </label>
                                                                        <label class="flex"><input name="newsletter" type="checkbox" />
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Broadband</span>
                                                                            </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group wg-box3">
                                                                    <div class="tf-amenities bg-white">
                                                                        <label class="flex"><input name="newsletter" type="checkbox"  />
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Ensuite</span>
                                                                            </label>
                                                                        <label class="flex"><input name="newsletter" type="checkbox" />
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Built in robes</span>
                                                                            </label>
                                                                        <label class="flex"><input name="newsletter" type="checkbox"  />
                                                                                <span class="btn-checkbox"></span><span class="fs-13 ">Gym</span>
                                                                            </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group wg-box3">
                                                                    <div class="tf-amenities bg-white">
                                                                        <label class="flex"><input name="newsletter" type="checkbox"  />
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Tennis court</span>
                                                                            </label>
                                                                        <label class="flex"><input name="newsletter" type="checkbox"  />
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Study</span>
                                                                            </label>
                                                                        <label class="flex"><input name="newsletter" type="checkbox"  />
                                                                                <span class="btn-checkbox"></span><span class="fs-13">Outdoor spa</span>
                                                                            </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </form>



                                                    <!-- End Job  Search Form-->
                                                </div>

</div>
<!-- <div class="content-inner tab-content"></div> -->
</div>
</div>



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
