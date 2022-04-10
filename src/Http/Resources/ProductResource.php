<?php

namespace Lab3\AbstractShopPackage\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'product_name' => $this->product_name,
            'description' => $this->description,
            'price' => $this->price,
            'image_path' => $this->image_path,
            'category_id' => $this->category_id,
            'provider_id' => $this->provider_id,
            'storage_id' => $this->storage_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
