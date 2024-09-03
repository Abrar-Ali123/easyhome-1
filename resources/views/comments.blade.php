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
                    @if(Auth::id() === $comment->user_id)
                        <button class="edit-btn">تعديل</button>
                        <button class="delete-btn">حذف</button>
                    @endif
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
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '{{ route('comments.store', ['product' => $product->id]) }}',
            data: $(this).serialize(),
            success: function(response) {
                let newComment = `
                <li class="comment-item" data-id="${response.comment_id}">
                    <img src="${response.user.profile_image_url ?? '/path/to/default-avatar.png'}" alt="User Avatar" class="user-avatar">
                    <div class="comment-content">
                        <span class="comment-author">${response.user.name}</span>
                        <p class="comment-text">${response.comment}</p>
                        <button class="like-btn" data-likeable-id="${response.comment_id}" data-likeable-type="App\\Models\\Comment">
                            أعجبني (0)
                        </button>
                        <button class="edit-btn">تعديل</button>
                        <button class="delete-btn">حذف</button>
                    </div>
                </li>`;
                $('#comments-list').append(newComment);
                $('#comment').val('');
            },
            error: function(xhr) {
                if (xhr.status === 401 && xhr.responseJSON.auth_required) {
                    document.getElementById('popup').style.display = 'flex';
                } else {
                    alert('حدث خطأ أثناء إضافة التعليق.');
                }
            }
        });
    });

    // تعديل التعليق باستخدام AJAX
    $(document).on('click', '.edit-btn', function() {
        let commentItem = $(this).closest('.comment-item');
        let commentText = commentItem.find('.comment-text');
        let currentText = commentText.text();

        commentText.replaceWith(`<input type="text" class="edit-input" value="${currentText}">`);
        $(this).text('حفظ').removeClass('edit-btn').addClass('save-btn');
    });

    // حفظ التعديل باستخدام AJAX
    $(document).on('click', '.save-btn', function() {
        let commentItem = $(this).closest('.comment-item');
        let commentId = commentItem.data('id');
        let newCommentText = commentItem.find('.edit-input').val();

        $.ajax({
            type: 'PUT',
            url: `{{ url('/comments') }}/${commentId}`,
            data: {
                _token: '{{ csrf_token() }}',
                comment: newCommentText
            },
            success: function(response) {
                commentItem.find('.edit-input').replaceWith(`<p class="comment-text">${response.comment}</p>`);
                commentItem.find('.save-btn').text('تعديل').removeClass('save-btn').addClass('edit-btn');
            },
            error: function(xhr) {
                alert('حدث خطأ أثناء تعديل التعليق.');
            }
        });
    });

    // حذف التعليق باستخدام AJAX
    $(document).on('click', '.delete-btn', function() {
        let commentItem = $(this).closest('.comment-item');
        let commentId = commentItem.data('id');

        if (confirm('هل أنت متأكد من حذف التعليق؟')) {
            $.ajax({
                type: 'DELETE',
                url: `{{ url('/comments') }}/${commentId}`,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        commentItem.remove();
                    }
                },
                error: function(xhr) {
                    alert('حدث خطأ أثناء حذف التعليق.');
                }
            });
        }
    });
});
</script>


<style>
.comments-section {
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background: #f9f9f9;
    border-radius: 8px;
}

#comment-form {
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
}

#comment-form textarea {
    resize: vertical;
    min-height: 80px;
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
}

#comment-form button {
    align-self: flex-end;
    padding: 8px 15px;
    border: none;
    background: #007bff;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
}

#comment-form button:hover {
    background: #0056b3;
}

#comments-list {
    list-style: none;
    padding: 0;
}

.comment-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 15px;
    padding: 10px;
    background: #fff;
    border-radius: 5px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
    object-fit: cover;
}

.comment-content {
    flex-grow: 1;
}

.comment-author {
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
}

.comment-text {
    margin: 0 0 5px 0;
}

.like-btn {
    background: none;
    border: none;
    color: #007bff;
    cursor: pointer;
    padding: 0;
}

.like-btn:hover {
    text-decoration: underline;
}

.edit-btn, .delete-btn, .save-btn {
    background: none;
    border: none;
    color: #ff0000;
    cursor: pointer;
    margin-left: 5px;
    padding: 0;
}

.edit-btn:hover, .delete-btn:hover, .save-btn:hover {
    text-decoration: underline;
}
</style>
