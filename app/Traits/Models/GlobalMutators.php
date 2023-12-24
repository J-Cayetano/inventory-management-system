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

    public function title(): Attribute
    {
        return Attribute::make(
            get: fn (string $title) => ucwords(strtolower($title)),
            set: fn (string $title) => ucwords(strtolower($title)),
        );
    }
}

