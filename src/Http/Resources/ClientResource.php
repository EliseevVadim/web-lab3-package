<?php

namespace Lab3\AbstractShopPackage\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        try {
            return [
                'id' => $this->id,
                'client_full_name' => $this->client_full_name,
                'INN' => $this->INN,
                'address' => $this->address,
                'phone' => $this->phone,
                'orders_count' => $this->orders_count,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at
            ];
        }
        catch (\Exception $exception) {
            die("Клиент не найден.");
        }
    }
}
