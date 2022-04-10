<?php

namespace Lab3\AbstractShopPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
      "provider_name",
      "country",
      "city",
      "address",
      "postal_code",
      "email",
      "phone"
    ];

    public function productStorages()
    {
        $this->hasMany(ProductStorage::class, "provider_id");
    }

    public function products()
    {
        $this->hasMany(Product::class, "provider_id");
    }
}
