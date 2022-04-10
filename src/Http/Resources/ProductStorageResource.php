<?php

namespace Lab3\AbstractShopPackage\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductStorageResource extends JsonResource
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
            'storage_name' => $this->storage_name,
            'country' => $this->country,
            'city' => $this->city,
            'storage_address' => $this->storage_address,
            'provider_id' => $this->provider_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
