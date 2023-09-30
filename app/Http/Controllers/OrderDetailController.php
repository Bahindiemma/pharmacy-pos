<?php

namespace App\Http\Controllers;

use App\Models\Order_detail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
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
    public function index(Request $request)
    {
            //    dd($request->all());

                // $products =  new Order_detail();
                // if($request->start_date){
                //     $products = $products->where('created_at', ">=" ,$request->input("start_date"));
                // }
                // if ($request->end_date) {
                //     $products = $products->where('created_at', "<=" ,$request->input("end_date")."23:59:59");
                // }
                // $date = $products->created_at;
              $products= Order_detail::whereBetween('created_at', [$request->input("start_date"),$request->input("end_date")])->get();
                // $products = $products->paginate(10);
            //    dd($request);
        return view('reports.daily_report', compact('products'));
    //    $order_details = Order_detail::all();
    //     return view('reports.index', compact('order_details'));
        
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function getReports(Request $request)
    {
       

        $products =  new Order_detail();
if($request->start_date){
    $products = $products->where('order_id', ">=" ,$request->start_date);
}
if ($request->end_date) {
    $products = $products->where('order_id', "<=" ,$request->end_date."23:59:59");
}
$products = $products->paginate(10);
        // foreach ($products as $key => $value) {
        
        //         // dd($value->order->name);
        //       dd($value->pdt->product_name);
        // }
        // dd($products->order->name);


        return view('reports.daily_report', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Order_detail $order_detail)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order_detail $order_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order_detail $order_detail)
    {
        //
    }
}
