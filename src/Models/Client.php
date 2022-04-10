<?php

namespace Lab3\AbstractShopPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
      "client_full_name",
      "INN",
      "address",
      "email",
      "phone",
      "orders_count"
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'client_id');
    }
}
