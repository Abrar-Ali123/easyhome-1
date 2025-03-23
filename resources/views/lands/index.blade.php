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
                        <h2>الأراضي</h2>
                    </div>
                    <div class="flat-tabs themesflat-tabs mt-4">
                        <div class="content-tab">
                            <div class="content-inner tab-content">
                                <div id="searchResults" class="wrap-item flex">
                                    @forelse($lands as $land)
                                        <!-- col 1 -->
                                        <div class="box box-dream hv-one">
                                            <div class="image-group relative">
                                                <span class="featured fs-12 fw-6">{{ $land->status }}</span>
                                                <span class="icon-bookmark"><i class="far fa-bookmark"></i></span>
                                                <div class="swiper-container carousel-2 img-style">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <img src="{{ asset('storage/' . $land->image) }}" 
                                                                 alt="{{ $land->title }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h3 class="link-style-1">
                                                    <a href="{{ route('lands.show', ['land' => $land->id]) }}">
                                                        {{ $land->title }}
                                                    </a>
                                                </h3>
                                                <div class="text-address">
                                                    <p class="p-12">
                                                        {{ $land->location }}
                                                    </p>
                                                </div>
                                                <div class="money fs-18 fw-6 text-color-3">
                                                    {{ number_format($land->price) }} ريال
                                                </div>
                                                <div class="icon-box flex">
                                                    <div class="icons icon-3 flex">
                                                        <span>المساحة: </span>
                                                        <span class="fw-6">{{ $land->area }} م²</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12">
                                            <div class="alert alert-info">
                                                لم يتم العثور على أراضٍ تطابق معايير البحث
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
@endsection
