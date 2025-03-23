@extends('dashboard.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>إدارة أسباب اختيارنا</h2>
                    <a href="{{ route('admin.why-choose-us.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> إضافة سبب جديد
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
                                    <th>الأيقونة</th>
                                    <th>العنوان</th>
                                    <th>الترتيب</th>
                                    <th>الحالة</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reasons as $reason)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <i class="{{ $reason->icon }} fa-2x"></i>
                                        </td>
                                        <td>{{ $reason->title }}</td>
                                        <td>{{ $reason->order }}</td>
                                        <td>
                                            <span class="badge {{ $reason->is_active ? 'bg-success' : 'bg-danger' }}">
                                                {{ $reason->is_active ? 'مفعل' : 'غير مفعل' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.why-choose-us.edit', $reason) }}" 
                                               class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.why-choose-us.destroy', $reason) }}" 
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
