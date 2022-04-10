<?php

namespace Lab3\AbstractShopPackage\Http\Resources;

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
            'client_id' => $this->client_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'sum' => $this->sum,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
