<?php

namespace App\Traits;

trait OwnedByUser
{

    public static function scopeOwnedBy($query, $user)
    {
        return $query->where('applier_id', $user->user_id);
    }
}
