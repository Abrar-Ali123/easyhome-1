@extends('dashboard')

@section('title', 'عرض العقارات')

@section('content')
<section class="mt-8 px-4">
    <h2 class="text-2xl font-bold mb-4 text-center">البحث والفلترة</h2>

    <form method="GET" action="{{ route('products.index1') }}">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <!-- البحث بالكلمة -->
            <input type="text" name="search" class="form-input w-full" placeholder="ابحث عن عقار" value="{{ request()->input('search') }}">

            <!-- الفلترة بالمدينة -->
            <select name="city_id" class="form-select w-full">
                <option value="">اختر المدينة</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ request()->input('city_id') == $city->id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>

            <!-- الفلترة بالسعر -->
            <div class="flex">
                <input type="number" name="min_price" class="form-input w-full" placeholder="أقل سعر" value="{{ request()->input('min_price') }}">
                <input type="number" name="max_price" class="form-input w-full" placeholder="أعلى سعر" value="{{ request()->input('max_price') }}">
            </div>

            <!-- الفلترة بعدد الغرف -->
            <input type="number" name="bedrooms" class="form-input w-full" placeholder="عدد الغرف" value="{{ request()->input('bedrooms') }}">

            <!-- الفلترة بعدد الحمامات -->
            <input type="number" name="bathrooms" class="form-input w-full" placeholder="عدد الحمامات" value="{{ request()->input('bathrooms') }}">

            <!-- الفلترة بالمساحة -->
            <div class="flex">
                <input type="number" name="min_area" class="form-input w-full" placeholder="أقل مساحة (م²)" value="{{ request()->input('min_area') }}">
                <input type="number" name="max_area" class="form-input w-full" placeholder="أعلى مساحة (م²)" value="{{ request()->input('max_area') }}">
            </div>

            <!-- زر البحث -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">بحث</button>
        </div>
    </form>
</section>

<!-- عرض العقارات -->
<section class="mt-8 px-4">
    <h2 class="text-2xl font-bold mb-4 text-center">العقارات</h2>

    <div class="max-w-screen-xl mx-auto grid grid-cols-1 sm:grid-cols-3 gap-8">
        @foreach($products as $product)
            <div class="relative group overflow-hidden rounded-lg shadow-lg">
                <img src="{{ url('/storage/app/public/' . $product->image) }}" alt="Property Image" class="w-full h-full object-cover rounded-t-lg">
                <div class="absolute top-4 right-4">
                    <div class="relative">
                        <i class="far fa-heart text-white text-2xl rounded-full"></i>
                    </div>
                </div>
                <div class="absolute top-4 left-4">
                    <div class="relative">
                        <i class="far fa-comment text-white text-2xl rounded-full"></i>
                        <div class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 bg-primary text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold">
                            {{ $product->comments_count ?? 0 }}
                        </div>
                    </div>
                </div>
                <div class="absolute inset-x-0 bottom-0 text-white transition-all duration-300 transform translate-y-full group-hover:translate-y-0" style="background-color: rgba(0, 62, 55, 0.85);">
                    <div class="p-4">
                        <a href="{{ route('products.show', ['product' => $product->id]) }}">
                            <h3 class="text-lg font-semibold">{{ $product->title }}</h3>
                        </a>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-map-marker-alt mr-2 ml-2"></i>
                            <p class="ml-2">{{ $product->location }}</p>
                        </div>
                        <div class="flex items-center mb-2">
                            <i class="fas fa-bed mr-2 ml-2"></i>
                            <p class="ml-2">{{ $product->bedrooms }} غرف </p>
                            <span class="mx-2">|</span>
                            <i class="fas fa-bath mr-2 ml-2"></i>
                            <p class="ml-2">{{ $product->bathrooms }} حمام</p>
                        </div>
                        <div class="flex items-center mb-2 ml-2">
                            <i class="fas fa-ruler-combined mr-2 ml-2"></i>
                            <p class="ml-2">{{ $product->area }} م


@endsection
