<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم المدينة أو الحي
            $table->string('image')->nullable(); // عمود الصورة
            $table->foreignId('parent_id')->nullable()->constrained('cities')->onDelete('cascade'); // يشير إلى المدينة الرئيسية، إذا كان الحي
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
