@extends('dashboard.layouts.app')

@section('title', 'أضف منشورًا جديدًا')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">أضف منشورًا جديدًا</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" id="postForm">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">عنوان النشر</label>
                <input type="text" name="title" id="title"
                    class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contentEditor" class="form-label">بعد المحتوى:</label>
                <div id="editor-toolbar" class="mb-2">
                    <button type="button" onclick="execCmd('bold')" class="btn btn-sm btn-light"><i
                            class="fas fa-bold"></i> مظلم</button>
                    <button type="button" onclick="execCmd('italic')" class="btn btn-sm btn-light"><i
                            class="fas fa-italic"></i> ثم</button>
                    <button type="button" onclick="execCmd('underline')" class="btn btn-sm btn-light"><i
                            class="fas fa-underline"></i> تليف</button>
                    <button type="button" onclick="execCmd('justifyLeft')" class="btn btn-sm btn-light"><i
                            class="fas fa-align-left"></i> محاذاة اليسار</button>
                    <button type="button" onclick="execCmd('justifyCenter')" class="btn btn-sm btn-light"><i
                            class="fas fa-align-center"></i> محاذاة الوسط</button>
                    <button type="button" onclick="execCmd('justifyRight')" class="btn btn-sm btn-light"><i
                            class="fas fa-align-right"></i> المحاذاة الخاصة</button>
                    <input type="color" id="textColor" onchange="changeTextColor(this.value)" class="btn btn-sm"
                        title="تغيير اللون">
                </div>
                <div class="form-control rich-text-editor" contenteditable="true" id="contentEditor"
                    style="min-height: 200px; border: 1px solid #ccc; border-radius: 5px;"></div>
                <input type="hidden" id="hiddenContent" name="content">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">صورة</label>
                <input type="file" name="image" id="image"
                    class="form-control @error('image') is-invalid @enderror" accept="image/*"
                    onchange="previewImage(event)">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <img id="imagePreview" src="#" alt="معاينة الصورة" class="img-fluid d-none"
                    style="max-width: 400px;">
            </div>

            <div class="mb-3">
                <label for="meta_description" class="form-label"> وصف المنشور (اختياري)</label>
                <input type="text" name="meta_description" id="meta_description"
                    class="form-control @error('meta_description') is-invalid @enderror"
                    value="{{ old('meta_description') }}">
                @error('meta_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keywords" class="form-label">الكلمات الرئيسية</label>
                <input type="text" name="keywords" id="keywords" class="form-control" value="{{ old('keywords') }}"
                    placeholder="أضف الكلمات المفتاحية مثل: شقة، الرياض، للبيع">
            </div>

            <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var input = document.querySelector('#keywords');
                    var tagify = new Tagify(input, {
                        delimiters: ",",
                        maxTags: 10,
                        placeholder: "أضف كلمات مفتاحية مثل: شقة، الرياض، للبيع",
                        dropdown: {
                            enabled: 1,
                            maxItems: 10,
                            closeOnSelect: false
                        },
                        whitelist: [
                            "شقة", "فيلا", "استراحة", "عمارة",
                            "الرياض", "جدة", "الدمام", "مكة المكرمة",
                            "للبيع", "للإيجار", "منخفض", "متوسط", "مرتفع"
                        ]
                    });

                    fetch('/keywords')
                        .then(res => res.json())
                        .then(data => {
                            tagify.settings.whitelist = data;
                        });
                });
            </script>

            <div class="mb-3">
                <label for="category_blog_id" class="form-label">التصنيف</label>
                <select name="category_blog_id" id="category_blog_id"
                    class="form-control @error('category_blog_id') is-invalid @enderror" required>
                    <option value="">-- حدد التصنيف --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_blog_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_blog_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">

                <button type="submit" class="btn btn-success">يضيف</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">يلغي</a>
            </div>
        </form>
    </div>

    <script>
        function execCmd(command) {
            document.execCommand(command, false, null);
            syncContent();
        }

        function changeTextColor(color) {
            document.execCommand('foreColor', false, color);
            syncContent();
        }

        function syncContent() {
            const content = document.getElementById('contentEditor').innerHTML.trim();
            document.getElementById('hiddenContent').value = content;
        }

        document.getElementById('contentEditor').addEventListener('input', syncContent);

        document.querySelector('#postForm').addEventListener('submit', syncContent);

        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

@endsection
