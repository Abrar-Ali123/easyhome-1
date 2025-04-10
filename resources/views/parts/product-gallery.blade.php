{{-- Required CSS --}}
@once
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
@endonce

{{-- Real Estate Property Gallery --}}
<div class="product-gallery-component">
    <div class="property-gallery mb-5">
        <div class="container-fluid px-4">
            <div class="gallery-layout">
                {{-- Main Image Section --}}
                <div class="main-image-section">
                    <div class="main-image-container">
                        <a href="{{ asset('storage/' . $product->image) }}"
                           data-fancybox="property-gallery"
                           data-caption="الصورة الرئيسية للعقار">
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 alt="الصورة الرئيسية للعقار"
                                 class="main-image">
                        </a>

                        @if($product->images)
                            @php 
                                $allImages = array_merge([$product->image], explode(',', $product->images));
                                $allImages = array_filter($allImages);
                            @endphp
                            <div class="image-counter">
                                <i class="fas fa-images"></i>
                                <span>{{ count($allImages) }} صور</span>
                            </div>
                        @endif

                        <button class="nav-button prev"><i class="fas fa-chevron-left"></i></button>
                        <button class="nav-button next"><i class="fas fa-chevron-right"></i></button>
                    </div>

                    {{-- Right Thumbnails --}}
                    <div class="side-thumbnails">
                        @if($product->images)
                            @foreach(array_slice($allImages, 1, 5) as $index => $img)
                                <div class="thumbnail-item">
                                    <a href="{{ asset('storage/' . $img) }}"
                                       data-fancybox="property-gallery"
                                       data-caption="صورة {{ $index + 1 }} من العقار">
                                        <img src="{{ asset('storage/' . $img) }}" 
                                             alt="صورة {{ $index + 1 }}">
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            {{-- Bottom Thumbnails --}}
            <div class="bottom-thumbnails">
                @if($product->images)
                    <div class="thumbnails-grid">
                        @foreach(array_slice($allImages, 6, 5) as $index => $img)
                            <div class="thumbnail-item">
                                <a href="{{ asset('storage/' . $img) }}"
                                   data-fancybox="property-gallery"
                                   data-caption="صورة {{ $index + 6 }} من العقار">
                                    <img src="{{ asset('storage/' . $img) }}" 
                                         alt="صورة {{ $index + 6 }}">
                                </a>
                            </div>
                        @endforeach

                        @if(count($allImages) > 11)
                            <div class="thumbnail-item view-all">
                                <a href="javascript:void(0);"
                                   onclick="Fancybox.show(document.querySelectorAll('[data-fancybox=\'property-gallery\']'))">
                                    <div class="view-all-content">
                                        <i class="fas fa-images"></i>
                                        <span>+{{ count($allImages) - 11 }}</span>
                                        <small>عرض الكل</small>
                                    </div>
                                </a>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
.product-gallery-component {
    --gap: 0.5rem;
    --thumb-size: 80px;
    margin: 5%;
    --aspect-ratio: 4/3;
}

.gallery-layout {
    margin-bottom: var(--gap);
}

.main-image-section {
    position: relative;
    display: flex;
    gap: var(--gap);
}

.main-image-container {
    position: relative;
    flex: 1;
    aspect-ratio: var(--aspect-ratio);
    border-radius: 8px;
    overflow: hidden;
    background-color: #f8f9fa;
}

.main-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: opacity 0.3s ease;
}

.main-image.loading {
    opacity: 0;
}

.main-image-container::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom, rgba(0,0,0,0.2), transparent);
    z-index: 1;
    pointer-events: none;
}

.side-thumbnails {
    display: flex;
    flex-direction: column;
    gap: var(--gap);
    width: var(--thumb-size);
}

.side-thumbnails .thumbnail-item {
    width: var(--thumb-size);
    height: calc(var(--thumb-size) * 3 / 4);
    margin-bottom: var(--gap);
    border-radius: 4px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.bottom-thumbnails {
    margin-top: var(--gap);
}

.bottom-thumbnails .thumbnails-grid {
    display: flex;
    gap: var(--gap);
    height: calc(var(--thumb-size) * 3 / 4);
}

.thumbnail-item {
    position: relative;
    aspect-ratio: var(--aspect-ratio);
    border-radius: 4px;
    overflow: hidden;
    cursor: pointer;
    flex: 1;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: transform 0.2s ease;
}

.thumbnail-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.3s ease;
}

.thumbnail-item:hover {
    transform: translateY(-2px);
}

.thumbnail-item:hover img {
    transform: scale(1.1);
}

.thumbnail-item::after {
    content: '';
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.3);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.thumbnail-item:hover::after {
    opacity: 1;
}

.thumbnail-item.active {
    border: 2px solid #007bff;
    transform: translateY(-2px);
}

.nav-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.9);
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    opacity: 0;
    transition: all 0.3s ease;
    z-index: 10;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.prev { left: 1rem; }
.next { right: 1rem; }

.main-image-container:hover .nav-button {
    opacity: 1;
}

.nav-button:hover {
    background: white;
    transform: translateY(-50%) scale(1.1);
}

.image-counter {
    position: absolute;
    bottom: 1rem;
    right: 1rem;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 2rem;
    font-size: 0.9rem;
    z-index: 10;
    backdrop-filter: blur(4px);
}

.view-all {
    background: linear-gradient(135deg, #007bff, #0056b3);
}

.view-all-content {
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.8rem;
    text-shadow: 0 1px 2px rgba(0,0,0,0.2);
}

/* Loading Placeholder */
.thumbnail-item::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, #f0f0f0 0%, #f8f8f8 50%, #f0f0f0 100%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
    z-index: -1;
}

@keyframes loading {
    0% { background-position: 200% 0; }
    100% { background-position: -200% 0; }
}

/* Responsive Design */
@media (max-width: 992px) {
    .product-gallery-component {
        --thumb-size: 60px;
        margin: 3%;
    }
}

@media (max-width: 768px) {
    .side-thumbnails {
        display: none;
    }

    .bottom-thumbnails .thumbnails-grid {
        flex-wrap: wrap;
        height: auto;
        gap: 8px;
    }

    .bottom-thumbnails .thumbnail-item {
        width: calc((100% - 32px) / 5);
        height: calc(((100% - 32px) / 5) * 3 / 4);
    }

    .nav-button {
        opacity: 1;
        width: 36px;
        height: 36px;
    }
}

@media (max-width: 576px) {
    .product-gallery-component {
        margin: 0;
    }

    .bottom-thumbnails .thumbnail-item {
        width: calc((100% - 16px) / 3);
        height: calc(((100% - 16px) / 3) * 3 / 4);
    }

    .nav-button {
        width: 32px;
        height: 32px;
    }
}
</style>

@once
<script>
document.addEventListener('DOMContentLoaded', function() {
    const mainImage = document.querySelector('.main-image');
    const thumbnails = document.querySelectorAll('.thumbnail-item:not(.view-all) img');
    const prevBtn = document.querySelector('.nav-button.prev');
    const nextBtn = document.querySelector('.nav-button.next');
    let currentIndex = 0;

    // Add loading state to images
    function handleImageLoading(img) {
        img.classList.add('loading');
        img.onload = () => {
            img.classList.remove('loading');
        };
    }

    thumbnails.forEach((thumb, index) => {
        thumb.addEventListener('click', (e) => {
            e.preventDefault();
            updateMainImage(index);
        });
        handleImageLoading(thumb);
    });

    handleImageLoading(mainImage);

    prevBtn?.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + thumbnails.length) % thumbnails.length;
        updateMainImage(currentIndex);
    });

    nextBtn?.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % thumbnails.length;
        updateMainImage(currentIndex);
    });

    // Add keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            prevBtn?.click();
        } else if (e.key === 'ArrowRight') {
            nextBtn?.click();
        }
    });

    function updateMainImage(index) {
        const newSrc = thumbnails[index].src;
        handleImageLoading(mainImage);
        mainImage.src = newSrc;
        currentIndex = index;
        
        thumbnails.forEach(thumb => thumb.parentElement.parentElement.classList.remove('active'));
        thumbnails[index].parentElement.parentElement.classList.add('active');
    }

    // Set first image as active
    updateMainImage(0);
});
</script>
@endonce
