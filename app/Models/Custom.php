<?php

namespace App\Models;

use App\Scopes\ModelNumScope;
use App\Traits\getDataByNum;
use App\Traits\hasApplier;
use App\Traits\hasCustomer;
use App\Traits\NewNum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Custom extends Model
{
    use HasFactory, SoftDeletes, NewNum, getDataByNum, hasApplier, hasCustomer;

    protected $fillable = [
        'apply_date',
        'applier_id',
        'cust_id',
        'custom_content'
    ];

    protected $casts = [
        'apply_date' => 'datetime:Y-m-d',
    ];

    protected static function boot()
    {
        parent::boot();
        static::newNum();
    }
}
