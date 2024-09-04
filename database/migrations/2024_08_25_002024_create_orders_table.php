<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // معرف المستخدم
            $table->unsignedBigInteger('product_id'); // معرف المنتج العقاري
            $table->string('status')->default('pending'); // حالة الطلب (معلق، مكتمل، ملغى)
            $table->unsignedBigInteger('updated_by')->nullable(); // معرف الموظف الذي قام بتحديث الحالة
            $table->timestamps(); // لتسجيل وقت الإنشاء والتحديث

            // إنشاء العلاقة مع جدول المستخدمين
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // إنشاء العلاقة مع جدول المنتجات
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            // إنشاء العلاقة مع جدول المستخدمين لتتبع الموظف الذي قام بتحديث الحالة
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
