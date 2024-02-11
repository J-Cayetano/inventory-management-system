<?php

namespace App\Traits\Models;

use Carbon\Carbon;

trait GlobalScope
{
    public function scopeCode($query, $code)
    {
        $query->where('code', $code);
    }
}
