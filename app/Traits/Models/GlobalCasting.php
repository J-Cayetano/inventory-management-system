<?php

namespace App\Traits\Models;

use DateTimeInterface;

trait GlobalCasting
{
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d h:i:s A');
    }
}

