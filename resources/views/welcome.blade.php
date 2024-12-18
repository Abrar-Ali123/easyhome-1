@extends('home')


@section('content')

    <body class="body  counter-scroll">


        <!-- /preload -->

        <div id="wrapper">
            <div id="pagee" class="clearfix">

                <!-- slider -->
                <section class="slider home">
                    <div class="slider-item">
                        <div class="container3  relative">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="content po-content-two">
                                        <div class="heading">
                                            <h1 class="">ايزي هوم</h1>

                                            <h1> حيث الحلول العقارية المبتكرة</h1>
                                            <p class="fs-16 lh-24 text-color-2 wow fadeInUp" data-wow-delay="100ms"
                                                data-wow-duration="2000ms">
                                                اكتشف مجموعة متنوعة من العقارات التي تناسبك بكل سهولة، وتجاوز جميع الصعوبات
                                                في العثور على المنزل المثالي لك.
                                            </p>
                                        </div>
                                        @include('parts.search-filter')

                                    </div>
                                    <div class="images po-content-one">
                                        <div class="image">
                                            <img class="img-item" src="{{ asset('/images/slider/slider-1.jpg') }}"
                                                alt="">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="flat-brand tf-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="title-section">
                                    <h4>موثوق من قبل أكثر من 150 شركة كبرى</h4>
                                </div>
                                <div class="swiper-container carousel-5">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="slogan-logo">
                                                <a href="#">
                                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaTuKGUsLIUueHg63S0KjgMzEJK-x2QhfQtA&s"
                                                        alt="Logo 1">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slogan-logo">
                                                <a href="#">
                                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSl2PS5UJs4iC3od99LjgxS3xGGqWuy7AUSQ&s"
                                                        alt="Logo 2">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slogan-logo">
                                                <a href="#">
                                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRh9pK5bARj_q5nbl1xg4HZjt-uFcZ6adMOUQ&s"
                                                        alt="Logo 3">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slogan-logo">
                                                <a href="#">
                                                    <img src="https://www.wadhefa.com/logo/company/62c1a6d7b46fb.png"
                                                        alt="Logo 4">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slogan-logo">
                                                <a href="#">
                                                    <img src="https://pbs.twimg.com/profile_images/1445656983332216833/2pUbqSUu_400x400.jpg"
                                                        alt="Logo 5">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slogan-logo">
                                                <a href="#">
                                                    <img src="https://pbs.twimg.com/profile_images/1716072957003304960/z20nwYIU_400x400.jpg"
                                                        alt="Logo 6">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slogan-logo">
                                                <a href="#">
                                                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgMxRhNnl57TcmqHi1EFTxgFDRRQ4YMHbprMnECr2pili1wRgS8F-0-egk_ncIRXOGePCdzeosFKOOhBDH_d2ie-jss5JSwmzwlUvzkJvNNjp7hFxazsNcqB0fMg9tchKrGhTBiI8hW0eU/s1600/%25D8%25A8%25D9%2586%25D9%2583+%25D8%25A7%25D9%2584%25D8%25B1%25D9%258A%25D8%25A7%25D8%25B6.jpg"
                                                        alt="Logo 7">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slogan-logo">
                                                <a href="#">
                                                    <img src="https://pbs.twimg.com/profile_images/1574351106846646272/OqMQuKsM_400x400.jpg"
                                                        alt="Logo 8">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slogan-logo">
                                                <a href="#">
                                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQa-96sxtQkOb0eKu7VhkrlTqxaY0IdRtsTJQ&s"
                                                        alt="Logo 9">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slogan-logo">
                                                <a href="#">
                                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8-aNFDh73kNsg7kKW3iBCmEcZ0fO1ugprPQ&s"
                                                        alt="Logo 10">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>





                <section class="flat-featured wg-dream home">
                    <div class="container3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="heading-section center mb-4">
                                    <h2>العقارات</h2>
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
                                            <div class="wrap-item flex">

                                                @foreach ($products as $product)
                                                    <!-- col 1 -->
                                                    <div class="box box-dream hv-one">
                                                        <div class="image-group relative ">
                                                            <span class="featured fs-12 fw-6">Featured</span>
                                                            <span class="icon-bookmark"><i
                                                                    class="far fa-bookmark"></i></span>
                                                            <div class="swiper-container carousel-2 img-style">

                                                                <a href="property-detail-v1.html" class="icon-plus"><img
                                                                        src="{{ asset('/images/icon/plus.svg') }}"
                                                                        alt="images"></a>
                                                                <div class="swiper-wrapper ">

                                                                    <div class="swiper-slide"><img
                                                                            src="{{ url('/storage/app/public/' . $product->image) }}"
                                                                            alt="images"></div>

                                                                    <div class="swiper-slide"><img
                                                                            src="{{ asset('/images/house/featured-1.jpg') }}"
                                                                            alt="images"></div>
                                                                    <div class="swiper-slide"><img
                                                                            src="{{ asset('/images/house/featured-2.jpg') }}"
                                                                            alt="images"></div>
                                                                    <div class="swiper-slide"><img
                                                                            src="{{ asset('/images/house/featured-3.jpg') }}"
                                                                            alt="images"></div>
                                                                    <div class="swiper-slide"><img
                                                                            src="{{ asset('/images/house/featured-4.jpg') }}"
                                                                            alt="images"></div>

                                                                </div>
                                                                <div class="pagi2">
                                                                    <div class="swiper-pagination2"> </div>
                                                                </div>
                                                                <div class="swiper-button-next2 "><i
                                                                        class="fal fa-arrow-right"></i></div>
                                                                <div class="swiper-button-prev2 "><i
                                                                        class="fal fa-arrow-left"></i> </div>
                                                            </div>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="link-style-1"><a
                                                                    href="{{ route('products.show', ['product' => $product->id]) }}">{{ $product->title }}</a>
                                                            </h3>
                                                            <div class="text-address">
                                                                <p class="p-12"> {{ $product->city->name }} ,
                                                                    {{ $product->neighborhood->name }} </p>
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

                <section class="flat-blog tf-section home">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="heading-section center">
                                    <h2>المدونة</h2>
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
                                                    <svg width="13" height="12" viewBox="0 0 13 12"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M0.875 6H12.125M12.125 6L7.0625 0.9375M12.125 6L7.0625 11.0625"
                                                            stroke="#FFA920" stroke-width="1.5" stroke-linecap="round"
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
            @endsection
