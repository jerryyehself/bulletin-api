<?php

namespace App\Models;

use App\Traits\getDataByNum;
use App\Traits\hasApplier;
use App\Traits\hasCustomer;
use App\Traits\NewNum;
use App\Traits\OwnedByUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quality extends Model
{
    use HasFactory, SoftDeletes, NewNum, getDataByNum, hasApplier, OwnedByUser;

    protected $fillable = [
        'apply_date',
        'acceptance_date',
        'applier_id',
        'component_id',
        'counter',
        'result'
    ];

    protected $casts = [
        'apply_date' => 'datetime:Y-m-d',
    ];

    protected $with = [
        'applierInfo'
    ];


    protected static function boot()
    {
        parent::boot();
        static::newNum();
    }
}
