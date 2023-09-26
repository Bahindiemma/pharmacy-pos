<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use App\Models\User;

class PagesController extends Controller
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

    public function showusers(){
        $user = User::paginate(5);
        return view('users.showuser', ['users' => $user]);
    }

    public function addproduct(){
        
        return view('products.addproduct');
    }

    public function grid(){
        $product = Product::paginate(5);

        return view('products.grid')->with('products', $product);
    }

    public function report(){
        return view('reports.index');
    }
}
