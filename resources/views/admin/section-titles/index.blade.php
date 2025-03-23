@extends('admin.layouts.admin')

@section('title', 'عناوين الأقسام')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">عناوين الأقسام</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>المفتاح</th>
                                    <th>العنوان</th>
                                    <th>العنوان الفرعي</th>
                                    <th>الترتيب</th>
                                    <th>الحالة</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sectionTitles as $title)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $title->section_key }}</td>
                                        <td>{{ $title->title }}</td>
                                        <td>{{ $title->subtitle }}</td>
                                        <td>{{ $title->order }}</td>
                                        <td>
                                            <span class="badge badge-{{ $title->is_active ? 'success' : 'danger' }}">
                                                {{ $title->is_active ? 'نشط' : 'غير نشط' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.section-titles.edit', $title) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i> تعديل
                                            </a>
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
