<?php

namespace App\Traits;

use App\Models\Bulletins;
use Illuminate\Database\Eloquent\Builder;

trait OwnedByUser
{

    public static function scopeOwnedBy(Builder $query)
    {
        $query->where('applier_id', auth()->user()->user_id);
    }

    public static function scopeBulletList(Builder $query)
    {
        $closedList = Bulletins::select('num')->where('closed_by', auth()->user()->user_id);
        $query->whereNotIn('applier_id', $closedList);
    }
}
