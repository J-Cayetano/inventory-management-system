<?php

namespace App\Models;

use App\Traits\Models\GlobalCasting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Supplier extends Model
{
    use SoftDeletes, GlobalCasting;

    protected $fillable = [
        'name',
        'city',
        'address',
        'email',
        'contact',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function city(): Attribute
    {
        return Attribute::make(
            get: fn (string $city) => ucwords(strtolower($city)),
            set: fn (string $city) => ucwords(strtolower($city)),
        );
    }
}
