<?php

namespace App\Models;

use App\Traits\NewCustomer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes, NewCustomer;

    protected $fillable = [
        // 'cust_id',
        'cust_name',
        'cust_mail',
        'cust_phone',
        'cust_address'
    ];

    protected static function boot()
    {
        parent::boot();
        static::NewCustomer();
    }
}
