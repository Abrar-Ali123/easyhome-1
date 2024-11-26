@extends('dashboard.layout')

@section('title', 'إضافة بوست جديد')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">إضافة بوست جديد</h1>

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

        <!-- عنوان البوست -->
        <div class="mb-3">
            <label for="title" class="form-label">عنوان البوست</label>
            <input
                type="text"
                name="title"
                id="title"
                class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title') }}"
                required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- أدوات التحرير -->
        <div class="mb-3">
            <label for="contentEditor" class="form-label">محتوى البوست:</label>
            <div id="editor-toolbar" class="mb-2">
                <button type="button" onclick="execCmd('bold')" class="btn btn-sm btn-light"><i class="fas fa-bold"></i> غامق</button>
                <button type="button" onclick="execCmd('italic')" class="btn btn-sm btn-light"><i class="fas fa-italic"></i> مائل</button>
                <button type="button" onclick="execCmd('underline')" class="btn btn-sm btn-light"><i class="fas fa-underline"></i> تسطير</button>
                <button type="button" onclick="execCmd('justifyLeft')" class="btn btn-sm btn-light"><i class="fas fa-align-left"></i> محاذاة يسار</button>
                <button type="button" onclick="execCmd('justifyCenter')" class="btn btn-sm btn-light"><i class="fas fa-align-center"></i> محاذاة وسط</button>
                <button type="button" onclick="execCmd('justifyRight')" class="btn btn-sm btn-light"><i class="fas fa-align-right"></i> محاذاة يمين</button>
                <input type="color" id="textColor" onchange="changeTextColor(this.value)" class="btn btn-sm" title="تغيير اللون">
            </div>
            <div
                class="form-control rich-text-editor"
                contenteditable="true"
                id="contentEditor"
                style="min-height: 200px; border: 1px solid #ccc; border-radius: 5px;"></div>
            <input type="hidden" id="hiddenContent" name="content">
        </div>

        <!-- الصورة -->
        <div class="mb-3">
            <label for="image" class="form-label">الصورة</label>
            <input
                type="file"
                name="image"
                id="image"
                class="form-control @error('image') is-invalid @enderror"
                accept="image/*"
                onchange="previewImage(event)">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <img id="imagePreview" src="#" alt="معاينة الصورة" class="img-fluid d-none" style="max-width: 400px;">
        </div>

        <!-- الوصف التعريفي -->
        <div class="mb-3">
            <label for="meta_description" class="form-label">الوصف التعريفي (اختياري)</label>
            <input
                type="text"
                name="meta_description"
                id="meta_description"
                class="form-control @error('meta_description') is-invalid @enderror"
                value="{{ old('meta_description') }}">
            @error('meta_description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
    <label for="keywords" class="form-label">الكلمات المفتاحية</label>
    <input
        type="text"
        name="keywords"
        id="keywords"
        class="form-control"
        value="{{ old('keywords') }}"
        placeholder="أضف الكلمات المفتاحية مثل: شقة، الرياض، للبيع">
</div>

<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
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

        // إذا كنت تريد جلب الكلمات المفتاحية ديناميكيًا
        fetch('/keywords')
            .then(res => res.json())
            .then(data => {
                tagify.settings.whitelist = data; // تحديث الكلمات المقترحة
            });
    });
</script>




        <!-- التصنيف -->
        <div class="mb-3">
            <label for="category_blog_id" class="form-label">التصنيف</label>
            <select
                name="category_blog_id"
                id="category_blog_id"
                class="form-control @error('category_blog_id') is-invalid @enderror"
                required>
                <option value="">-- اختر التصنيف --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_blog_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_blog_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- الأزرار -->
        <button type="submit" class="btn btn-success">إضافة</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div>

<script>
    // تطبيق الأوامر على النصوص
    function execCmd(command) {
        document.execCommand(command, false, null);
        syncContent();
    }

    // تغيير لون النص
    function changeTextColor(color) {
        document.execCommand('foreColor', false, color);
        syncContent();
    }

    // تحديث الحقل المخفي
    function syncContent() {
        const content = document.getElementById('contentEditor').innerHTML.trim();
        document.getElementById('hiddenContent').value = content;
    }

    // تحديث الحقل المخفي عند الكتابة
    document.getElementById('contentEditor').addEventListener('input', syncContent);

    // تحديث الحقل المخفي قبل إرسال النموذج
    document.querySelector('#postForm').addEventListener('submit', syncContent);

    // معاينة الصورة
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }



</script>

<style>
    .rich-text-editor {
        width: 100%;
        padding: 10px;
        min-height: 200px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    #editor-toolbar button {
        margin-right: 5px;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

@endsection
