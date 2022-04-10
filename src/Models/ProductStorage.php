<?php

namespace Lab3\AbstractShopPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStorage extends Model
{
    use HasFactory;

    protected $fillable = [
      "storage_name",
      "country",
      "city",
      "storage_address",
      "provider_id"
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, "storage_id");
    }

}
