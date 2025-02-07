@extends('home')


@section('content')
    <section class="slider home">
        <div class="slider-item">
            <div class="container3  relative">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content po-content-two">
                            <div class="heading">
                                <h1 class="">استكشف عقارات ايزي هوم</h1>

                            </div>
                            @include('parts.search-filter')

                        </div>
                        <div class="images po-content-one">

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

                                    @foreach ($products_query as $product)
                                        <!-- col 1 -->
                                        <div class="box box-dream hv-one">

                                            <a href="{{ route('products.show', ['product' => $product->id]) }}"
                                                class="product-link"></a>

                                            <div class="image-group relative ">
                                                <span class="featured fs-12 fw-6">{{ $product->category }}</span>
                                                <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                                <div class="swiper-container carousel-2 img-style">

                                                    <div class="swiper-wrapper ">

                                                        <div class="swiper-slide"><img
                                                                src="{{ url('/storage/app/public/' . $product->image) }}"
                                                                alt="images"></div>

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
@endsection
