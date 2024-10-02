@extends('layout')

@section('content')
    <form action="{{ route('submit.product.request') }}" method="POST">
        @csrf

         <!-- عرض رسالة النجاح -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <strong>تهانينا!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

        <!-- تحقق مما إذا كان المستخدم مسجل دخول -->
        @guest
            <!-- بيانات تسجيل المستخدم (تظهر فقط إذا لم يكن مسجل دخول) -->
            <div>
                <label for="name">الاسم:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="اكتب اسمك">
            </div>

            <div>
                <label for="email">البريد الإلكتروني:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="اكتب بريدك الإلكتروني">
            </div>

            <div>
                <label for="password">كلمة المرور:</label>
                <input type="password" id="password" name="password" required placeholder="اكتب كلمة مرورك">
            </div>

            <div>
                <label for="password_confirmation">تأكيد كلمة المرور:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="أعد كتابة كلمة المرور">
            </div>

            <div>
                <label for="phone">رقم الهاتف:</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="اكتب رقم هاتفك">
            </div>

            <div>
                <label for="salary">الراتب:</label>
                <input type="number" id="salary" name="salary" value="{{ old('salary') }}" placeholder="اكتب راتبك (إن وجد)">
            </div>

            <div>
                <label for="bank">البنك:</label>
                <input type="text" id="bank" name="bank" value="{{ old('bank') }}" placeholder="اكتب البنك">
            </div>

            <div>
                <label for="age">العمر:</label>
                <input type="number" id="age" name="age" value="{{ old('age') }}" required placeholder="اكتب عمرك">
            </div>
        @endguest

        <!-- اختيار المدينة الرئيسية -->
        <div>
            <label for="parent_city">اختر المدينة الرئيسية:</label>
            <select name="parent_city" id="parent_city" required>
                <option value="" disabled {{ old('parent_city') ? '' : 'selected' }}>اختر المدينة الرئيسية</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ old('parent_city') == $city->id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- اختيار المدن التابعة -->
        <div>
            <label for="sub_cities">اختر المدن التابعة:</label>
            <div id="sub_cities_container">
                <!-- سيتم تعبئة المدن التابعة هنا باستخدام checkboxes -->
            </div>
        </div>

        <!-- اختيار التصنيف -->
        <div>
            <label for="category">اختر التصنيف:</label>
            <select name="category" id="category" required>
                <option value="" disabled {{ old('category') ? '' : 'selected' }}>اختر التصنيف</option>
                @foreach($categories as $key => $value)
                    <option value="{{ $key }}" {{ old('category') == $key ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="description">الوصف:</label>
            <textarea id="description" name="description" rows="4" required placeholder="اكتب الوصف">{{ old('description') }}</textarea>
        </div>

        <!-- إرسال الطلب -->
        <button type="submit">تسجيل وإرسال الطلب</button>
    </form>

    <!-- جافاسكريبت لجلب المدن التابعة باستخدام AJAX -->
    <script>
        document.getElementById('parent_city').addEventListener('change', function () {
            var parentCityId = this.value;

            // استخدام AJAX لجلب المدن التابعة بناءً على المدينة الرئيسية المختارة
            fetch(`{{ url('/get-neighborhoods/') }}/${parentCityId}`)
                .then(response => response.json())
                .then(data => {
                    var subCitiesContainer = document.getElementById('sub_cities_container');
                    subCitiesContainer.innerHTML = '';  // تفريغ الحاوية القديمة

                    if (data.message) {
                        // إذا لم تكن هناك مدن تابعة
                        alert(data.message);
                    } else {
                        // إنشاء checkboxes للمدن التابعة
                        data.forEach(function(subCity) {
                            var checkbox = document.createElement('input');
                            checkbox.type = 'checkbox';
                            checkbox.name = 'sub_cities[]';
                            checkbox.value = subCity.id;
                            checkbox.id = 'sub_city_' + subCity.id;

                            var label = document.createElement('label');
                            label.htmlFor = 'sub_city_' + subCity.id;
                            label.textContent = subCity.name;

                            var div = document.createElement('div');
                            div.appendChild(checkbox);
                            div.appendChild(label);

                            subCitiesContainer.appendChild(div);
                        });
                    }
                })
                .catch(error => {
                    console.error('Error fetching subcities:', error);
                    alert('حدث خطأ أثناء تحميل المدن التابعة.');
                });
        });
    </script>
@endsection
