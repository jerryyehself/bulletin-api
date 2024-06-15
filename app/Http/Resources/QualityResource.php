<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class QualityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $this->resource->load(['applierInfo']);

        return Arr::only(parent::toArray($request), [
            'num',
            'apply_date',
            'acceptance_date',
            'cust_id',
            'component_id',
            'counter',
            'result',
            'applier_info'
        ]);
    }
}
