<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class CustomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $this->resource->load(['applierInfo', 'customerInfo']);

        return Arr::only(parent::toArray($request), [
            'num',
            'apply_date',
            'applier_info',
            'cust_id',
            'custom_content',
            'customer_info'
        ]);
    }
}
