<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض العقار</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        .header {
            background: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        .property-main img {
            width: 100%;
            max-width: 1200px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .property-info {
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .property-info h2 {
            margin-top: 0;
        }
        .property-info p {
            margin: 10px 0;
        }
        .property-info .price {
            font-size: 1.5em;
            color: #e94e77;
        }
        .property-info .details {
            margin: 10px 0;
        }
        .property-info .details div {
            margin-bottom: 10px;
        }
        .property-info .details label {
            font-weight: bold;
        }
        .property-video {
            margin-bottom: 20px;
        }
        .property-gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }
        .property-gallery img {
            width: calc(33.333% - 10px);
            border-radius: 8px;
        }
        .like-section, .comment-section {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .like-section button {
            background: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 5px;
        }
        .like-section button:hover {
            background: #555;
        }
        .like-count {
            font-size: 1.2em;
            color: #e94e77;
            margin: 10px 0;
        }
        .comment-form textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }
        .comment-form button {
            background: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 5px;
        }
        .comment-form button:hover {
            background: #555;
        }
        .comments-list {
            margin: 20px 0;
        }
        .comment-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .comment-item:last-child {
            border-bottom: none;
        }
        .comment-item p {
            margin: 5px 0;
        }
        footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>تفاصيل العقار</h1>
    </div>

    <div class="container">
        <div class="property-main">
            <img src="main-property-image.jpg" alt="صورة رئيسية للعقار">
        </div>

        <div class="property-info">
            <h2>عنوان العقار</h2>
            <p>وصف العقار: هنا يمكنك وضع وصف تفصيلي للعقار، بما في ذلك ميزاته وموقعه وما إلى ذلك.</p>
            <p class="price">1,500,000 SAR</p>
            <div class="details">
                <div><label>عدد الغرف:</label> 3</div>
                <div><label>عدد دورات المياه:</label> 2</div>
                <div><label>المساحة:</label> 150 متر مربع</div>
            </div>
        </div>

        <div class="property-video">
            <h2>فيديو العقار</h2>
            <video controls width="100%" max-width="1200px">
                <source src="property-video.mp4" type="video/mp4">
                المتصفح الخاص بك لا يدعم تشغيل الفيديو.
            </video>
        </div>

        <div class="property-gallery">
            <img src="gallery-image1.jpg" alt="صورة من المعرض">
            <img src="gallery-image2.jpg" alt="صورة من المعرض">
            <img src="gallery-image3.jpg" alt="صورة من المعرض">
        </div>

        <div class="like-section">
            <button id="like-button">أعجبني</button>
            <p class="like-count" id="like-count">0 إعجابات</p>
        </div>

        <div class="comment-section">
            <h3>أضف تعليقاً</h3>
            <div class="comment-form">
                <textarea id="comment-text" rows="4" placeholder="اكتب تعليقك هنا..."></textarea>
                <button onclick="addComment()">إضافة تعليق</button>
            </div>
            <div class="comments-list" id="comments-list">
                <!-- سيتم إضافة التعليقات هنا عبر JavaScript -->
            </div>
        </div>

    </div>

    <footer>
        <p>جميع الحقوق محفوظة © 2024</p>
    </footer>

    <script>
        let likeCount = 0;

        document.getElementById('like-button').addEventListener('click', () => {
            likeCount++;
            document.getElementById('like-count').innerText = `${likeCount} إعجابات`;
        });

        function addComment() {
            const commentText = document.getElementById('comment-text').value.trim();
            if (commentText === '') {
                alert('يرجى كتابة تعليق قبل الإرسال.');
                return;
            }

            const commentList = document.getElementById('comments-list');
            const newComment = document.createElement('div');
            newComment.classList.add('comment-item');
            newComment.innerHTML = `<p><strong>مستخدم:</strong> ${commentText}</p>`;
            commentList.appendChild(newComment);

            document.getElementById('comment-text').value = ''; // مسح مربع النص
        }
    </script>

</body>
</html>
