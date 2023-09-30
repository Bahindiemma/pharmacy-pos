<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Model\Order;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = ['order_id', 'paid_amount', 'balance', 'payment_method', 'user_id', 'transaction_amount', 'transaction_date'];

    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }
}
