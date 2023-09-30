<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table="customers";
    protected $fillable=['first_name', 'last_name','email','phone','address','city','state','postal_code'];

}
