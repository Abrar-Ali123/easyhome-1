<div class="comments-section">
    <h2>التعليقات</h2>
    <form id="comment-form" method="POST">
        @csrf
        <textarea name="comment" id="comment" placeholder="اكتب تعليقك هنا..." required></textarea>
        <button type="submit">إرسال</button>
    </form>
    <ul id="comments-list">
        @foreach($product->comments as $comment)
            <li data-id="{{ $comment->id }}">
                {{ $comment->comment }}
                <button class="like-btn" data-likeable-id="{{ $comment->id }}" data-likeable-type="App\Models\Comment">
                    أعجبني ({{ $comment->likes->count() }})
                </button>
            </li>
        @endforeach
    </ul>
</div>

<!-- نافذة تسجيل الدخول المنبثقة -->
<div id="popup">
    <div class="popup-content">
        <span class="close">&times;</span>
        <h2>تسجيل الدخول</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="البريد الإلكتروني" required>
            <input type="password" name="password" placeholder="كلمة المرور" required>
            <button type="submit">تسجيل الدخول</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // إرسال تعليق جديد باستخدام AJAX
        $('#comment-form').on('submit', function(e) {
            e.preventDefault(); // منع إعادة تحميل الصفحة
            $.ajax({
                type: 'POST',
                url: '{{ route('comments.store', $product->id) }}',
                data: $(this).serialize(),
                success: function(response) {
                    if(response.comment) {
                        $('#comments-list').append('<li>' + response.comment + '</li>');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 401 && xhr.responseJSON.auth_required) {
                        // عرض نافذة تسجيل الدخول إذا كان المستخدم غير مسجل دخول
                        document.getElementById('popup').style.display = 'flex';
                    }
                }
            });
        });

        // إغلاق النافذة عند النقر على زر الإغلاق أو خارجها
        document.querySelector('.popup-content .close').addEventListener('click', function() {
            document.getElementById('popup').style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('popup')) {
                document.getElementById('popup').style.display = 'none';
            }
        });
    });
</script>

<style>
/* نمط النافذة */
#popup {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.popup-content {
    background: white;
    padding: 20px;
    border-radius: 5px;
    width: 300px;
    position: relative;
}

.popup-content .close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}
</style>
