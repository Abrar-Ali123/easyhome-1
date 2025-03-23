@extends('home')

@section('content')
    <!-- slider -->
    <section class="slider home">
        @foreach($heroSliders as $slider)
        <div class="slider-item">
            <div class="container3 relative">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content po-content-two">
                            <div class="heading">
                                <h1 class="">{{ $slider->title }}</h1>
                                <h1>{{ $slider->subtitle }}</h1>
                                <p class="fs-16 lh-24 text-color-2 wow fadeInUp" data-wow-delay="100ms"
                                    data-wow-duration="2000ms">
                                    {{ $slider->description }}
                                </p>
                            </div>
                            @include('parts.search-filter')
                        </div>
                        <div class="images po-content-one">
                            <div class="image">
                                <img class="img-item" src="{{ asset($slider->image) }}" alt="{{ $slider->title }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </section>

    <!-- Partners Section -->
    <section class="flat-brand tf-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-section">
                        <h4>{{ $sectionTitles['partners']->title ?? 'موثوق من قبل أكثر من ' . count($partners) . ' شركة كبرى' }}</h4>
                        @if(isset($sectionTitles['partners']->subtitle))
                            <p class="text-color-4">{{ $sectionTitles['partners']->subtitle }}</p>
                        @endif
                    </div>
                    <div class="swiper-container carousel-5">
                        <div class="swiper-wrapper">
                            @foreach($partners as $partner)
                            <div class="swiper-slide">
                                <div class="slogan-logo">
                                    <a href="{{ $partner->url }}">
                                        <img src="{{ asset($partner->image) }}"
                                            alt="{{ $partner->name }}">
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Company Values Section -->
    <section class="flat-service tf-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section center">
                        <h2>{{ $sectionTitles['values']->title ?? 'قيمنا' }}</h2>
                        <p class="text-1 text-color-4">{{ $sectionTitles['values']->subtitle ?? 'قيمنا الأساسية التي نؤمن بها ونعمل لتحقيقها' }}</p>
                    </div>
                </div>
                @php
                    $companyValues = App\Models\CompanyValue::all();
                @endphp
                @foreach($companyValues as $value)
                <div class="col-lg-3 col-md-3">
                    <div class="box">
                        <div class="icon">
                            <i class="{{ $value->icon }} fa-3x fa-beat"></i>
                        </div>
                        <h3>{{ $value->title }}</h3>
                        <p class="text-color-2">{{ $value->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Properties Section -->
    <section class="flat-featured wg-dream home">
        <div class="container3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section center mb-4">
                        <h2>{{ $sectionTitles['properties']->title ?? 'العقارات' }}</h2>
                        @if(isset($sectionTitles['properties']->subtitle))
                            <p class="text-color-4">{{ $sectionTitles['properties']->subtitle }}</p>
                        @endif
                    </div>
                    <div class="flat-tabs themesflat-tabs mt-4">
                        {{-- <div class="box-tab center">
                                        <ul class="menu-tab tab-title flex justify-center">
                                            <li class="item-title active hv-tool" data-tooltip="8 Property">
                                                <h5 class="inner">Houses</h5>
                                            </li>
                                            <li class="item-title hv-tool" data-tooltip="6 Property">
                                                <h5 class="inner"> Smart home </h5>
                                            </li>
                                            <li class="item-title hv-tool" data-tooltip="5 Property">
                                                <h5 class="inner ">Apartments</h5>
                                            </li>
                                            <li class="item-title hv-tool" data-tooltip="7 Property">
                                                <h5 class="inner"> Office </h5>
                                            </li>
                                            <li class="item-title hv-tool" data-tooltip="6 Property">
                                                <h5 class="inner">Villa</h5>
                                            </li>
                                            <li class="item-title hv-tool" data-tooltip="3 Property">
                                                <h5 class="inner"> Bungalow </h5>
                                            </li>
                                        </ul>
                                    </div> --}}

                        <div class="content-tab">
                            <div class="content-inner tab-content">
                                 <div id="searchResults" class="wrap-item flex">

                                    @foreach ($products as $product)
                                        <!-- col 1 -->
                                        <div class="box box-dream hv-one">
                                            <div class="image-group relative ">
                                                <span class="featured fs-12 fw-6" style="position: absolute; top: 10px;">{{ $product->category }}</span>
                                                <span class="featured fs-12 fw-6" style="position: absolute; top: 40px;">{{ number_format($product->price / 300) }} ريال شهرياً</span>
                                                <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                                <div class="swiper-container carousel-2 img-style">

                                                    <div class="swiper-wrapper ">
                                                        <div class="swiper-slide">
                                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                                                        </div>

                                                        @if($product->images)
                                                            @php
                                                                $additionalImages = is_array($product->images) ? $product->images : explode(',', $product->images);
                                                            @endphp
                                                            @foreach($additionalImages as $image)
                                                                @if($image)
                                                                    <div class="swiper-slide">
                                                                        <img src="{{ asset('storage/' . trim($image)) }}" alt="{{ $product->title }}">
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <div class="pagi2">
                                                        <div class="swiper-pagination2"> </div>
                                                    </div>
                                                    <div class="swiper-button-next2 "><i class="fal fa-arrow-right"></i>
                                                    </div>
                                                    <div class="swiper-button-prev2 "><i class="fal fa-arrow-left"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h3 class="link-style-1"><a
                                                        href="{{ route('products.show', ['product' => $product->id]) }}">{{ $product->title }}</a>
                                                </h3>
                                                <div class="text-address">
                                                    <p class="p-12">
                                                        {{ optional($product->city)->name }}
                                                        {{ optional($product->neighborhood)->name ? '، ' . optional($product->neighborhood)->name : '' }}
                                                    </p>
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
                                    @endforeach

                                </div>

                            </div>

                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Lands Section -->
    <section class="flat-featured wg-dream home">
        <div class="container3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section center mb-4">
                        <h2>{{ $sectionTitles['lands']->title ?? 'الأراضي' }}</h2>
                        @if(isset($sectionTitles['lands']->subtitle))
                            <p class="text-color-4">{{ $sectionTitles['lands']->subtitle }}</p>
                        @endif
                    </div>
                    <div class="flat-tabs themesflat-tabs mt-4">
                        <div class="content-tab">
                            <div class="content-inner tab-content">
                                <div id="searchResults" class="wrap-item flex">
                                    @foreach($lands as $land)
                                        <!-- col 1 -->
                                        <div class="box box-dream hv-one">
                                            <div class="image-group relative">
                                                <span class="featured fs-12 fw-6" style="position: absolute; top: 10px;">{{ $land->property_type }}</span>
                                                <div class="swiper-container carousel-2 img-style">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <img src="{{ asset('storage/' . $land->image) }}" alt="{{ $land->title }}">
                                                        </div>
                                                    </div>
                                                    <div class="pagi2"><div class="swiper-pagination2"></div></div>
                                                    <div class="swiper-button-next2"><i class="fal fa-arrow-right"></i></div>
                                                    <div class="swiper-button-prev2"><i class="fal fa-arrow-left"></i></div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h3 class="link-style-1">
                                                    <a href="{{ route('lands.show', ['land' => $land->id]) }}">{{ $land->title }}</a>
                                                </h3>
                                                <div class="text-address">
                                                    <p class="p-12">
                                                        {{ optional($land->city)->name }}
                                                        {{ optional($land->neighborhood)->name ? '، ' . optional($land->neighborhood)->name : '' }}
                                                    </p>
                                                </div>
                                                <div class="money fs-18 fw-6 text-color-3">
                                                    <a href="#">{{ number_format($land->price) }} ريال</a>
                                                </div>
                                                <div class="icon-box flex">
                                                    <div class="icons icon-1 flex"><span>{{ $land->area }} متر مربع</span></div>
                                                    <div class="icons icon-2 flex"><span>{{ $land->property_usage }}</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="flat-testimonials tf-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section center">
                        <h2>{{ $sectionTitles['testimonials']->title ?? 'آراء العملاء' }}</h2>
                        <p class="text-color-4">{{ $sectionTitles['testimonials']->subtitle ?? 'تعرف على تجارب عملائنا معنا' }}</p>
                    </div>
                    <div class="swiper-container carousel-4 img-style">
                        <div class="swiper-wrapper">
                            @foreach($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="box center">
                                    <div class="icon">
                                        <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->client_name }}">
                                    </div>
                                    <div class="content">
                                        <p class="text-color-2">"{{ $testimonial->description }}"</p>
                                        <h4 class="link-style-3">{{ $testimonial->client_name }}</h4>
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

    <section class="flat-blog tf-section home">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section center">
                        <h2>{{ $sectionTitles['blog']->title ?? 'المدونة' }}</h2>
                        @if(isset($sectionTitles['blog']->subtitle))
                            <p class="text-color-4">{{ $sectionTitles['blog']->subtitle }}</p>
                        @endif
                    </div>
                </div>

                @php
                    $posts = App\Models\Post::all();
                @endphp
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-4 mb-4">
                        <div class="box hover-img">
                            <div class="images img-style relative ">
                                <a href="#"><img src="{{ url('/storage/app/public/' . $post->image) }}"
                                        alt="images"></a>
                                <div class="sub-box flex align-center fs-13 fw-6">
                                    <div class="title-1">
                                        {{ \Carbon\Carbon::parse($post->created_at)->format('F') }}
                                    </div><a class="title-2 text-color-3"
                                        href="#">{{ $post->categoryBlog->name }}</a>
                                </div>
                            </div>
                            <div class="content center">
                                <h3 class="link-style-1"><a href="#">{{ $post->title }}</a></h3>
                                <div class="meta">
                                    <a href="#"
                                        class="btn-button flex align-center justify-center fs-13 fw-6 text-color-3"><span>يقرأ
                                            أكثر </span>
                                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.875 6H12.125M12.125 6L7.0625 0.9375M12.125 6L7.0625 11.0625"
                                                stroke="#b38f39" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="flat-why-choose2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-5">
                    <div class="images">
                        <img class="img-item" src="{{ asset('/images/img-box/why-choose-home4.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-7">
                    <div class="heading-section">
                        <h2>{{ $sectionTitles['why_choose_us']->title ?? 'لماذا تختار شركتنا؟' }}</h2>
                        <p class="text-color-4">{{ $sectionTitles['why_choose_us']->subtitle ?? 'نحن نقدم خدمات متكاملة لتلبية احتياجاتك العقارية' }}</p>
                    </div>
                    <div class="wrap-icon">
                        @foreach($whyChooseUs as $reason)
                        <div class="box flex">
                            <div class="content">
                                <h3>{{ $reason->title }}</h3>
                                <p class="text-color-2">{{ $reason->description }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flat-contact2 relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section">
                        <h2>{{ $sectionTitles['program']->title ?? 'برنامج إنجاز' }}</h2>
                        <p class="text-color-2 fs-18 font-2">{{ $sectionTitles['program']->subtitle ?? 'استفد من خيارات تمويل مرنة ودعم متخصص لتحقيق أهدافك بسهولة وسرعة. تعرف على المزيد عن البرنامج الآن!' }}</p>
                        <div class="button-footer">
                            <a class="sc-button center btn-icon" href="{{ route('contact.page2') }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.25 6.75C2.25 15.034 8.966 21.75 17.25 21.75H19.5C20.0967 21.75 20.669 21.5129 21.091 21.091C21.5129 20.669 21.75 20.0967 21.75 19.5V18.128C21.75 17.612 21.399 17.162 20.898 17.037L16.475 15.931C16.035 15.821 15.573 15.986 15.302 16.348L14.332 17.641C14.05 18.017 13.563 18.183 13.122 18.021C11.4849 17.4191 9.99815 16.4686 8.76478 15.2352C7.53141 14.0018 6.58087 12.5151 5.979 10.878C5.817 10.437 5.983 9.95 6.359 9.668L7.652 8.698C8.015 8.427 8.179 7.964 8.069 7.525L6.963 3.102C6.90214 2.85869 6.76172 2.6427 6.56405 2.48834C6.36638 2.33397 6.1228 2.25008 5.872 2.25H4.5C3.90326 2.25 3.33097 2.48705 2.90901 2.90901C2.48705 3.33097 2.25 3.90326 2.25 4.5V6.75Z"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                                <span>اكتشف المزيد</span>
                            </a>
                        </div>
                    </div>
                    <div class="mark-img">
                        <img src="{{ asset('') }}/images/mark/mark-contact2.png" alt="images">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
