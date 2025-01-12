<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="utf-8">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

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
    <title>  easyhome</title>
</head>
<body>
@include('parts.login_popup')
@include('parts.header')
    <div class="content">
        @yield('content')
    </div>
    @include('parts.footer')



    <script>
 function handleFormRequest(url, formData) {
    fetch(url, {
        method: 'POST',
        body: formData,
        credentials: 'same-origin',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // إضافة CSRF token
        }
    })
    .then(response => response.json()) // تحويل الاستجابة إلى JSON
    .then(data => {
        const messagesDiv = document.getElementById('form-messages');
        messagesDiv.style.display = 'block';

        if (response.ok) {
            // عرض رسالة النجاح
            messagesDiv.innerHTML = `<div class="alert alert-success">${data.message || 'تمت العملية بنجاح'}</div>`;
        } else {
            // عرض رسالة الخطأ
            messagesDiv.innerHTML = `<div class="alert alert-danger">${data.error || 'حدث خطأ ما.'}</div>`;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        const messagesDiv = document.getElementById('form-messages');
        messagesDiv.style.display = 'block';
        messagesDiv.innerHTML = `<div class="alert alert-danger">حدث خطأ غير متوقع.</div>`;
    });
}

</script>




</body>
</html>
