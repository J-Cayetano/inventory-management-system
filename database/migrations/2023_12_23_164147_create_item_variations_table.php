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
        Schema::create('item_variations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id');
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreignId('color_id');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreignId('size_id')->nullable();
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->decimal('cost_amount');
            $table->decimal('selling_amount');
            $table->integer('quantity_stock');
            $table->integer('quantity_sold')->default(0);
            $table->integer('minimum_stock')->default(0);
            $table->integer('maximum_stock')->nullable();

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
        Schema::dropIfExists('item_variations');
    }
};
