<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * @return Attribute
     */
    public function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $name) => ucwords($name),
            set: fn (string $name) => strtolower($name),
        );
    }
}
