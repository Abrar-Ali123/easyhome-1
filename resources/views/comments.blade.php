<div id="comments-section">
    <h2>التعليقات</h2>

    <div id="comments-list">
        @foreach($product->comments as $comment)
        <div class="comment">
            <p>{{ $comment->comment }}</p>
            <p><small>بواسطة: {{ $comment->user->name }}</small></p>

            @if (auth()->check() && auth()->id() == $comment->user_id)
                <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <textarea name="comment">{{ $comment->comment }}</textarea>
                    <button type="submit">تحديث التعليق</button>
                </form>

                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">حذف التعليق</button>
                </form>
            @endif

            <form action="{{ route('comments.reply', $comment->id) }}" method="POST">
                @csrf
                <textarea name="comment" placeholder="أضف ردك على هذا التعليق..."></textarea>
                <button type="submit">إضافة الرد</button>
            </form>

            @if ($comment->replies)
                <div class="replies">
                    @foreach ($comment->replies as $reply)
                        <div class="reply">
                            <p>{{ $reply->comment }}</p>
                            <p><small>بواسطة: {{ $reply->user->name }}</small></p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        @endforeach
    </div>

    <form action="{{ route('comments.store', $product->id) }}" method="POST">
        @csrf
        <textarea name="comment" placeholder="أضف تعليقك..."></textarea>
        <button type="submit">إضافة التعليق</button>
    </form>
</div>
