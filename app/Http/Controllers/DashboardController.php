<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
/**
     * Create a new controller instance.
     *
     * @return void
     */
public function __construct()
{
$this->middleware('auth');
}

/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
public function index()
{

$suppliers=Supplier::all();
$transactions=Transaction::all();
$order=Order::all();
$products=Product::all();


return view('dashboard',['suppliers'=>$suppliers,
"transactions"=>$transactions,
"order"=>$order,
"products"=>$products,

]); 
}
}
