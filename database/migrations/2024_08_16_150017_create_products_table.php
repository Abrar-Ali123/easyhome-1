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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('location')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('area')->nullable();
            $table->string('video')->nullable();
            $table->string('features')->nullable();
            $table->string('category')->nullable();
            $table->text('image')->nullable();
            $table->text('images')->nullable();
            $table->string('monthly_installment')->nullable();
            $table->string('ad_number')->nullable();
            $table->string('property_usage')->nullable();
            $table->string('property_facade')->nullable();
            $table->string('profile_project')->nullable();
            $table->text('croquis')->nullable(); // الكروكي
            
                $table->string('property_features')->nullable(); 
        $table->string('location_features')->nullable();    
        
        
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('neighborhood_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            $table->foreign('neighborhood_id')->references('id')->on('cities')->onDelete('set null');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
