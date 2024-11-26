@extends('dashboard.layout')

@section('content')
<div class="container">
    <h1 class="text-center my-4">إدارة البوستات</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4 text-end">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">إضافة بوست جديد</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>العنوان</th>
                    <th>المحتوى</th>
                    <th>الصورة</th>
                    <th>الوصف التعريفي</th>
                    <th>الكلمات المفتاحية</th>
                    <th>التصنيف</th>
                    <th>تاريخ الإنشاء</th>
                    <th>آخر تحديث</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 100) }}</td>
                        <td>
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Image" class="img-fluid rounded" style="max-width: 100px;">
                            @else
                                <span>لا توجد صورة</span>
                            @endif
                        </td>
                        <td>{{ $post->meta_description }}</td>
                        <td>{{ $post->keywords }}</td>
                        <td>{{ $post->category ? $post->category->name : 'غير محدد' }}</td>
                        <td>{{ $post->created_at->format('Y-m-d H:i') }}</td>
                        <td>{{ $post->updated_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">عرض</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center">لا توجد بوستات متاحة حاليًا.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>
@endsection
