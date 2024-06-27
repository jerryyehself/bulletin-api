<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait OwnedByUser
{

    public static function scopeOwnedBy(Builder $query)
    {
        $query->where('applier_id', auth()->user()->user_id);
    }
}
