<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('monthly_installment')->nullable();
            $table->string('ad_number')->nullable()->after('monthly_installment');
            $table->string('property_usage')->nullable()->after('ad_number');
            $table->string('property_facade')->nullable()->after('property_usage');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['monthly_installment', 'ad_number', 'property_usage', 'property_facade']);
        });
    }
};
