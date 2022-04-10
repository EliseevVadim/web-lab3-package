<?php

namespace Lab3\AbstractShopPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
      "client_id",
      "product_id",
      "quantity",
      "sum"
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }

    public function client()
    {
        return $this->belongsTo(Client::class, "client_id");
    }
}
