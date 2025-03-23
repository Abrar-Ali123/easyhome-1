@extends('admin.layouts.admin')

@section('title', 'إضافة عنوان قسم جديد')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">إضافة عنوان قسم جديد</h3>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.section-titles.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="section_key">مفتاح القسم <span class="text-danger">*</span></label>
                            <input type="text" name="section_key" id="section_key" class="form-control @error('section_key') is-invalid @enderror" value="{{ old('section_key') }}" required>
                            <small class="form-text text-muted">مثال: properties, testimonials, blog</small>
                        </div>

                        <div class="form-group">
                            <label for="title">العنوان <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="subtitle">العنوان الفرعي</label>
                            <input type="text" name="subtitle" id="subtitle" class="form-control @error('subtitle') is-invalid @enderror" value="{{ old('subtitle') }}">
                        </div>

                        <div class="form-group">
                            <label for="description">الوصف</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="order">الترتيب</label>
                            <input type="number" name="order" id="order" class="form-control @error('order') is-invalid @enderror" value="{{ old('order', 0) }}">
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="is_active" class="custom-control-input" id="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_active">نشط</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">حفظ</button>
                            <a href="{{ route('admin.section-titles.index') }}" class="btn btn-secondary">رجوع</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
