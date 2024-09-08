@extends('layout')

@section('title', 'اطلب منتج')

@section('content')
     <form action="{{ route('submit.product.request') }}" method="POST">
        @csrf

        <!-- عنوان النموذج -->
        <h2>اطلب منتج</h2>

        <!-- رسالة النجاح -->
        @if(session('success'))
            <div class="alert alert-success">تم إرسال طلبك بنجاح!</div>
        @endif

        <!-- اختيار المدينة -->
        <div>
            <label for="city">اختر المدينة:</label>
            <select name="city" id="city" required>
                <option value="" disabled selected>اختر المدينة</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- كتابة أسماء الأحياء -->
        <div>
            <label for="neighborhoods">أسماء الأحياء:</label>
            <input type="text" id="neighborhoods" name="neighborhoods" required placeholder="اكتب أسماء الأحياء">
        </div>

        <!-- اختيار التصنيف -->
        <div>
            <label for="category">اختر التصنيف:</label>
            <select name="category" id="category" required>
                <option value="" disabled selected>اختر التصنيف</option>
                @foreach($categories as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <!-- كتابة الوصف -->
        <div>
            <label for="description">الوصف:</label>
            <textarea id="description" name="description" rows="4" required placeholder="اكتب الوصف"></textarea>
        </div>

        <!-- إرسال الطلب -->
        <button type="submit">إرسال الطلب</button>
    </form>
 @endsection
