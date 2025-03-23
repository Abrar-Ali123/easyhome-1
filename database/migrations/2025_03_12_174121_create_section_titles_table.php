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
        Schema::create('section_titles', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->unique(); // مفتاح فريد لكل قسم (مثل: properties, testimonials)
            $table->string('title'); // العنوان الرئيسي
            $table->string('subtitle')->nullable(); // العنوان الفرعي
            $table->text('description')->nullable(); // وصف إضافي
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_titles');
    }
};
