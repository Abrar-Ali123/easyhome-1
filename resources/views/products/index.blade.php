@extends('dashboard.layouts.app')

@section('title', 'عرض العقارات')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">العقارات</h4>
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
                                    <a href="{{ route('products.create') }}" class="btn btn-success" id="addproduct-btn"><i
                                            class="ri-add-line align-bottom me-1"></i> أضف عقار</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-city"></i> مدينة</th>
                                    <th><i class="fas fa-road"></i> شارع</th>
                                    <th><i class="fas fa-building"></i> التصنيف</th>
                                    <th><i class="fas fa-tags"></i> تصنيف</th>
                                    <th><i class="fas fa-bed"></i> غرف</th>
                                    <th><i class="fas fa-bath"></i> دورات المياه</th>
                                    <th><i class="fas fa-ruler-combined"></i> مسح (م)</th>
                                    <th><i class="fas fa-dollar-sign"></i> السعر</th>
                                    <th><i class="fas fa-cog"></i> صورة العقارات</th>
                                    <th><i class="fas fa-cog"></i> إجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->location }}</td>
                                        <td>{{ $product->street ?? 'undefined' }}</td>
                                        <td>{{ $product->category }}</td>
                                        <td>{{ $product->classification ?? 'undefined' }}</td>
                                        <td>{{ $product->bedrooms }}</td>
                                        <td>{{ $product->bathrooms }}</td>
                                        <td>{{ $product->area }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            <img src="{{ url('/storage/app/public/' . $product->image) }}"
                                                alt="Product Image" style="height: 50px; object-fit: cover;">
                                        </td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="{{ route('products.show', $product) }}"
                                                            class="dropdown-item"><i
                                                                class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                            </a></li>
                                                    <li><a href="{{ route('products.edit', $product) }}"
                                                            class="dropdown-item edit-item-btn"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            </a></li>
                                                    <li>


                                                        <form action="{{ route('products.destroy', $product) }}"
                                                            method="POST" style="display:inline;"
                                                            onsubmit="return confirm('هل أنت متأكد من حذف هذا العقار؟');">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="dropdown-item remove-item-btn">
                                                                <i
                                                                    class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>

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
