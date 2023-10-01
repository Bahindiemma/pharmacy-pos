<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
protected $table = 'suppliers';
protected $fillable = ['supplier_name', 'address', 'mobile', 'email'];

public function products(){
return $this->hasMany('App\Models\Product');
}
}
