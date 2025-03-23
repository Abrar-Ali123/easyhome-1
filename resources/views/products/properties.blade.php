@extends('home')

@section('content')
<div class="properties-page">
    <!-- قسم البحث -->
    @include('parts.search-filter')

    <!-- قسم النتائج -->
    <section class="flat-featured wg-dream home">
        <div class="container3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section center mb-4">
                        <h2>العقارات</h2>
                    </div>
                    <div class="flat-tabs themesflat-tabs mt-4">
                        <div class="content-tab">
                            <div class="content-inner tab-content">
                                <div id="searchResults" class="wrap-item flex">
                                    @forelse($products as $product)
                                        <!-- col 1 -->
                                        <div class="box box-dream hv-one">
                                            <div class="image-group relative">
                                                <span class="featured fs-12 fw-6" style="position: absolute; top: 10px;">{{ $product->category }}</span>
                                                @if($product->property_type === 'إيجار')
                                                    <span class="featured fs-12 fw-6" style="position: absolute; top: 40px;">{{ number_format($product->price / 12) }} ريال شهرياً</span>
                                                @endif
                                                <div class="swiper-container carousel-2 img-style">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <img src="{{ asset('storage/' . $product->image) }}" 
                                                                 alt="{{ $product->title }}">
                                                        </div>
                                                        @if($product->images)
                                                            @php
                                                                $additionalImages = is_array($product->images) ? $product->images : explode(',', $product->images);
                                                            @endphp
                                                            @foreach($additionalImages as $image)
                                                                @if($image)
                                                                    <div class="swiper-slide">
                                                                        <img src="{{ asset('storage/' . trim($image)) }}" 
                                                                             alt="{{ $product->title }}">
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <div class="pagi2">
                                                        <div class="swiper-pagination2"></div>
                                                    </div>
                                                    <div class="swiper-button-next2"><i class="fal fa-arrow-right"></i></div>
                                                    <div class="swiper-button-prev2"><i class="fal fa-arrow-left"></i></div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h3 class="link-style-1">
                                                    <a href="{{ route('products.show', ['product' => $product->id]) }}">
                                                        {{ $product->title }}
                                                    </a>
                                                </h3>
                                                <div class="text-address">
                                                    <p class="p-12">
                                                        {{ optional($product->city)->name }}
                                                        {{ optional($product->neighborhood)->name ? '، ' . optional($product->neighborhood)->name : '' }}
                                                    </p>
                                                </div>
                                                <div class="money fs-18 fw-6 text-color-3">
                                                    {{ number_format($product->price) }} ريال
                                                    @if($product->property_type === 'إيجار')
                                                        <span class="fs-14 text-color-2">/سنوياً</span>
                                                    @endif
                                                </div>
                                                <div class="icon-box flex">
                                                    @if($product->bedrooms)
                                                        <div class="icons icon-1 flex">
                                                            <span>غرف: </span>
                                                            <span class="fw-6">{{ $product->bedrooms }}</span>
                                                        </div>
                                                    @endif
                                                    @if($product->bathrooms)
                                                        <div class="icons icon-2 flex">
                                                            <span>حمام: </span>
                                                            <span class="fw-6">{{ $product->bathrooms }}</span>
                                                        </div>
                                                    @endif
                                                    @if($product->area)
                                                        <div class="icons icon-3 flex">
                                                            <span>م²: </span>
                                                            <span class="fw-6">{{ $product->area }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12">
                                            <div class="alert alert-info">
                                                لم يتم العثور على عقارات تطابق معايير البحث
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('styles')
<style>
.properties-page {
    padding: 20px 0;
}

.box-dream {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
    margin: 15px;
    width: calc(33.333% - 30px);
}

.box-dream:hover {
    transform: translateY(-5px);
}

.image-group {
    position: relative;
    border-radius: 10px 10px 0 0;
    overflow: hidden;
}

.image-group img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.featured {
    position: absolute;
    right: 10px;
    background: #FFA920;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    z-index: 1;
}

.icon-bookmark {
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 1;
    color: white;
}

.content {
    padding: 15px;
}

.link-style-1 a {
    color: #333;
    text-decoration: none;
    font-size: 18px;
    font-weight: 600;
}

.text-address {
    color: #666;
    margin: 10px 0;
}

.money {
    color: #FFA920;
    margin: 10px 0;
}

.icon-box {
    display: flex;
    justify-content: space-between;
    margin-top: 15px;
}

.icons {
    display: flex;
    align-items: center;
    gap: 5px;
    color: #666;
}

.wrap-item {
    display: flex;
    flex-wrap: wrap;
    margin: -15px;
}

@media (max-width: 992px) {
    .box-dream {
        width: calc(50% - 30px);
    }
}

@media (max-width: 768px) {
    .box-dream {
        width: calc(100% - 30px);
    }
}
</style>
@endpush
@endsection
