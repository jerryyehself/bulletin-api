<?php

namespace App\Traits;

use Carbon\Carbon;

trait NewUser
{

    public static function newUser()
    {
        static::saving(function ($model) {
            if ($model->user_id === null) {
                $serialNum = $model->all()->count();
                $model->user_id = 'U' . str_pad(($serialNum + 1), 2, '0', STR_PAD_LEFT);
            }
        });
    }
}
