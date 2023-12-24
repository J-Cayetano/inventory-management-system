<?php

namespace App\Models;

use App\Traits\Models\GlobalScope;
use App\Traits\Models\GlobalCasting;
use App\Traits\Models\GlobalMutators;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use GlobalCasting, GlobalMutators, GlobalScope, SoftDeletes;

    protected $fillable = [
        'code',
        'title',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
