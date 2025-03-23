@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>تعديل رأي العميل</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="client_name" class="form-label">اسم العميل</label>
                            <input type="text" 
                                   class="form-control @error('client_name') is-invalid @enderror" 
                                   id="client_name" 
                                   name="client_name" 
                                   value="{{ old('client_name', $testimonial->client_name) }}" 
                                   required>
                            @error('client_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">المحتوى</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" 
                                      id="content" 
                                      name="content" 
                                      rows="3" 
                                      required>{{ old('content', $testimonial->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="client_image" class="form-label">صورة العميل</label>
                            @if($testimonial->client_image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $testimonial->client_image) }}" 
                                         alt="صورة العميل الحالية" 
                                         style="max-width: 100px; border-radius: 50%;">
                                </div>
                            @endif
                            <input type="file" 
                                   class="form-control @error('client_image') is-invalid @enderror" 
                                   id="client_image" 
                                   name="client_image" 
                                   accept="image/*">
                            <small class="text-muted">اترك هذا الحقل فارغاً إذا كنت لا تريد تغيير الصورة</small>
                            @error('client_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="rating" class="form-label">التقييم</label>
                            <div class="rating-input">
                                @for($i = 5; $i >= 1; $i--)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" 
                                               type="radio" 
                                               name="rating" 
                                               id="rating{{ $i }}" 
                                               value="{{ $i }}" 
                                               {{ old('rating', $testimonial->rating) == $i ? 'checked' : '' }}>
                                        <label class="form-check-label" for="rating{{ $i }}">
                                            {{ $i }} <i class="fas fa-star text-warning"></i>
                                        </label>
                                    </div>
                                @endfor
                            </div>
                            @error('rating')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="order" class="form-label">الترتيب</label>
                            <input type="number" 
                                   class="form-control @error('order') is-invalid @enderror" 
                                   id="order" 
                                   name="order" 
                                   value="{{ old('order', $testimonial->order) }}">
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" 
                                       class="form-check-input" 
                                       id="is_active" 
                                       name="is_active" 
                                       value="1" 
                                       {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">مفعل</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">رجوع</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
