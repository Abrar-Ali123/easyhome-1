@extends('home')

@section('content')
    <!-- Properties Section -->
    <section class="flat-featured wg-dream home">
        <div class="container3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section center">
                        <h2>نتائج البحث</h2>
                    </div>

                    <div class="content-tab">
                        <div class="content-inner tab-content">
                            <div class="wrap-item flex">
                                @forelse ($products as $product)
                                    <!-- col 1 -->
                                    <div class="box box-dream hv-one">
                                        <div class="image-group relative">
                                            <span class="featured fs-12 fw-6" style="position: absolute; top: 10px;">{{ $product->category }}</span>
                                            <span class="featured fs-12 fw-6" style="position: absolute; top: 40px;">{{ number_format($product->price / 300) }} ريال شهرياً</span>
                                            <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                            <div class="swiper-container carousel-2 img-style">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                                                    </div>

                                                    @if($product->images)
                                                        @php
                                                            $additionalImages = is_array($product->images) ? $product->images : json_decode($product->images);
                                                        @endphp
                                                        @if($additionalImages)
                                                            @foreach($additionalImages as $image)
                                                                @if($image)
                                                                    <div class="swiper-slide">
                                                                        <img src="{{ asset('storage/' . trim($image)) }}" alt="{{ $product->title }}">
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                </div>
                                                <div class="pagi2"><div class="swiper-pagination2"></div></div>
                                                <div class="swiper-button-next2"><i class="fal fa-arrow-right"></i></div>
                                                <div class="swiper-button-prev2"><i class="fal fa-arrow-left"></i></div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h3 class="link-style-1">
                                                <a href="{{ route('products.show', ['product' => $product->id]) }}">{{ $product->title }}</a>
                                            </h3>
                                            <div class="text-address">
                                                <p class="p-12">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    {{ optional($product->city)->name }} - {{ optional($product->neighborhood)->name }}
                                                </p>
                                            </div>
                                            <div class="money">
                                                <a href="{{ route('products.show', ['product' => $product->id]) }}" class="fs-18 fw-6 text-color-3">{{ number_format($product->price) }} ريال</a>
                                            </div>
                                            <div class="icon-box flex">
                                                <div class="icons icon-1 flex">
                                                    <span>غرف: {{ $product->bedrooms }}</span>
                                                </div>
                                                <div class="icons icon-2 flex">
                                                    <span>حمامات: {{ $product->bathrooms }}</span>
                                                </div>
                                                <div class="icons icon-3 flex">
                                                    <span>{{ $product->area }} م²</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12 text-center">
                                        <h3>لا توجد نتائج للبحث</h3>
                                        <p>جرب تغيير معايير البحث</p>
                                    </div>
                                @endforelse
                            </div>
                            
                            @if(isset($products) && method_exists($products, 'hasPages') && $products->hasPages())
                                <div class="themesflat-pagination clearfix">
                                    {{ $products->appends(request()->except('page'))->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
