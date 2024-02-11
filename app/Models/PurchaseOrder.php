<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PurchaseOrder extends Model
{
    protected $fillable = [
        'reference_no',
        'date_ordered',
        'vendor_id',
        'total_quantity',
        'total_cost_amount',
        'tax_amount',
        'delivery_amount',
        'total_amount',
        'status',
        'created_by',
        'updated_by',
    ];

    public $status = [
        'pending',
        'in-transit',
        'delivered',
    ];

    /**
     *
     *  Relationship
     *  return Illuminate\Database\Eloquent\Relations;
     */
    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    public function purchaseOrderDetails(): HasMany
    {
        return $this->hasMany(PurchaseOrderDetail::class);
    }

    public function itemVariations(): BelongsToMany
    {
        return $this->belongsToMany(ItemVariation::class, PurchaseOrderDetail::class);
    }
}
