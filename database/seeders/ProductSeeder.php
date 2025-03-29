<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\City;
use App\Models\User;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $admin = User::where('role', 'admin')->first();
        $cities = City::whereNull('parent_id')->get();
        $neighborhoods = City::whereNotNull('parent_id')->get();

        $products = [
            // العقارات السابقة
            [
                'title' => 'فيلا فاخرة في حي النرجس',
                'description' => 'فيلا حديثة التصميم مع حديقة خاصة وموقف سيارات. تتميز بموقع استراتيجي قريب من الخدمات الرئيسية.',
                'location' => 'شارع الملك فهد',
                'price' => 2500000.00,
                'bedrooms' => 5,
                'bathrooms' => 6,
                'area' => 450,
                'category' => 'فيلا',
                'image' => 'images/products/villa1.jpg',
                'images' => 'images/products/villa1_1.jpg,images/products/villa1_2.jpg,images/products/villa1_3.jpg',
                'monthly_installment' => '8000',
                'ad_number' => 'AD001',
                'property_usage' => 'سكني',
                'property_facade' => 'شمالي',
                'property_type' => 'بيع',
                'profile_project' => 'مشروع النرجس السكني',
                'city_id' => $cities->where('name', 'الرياض')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'النرجس')->first()->id,
                'created_by' => $admin->id
            ],
            [
                'title' => 'شقة مميزة في حي الروضة',
                'description' => 'شقة عصرية مع إطلالة رائعة على المدينة. تشطيب فاخر وتصميم عصري يلبي جميع احتياجات العائلة.',
                'location' => 'شارع الأمير سلطان',
                'price' => 900000.00,
                'bedrooms' => 3,
                'bathrooms' => 3,
                'area' => 180,
                'category' => 'شقة',
                'image' => 'images/products/apartment1.jpg',
                'images' => 'images/products/apartment1_1.jpg,images/products/apartment1_2.jpg,images/products/apartment1_3.jpg',
                'monthly_installment' => '3000',
                'ad_number' => 'AD002',
                'property_usage' => 'سكني',
                'property_facade' => 'شرقي',
                'property_type' => 'بيع',
                'profile_project' => 'برج الروضة السكني',
                'city_id' => $cities->where('name', 'جدة')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'الروضة')->first()->id,
                'created_by' => $admin->id
            ],
            [
                'title' => 'دور أرضي للبيع في حي الشاطئ',
                'description' => 'دور أرضي واسع مع حديقة خاصة. موقع مميز قريب من الكورنيش والخدمات الرئيسية.',
                'location' => 'شارع الخليج',
                'price' => 1200000.00,
                'bedrooms' => 4,
                'bathrooms' => 3,
                'area' => 250,
                'category' => 'دور',
                'image' => 'images/products/floor1.jpg',
                'images' => 'images/products/floor1_1.jpg,images/products/floor1_2.jpg,images/products/floor1_3.jpg',
                'monthly_installment' => '4000',
                'ad_number' => 'AD003',
                'property_usage' => 'سكني',
                'property_facade' => 'غربي',
                'property_type' => 'بيع',
                'profile_project' => 'مجمع الشاطئ السكني',
                'city_id' => $cities->where('name', 'الدمام')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'الشاطئ')->first()->id,
                'created_by' => $admin->id
            ],
            [
                'title' => 'عمارة استثمارية في حي العزيزية',
                'description' => 'عمارة سكنية مكونة من 12 شقة، دخل شهري ممتاز. موقع استراتيجي قريب من الحرم.',
                'location' => 'شارع العزيزية العام',
                'price' => 4500000.00,
                'bedrooms' => 36,
                'bathrooms' => 24,
                'area' => 800,
                'category' => 'عمارة',
                'image' => 'images/products/building1.jpg',
                'images' => 'images/products/building1_1.jpg,images/products/building1_2.jpg,images/products/building1_3.jpg',
                'monthly_installment' => '15000',
                'ad_number' => 'AD004',
                'property_usage' => 'استثماري',
                'property_facade' => 'شمالي',
                'property_type' => 'بيع',
                'profile_project' => 'مشروع العزيزية الاستثماري',
                'city_id' => $cities->where('name', 'مكة المكرمة')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'العزيزية')->first()->id,
                'created_by' => $admin->id
            ],
            // عقارات جديدة للبيع
            [
                'title' => 'فيلا مودرن في حي الياسمين',
                'description' => 'فيلا بتصميم عصري مميز، تشطيب سوبر لوكس مع حديقة واسعة ومسبح خاص. موقع مثالي للعائلات.',
                'location' => 'شارع الأمير محمد بن سلمان',
                'price' => 3200000.00,
                'bedrooms' => 6,
                'bathrooms' => 7,
                'area' => 550,
                'category' => 'فيلا',
                'image' => 'images/products/villa2.jpg',
                'images' => 'images/products/villa2_1.jpg,images/products/villa2_2.jpg,images/products/villa2_3.jpg',
                'monthly_installment' => '10000',
                'ad_number' => 'AD005',
                'property_usage' => 'سكني',
                'property_facade' => 'شمالي شرقي',
                'property_type' => 'بيع',
                'profile_project' => 'مشروع الياسمين السكني',
                'city_id' => $cities->where('name', 'الرياض')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'الياسمين')->first()->id,
                'created_by' => $admin->id
            ],
            [
                'title' => 'مجمع تجاري في حي العليا',
                'description' => 'مجمع تجاري حديث يتكون من محلات ومكاتب. موقع استراتيجي على شارع تجاري رئيسي.',
                'location' => 'طريق الملك فهد',
                'price' => 8500000.00,
                'area' => 2000,
                'category' => 'تجاري',
                'image' => 'images/products/commercial1.jpg',
                'images' => 'images/products/commercial1_1.jpg,images/products/commercial1_2.jpg,images/products/commercial1_3.jpg',
                'monthly_installment' => '25000',
                'ad_number' => 'AD006',
                'property_usage' => 'تجاري',
                'property_facade' => 'شمالي غربي',
                'property_type' => 'بيع',
                'profile_project' => 'مشروع العليا التجاري',
                'city_id' => $cities->where('name', 'الرياض')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'العليا')->first()->id,
                'created_by' => $admin->id
            ],
            // عقارات للإيجار
            [
                'title' => 'شقة مفروشة للإيجار في حي السلامة',
                'description' => 'شقة مفروشة بالكامل، تشطيب راقي وأثاث حديث. مناسبة للعائلات.',
                'location' => 'شارع حراء',
                'price' => 45000.00, // سنوياً
                'bedrooms' => 3,
                'bathrooms' => 2,
                'area' => 140,
                'category' => 'شقة',
                'image' => 'images/products/apartment2.jpg',
                'images' => 'images/products/apartment2_1.jpg,images/products/apartment2_2.jpg,images/products/apartment2_3.jpg',
                'monthly_installment' => null,
                'ad_number' => 'AD007',
                'property_usage' => 'سكني',
                'property_facade' => 'شرقي',
                'property_type' => 'إيجار',
                'profile_project' => 'برج السلامة السكني',
                'city_id' => $cities->where('name', 'جدة')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'السلامة')->first()->id,
                'created_by' => $admin->id
            ],
            [
                'title' => 'مكتب تجاري للإيجار في حي الخبر الشمالية',
                'description' => 'مكتب حديث في مجمع تجاري راقي. مناسب للشركات والمؤسسات.',
                'location' => 'طريق الملك خالد',
                'price' => 65000.00, // سنوياً
                'area' => 200,
                'category' => 'مكتب',
                'image' => 'images/products/office1.jpg',
                'images' => 'images/products/office1_1.jpg,images/products/office1_2.jpg,images/products/office1_3.jpg',
                'monthly_installment' => null,
                'ad_number' => 'AD008',
                'property_usage' => 'تجاري',
                'property_facade' => 'شمالي',
                'property_type' => 'إيجار',
                'profile_project' => 'برج الأعمال التجاري',
                'city_id' => $cities->where('name', 'الخبر')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'الخبر الشمالية')->first()->id,
                'created_by' => $admin->id
            ],
            [
                'title' => 'استراحة للإيجار اليومي في حي النخيل',
                'description' => 'استراحة فاخرة مع مسبح وملعب كرة قدم. مثالية للمناسبات والتجمعات العائلية.',
                'location' => 'طريق الملك سلمان',
                'price' => 800.00, // يومياً
                'bedrooms' => 4,
                'bathrooms' => 5,
                'area' => 1000,
                'category' => 'استراحة',
                'image' => 'images/products/chalet1.jpg',
                'images' => 'images/products/chalet1_1.jpg,images/products/chalet1_2.jpg,images/products/chalet1_3.jpg',
                'monthly_installment' => null,
                'ad_number' => 'AD009',
                'property_usage' => 'سكني',
                'property_facade' => 'شمالي',
                'property_type' => 'إيجار يومي',
                'profile_project' => 'منتجع النخيل',
                'city_id' => $cities->where('name', 'الرياض')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'النخيل')->first()->id,
                'created_by' => $admin->id
            ],
            // العقارات الجديدة
            [
                'title' => 'برج سكني استثماري في حي العليا',
                'description' => 'برج سكني مكون من 20 طابق، يحتوي على 60 شقة فاخرة. فرصة استثمارية مميزة مع عائد سنوي مضمون.',
                'location' => 'طريق الملك فهد',
                'price' => 25000000.00,
                'bedrooms' => 180,
                'bathrooms' => 120,
                'area' => 5000,
                'category' => 'برج',
                'image' => 'images/products/tower1.jpg',
                'images' => 'images/products/tower1_1.jpg,images/products/tower1_2.jpg,images/products/tower1_3.jpg',
                'monthly_installment' => '80000',
                'ad_number' => 'AD010',
                'property_usage' => 'استثماري',
                'property_facade' => 'شمالي غربي',
                'property_type' => 'بيع',
                'profile_project' => 'أبراج العليا',
                'city_id' => $cities->where('name', 'الرياض')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'العليا')->first()->id,
                'created_by' => $admin->id
            ],
            [
                'title' => 'مجمع فلل فاخرة للإيجار في النخيل',
                'description' => 'مجمع سكني راقي يضم 12 فيلا مستقلة. كل فيلا مؤثثة بالكامل مع حديقة خاصة ومسبح.',
                'location' => 'شارع الأمير سعود',
                'price' => 250000.00, // سنوياً للفيلا الواحدة
                'bedrooms' => 5,
                'bathrooms' => 6,
                'area' => 400,
                'category' => 'فيلا',
                'image' => 'images/products/villa3.jpg',
                'images' => 'images/products/villa3_1.jpg,images/products/villa3_2.jpg,images/products/villa3_3.jpg',
                'monthly_installment' => null,
                'ad_number' => 'AD011',
                'property_usage' => 'سكني',
                'property_facade' => 'شمالي',
                'property_type' => 'إيجار',
                'profile_project' => 'مجمع النخيل السكني',
                'city_id' => $cities->where('name', 'الرياض')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'النخيل')->first()->id,
                'created_by' => $admin->id
            ],
            [
                'title' => 'مجمع تجاري للإيجار في الفيصلية',
                'description' => 'مجمع تجاري حديث يضم 20 محل تجاري و10 مكاتب إدارية. موقع حيوي على شارع تجاري رئيسي.',
                'location' => 'طريق الملك عبدالله',
                'price' => 150000.00, // سنوياً للمحل
                'area' => 3000,
                'category' => 'تجاري',
                'image' => 'images/products/mall1.jpg',
                'images' => 'images/products/mall1_1.jpg,images/products/mall1_2.jpg,images/products/mall1_3.jpg',
                'monthly_installment' => null,
                'ad_number' => 'AD012',
                'property_usage' => 'تجاري',
                'property_facade' => 'شرقي',
                'property_type' => 'إيجار',
                'profile_project' => 'الفيصلية مول',
                'city_id' => $cities->where('name', 'الدمام')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'الفيصلية')->first()->id,
                'created_by' => $admin->id
            ],
            [
                'title' => 'شقق مفروشة للإيجار الشهري في الراكة',
                'description' => 'شقق فندقية فاخرة مفروشة بالكامل. خدمات فندقية متكاملة ومناسبة للعائلات والأفراد.',
                'location' => 'شارع الخليج',
                'price' => 6000.00, // شهرياً
                'bedrooms' => 2,
                'bathrooms' => 2,
                'area' => 120,
                'category' => 'شقة',
                'image' => 'images/products/apartment3.jpg',
                'images' => 'images/products/apartment3_1.jpg,images/products/apartment3_2.jpg,images/products/apartment3_3.jpg',
                'monthly_installment' => null,
                'ad_number' => 'AD013',
                'property_usage' => 'سكني',
                'property_facade' => 'شمالي',
                'property_type' => 'إيجار شهري',
                'profile_project' => 'الراكة للشقق الفندقية',
                'city_id' => $cities->where('name', 'الخبر')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'الراكة')->first()->id,
                'created_by' => $admin->id
            ],
            [
                'title' => 'مستودعات للإيجار في المدينة الصناعية',
                'description' => 'مجمع مستودعات حديث بمساحات مختلفة. مجهز بأحدث أنظمة الأمن والسلامة.',
                'location' => 'طريق الخرج',
                'price' => 80000.00, // سنوياً
                'area' => 1000,
                'category' => 'مستودع',
                'image' => 'images/products/warehouse1.jpg',
                'images' => 'images/products/warehouse1_1.jpg,images/products/warehouse1_2.jpg,images/products/warehouse1_3.jpg',
                'monthly_installment' => null,
                'ad_number' => 'AD014',
                'property_usage' => 'صناعي',
                'property_facade' => 'شمالي',
                'property_type' => 'إيجار',
                'profile_project' => 'مستودعات الصناعية',
                'city_id' => $cities->where('name', 'الرياض')->first()->id,
                'neighborhood_id' => $neighborhoods->where('name', 'المدينة الصناعية')->first()->id,
                'created_by' => $admin->id
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
