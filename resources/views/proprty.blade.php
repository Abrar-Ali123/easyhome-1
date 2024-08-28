@extends('dashboard')

@section('title', 'عرض العقارات')

@section('content')

<script>
    function toggleView(view) {
        const tableView = document.getElementById('tableView');
        const gridView = document.getElementById('gridView');
        if (view === 'table') {
            tableView.style.display = 'table';
            gridView.style.display = 'none';
        } else {
            tableView.style.display = 'none';
            gridView.style.display = 'grid';
        }
    }

    // اجعل عرض الجدول هو الافتراضي
    document.addEventListener('DOMContentLoaded', function() {
        toggleView('table');
    });

    function updateNeighborhoods() {
        const city = document.getElementById('city').value;
        const neighborhoodSelect = document.getElementById('neighborhood');
        const neighborhoods = {
            'الرياض': ['حي العليا', 'حي النخيل', 'حي السويدي'],
            'جدة': ['حي الحمراء', 'حي النسيم', 'حي الشاطئ'],
            'مكة': ['حي الشوقية', 'حي النسيم', 'حي العزيزية'],
        };

        neighborhoodSelect.innerHTML = '<option value="">اختر الحي</option>';
        if (city in neighborhoods) {
            neighborhoods[city].forEach(function(neighborhood) {
                let option = document.createElement('option');
                option.value = neighborhood;
                option.text = neighborhood;
                neighborhoodSelect.add(option);
            });
        }
    }

    function updateStreets() {
        const neighborhood = document.getElementById('neighborhood').value;
        const streetSelect = document.getElementById('street');
        const streets = {
            'حي العليا': ['شارع التحلية', 'شارع الثلاثين'],
            'حي النخيل': ['شارع الملك عبد الله', 'شارع النخيل'],
            'حي السويدي': ['شارع السويدي العام', 'شارع عائشة بنت أبي بكر'],
            'حي الحمراء': ['شارع فلسطين', 'شارع الحمراء'],
            'حي النسيم': ['شارع النسيم', 'شارع الأمير ماجد'],
            'حي الشاطئ': ['شارع الأمير فيصل بن فهد', 'شارع الشاطئ'],
            'حي الشوقية': ['شارع عبد الله عريف', 'شارع الشوقية'],
            'حي العزيزية': ['شارع العزيزية', 'شارع المسجد الحرام'],
        };

        streetSelect.innerHTML = '<option value="">اختر الشارع</option>';
        if (neighborhood in streets) {
            streets[neighborhood].forEach(function(street) {
                let option = document.createElement('option');
                option.value = street;
                option.text = street;
                streetSelect.add(option);
            });
        }
    }
</script>

<h2>عرض العقارات</h2>

<!-- زر انشاء عقار جديد -->
<button class="btn btn-new" onclick="location.href='#'">إنشاء عقار جديد</button>

<!-- شريط البحث والفرز -->
<div class="search-sort-container">
    <!-- البحث والفرز هنا كما هو موضح سابقاً -->
</div>

<!-- عرض الشبكة -->
<div class="view-toggle">
    <button onclick="toggleView('table')"><i class="fas fa-table"></i></button>
    <button onclick="toggleView('grid')"><i class="fas fa-th"></i></button>
</div>

<!-- عرض الجدول -->
<div id="tableView" class="property-view">
    <table>
        <thead>
            <tr>
                <th>المدينة</th>
                <th>الحي</th>
                <th>الشارع</th>
                <th>النوع</th>
                <th>التصنيف</th>
                <th>الغرف</th>
                <th>دورات المياه</th>
                <th>المساحة (م²)</th>
                <th>السعر</th>
                <th>الصورة</th>
                <th>التحكم</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>الرياض</td>
                <td>حي العليا</td>
                <td>شارع التحلية</td>
                <td>سكني</td>
                <td>شقة</td>
                <td>3</td>
                <td>2</td>
                <td>120</td>
                <td>500,000</td>
                <td><img src="{{ asset('images/5.png') }}" alt="عقار" class="property-image-table"></td>
                <td>
                    <button onclick="editProperty(this)"><i class="fas fa-edit"></i></button>
                    <button onclick="deleteProperty(this)"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <!-- أضف المزيد من البيانات هنا -->
        </tbody>
    </table>
</div>

<!-- عرض الشبكة -->
<div id="gridView" class="property-view">
    <div class="grid-item">
        <div class="property-image-container">
            <img src="{{ asset('images/5.png') }}" alt="عقار" class="property-image-grid">
            <div class="like-info">
                <i class="far fa-heart"></i>
                <div class="count">2</div>
            </div>
            <div class="comment-info">
                <i class="far fa-comment"></i>
                <div class="count">20</div>
            </div>
        </div>
        <div class="property-details">
            <p><strong><i class="fas fa-city icon"></i> المدينة:</strong> الرياض</p>
            <p><strong><i class="fas fa-map-marker-alt icon"></i> الحي:</strong> حي العليا</p>
            <p><strong><i class="fas fa-road icon"></i> الشارع:</strong> شارع التحلية</p>
            <p><strong><i class="fas fa-building icon"></i> النوع:</strong> سكني</p>
            <p><strong><i class="fas fa-tags icon"></i> التصنيف:</strong> شقة</p>
            <p><strong><i class="fas fa-bed icon"></i> الغرف:</strong> 3</p>
            <p><strong><i class="fas fa-bath icon"></i> دورات المياه:</strong> 2</p>
            <p><strong><i class="fas fa-ruler-combined icon"></i> المساحة (م²):</strong> 120</p>
            <p><strong><i class="fas fa-dollar-sign icon"></i> السعر:</strong> 500,000</p>
            <br>
            <div class="control-buttons">
                <button><i class="fas fa-edit"></i></button>
                <button><i class="fas fa-trash"></i></button>
                <button>التفاصيل</button>
            </div>
        </div>
    </div>
    <!-- أضف المزيد من العناصر هنا -->
</div>

@endsection
