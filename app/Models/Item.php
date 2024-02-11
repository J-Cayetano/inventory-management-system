<?php

namespace App\Models;

use App\Traits\Models\GlobalCasting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes, GlobalCasting;

    protected $fillable = [
        'code',
        'name',
        'description',
        'photo',
        'vendor_id',
        'category_id',
        'subcategory_id',
        'brand_id',
        'unit_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     *
     *  Relationship
     *  return Illuminate\Database\Eloquent\Relations;
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    public function itemVariations(): HasMany
    {
        return $this->hasMany(ItemVariation::class);
    }
}
