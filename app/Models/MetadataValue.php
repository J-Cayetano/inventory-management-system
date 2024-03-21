<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class MetadataValue extends Model
{
    protected $fillable = [
        'metadata_id',
        'value',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * @return Attribute
     */
    public function value(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucwords($value),
            set: fn (string $value) => strtolower($value),
        );
    }
}
