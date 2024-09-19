<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="utf-8">
      <link href="{{ asset('css/front.css') }}" rel="stylesheet">
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
 // تعريف دالة handleFormRequest أولاً للتعامل مع POST
function handleFormRequest(url, formData) {
    fetch(url, {
        method: 'POST',
        body: formData,
        credentials: 'same-origin',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // إضافة CSRF token
        }
    })
    .then(response => {
        if (response.status === 403) {
            toggleLoginPopup(); // عرض نافذة تسجيل الدخول إذا كانت الاستجابة 403
        } else if (response.ok) {
            window.location.reload(); // إعادة تحميل الصفحة بعد النجاح
        } else {
            console.error('An error occurred.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// دالة للتعامل مع الروابط GET
function handleRequest(url) {
    fetch(url, {
        method: 'GET',
        credentials: 'same-origin'
    })
    .then(response => {
        if (response.status === 403) {
            toggleLoginPopup(); // عرض نافذة تسجيل الدخول إذا كانت الاستجابة 403
        } else if (response.ok) {
            window.location.href = url; // الانتقال إلى الرابط عند نجاح الطلب
        } else {
            console.error('An error occurred.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// التعامل مع جميع الروابط، الأزرار والنماذج
document.querySelectorAll('a, button, form').forEach(element => {
    // إذا كان العنصر نموذجًا
    if (element.tagName.toLowerCase() === 'form') {
        element.addEventListener('submit', function(event) {
            event.preventDefault(); // منع إعادة تحميل الصفحة
            const formAction = element.action; // الحصول على رابط النموذج
            const formData = new FormData(element); // جمع بيانات النموذج
            handleFormRequest(formAction, formData); // استدعاء دالة POST
        });
    }

    // إذا كان العنصر رابطًا (anchor tag)
    if (element.tagName.toLowerCase() === 'a') {
        element.addEventListener('click', function(event) {
            event.preventDefault(); // منع الانتقال الفوري للرابط
            const linkHref = element.href; // الحصول على الرابط
            handleRequest(linkHref); // استدعاء دالة GET
        });
    }
});


</script>




</body>
</html>
