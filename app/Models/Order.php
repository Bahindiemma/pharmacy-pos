<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model\User;


class Order extends Model
{
protected $table = 'orders';


protected $fillable = ['user_id', 'name', 'mobile'];


public function orderdetail()
{
return $this->hasMany('App\Models\Order_detail');
}

public function users(){
return $this->belongsTo(User::class,'user_id');
}
public function transaction(){
return $this->hasOne('App\Models\transaction');
}

}
