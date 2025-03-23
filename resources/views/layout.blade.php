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
    <style>
        .monthly-payment-card {
            background: linear-gradient(135deg, #2ebd59 0%, #1a8f3c 100%);
            border-radius: 10px;
            padding: 15px 20px;
            margin: 15px 0 35px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(46, 189, 89, 0.2);
            transition: all 0.3s ease;
            cursor: pointer;
            text-align: right;
            direction: rtl;
        }

        .monthly-payment-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(46, 189, 89, 0.3);
        }

        .monthly-payment-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1));
            transform: skewX(-15deg);
            transition: transform 0.5s;
        }

        .monthly-payment-card:hover::before {
            transform: skewX(-15deg) translateX(200px);
        }

        .payment-label {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            margin-bottom: 8px;
            display: block;
            font-weight: 500;
        }

        .payment-amount {
            color: #fff;
            font-size: 24px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .payment-amount .currency {
            font-size: 16px;
            opacity: 0.9;
            font-weight: 500;
        }

        .payment-amount .period {
            font-size: 14px;
            opacity: 0.8;
            margin-right: auto;
            background: rgba(255, 255, 255, 0.1);
            padding: 4px 8px;
            border-radius: 4px;
        }

        .installment-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 28px;
            color: rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .monthly-payment-card:hover .installment-icon {
            animation: pulse 1s infinite;
        }

        .monthly-price {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, #2ebd59 0%, #34d364 100%);
            color: white;
            padding: 12px 18px;
            border-radius: 10px;
            z-index: 2;
            text-align: center;
            box-shadow: 0 4px 15px rgba(46, 189, 89, 0.3);
            border: 1px solid rgba(255,255,255,0.25);
            min-width: 160px;
            transform: translateZ(0);
            overflow: hidden;
        }

        .monthly-price::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100%;
            background: linear-gradient(90deg,
                rgba(255,255,255,0) 0%,
                rgba(255,255,255,0.2) 50%,
                rgba(255,255,255,0) 100%);
            transform: translateX(-100%);
            animation: shimmer 2s infinite;
        }

        .monthly-price .label {
            display: block;
            font-size: 14px;
            opacity: 0.95;
            margin-bottom: 6px;
            font-weight: 500;
            text-shadow: 0 1px 1px rgba(0,0,0,0.1);
        }

        .monthly-price .price-wrapper {
            margin: 6px 0;
            position: relative;
        }

        .monthly-price .amount {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 0.5px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.15);
        }

        .monthly-price .currency {
            font-size: 16px;
            margin-right: 3px;
            opacity: 0.95;
            font-weight: 500;
        }

        .monthly-price .period {
            display: inline-block;
            font-size: 12px;
            background: rgba(255,255,255,0.18);
            padding: 3px 10px;
            border-radius: 15px;
            margin-top: 4px;
            font-weight: 500;
            letter-spacing: 0.3px;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .monthly-price:hover {
            transform: translateY(-3px) translateZ(0);
            box-shadow: 0 6px 20px rgba(46, 189, 89, 0.4);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .monthly-price:hover .amount {
            animation: pulse 1.2s infinite;
        }

        @keyframes shimmer {
            100% {
                transform: translateX(100%);
            }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .featured {
            background: linear-gradient(135deg, #34d364 0%, #2ebd59 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            position: absolute;
            z-index: 2;
            font-weight: 600;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .featured:first-child {
            top: 20px;
            right: 20px;
        }

        .featured:nth-child(2) {
            top: 70px;
            right: 20px;
        }

        .price-tag {
            position: absolute;
            top: 50%;
            right: -5px;
            transform: translateY(-50%);
            z-index: 10;
            direction: rtl;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
        }

        .price-tag-content {
            background: linear-gradient(135deg, #34d364 0%, #2ebd59 100%);
            color: white;
            padding: 12px 18px 12px 30px;
            border-radius: 0 4px 4px 0;
            position: relative;
            box-shadow: 0 3px 12px rgba(46, 189, 89, 0.2);
            transform: translateZ(0);
            overflow: hidden;
            min-width: 180px;
            border: 1px solid rgba(255,255,255,0.15);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .price-tag-content::before {
            content: '';
            position: absolute;
            left: -24px;
            top: 0;
            border-style: solid;
            border-width: 23.5px 24px 23.5px 0;
            border-color: transparent #34d364 transparent transparent;
            filter: drop-shadow(3px 0 2px rgba(0,0,0,0.05));
            transition: all 0.3s ease;
        }

        .price-tag-content::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 5px;
            height: 5px;
            background: #1e8b3f;
            border-radius: 0 0 5px 0;
            box-shadow: inset 1px -1px 1px rgba(0,0,0,0.1);
        }

        .price-tag-content .shine {
            content: '';
            position: absolute;
            top: -100%;
            left: -100%;
            width: 300%;
            height: 300%;
            background: linear-gradient(
                45deg,
                rgba(255,255,255,0) 0%,
                rgba(255,255,255,0.03) 30%,
                rgba(255,255,255,0.2) 45%,
                rgba(255,255,255,0.3) 50%,
                rgba(255,255,255,0.2) 55%,
                rgba(255,255,255,0.03) 70%,
                rgba(255,255,255,0) 100%
            );
            transform: rotate(30deg) translate(-100%, -100%);
            opacity: 0;
            transition: opacity 0.2s ease;
            pointer-events: none;
            will-change: transform, opacity;
        }

        .price-tag:hover .shine {
            opacity: 1;
            animation: shine 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
        }

        @keyframes shine {
            0% {
                transform: rotate(30deg) translate(-100%, -100%);
                opacity: 0;
            }
            10% {
                opacity: 0.5;
            }
            20% {
                opacity: 0.8;
            }
            30% {
                opacity: 0.5;
            }
            100% {
                transform: rotate(30deg) translate(100%, 100%);
                opacity: 0;
            }
        }

        .price-value {
            font-size: 24px;
            font-weight: bold;
            text-shadow: 1px 1px 0 rgba(0,0,0,0.15);
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
            position: relative;
            z-index: 1;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            color: white;
        }

        .price-value .currency {
            font-size: 16px;
            font-weight: 500;
            opacity: 0.95;
            margin-right: 2px;
            color: rgba(255,255,255,0.9);
        }

        .price-label {
            font-size: 13px;
            opacity: 0.95;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            background: rgba(255,255,255,0.15);
            padding: 4px 12px;
            border-radius: 12px;
            margin-top: 3px;
            border: 1px solid rgba(255,255,255,0.1);
            position: relative;
            z-index: 1;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
            text-shadow: 0 1px 1px rgba(0,0,0,0.1);
        }

        .price-label i {
            font-size: 12px;
            margin-left: 2px;
            transition: all 0.3s ease;
        }

        .price-tag:hover .price-tag-content {
            transform: translateX(-5px) scale(1.02);
            box-shadow: 0 5px 18px rgba(46, 189, 89, 0.35);
            background: linear-gradient(135deg, #3de06f 0%, #34d364 100%);
        }

        .price-tag:hover .price-tag-content::before {
            border-width: 24px 25px 24px 0;
            border-color: transparent #3de06f transparent transparent;
        }

        .price-tag:hover .price-label {
            background: rgba(255,255,255,0.2);
            transform: scale(1.02);
            border-color: rgba(255,255,255,0.2);
        }

        .price-tag:hover .price-label i {
            transform: rotate(12deg);
            color: rgba(255,255,255,1);
        }

        .price-tag:hover .price-value {
            animation: float 1s ease-in-out infinite;
            color: white;
        }

        .price-tag:hover .price-value .currency {
            color: rgba(255,255,255,1);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1.02); }
            50% { transform: translateY(-2px) scale(1.02); }
        }
    </style>
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
