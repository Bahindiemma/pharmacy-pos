<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::paginate(5);

        return view('products.index')->with('products', $product);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        if($request->hasFile('product_img')){
            //Get file name
            $fileNameWithExt = $request->file('product_img')->getClientOriginalName();
            //File name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('product_img')->getClientOriginalExtension();

            $fileNameToStore = $filename. '_' .time(). '.' .$extension;

            $path = $request->file('product_img')->storeAs('public/products', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'product.png';
        }



     
        $products = new Product;
        $products->product_name = $request->product_name;
        $products->description = $request->description;
        $products->brand =$request->brand;
        $products->price =$request->price;
        $products->quantity =$request->quantity;
        $products->supplierprice = $request->supplierprice;
        $products->stock_alert = $request->stock_alert;
        $products->form = $request->form;
        $products->expiredate = $request->expiredate;
        $products->product_img = $fileNameToStore;
        
        $products ->save();
        return redirect('/products')->with('success', 'Product Added Successfully');
        return redirect()->back()->with('error', 'Product Registration Failed!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $id)
    {
        $products = Product::find($id);
        Storage::delete('public/products/'.$products->product_img );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        // $product->update($request->all());
        // return redirect()->back()->with('success', 'Product Updated Successfully');

        if($request->hasFile('product_img')){
            //Get file name
            $fileNameWithExt = $request->file('product_img')->getClientOriginalName();
            //File name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('product_img')->getClientOriginalExtension();

            $fileNameToStore = $filename. '_' .time(). '.' .$extension;

            $path = $request->file('product_img')->storeAs('public/products', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'product.png';
        }



        $data = $request->input();
        $products = Product::find($id);
        $products->product_name = $data['product_name'];
        $products->description = $data['description'];
        $products->brand =$data['brand'];
        $products->price =$data['price'];
        $products->quantity =$data['quantity'];
        $products->supplierprice = $data['supplierprice'];
        $products->stock_alert = $data['stock_alert'];
        $products->form = $data['form'];
        $products->expiredate = $data['expiredate'];
        $products->product_img = $fileNameToStore;
        
        $products ->save();
        return redirect()->back()->with('success', 'Product Updated Successfully');
        return redirect()->back()->with('error', 'Product Registration Failed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->product_img != 'product.png'){
            Storage::delete('public/products/'.$product->product_img );
        }
        $product->delete();
        return redirect()->back()->with('success', 'Product Successfully Deleted');

    }
}
