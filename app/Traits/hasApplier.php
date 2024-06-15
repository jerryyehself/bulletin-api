<?php

namespace App\Traits;

use App\Models\User;

trait hasApplier
{
    public function applierInfo()
    {
        return $this
            ->belongsTo(User::class, 'applier_id', 'user_id')
            ->select('id', 'user_id', 'name');
    }
}
