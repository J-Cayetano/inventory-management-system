<?php

namespace App\Traits\Models;

use Carbon\Carbon;

trait GlobalScope
{
    public function scopeCode($query, $code)
    {
        $query->where('code', $code);
    }

    public function scopeEmployeeCode($query, $employee_code)
    {
        $query->where('employee_code', $employee_code);
    }

    public function scopeSubmittedToday($query)
    {
        $query->where('date_submitted', (Carbon::today())->format('Y-m-d'));
    }

    public function scopeSubmittedByDate($query, $date_submitted)
    {
        $query->where('date_submitted', (Carbon::parse($date_submitted))->format('Y-m-d'));
    }

    public function scopeToday($query)
    {
        $query->where('date', (Carbon::today())->format('Y-m-d'));
    }

    public function scopeByDate($query, $date)
    {
        $query->where('date', (Carbon::parse($date))->format('Y-m-d'));
    }
}

