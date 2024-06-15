<?php

namespace App\Traits;

use Carbon\Carbon;

trait NewNum
{

    public static function newNum()
    {
        static::saving(function ($model) {

            if ($model->num === null) {
                $date = Carbon::now()->format('ymd');
                $modelPrefix = strtoupper(substr(class_basename($model), 0, 3));
                $serialNum = $model
                    ->whereYear('created_at', Carbon::now()->year)
                    ->whereMonth('created_at', Carbon::now()->month)
                    ->count();

                $model->num = $modelPrefix . $date . str_pad(($serialNum + 1), 2, '0', STR_PAD_LEFT);
            }
        });
    }
}
