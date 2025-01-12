@extends('dashboard.layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">إدارة الوظائف</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{ route('posts.create') }}" class="btn btn-success" id="addproduct-btn"><i
                                            class="ri-add-line align-bottom me-1"></i>أضف منشور جديد
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>العنوان</th>
                                    <th>محتوى</th>
                                    <th>صورة</th>
                                    <th>المحتوى </th>
                                    <th>الكلمات الرئيسية</th>
                                    <th>تصنيف</th>
                                    <th>تاريخ البناء</th>
                                    <th>التحديث الأخير</th>
                                    <th>إجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($posts as $post)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 100) }}</td>
                                        <td>
                                            @if ($post->image)
                                                <img src="{{ asset('storage/' . $post->image) }}" alt="Image"
                                                    class="img-fluid rounded" style="max-width: 100px;">
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
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="{{ route('posts.edit', $post->id) }}"
                                                            class="dropdown-item edit-item-btn"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            يحرر</a></li>
                                                    <li>


                                                        <form action="{{ route('posts.destroy', $post->id) }}"
                                                            method="POST" class="d-inline"
                                                            onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="dropdown-item remove-item-btn">
                                                                <i
                                                                    class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                يمسح
                                                            </button>

                                                        </form>

                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
