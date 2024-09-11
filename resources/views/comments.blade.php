<div class="comments-section">
    <h2>التعليقات</h2>

    <ul id="comments-list">
        @foreach($product->comments as $comment)
            <li class="comment-item" data-id="{{ $comment->id }}">
                <img src="{{ $comment->user->profile_image_url ?? '/path/to/default-avatar.png' }}" alt="User Avatar" class="user-avatar">
                <div class="comment-content">
                    <span class="comment-author">{{ $comment->user->name }}</span>
                    <p class="comment-text">{{ $comment->comment }}</p>
                    <button class="like-btn" data-likeable-id="{{ $comment->id }}" data-likeable-type="App\Models\Comment">
                        أعجبني ({{ $comment->likes->count() }})
                    </button>
                </div>
            </li>
        @endforeach
    </ul>
    <form id="comment-form" method="POST">
        @csrf
        <textarea name="comment" id="comment" placeholder="اكتب تعليقك هنا..." required></textarea>
        <button type="submit">إرسال</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // إرسال تعليق جديد باستخدام AJAX
        $('#comment-form').on('submit', function(e) {
            e.preventDefault(); // منع إعادة تحميل الصفحة
            $.ajax({
                type: 'POST',
                url: '{{ route('comments.store', ['product' => $product->id]) }}',
                data: $(this).serialize(),
                success: function(response) {
                    if(response.comment) {
                        let newComment = `
                        <li class="comment-item">
                            <img src="${response.user.profile_image_url}" alt="User Avatar" class="user-avatar">
                            <div class="comment-content">
                                <span class="comment-author">${response.user.name}</span>
                                <p class="comment-text">${response.comment}</p>
                                <button class="like-btn" data-likeable-id="${response.comment_id}" data-likeable-type="App\\Models\\Comment">
                                    أعجبني (0)
                                </button>
                            </div>
                        </li>`;
                        $('#comments-list').append(newComment);
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 401 && xhr.responseJSON.auth_required) {
                        // استخدام النافذة من الـ layout الرئيسي
                        document.getElementById('popup').style.display = 'flex';
                    } else {
                        alert('حدث خطأ أثناء إضافة التعليق.');
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


