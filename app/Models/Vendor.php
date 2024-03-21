<?php

namespace App\Models;

use App\Traits\Models\GlobalCasting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vendor extends Model
{
    use SoftDeletes, GlobalCasting;

    protected $fillable = [
        'code',
        'name',
        'city',
        'address',
        'email',
        'contact',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     *
     *  Relationship
     *  return Illuminate\Database\Eloquent\Relations;
     */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function purchaseOrders(): HasMany
    {
        return $this->hasMany(PurchaseOrder::class);
    }
}
