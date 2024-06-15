<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ModelNumScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if ($model->exists === false) {
            $builder->creating(function ($model) {
                // 生成單號邏輯
                $modelPrefix = substr(class_basename($model), 0, 3);
                $date = now()->format('ymd');
                $lastModelNumber = $model::max('num');
                $serialNumber = ($lastModelNumber) ? ((int) substr($lastModelNumber, 6)) + 1 : 1;
                $model->num = $modelPrefix . $date . sprintf('%04d', $serialNumber);
            });
        }
    }
}
