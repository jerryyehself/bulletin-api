<?php

namespace App\Traits;

use Carbon\Carbon;

trait NewCustomer
{

    public static function NewCustomer()
    {
        static::saving(function ($model) {
            if ($model->cust_id === null) {
                $serialNum = $model->all()->count();
                $model->cust_id = 'C' . str_pad(($serialNum + 1), 2, '0', STR_PAD_LEFT);
            }
        });
    }
}
