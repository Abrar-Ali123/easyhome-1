@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>إدارة آراء العملاء</h2>
                    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> إضافة رأي جديد
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>صورة العميل</th>
                                    <th>اسم العميل</th>
                                    <th>التقييم</th>
                                    <th>الترتيب</th>
                                    <th>الحالة</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($testimonials as $testimonial)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $testimonial->client_image) }}" 
                                                 alt="صورة العميل" 
                                                 style="max-width: 50px; border-radius: 50%;">
                                        </td>
                                        <td>{{ $testimonial->client_name }}</td>
                                        <td>
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-warning' : 'text-muted' }}"></i>
                                            @endfor
                                        </td>
                                        <td>{{ $testimonial->order }}</td>
                                        <td>
                                            <span class="badge {{ $testimonial->is_active ? 'bg-success' : 'bg-danger' }}">
                                                {{ $testimonial->is_active ? 'مفعل' : 'غير مفعل' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" 
                                               class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" 
                                                  method="POST" 
                                                  class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-danger" 
                                                        onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
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
</div>
@endsection
