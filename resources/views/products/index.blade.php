@extends('dashboardlayout')

@section('title', 'عرض العقارات')

@section('content')

<button class="btn" onclick="location.href='{{ route('products.create') }}'">إنشاء عقار جديد</button>

<!-- شريط البحث والفرز -->
<div class="row mb-3 search_part">
    <div class="col-md-3">
        <label for="rooms"><i class="fas fa-search icon"></i> عنوان العقار:</label>
        <input type="text" id="title" name="title" class="form-control" placeholder="عنوان العقار">
    </div>
    <!-- أضف المزيد من حقول البحث هنا إذا لزم الأمر -->
</div>

<!-- عرض الشبكة -->
<button class="btn" onclick="toggleView('table')"><i class="fas fa-table"></i></button>
<button class="btn" onclick="toggleView('grid')"><i class="fas fa-th"></i></button>

<!-- عرض الجدول -->
<div id="tableView">
    <table class="table table-striped">
        <thead>
            <tr>
                <th><i class="fas fa-city"></i> المدينة</th>
                <th><i class="fas fa-map-marker-alt"></i> الحي</th>
                <th><i class="fas fa-road"></i> الشارع</th>
                <th><i class="fas fa-building"></i> النوع</th>
                <th><i class="fas fa-tags"></i> التصنيف</th>
                <th><i class="fas fa-bed"></i> الغرف</th>
                <th><i class="fas fa-bath"></i> دورات المياه</th>
                <th><i class="fas fa-ruler-combined"></i> المساحة (م²)</th>
                <th><i class="fas fa-dollar-sign"></i> السعر</th>
                <th><i class="fas fa-cog"></i> صورة العقار</th>
                <th><i class="fas fa-cog"></i> الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->location }}</td>
                <td>{{ $product->neighborhood ?? 'غير محدد' }}</td>
                <td>{{ $product->street ?? 'غير محدد' }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->classification ?? 'غير محدد' }}</td>
                <td>{{ $product->bedrooms }}</td>
                <td>{{ $product->bathrooms }}</td>
                <td>{{ $product->area }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <img src="{{ url('/storage/app/public/' . $product->image) }}" alt="Product Image" style="height: 50px; object-fit: cover;">
                </td>
                <td>
                    <a href="{{ route('products.edit', $product) }}" class="btn"><i class="fas fa-edit"></i></a>
                    <a href="{{ route('products.show', $product) }}" class="btn"><i class="fas fa-eye"></i></a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد من حذف هذا العقار؟');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- عرض الشبكة -->
<div id="gridView" class="d-none">
    <div class="row">
        @foreach ($products as $product)
        <div class="col-sm-6 col-lg-4 mb-3">
            <div class="card">
                <img src="{{ url('storage/app/public/' . $product->image) }}" alt="Product Image" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <div class="property-info">
                        <div class="info-row">
                            <div class="info-item"><i class="fas fa-city"></i> <strong>المدينة:</strong> {{ $product->location }}</div>
                            <div class="info-item"><i class="fas fa-map-marker-alt"></i> <strong>الحي:</strong> {{ $product->neighborhood ?? 'غير محدد' }}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-item"><i class="fas fa-road"></i> <strong>الشارع:</strong> {{ $product->street ?? 'غير محدد' }}</div>
                            <div class="info-item"><i class="fas fa-building"></i> <strong>النوع:</strong> {{ $product->category }}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-item"><i class="fas fa-tags"></i> <strong>التصنيف:</strong> {{ $product->classification ?? 'غير محدد' }}</div>
                            <div class="info-item"><i class="fas fa-bed"></i> <strong>الغرف:</strong> {{ $product->bedrooms }}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-item"><i class="fas fa-bath"></i> <strong>دورات المياه:</strong> {{ $product->bathrooms }}</div>
                            <div class="info-item"><i class="fas fa-ruler-combined"></i> <strong>المساحة (م²):</strong> {{ $product->area }}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-item"><i class="fas fa-dollar-sign"></i> <strong>السعر:</strong> {{ $product->price }}</div>
                        </div>
                    </div>
                    <div class="control-icons">
                        <a href="{{ route('products.edit', $product) }}" class="btn"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد من حذف هذا العقار؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border:none; background:none;"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
