<?php

namespace App\Traits;

use App\Models\Bulletins;
use Illuminate\Database\Eloquent\Builder;

trait OwnedByUser
{

    public static function scopeOwnedBy(Builder $query, array $userId = [])
    {
        $userId[] = auth()->user()->user_id;

        $userId = array_merge(
            $userId,
            auth()->user()->roles
                ->pluck('pivot.role_member')
                ->flatMap(function ($roleMembers) {
                    return explode(',', $roleMembers);
                })
                ->toArray()
        );

        $query->whereIn('applier_id', $userId);
    }

    public static function scopeBulletList(Builder $query)
    {
        $closedList = Bulletins::select('num')->where('closed_by', auth()->user()->user_id);
        $query->whereNotIn('applier_id', $closedList);
    }
}
