<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم الشركة
            $table->string('logo'); // مسار الشعار
            $table->string('website')->nullable(); // موقع الشركة
            $table->string('title')->nullable(); // العنوان الوظيفي
            $table->text('description')->nullable(); // وصف الشركة
            $table->integer('order')->default(0); // الترتيب
            $table->boolean('is_active')->default(true); // حالة التفعيل
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
