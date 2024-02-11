<?php

namespace App\Traits\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait GlobalMutators
{
    public function code(): Attribute
    {
        return Attribute::make(
            get: fn (string $code) => strtoupper($code),
            set: fn (string $code) => strtoupper($code),
        );
    }
}
