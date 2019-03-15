<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'preparation_time' => $this->preparation_time,
            'size' => new SizeResource($this->size),
            'flavor' => new FlavorResource($this->flavor),
            'options' => OptionResource::collection($this->options)
        ];
    }
}
