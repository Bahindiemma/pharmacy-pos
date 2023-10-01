<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order_detail;
use App\Models\Supplier;
use App\Models\User;



class Product extends Model
{
protected $table = 'products';
protected $fillable = [ 'supplier_id','product_name', 'description', 'brand', 'price', 'quantity', 'product_img', 'supplier_price', 'stock_alert', 'form', 'expiredate ','batch_number'];







public function Supplier(){
return $this->belongsTo(Supplier::class,'supplier_id');
}










}
