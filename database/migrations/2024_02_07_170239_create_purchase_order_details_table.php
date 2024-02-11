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
        Schema::create('purchase_order_details', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no');
            $table->foreignId('purchase_order_id');
            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders');
            $table->foreignId('item_id');
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreignId('item_variation_id')->nullable();
            $table->foreign('item_variation_id')->references('id')->on('item_variations');
            $table->integer('quantity');
            $table->integer('total_cost_amount');

            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_details');
    }
};
