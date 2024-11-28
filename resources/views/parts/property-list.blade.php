<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<section class="mt-8 px-4" style="direction: rtl;">
    <h2 class="text-2xl font-bold mb-4 text-center" style="color: #bb9339;">العقارات</h2>

    <div class="max-w-screen-xl mx-auto grid grid-cols-1 sm:grid-cols-3 gap-8">
        @forelse($products as $product)
        <div class="relative group overflow-hidden rounded-lg shadow-lg cursor-pointer" onclick="window.location='{{ route('products.show', ['product' => $product->id]) }}'" style="height: 300px;">

                 <img src="{{ url('/storage/app/public/' . $product->image) }}" alt="Property Image" class="w-full h-full object-cover rounded-t-lg">
                <div class="absolute top-4 right-4">
                    <div class="relative">
                        <i class="far fa-heart text-white text-2xl rounded-full"></i>
                    </div>
                </div>
                <div class="absolute top-4 left-4">
                    <div class="relative">
                        <i class="far fa-comment text-white text-2xl rounded-full"></i>
                        <div class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2" style="background-color: #fff6e0; color: #bb9339; border-radius: 50%; width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: bold;">
                            {{ $product->comments_count ?? 0 }}
                        </div>
                    </div>
                </div>
                <div class="absolute inset-x-0 bottom-0 text-white transition-all duration-300 transform translate-y-full group-hover:translate-y-0" style="background-color: rgba(0, 62, 55, 0.85);">
                    <div class="p-4">
                        <a href="{{ route('products.show', ['product' => $product->id]) }}" class="no-underline">
                            <h3 class="text-lg font-semibold">{{ $product->title }}</h3>
                        </a>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-bed mr-2 ml-2"></i>
                            <p class="ml-2">{{ $product->bedrooms }} غرف </p>
                            <span class="mx-2">|</span>
                            <i class="fas fa-bath mr-2 ml-2"></i>
                            <p class="ml-2">{{ $product->bathrooms }} حمام</p>
                        </div>
                        <div class="flex items-center mb-2 ml-2">
                            <i class="fas fa-ruler-combined mr-2 ml-2"></i>
                            <p class="ml-2">{{ $product->area }} م²</p>
                            <span class="mx-2">|</span>
                            <i class="fas fa-money-bill-wave mr-2 ml-2"></i>
                            <p class="ml-2">{{ number_format($product->price) }} ريال</p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center col-span-3">لا توجد نتائج للبحث.</p>
        @endforelse
    </div>
<br>
</br>
<br>
</br>
<style>
    .group:hover .translate-y-full {
        transform: translateY(0);
    }
    .translate-y-full {
        transform: translateY(calc(100% - 4rem)); /* يظهر جزء صغير فقط لعنوان العقار */
    }
    .no-underline {
        text-decoration: none;
    }
    .group {
        height: 300px; /* لضبط حجم الكروت */
    }
    a.no-underline {
    text-decoration: none;
    color: inherit;
}

</style>
</section>
