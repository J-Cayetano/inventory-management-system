<?php

namespace App\Models;

use App\Traits\Models\GlobalScope;
use App\Traits\Models\GlobalCasting;
use App\Traits\Models\GlobalMutators;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Color extends Model
{
    use GlobalCasting, GlobalMutators, GlobalScope, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     *
     *  Relationship
     *  return Illuminate\Database\Eloquent\Relations;
     */
    public function variations(): HasMany
    {
        return $this->hasMany(ItemVariation::class);
    }
}
