<?php

namespace Lab3\AbstractShopPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
      "product_name",
      "description",
      "price",
      "image_path",
      "category_id",
      "provider_id",
      "storage_id"
    ];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, "category_id");
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class, "provider_id");
    }

    public function productStorage()
    {
        return $this->belongsTo(ProductStorage::class, "storage_id");
    }
}
