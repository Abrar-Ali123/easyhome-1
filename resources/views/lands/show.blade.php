@extends('home')

@section('content')
    <section class="flat-slider01 style">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="swiper-container thumbs-swiper-row">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="image-detail">
                                    <img src="{{ url('/storage/app/public/' . $land->image) }}" alt="صورة الأرض">
                                </div>
                            </div>

                            @if ($land->images)
                                @foreach (json_decode($land->images, true) as $image)
                                    <div class="swiper-slide">
                                        <div class="image-detail">
                                            <img src="{{ url('/storage/app/public/' . $image) }}" alt="صورة الأرض">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div thumbsSlider="" class="swiper-container thumbs-swiper-row1">
                        <div class="swiper-wrapper">
                            @if ($land->images)
                                <div class="swiper-slide">
                                    <div class="image-detail">
                                        <img src="{{ url('/storage/app/public/' . $land->image) }}" alt="صورة الأرض">
                                    </div>
                                </div>
                                @foreach (json_decode($land->images, true) as $image)
                                    <div class="swiper-slide">
                                        <div class="image-detail">
                                            <img src="{{ url('/storage/app/public/' . $image) }}" alt="صورة الأرض">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="flat-property-detail style2 tf-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrap-house wg-dream flex bg-white">
                        <div class="box-1">
                            <div class="title-heading fs-30 fw-7 lh-45">{{ $land->title }}</div>
                            <div class="title-heading fs-20 fw-7 lh-45">اعلان رقم: {{ $land->ad_number }}</div>

                            <div class="inner flex">
                                <div class="text-address flex align-center">
                                    <i class="fa-solid fa-location-dot" style="margin-left: 5px"></i>
                                    <p>{{ $land->city->name . ' - ' . $land->neighborhood->name }}</p>
                                </div>
                            </div>

                            <div class="icon-box flex">
                                <div class="icons icon-3 flex">
                                    <span>المساحة: </span>
                                    <span class="fw-6">{{ $land->area }} م²</span>
                                </div>
                                <div class="icons icon-1 flex">
                                    <span>الحالة: </span>
                                    <span class="fw-6">{{ $land->status == 'available' ? 'متاح' : 'غير متاح' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="box-2 text-end">
                            <div class="moneys fs-30 fw-7 lh-45 text-color-3">{{ number_format($land->price) }} ريال سعودي</div>
                            <div class="moneys fs-15 fw-7 lh-45 text-color-3">القسط الشهري: {{ number_format($land->monthly_installment ?? $land->price) }} ريال سعودي</div>
                            @if($land->profile_project)
                            <div class="button-box sc-btn-top center flex justify-space">
                                <a href="{{ url('/storage/app/public/' . $land->profile_project) }}" target="_blank"
                                    class="profile-proj-btn sc-button btn-svg">
                                    <span>بروفايل المشروع</span>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="post">
                        <div class="wrap-overview wrap-style">
                            <h3 class="titles">ملخص</h3>
                            <div class="icon-wrap row">
                                <div class="box-icon col-6 col-md-3">
                                    <div class="inner flex">
                                        <div class="icon">
                                            <i class="fas fa-square"></i>
                                        </div>
                                        <div class="content">
                                            <div class="font-2">المساحة:</div>
                                            <div class="font-2 fw-7">{{ $land->area }} م²</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-icon col-6 col-md-3">
                                    <div class="inner flex">
                                        <div class="icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="content">
                                            <div class="font-2">الموقع:</div>
                                            <div class="font-2 fw-7">{{ $land->city->name }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-icon col-6 col-md-3">
                                    <div class="inner flex">
                                        <div class="icon">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div class="content">
                                            <div class="font-2">الحالة:</div>
                                            <div class="font-2 fw-7">{{ $land->status == 'available' ? 'متاح' : 'غير متاح' }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="wrap-text wrap-style">
                            <h3 class="titles">وصف الأرض</h3>
                            <p class="text-1 text-color-2">{{ $land->description }}</p>
                            <a href="#" class="fw-6">تظهر المزيد</a>
                        </div>

                        @if($land->features && count($land->features) > 0)
                        <div class="wrap-featured wrap-style tf-amenities">
                            <h3 class="titles">المميزات</h3>
                            <div class="box-featured flex">
                                @foreach ($land->features as $feature)
                                    <div class="inner-1">
                                        <label class="flex align-items-center">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            {{ $feature->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
