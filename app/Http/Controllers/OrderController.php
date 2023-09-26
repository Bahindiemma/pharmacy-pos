<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class OrderController extends Controller
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
        $products = Product::all();
        $orders = Order::all();
         //Display Last Order details
         $lastId = Order_detail::max('order_id');
         $order_receipt = Order_detail::where('order_id', $lastId)->get();

        return view('orders.index', ['products' => $products, 'order' => $orders, 'order_receipt' => $order_receipt]);
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
        // return $request->all(); 

        DB::transaction(function () use ($request) {
            //Order Model
            $orders = new Order;
            $orders->name = $request->customerName;
            $orders->mobile = $request->customerMobile;
            $orders->save();
            $order_id =  $orders->id;  

            //Order Details
            for($product_id = 0; $product_id < count($request->product_id); $product_id++){
                $order_details = new Order_detail;
                $order_details->order_id = $order_id;
                $order_details->product_id  = $request->product_id[$product_id];
                $order_details->unitprice  = $request->price[$product_id];
                $order_details->quantity  = $request->quantity[$product_id];
                $order_details->discount  = $request->discount[$product_id];
                $order_details->amount  = $request->total_amount[$product_id];
                $order_details->save();
            }

            //Transaction
            $transaction = new Transaction();
            $transaction->order_id = $order_id;
            $transaction->user_id = auth()->user()->id;
            $transaction->balance  = $request->balance;
            $transaction->paid_amount  = $request->paidAmount;
            $transaction->payment_method  = $request->paymentMethod;
            $transaction->transaction_amount  = $order_details->amount;
            $transaction->transaction_date  = date('Y-m-d');
            $transaction->save(); 

            $products = Product::all();
            $order_details = Order_detail::where('order_id', $order_id)->get();
            $orderedBy = Order::where('id', $order_id)->get();

            return view('orders.index', [
                'products' => $products,
                'order_details' => $order_details,
                'customer_order' => $orderedBy,
            ]);
        });
        return redirect()->back()->with('success', 'Product Order Successfull');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
