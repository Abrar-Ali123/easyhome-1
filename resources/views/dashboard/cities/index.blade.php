@extends('dashboard.layouts.app')

@section('title', 'إدارة المدن')

@section('content')


    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">المدن والأحياء</h4>
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
                                    <a data-bs-toggle="modal" data-bs-target="#addCityModal" class="btn btn-success"
                                        id="addproduct-btn"><i class="ri-add-line align-bottom me-1"></i>إضافة مدينة
                                        جديدة</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>المدينة أو الحي </th>
                                    <th>المدينة الرئيسية</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody id="cityTableBody">
                                @foreach ($cities as $city)
                                    <tr id="city-row-{{ $city->id }}">
                                        <td>{{ $city->name }}</td>
                                        <td>{{ $city->parent ? $city->parent->name : 'لا توجد' }}</td>
                                        <!-- المدينة الرئيسية -->
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a data-bs-toggle="modal"
                                                            data-bs-target="#editCityModal{{ $city->id }}"
                                                            class="dropdown-item edit-item-btn"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            يحرر</a></li>
                                                    <li>


                                                        <form action="{{ route('cities.destroy', $city->id) }}"
                                                            method="POST">
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

                                    <!-- مودال تعديل المدينة -->
                                    <div class="modal fade" id="editCityModal{{ $city->id }}" tabindex="-1"
                                        aria-labelledby="editCityModalLabel{{ $city->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editCityModalLabel{{ $city->id }}">تعديل
                                                        المدينة</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('cities.update', $city->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">المدينة أو الحي </label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" value="{{ $city->name }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="parent_id" class="form-label">المدينة الرئيسية
                                                                (اختياري)</label>
                                                            <select class="form-control" id="parent_id" name="parent_id">
                                                                <option value="">اختر المدينة الرئيسية</option>
                                                                @foreach ($cities as $parent)
                                                                    <option value="{{ $parent->id }}"
                                                                        {{ $city->parent_id == $parent->id ? 'selected' : '' }}>
                                                                        {{ $parent->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">صورة المدينة</label>
                                                            <input type="file" class="form-control" id="image"
                                                                name="image">
                                                            @if ($city->image)
                                                                <img src="{{ asset('storage/' . $city->image) }}"
                                                                    alt="صورة المدينة"
                                                                    style="width: 100px; height: 100px; margin-top: 10px;">
                                                            @endif
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">تعديل</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- مودال إضافة مدينة جديدة -->
    <div class="modal fade" id="addCityModal" tabindex="-1" aria-labelledby="addCityModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCityModalLabel">إضافة  </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('cities.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">اسم المدينة أو الحي </label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="parent_id" class="form-label">المدينة الرئيسية إذا كان مااضفته حي (اختياري)</label>
                            <select class="form-control" id="parent_id" name="parent_id">
                                <option value="">اختر المدينة الرئيسية</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">صورة المدينة</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">إضافة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
