<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;

class Order_detail extends Model
{
protected $table = 'order_details';
protected $fillable = ['order_id', 'product_id', 'quantity', 'unit_price', 'amount', 'discount'];

public function pdt()
{
return $this->belongsTo(Product::class,"product_id");
}

public function order()
{
return $this->belongsTo(Order::class,"order_id");
} 
}
