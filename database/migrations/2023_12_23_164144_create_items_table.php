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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50);
            $table->string('slug');
            $table->string('name', 150);
            $table->foreignId('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->foreignId('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreignId('subcategory_id')->nullable();
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            $table->foreignId('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->decimal('total_purhased_amount');
            $table->decimal('total_sold_amount');
            $table->integer('running_quantity_stock');
            $table->integer('running_quantity_sold')->default(0);
            $table->integer('total_minimum_stock')->default(0);
            $table->integer('total_maximum_stock')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
