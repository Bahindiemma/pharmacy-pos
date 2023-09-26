<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['product_name', 'description', 'brand', 'price', 'quantity', 'product_img', 'supplierprice', 'stock_alert', 'form', 'expiredate'];

    
    public function orderdetail()
    {
        return $this->hasMany('App\Models\Order_detail');
    }

}
