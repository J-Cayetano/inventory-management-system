<?php

use App\Models\PurchaseOrder;
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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no');
            $table->timestamp('date_ordered');
            $table->foreignId('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors');

            $table->integer('total_quantity');
            $table->decimal('total_cost_amount');
            $table->decimal('tax_amount');
            $table->decimal('delivery_amount');
            $table->decimal('total_amount');

            $table->enum('status', (new PurchaseOrder())->status);

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
        Schema::dropIfExists('purchase_orders');
    }
};
