<?php

namespace App\Models;

use App\Traits\Models\GlobalCasting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes, GlobalCasting;

    protected $fillable = [
        'code',
        'name',
        'description',
        'photo',
        'category_id',
        'unit_id',
        'supplier_id',
        'cost_price',
        'selling_price',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
