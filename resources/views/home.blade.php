<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="utf-8">
      <link href="{{ asset('css/home.css') }}" rel="stylesheet">
      <script src="{{ asset('js/site.js') }}"></script>
      <script src="{{ asset('js/site2.js') }}"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'لارافيل') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة المثال</title>
</head>
<body>
@include('parts.login_popup')
@include('parts.header')



    <div class="content">
        @yield('content')
    </div>


    @include('parts.footer')





    <script>
    function toggleLoginPopup() {
        const loginPopup = document.getElementById('loginPopup');
        loginPopup.classList.toggle('hidden');
    }

    // التعامل مع الروابط، الأزرار، والنماذج
    document.querySelectorAll('a, button, form').forEach(element => {
        element.addEventListener('click', function(event) {
            // التأكد من نوع العنصر للتعامل معه بشكل صحيح
            if (element.tagName.toLowerCase() === 'a' && element.href.includes('/home/')) {
                event.preventDefault();

                fetch(element.href, {
                    method: 'GET',
                    credentials: 'same-origin'
                })
                .then(response => {
                    if (response.status === 403) {
                        // عرض نافذة تسجيل الدخول فقط إذا كانت الاستجابة 403
                        toggleLoginPopup();
                    } else if (response.ok) {
                        // تنفيذ الإجراء المناسب للمستخدم المسجل (مثل الانتقال إلى الرابط)
                        window.location.href = element.href;
                    } else {
                        console.error('An error occurred.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    console.error('A network error occurred.');
                });
            } else if (element.tagName.toLowerCase() === 'button') {
                // التعامل مع الأزرار، افتراضاً أنها تقوم بعمل AJAX أو نموذج
                event.preventDefault();
                console.log('تم الضغط على زر، نفذ الإجراء المناسب هنا.');

                // هنا يمكنك إضافة أي إجراءات تتعلق بالزر
                // مثال: استدعاء دالة أخرى، فتح نافذة تسجيل دخول، إلخ
            } else if (element.tagName.toLowerCase() === 'form') {
                // التعامل مع النماذج لمنع إعادة تحميل الصفحة
                event.preventDefault();

                let formData = new FormData(element);

                fetch(element.action, {
                    method: element.method,
                    body: formData,
                    credentials: 'same-origin'
                })
                .then(response => {
                    if (response.status === 403) {
                        toggleLoginPopup(); // عرض نافذة تسجيل الدخول إذا كانت الاستجابة 403
                    } else if (response.ok) {
                        console.log('تم إرسال النموذج بنجاح.');
                        // تنفيذ الإجراء المناسب عند نجاح الطلب
                    } else {
                        console.error('An error occurred.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });
    });
</script>



</body>
</html>
