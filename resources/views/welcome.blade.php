@extends('home')


@section('content')
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
                                <img class="img-item" src="{{ asset('/images/slider/slider-1.jpg') }}" alt="">
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
                                        <img src="https://www.wadhefa.com/logo/company/62c1a6d7b46fb.png" alt="Logo 4">
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

    <section class="flat-service tf-section" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section center">
                        <h2>قيمنا</h2>
                        <p class="text-1 text-color-4">قيمنا الأساسية التي نؤمن بها ونعمل لتحقيقها</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="box">
                        <div class="icon">
                            <!-- أيقونة النزاهة -->
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M32.8125 10.9375C34.4701 10.9375 36.0598 11.596 37.2319 12.7681C38.404 13.9402 39.0625 15.5299 39.0625 17.1875M45.3125 17.1875C45.3128 19.0106 44.9142 20.8118 44.1448 22.4646C43.3754 24.1175 42.2537 25.582 40.8585 26.7555C39.4632 27.9291 37.8282 28.7832 36.0679 29.258C34.3077 29.7328 32.4649 29.8168 30.6687 29.5041C29.4958 29.3021 28.2542 29.5583 27.4125 30.4L21.875 35.9375H17.1875V40.625H12.5V45.3125H4.6875V39.4416C4.6875 38.1979 5.18125 37.0041 6.06042 36.1271L19.6 22.5875C20.4417 21.7458 20.6979 20.5041 20.4958 19.3312C20.2004 17.6253 20.2626 15.8766 20.6784 14.196C21.0942 12.5154 21.8546 10.9395 22.9114 9.56815C23.9682 8.19681 25.2983 7.05996 26.8175 6.22963C28.3367 5.39931 30.0118 4.89362 31.7367 4.74462C33.4616 4.59562 35.1986 4.80656 36.8377 5.36406C38.4768 5.92156 39.9822 6.81347 41.2585 7.98327C42.5348 9.15307 43.5542 10.5752 44.252 12.1597C44.9499 13.7441 45.311 15.4562 45.3125 17.1875Z" stroke="#FFA920" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h3 class="">النزاهة</h3>
                        <p class="text-color-2">نلتزم بالشفافية والمصداقية في جميع تعاملاتنا.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="box">
                        <div class="icon">
                            <!-- أيقونة الابتكار -->
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.1875 43.75V33.5937C17.1875 32.3 18.2375 31.25 19.5312 31.25H24.2187C25.5125 31.25 26.5625 32.3 26.5625 33.5937V43.75M26.5625 43.75H35.9375V7.38542M26.5625 43.75H42.1875V22.3958M35.9375 7.38542L39.0625 6.25M35.9375 7.38542L14.0625 15.3417M42.1875 22.3958L35.9375 20.3125M42.1875 22.3958L45.3125 23.4375M4.6875 43.75H7.8125M7.8125 43.75H45.3125M7.8125 43.75V6.25H14.0625V15.3417M4.6875 18.75L14.0625 15.3417" stroke="#FFA920" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h3 class="">الابتكار</h3>
                        <p class="text-color-2">نسعى دائمًا لتقديم حلول إبداعية ومبتكرة.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="box">
                        <div class="icon">
                            <!-- أيقونة الجودة -->
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M25.001 37.4999V26.5624M25.001 26.5624C26.0551 26.5633 27.1051 26.431 28.126 26.1687M25.001 26.5624C23.947 26.5633 22.897 26.431 21.876 26.1687M29.6885 41.7479C26.5912 42.336 23.4109 42.336 20.3135 41.7479M28.126 46.7124C26.0484 46.93 23.9537 46.93 21.876 46.7124M29.6885 37.4999V37.0999C29.6885 35.052 31.0594 33.302 32.8302 32.2749C35.8052 30.5521 38.129 27.8962 39.4415 24.7188C40.754 21.5413 40.9819 18.0197 40.0899 14.6996C39.198 11.3795 37.236 8.44622 34.5078 6.35428C31.7797 4.26235 28.4379 3.12854 25 3.12854C21.5622 3.12854 18.2203 4.26235 15.4922 6.35428C12.7641 8.44622 10.802 11.3795 9.91006 14.6996C9.01811 18.0197 9.24604 21.5413 10.5585 24.7188C11.871 27.8962 14.1948 30.5521 17.1698 32.2749C18.9406 33.302 20.3135 35.052 20.3135 37.0999V37.4999" stroke="#FFA920" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h3 class="">الجودة</h3>
                        <p class="text-color-2">نوفر خدمات ومنتجات بأعلى معايير الجودة.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="box">
                        <div class="icon">
                            <!-- أيقونة الالتزام -->
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M25.001 37.4999V26.5624M25.001 26.5624C26.0551 26.5633 27.1051 26.431 28.126 26.1687M25.001 26.5624C23.947 26.5633 22.897 26.431 21.876 26.1687M29.6885 41.7479C26.5912 42.336 23.4109 42.336 20.3135 41.7479M28.126 46.7124C26.0484 46.93 23.9537 46.93 21.876 46.7124M29.6885 37.4999V37.0999C29.6885 35.052 31.0594 33.302 32.8302 32.2749C35.8052 30.5521 38.129 27.8962 39.4415 24.7188C40.754 21.5413 40.9819 18.0197 40.0899 14.6996" stroke="#FFA920" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h3 class="">الالتزام</h3>
                        <p class="text-color-2">نحترم الوقت ونفي بوعودنا.</p>
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
                                                <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                                <div class="swiper-container carousel-2 img-style">

                                                    <a href="property-detail-v1.html" class="icon-plus"><img
                                                            src="{{ asset('/images/icon/plus.svg') }}" alt="images"></a>
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
@endsection
