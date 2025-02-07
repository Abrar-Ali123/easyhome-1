<head>
    <meta charset="utf-8">
    <title>Easy Home</title>
    <link rel="icon" href="{{ asset('images/9.png') }}" type="image/png">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/JhBX9KZ7bXFOjT5x4bxGgAK3EBkIqzMeqK6F2F7Hz4abFTpXNolPqSHRAcAwdsjCHD8u1J9Xg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{ asset('css/dist/font-awesome.css') }}?v=60" rel="stylesheet">
    <link href="{{ asset('css/dist/app.css') }}?v=69" rel="stylesheet">
    <link href="{{ asset('css/dist/responsive.css') }}?v=4" rel="stylesheet">
    <link href="{{ asset('css/dist/owl.css') }}" rel="stylesheet">
    <style>
        .posts-section {
            padding: 20px;
            background-color: #091716;
            /* الخلفية الرئيسية */
        }

        .section-title {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
            /* النص الرئيسي */
        }

        /* الشبكة */
        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        /* تصميم البطاقة */
        .post-card .post {
            position: relative;
            background-color: #08201e;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 25px;
        }

        .post-card .post:hover {
            transform: scale(1.02);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
        }

        .post-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 3px solid #003e37;
            /* خط تمييز للصورة */
        }

        /* شريط التاريخ */
        .post-date-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #003e37;
            /* لون النص */
            color: #fff6e0;
            /* النص */
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 5px;
            z-index: 1;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* محتوى المقال */
        .post-content {
            padding: 15px;
            color: #fff6e0;
            /* النص */
        }

        .post-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #fff6e0;
            /* العنوان */
        }

        .post-category-badge {
            display: inline-block;
            background-color: #003e37;
            /* خلفية التصنيف */
            color: #fff6e0;
            /* النص */
            padding: 5px 8px;
            font-size: 12px;
            border-radius: 3px;
            margin-bottom: 10px;
        }

        /* الكلمات المفتاحية */
        .post-keywords {
            margin-bottom: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .keyword-tag {
            background-color: #003e37;
            /* خلفية الكلمات المفتاحية */
            color: #fff6e0;
            /* النص */
            padding: 3px 8px;
            font-size: 12px;
            border-radius: 12px;
            display: inline-block;
        }

        .no-keywords {
            font-size: 12px;
            color: #fff6e0;
        }

        /* مقتطف المحتوى */
        .post-content-preview {
            font-size: 14px;
            color: #fff6e0;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        /* رابط اقرأ المزيد */
        .read-more {
            display: inline-block;
            font-size: 14px;
            color: #fff6e0;
            /* النص */
            text-decoration: none;
            font-weight: bold;
            border: 1px solid #fff6e0;
            /* الإطار */
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .read-more:hover {
            background-color: #fff6e0;
            color: #08201e;
        }
    </style>


    <!-- Javascript -->
    <script src="{{ asset('css/js/jquery.min.js') }}"></script>

    <script src="{{ asset('css/js/jquery.easing.js') }}"></script>

    <script src="{{ asset('css/js/jquery.nice-select.min.js') }}"></script>

    <script src="{{ asset('css/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('css/js/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('css/js/owl.js') }}"></script>

    <script src="{{ asset('css/js/swiper.js') }}"></script>

    <script src="{{ asset('css/js/price-ranger.js') }}?v=2"></script>

    <script src="{{ asset('css/js/curved.js') }}"></script>

    <script src="{{ asset('css/js/main.js') }}"></script>

    <script src="{{ asset('css/js/shortcodes.js') }}"></script>

    <script src="{{ asset('css/js/plugin.js') }}"></script>

    <script src="{{ asset('css/js/countto.js') }}"></script>

    <script src="{{ asset('css/js/jquery-validate.js') }}"></script>

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="assets/images/logo/Favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/logo/Favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Amiri&family=Lateef&family=Cairo:wght@300;400;700&family=Tajawal:wght@300;400;700&family=Almarai:wght@300;400;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Droid Arabic Naskh', serif;
            font-optical-sizing: auto;
            font-style: normal;

        }
    </style>
</head>
