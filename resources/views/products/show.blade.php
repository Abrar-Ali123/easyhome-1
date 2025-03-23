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
                                    <img src="{{ url('/storage/app/public/' . $product->image) }}" alt="images">
                                </div>
                            </div>


                            @if ($product->images)
                                @foreach (json_decode($product->images, true) as $image)
                                    <div class="swiper-slide">
                                        <div class="image-detail">
                                            <img src="{{ url('/storage/app/public/' . $image) }}" alt="images">
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                    <div thumbsSlider="" class="swiper-container thumbs-swiper-row1">
                        <div class="swiper-wrapper">
                            @if ($product->images)
                                <div class="swiper-slide">
                                    <div class="image-detail">
                                        <img src="{{ url('/storage/app/public/' . $image) }}" alt="images">
                                    </div>
                                </div>
                                @foreach (json_decode($product->images, true) as $image)
                                    <div class="swiper-slide">
                                        <div class="image-detail">
                                            <img src="{{ url('/storage/app/public/' . $image) }}" alt="images">
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
                            <div class="title-heading fs-30 fw-7 lh-45">{{ $product->title }}</div>
                            <div class="title-heading fs-20 fw-7 lh-45">اعلان رقم: {{ $product->ad_number }}</div>

                            <div class="inner flex">
                                <div class="text-address flex align-center">
                                    <i class="fa-solid fa-location-dot" style="margin-left: 5px"></i>
                                    <p>{{ $product->city->name . ' - ' . $product->neighborhood->name }}</p>
                                </div>
                                <div class="icon-inner flex">


                                </div>
                            </div>

                            <div class="icon-box flex">
                                <div class="icons icon-1 flex"><span>غرف نوم: </span><span
                                        class="fw-6">{{ $product->bedrooms }}</span></div>
                                <div class="icons icon-2 flex"><span>حمامات: </span><span
                                        class="fw-6">{{ $product->bathrooms }}</span></div>
                                <div class="icons icon-3 flex"><span>قدم مربع: </span><span
                                        class="fw-6">{{ $product->area }}</span></div>
                            </div>
                        </div>
                        <div class="box-2 text-end">
                            @if($product->property_usage == 'بيع' || $product->property_usage == 'بيع وإيجار')
                                <div class="moneys fs-30 fw-7 lh-45 text-color-3">{{ number_format($product->price) }} ريال سعودي</div>
                                @if($product->monthly_installment)
                                    <div class="moneys fs-15 fw-7 lh-45 text-color-3">القسط الشهري: {{ number_format($product->monthly_installment) }} ريال سعودي</div>
                                @endif
                            @endif

                            @if($product->property_usage == 'إيجار' || $product->property_usage == 'بيع وإيجار')
                                <div class="rental-info bg-light p-3 rounded mb-3">
                                    <h4 class="fs-20 fw-7 mb-3">معلومات الإيجار</h4>
                                    <div class="moneys fs-25 fw-7 lh-35 text-color-3">{{ number_format($product->rent_price) }} ريال شهرياً</div>
                                    @if($product->rent_deposit)
                                        <div class="deposit fs-15 fw-6 mt-2">مبلغ التأمين: {{ number_format($product->rent_deposit) }} ريال</div>
                                    @endif
                                    @if($product->rent_period)
                                        <div class="period fs-15 fw-6 mt-2">مدة الإيجار: {{ $product::RENTAL_PERIODS[$product->rent_period] }}</div>
                                    @endif
                                    @if($product->rent_terms)
                                        <div class="terms fs-14 mt-3">
                                            <strong>شروط الإيجار:</strong>
                                            <p class="mt-2">{{ $product->rent_terms }}</p>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <div class="button-box sc-btn-top center flex justify-space">
                                @if($product->profile_project)
                                    <a href="{{ url('/storage/app/public/' . $product->profile_project) }}" target="_blank" class="profile-proj-btn sc-button btn-svg">
                                        <span>بروفايل المشروع</span>
                                    </a>
                                @endif

                                @if($product->property_usage == 'إيجار' || $product->property_usage == 'بيع وإيجار')
                                    <a href="#" class="rent-request-btn sc-button btn-svg" style="background-color: #2ecc71; margin-right: 10px;">
                                        <span>طلب استئجار</span>
                                    </a>
                                @endif
                            </div>
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
                                            <i class="fas fa-bed"></i>
                                        </div>
                                        <div class="content">
                                            <div class="font-2">غرف</div>
                                            <div class="font-2 fw-7">{{ $product->bedrooms }}</div>
                                        </div>
                                    </div>


                                    <div class="inner flex">
                                        <div class="icon">
                                            <i class="fas fa-bath"></i>
                                        </div>
                                        <div class="content">
                                            <div class="font-2">حمامات:</div>
                                            <div class="font-2 fw-7">{{ $product->bathrooms }}</div>
                                        </div>
                                    </div>

                                </div>


                                <div class="box-icon col-6 col-md-3">
                                    <div class="inner flex">
                                        <div class="icon">
                                            <i class="fas fa-square"></i>
                                        </div>
                                        <div class="content">
                                            <div class="font-2">المساحة:</div>
                                            <div class="font-2 fw-7">{{ $product->area }} م²</div>
                                        </div>
                                    </div>
                                    <div class="inner flex">
                                        <div class="icon">
                                            <i class="fas fa-building"></i>
                                        </div>
                                        <div class="content ms-2">
                                            <div class="font-2 fw-bold">واجهة العقار:</div>
                                            <div class="font-2 fw-7">{{ $product->property_facade }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-icon col-6 col-md-3">
                                    <div class="inner flex">
                                        <div class="icon">
                                            <i class="fas fa-home"></i>
                                        </div>
                                        <div class="content">
                                            <div class="font-2">استخدام العقار:</div>
                                            <div class="font-2 fw-7">
                                                @switch($product->property_usage)
                                                    @case('بيع')
                                                        للبيع
                                                        @break
                                                    @case('إيجار')
                                                        للإيجار
                                                        @break
                                                    @case('بيع وإيجار')
                                                        للبيع والإيجار
                                                        @break
                                                @endswitch
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inner flex">
                                        <div class="icon">
                                            <i class="fas fa-building"></i>
                                        </div>
                                        <div class="content ms-2">
                                            <div class="font-2 fw-bold">فئة العقار:</div>
                                            <div class="font-2 fw-7">{{ $product->category }}</div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="wrap-text wrap-style">
                            <h3 class="titles">وصف العقار</h3>
                            <p class="text-1 text-color-2">{{ $product->description }}</p>
                            <a href="#" class="fw-6">تظهر المزيد</a>
                        </div>
                        <div class="wrap-featured wrap-style tf-amenities">
                            <h3 class="titles">المميزات</h3>

                            <div class="box-featured flex">
                                @foreach ($product->features as $feature)
                                    <div class="inner-1">
                                        <label class="flex align-items-center">
                                            <span class="btn-checkbox"><i
                                                    class="{{ $product->getFeatureIcon($feature) }} text-4xl text-primary mb-4"></i></span>



                                            <span class="fs-13">{{ trim($feature) }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        @if ($product->croquis)
                            <div class="wrap-virtual wrap-style">
                                <h3 class="titles"> كروكي</h3>
                                <div class="virtual-box relative flex align-center justify-center">
                                    <div class="images">
                                        <img class="img-2" src="{{ url('/storage/app/public/' . $product->croquis) }}"
                                            alt="images">
                                    </div>
                                    <div class="icon absolute">
                                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M49.9216 23.8206C49.8503 23.286 49.3587 22.9105 48.8245 22.9818C48.2898 23.0531 47.9144 23.5443 47.9856 24.079C48.0263 24.3835 48.0469 24.6934 48.0469 25C48.0469 28.2857 45.7232 31.4176 41.5041 33.8187C37.1115 36.3186 31.2503 37.6953 25 37.6953C21.0505 37.6953 17.2568 37.145 13.8904 36.1096C12.855 32.7432 12.3047 28.9495 12.3047 25C12.3047 18.7498 13.6814 12.8885 16.1812 8.4959C18.5824 4.27666 21.7143 1.95312 25 1.95312C27.7572 1.95312 29.9527 3.54316 31.5336 5.29131H30.5334C29.9941 5.29131 29.5568 5.72852 29.5568 6.26787C29.5568 6.80723 29.9941 7.24443 30.5334 7.24443H33.5632C34.1024 7.24443 34.5397 6.80723 34.5397 6.26787V3.23799C34.5397 2.69863 34.1024 2.26143 33.5632 2.26143C33.0239 2.26143 32.5866 2.69863 32.5866 3.23799V3.56699C30.3218 1.2498 27.6938 0 25 0C20.9818 0 17.2472 2.67412 14.4837 7.52979C11.819 12.2121 10.3516 18.4164 10.3516 25C10.3516 28.6174 10.7955 32.1195 11.6367 35.3183C10.525 34.8758 9.47383 34.3753 8.4959 33.8187C4.27676 31.4176 1.95312 28.2857 1.95312 25C1.95312 22.2265 3.56191 20.021 5.32227 18.438V19.4331C5.32227 19.9725 5.75957 20.4097 6.29883 20.4097C6.83809 20.4097 7.27539 19.9725 7.27539 19.4331V16.4032C7.27539 15.8639 6.83809 15.4267 6.29883 15.4267H3.26904C2.72978 15.4267 2.29248 15.8639 2.29248 16.4032C2.29248 16.9426 2.72978 17.3798 3.26904 17.3798H3.60186C1.2625 19.6523 0 22.2928 0 25C0 29.0181 2.67412 32.7528 7.52979 35.5162C8.996 36.3506 10.6114 37.0676 12.341 37.6589C12.9323 39.3885 13.6493 41.004 14.4837 42.4701C17.2472 47.3259 20.9818 50 25 50C27.3036 50 29.5912 49.0841 31.6153 47.3512C32.025 47.0004 32.0729 46.384 31.7222 45.9742C31.3715 45.5646 30.755 45.5167 30.3452 45.8674C28.656 47.3137 26.8575 48.0469 25 48.0469C21.7143 48.0469 18.5824 45.7233 16.1812 41.5041C15.6247 40.5261 15.1241 39.4749 14.6817 38.3633C17.8805 39.2045 21.3826 39.6484 25 39.6484C31.5836 39.6484 37.7879 38.181 42.4702 35.5162C47.3259 32.7528 50 29.0181 50 25C49.9998 24.6056 49.9737 24.2116 49.9216 23.8206Z"
                                                fill="white" />
                                            <path
                                                d="M48.7213 20.3243L48.7172 20.3169C48.458 19.8488 47.8693 19.6763 47.3979 19.9315C46.9236 20.1884 46.7474 20.7811 47.0043 21.2553L47.0123 21.2697C47.0743 21.382 47.1579 21.481 47.2582 21.5609C47.3584 21.6409 47.4735 21.7003 47.5968 21.7358C47.72 21.7712 47.8491 21.782 47.9765 21.7676C48.104 21.7531 48.2273 21.7137 48.3396 21.6516C48.8114 21.3905 48.9824 20.7963 48.7213 20.3243ZM34.121 42.9507C33.6829 42.6369 33.0694 42.7434 32.755 43.1804L32.75 43.1873C32.4393 43.6271 32.5386 44.2419 32.9777 44.5536C33.1413 44.6699 33.3371 44.7322 33.5378 44.7318C33.8461 44.7318 34.1509 44.5868 34.3427 44.318C34.6554 43.8796 34.5588 43.2644 34.121 42.9507ZM31.8864 22.187C31.8698 20.8137 30.7427 19.6964 29.3738 19.6964H25.9294V17.1206C25.9295 16.975 25.9874 16.8353 26.0904 16.7323C26.1934 16.6293 26.3331 16.5714 26.4787 16.5713H29.3103C29.8495 16.5713 30.2868 16.1341 30.2868 15.5947C30.2868 15.0554 29.8495 14.6182 29.3103 14.6182H26.4787C25.0988 14.6182 23.9763 15.7407 23.9763 17.1206V25.0043C23.9763 26.3842 25.0988 27.5067 26.4787 27.5067H29.3738C30.7427 27.5067 31.8698 26.3895 31.8864 25.0161L31.8865 25.0043V22.1988L31.8864 22.187ZM29.9332 24.9969C29.9271 25.3042 29.6771 25.5535 29.3737 25.5535H26.4786C26.333 25.5534 26.1933 25.4955 26.0903 25.3925C25.9873 25.2895 25.9294 25.1498 25.9293 25.0042V21.6494H29.3737C29.6771 21.6494 29.9272 21.8988 29.9332 22.2062V24.9969ZM38.3684 14.6182H35.4631C34.0832 14.6182 32.9606 15.7407 32.9606 17.1206V25.0043C32.9606 26.3842 34.0832 27.5067 35.4631 27.5067H38.3684C39.7482 27.5067 40.8708 26.3842 40.8708 25.0043V17.1206C40.8708 15.7407 39.7482 14.6182 38.3684 14.6182ZM38.9177 25.0043C38.9175 25.1499 38.8596 25.2896 38.7566 25.3926C38.6537 25.4956 38.514 25.5535 38.3684 25.5536H35.4631C35.3174 25.5535 35.1778 25.4956 35.0748 25.3926C34.9718 25.2896 34.9139 25.1499 34.9138 25.0043V17.1206C34.9139 16.975 34.9718 16.8353 35.0748 16.7323C35.1778 16.6293 35.3174 16.5714 35.4631 16.5713H38.3684C38.514 16.5714 38.6537 16.6293 38.7566 16.7323C38.8596 16.8353 38.9175 16.975 38.9177 17.1206V25.0043ZM20.398 14.6182H17.9048C16.5249 14.6182 15.4023 15.7407 15.4023 17.1206V17.1551C15.4023 17.6944 15.8396 18.1316 16.3789 18.1316C16.9182 18.1316 17.3555 17.6944 17.3555 17.1551V17.1206C17.3556 16.975 17.4135 16.8353 17.5165 16.7323C17.6195 16.6293 17.7591 16.5714 17.9048 16.5713H20.398C20.5437 16.5714 20.6833 16.6293 20.7863 16.7323C20.8893 16.8353 20.9472 16.975 20.9474 17.1206V20.0859H18.4425C17.9032 20.0859 17.4659 20.5231 17.4659 21.0625C17.4659 21.6019 17.9032 22.0391 18.4425 22.0391H20.9474V25.0043C20.9472 25.1499 20.8893 25.2896 20.7863 25.3926C20.6833 25.4956 20.5437 25.5535 20.398 25.5536H17.9048C17.7591 25.5535 17.6195 25.4956 17.5165 25.3926C17.4135 25.2896 17.3556 25.1499 17.3555 25.0043V24.8691C17.3555 24.3298 16.9182 23.8926 16.3789 23.8926C15.8396 23.8926 15.4023 24.3298 15.4023 24.8691V25.0043C15.4023 26.3842 16.5249 27.5067 17.9048 27.5067H20.398C21.7779 27.5067 22.9005 26.3842 22.9005 25.0043V17.1206C22.9005 15.7407 21.7779 14.6182 20.398 14.6182ZM44.8193 13.0044C43.391 13.0044 42.229 14.1664 42.229 15.5947C42.229 17.023 43.391 18.1851 44.8193 18.1851C46.2477 18.1851 47.4097 17.023 47.4097 15.5947C47.4097 14.1664 46.2477 13.0044 44.8193 13.0044ZM44.8193 16.2318C44.6504 16.2316 44.4884 16.1644 44.369 16.045C44.2495 15.9255 44.1823 15.7636 44.1821 15.5946C44.1823 15.4257 44.2495 15.2637 44.369 15.1443C44.4884 15.0248 44.6504 14.9576 44.8193 14.9574C44.9883 14.9576 45.1502 15.0248 45.2697 15.1443C45.3892 15.2637 45.4564 15.4257 45.4565 15.5946C45.4563 15.7636 45.3891 15.9255 45.2697 16.045C45.1502 16.1644 44.9883 16.2316 44.8193 16.2318Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @php
                            $videoUrl = $product->video;
                            $videoId = substr($videoUrl, strrpos($videoUrl, '/') + 1);
                        @endphp
                        @if ($product->video)
                            <div class="wrap-video wrap-style">
                                <h3 class="titles">فيديو</h3>
                                <div class="video-box center ">
                                    <div class="video-container post-video flex align-center justify-center  relative">

                                        <iframe src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&mute=1"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="side-bar side-bar-1">
                        <div class="inner-side-bar">
                            <div class="widget-rent style">
                                <h3 class="widget-title title-contact">
                                    قدم طلب او استفسر
                                </h3>
                                <div class="comments">
                                    <div class="comment-form">
                                        <form method="post">
                                            <div class="wd-find-select ">
                                                <fieldset>
                                                    <label class="fw-6">اسمك *</label>
                                                    <input type="text" class="my-input" name="name"
                                                        value="{{ old('name') }}" placeholder="اسمك" required="">
                                                </fieldset>
                                                <fieldset>
                                                    <label class="fw-6">رقم التليفون</label>
                                                    <input type="text" class="my-input2" value="{{ old('phone') }}"
                                                        name="phone" placeholder="هاتفك" required="">
                                                </fieldset>
                                                <fieldset>
                                                    <label class="fw-6">الرسالة</label>
                                                    <textarea name="message" rows="4" tabindex="4" placeholder="رسالتك " aria-required="true"></textarea>
                                                </fieldset>
                                                <div class="button-box sc-btn-top center flex justify-space">
                                                    <button class="sc-button btn-svg">
                                                        <span>أرسل رسالة</span>
                                                        <svg width="18" height="18" viewBox="0 0 18 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M1.125 6.5025V12.9375C1.125 13.5342 1.36205 14.1065 1.78401 14.5285C2.20597 14.9504 2.77826 15.1875 3.375 15.1875H14.625C15.2217 15.1875 15.794 14.9504 16.216 14.5285C16.6379 14.1065 16.875 13.5342 16.875 12.9375V6.5025L10.179 10.6223C9.82443 10.8404 9.4163 10.9559 9 10.9559C8.5837 10.9559 8.17557 10.8404 7.821 10.6223L1.125 6.5025ZM34.121 42.9507C33.6829 42.6369 33.0694 42.7434 32.755 43.1804L32.75 43.1873C32.4393 43.6271 32.5386 44.2419 32.9777 44.5536C33.1413 44.6699 33.3371 44.7322 33.5378 44.7318C33.8461 44.7318 34.1509 44.5868 34.3427 44.318C34.6554 43.8796 34.5588 43.2644 34.121 42.9507ZM31.8864 22.187C31.8698 20.8137 30.7427 19.6964 29.3738 19.6964H25.9294V17.1206C25.9295 16.975 25.9874 16.8353 26.0904 16.7323C26.1934 16.6293 26.3331 16.5714 26.4787 16.5713H29.3103C29.8495 16.5713 30.2868 16.1341 30.2868 15.5947C30.2868 15.0554 29.8495 14.6182 29.3103 14.6182H26.4787C25.0988 14.6182 23.9763 15.7407 23.9763 17.1206V25.0043C23.9763 26.3842 25.0988 27.5067 26.4787 27.5067H29.3738C30.7427 27.5067 31.8698 26.3895 31.8864 25.0161L31.8865 25.0043V22.1988L31.8864 22.187ZM29.9332 24.9969C29.9271 25.3042 29.6771 25.5535 29.3737 25.5535H26.4786C26.333 25.5534 26.1933 25.4955 26.0903 25.3925C25.9873 25.2895 25.9294 25.1498 25.9293 25.0042V21.6494H29.3737C29.6771 21.6494 29.9272 21.8988 29.9332 22.2062V24.9969ZM38.3684 14.6182H35.4631C34.0832 14.6182 32.9606 15.7407 32.9606 17.1206V25.0043C32.9606 26.3842 34.0832 27.5067 35.4631 27.5067H38.3684C39.7482 27.5067 40.8708 26.3842 40.8708 25.0043V17.1206C40.8708 15.7407 39.7482 14.6182 38.3684 14.6182ZM38.9177 25.0043C38.9175 25.1499 38.8596 25.2896 38.7566 25.3926C38.6537 25.4956 38.514 25.5535 38.3684 25.5536H35.4631C35.3174 25.5535 35.1778 25.4956 35.0748 25.3926C34.9718 25.2896 34.9139 25.1499 34.9138 25.0043V17.1206C34.9139 16.975 34.9718 16.8353 35.0748 16.7323C35.1778 16.6293 35.3174 16.5714 35.4631 16.5713H38.3684C38.514 16.5714 38.6537 16.6293 38.7566 16.7323C38.8596 16.8353 38.9175 16.975 38.9177 17.1206V25.0043ZM20.398 14.6182H17.9048C16.5249 14.6182 15.4023 15.7407 15.4023 17.1206V17.1551C15.4023 17.6944 15.8396 18.1316 16.3789 18.1316C16.9182 18.1316 17.3555 17.6944 17.3555 17.1551V17.1206C17.3556 16.975 17.4135 16.8353 17.5165 16.7323C17.6195 16.6293 17.7591 16.5714 17.9048 16.5713H20.398C20.5437 16.5714 20.6833 16.6293 20.7863 16.7323C20.8893 16.8353 20.9472 16.975 20.9474 17.1206V20.0859H18.4425C17.9032 20.0859 17.4659 20.5231 17.4659 21.0625C17.4659 21.6019 17.9032 22.0391 18.4425 22.0391H20.9474V25.0043C20.9472 25.1499 20.8893 25.2896 20.7863 25.3926C20.6833 25.4956 20.5437 25.5535 20.398 25.5536H17.9048C17.7591 25.5535 17.6195 25.4956 17.5165 25.3926C17.4135 25.2896 17.3556 25.1499 17.3555 25.0043V24.8691C17.3555 24.3298 16.9182 23.8926 16.3789 23.8926C15.8396 23.8926 15.4023 24.3298 15.4023 24.8691V25.0043C15.4023 26.3842 16.5249 27.5067 17.9048 27.5067H20.398C21.7779 27.5067 22.9005 26.3842 22.9005 25.0043V17.1206C22.9005 15.7407 21.7779 14.6182 20.398 14.6182ZM44.8193 13.0044C43.391 13.0044 42.229 14.1664 42.229 15.5947C42.229 17.023 43.391 18.1851 44.8193 18.1851C46.2477 18.1851 47.4097 17.023 47.4097 15.5947C47.4097 14.1664 46.2477 13.0044 44.8193 13.0044ZM44.8193 16.2318C44.6504 16.2316 44.4884 16.1644 44.369 16.045C44.2495 15.9255 44.1823 15.7636 44.1821 15.5946C44.1823 15.4257 44.2495 15.2637 44.369 15.1443C44.4884 15.0248 44.6504 14.9576 44.8193 14.9574C44.9883 14.9576 45.1502 15.0248 45.2697 15.1443C45.3892 15.2637 45.4564 15.4257 45.4565 15.5946C45.4563 15.7636 45.3891 15.9255 45.2697 16.045C45.1502 16.1644 44.9883 16.2316 44.8193 16.2318Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flat-sale-detail flat-sale wg-dream wg-dots tf-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section ">
                        <div class="title-heading fs-30 lh-45 fw-7">ترشيحات العقارات</div>
                    </div>
                    <div class="swiper-container2">
                        <div class="one-carousel owl-carousel owl-theme">

                            @foreach ($products as $product)
                                <div class="slide-item">
                                    <div class="box box-dream hv-one">
                                        <div class="image-group relative ">
                                            <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                            <div class="swiper-container noo carousel-2 img-style">
                                                <a href="property-detail-v1.html" class="icon-plus"></a>
                                                <div class="swiper-wrapper ">

                                                    @foreach (array_slice(json_decode($product->images, true), 0, 5) as $image)
                                                        <div class="swiper-slide">
                                                            <img src="{{ url('/storage/app/public/' . $image) }}"
                                                                alt="images">
                                                        </div>
                                                    @endforeach



                                                </div>
                                                <div class="pagi2">
                                                    <div class="swiper-pagination2"> </div>
                                                </div>
                                                <div class="swiper-button-next2 "><i class="fal fa-arrow-right"></i></div>
                                                <div class="swiper-button-prev2 "><i class="fal fa-arrow-left"></i> </div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h3 class="link-style-1"><a
                                                    href="{{ route('products.show', ['product' => $product->id]) }}">{{ $product->title }}</a>
                                            </h3>
                                            <div class="text-address">
                                                <p class="p-12">{{ $product->city->name }}</p>
                                            </div>
                                            <div class="money fs-18 fw-6 text-color-3"><a
                                                    href="property-detail-v1.html">{{ number_format($product->price) }}
                                                    ريال</a></div>
                                            <div class="icon-box flex">

                                                <div class="icons icon-1 flex"><span>غرف: </span><span
                                                        class="fw-6">{{ $product->bedrooms }} </span>
                                                </div>
                                                <div class="icons icon-2 flex"><span>حمام: </span><span
                                                        class="fw-6">{{ $product->bathrooms }} </span>
                                                </div>
                                                <div class="icons icon-3 flex"><span>م²: </span><span
                                                        class="fw-6">{{ $product->area }} </span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
