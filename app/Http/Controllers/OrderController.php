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
// dd($order_receipt);
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

       $orderId = null;
        try {
            DB::transaction(function () use ($request, &$orderId) {
                // Create Order using Mass Assignment
                $order = Order::create([
                    'name' => $request->customerName,
                    'mobile' => $request->customerMobile,
                    'user_id' => auth()->user()->id
                ]);

                $orderId = $order->id;

                // Create Order Details
                foreach ($request->product_id as $index => $productId) {
                    $order->orderdetail()->create([
                        'product_id' => $productId,
                        'unit_price' => $request->price[$index],
                        'quantity' => $request->quantity[$index],
                        'discount' => $request->discount[$index],
                        'amount' => $request->total_amount[$index]
                    ]);

                    // Update Product Quantity
                    Product::findOrFail($productId)->decrement('quantity', $request->quantity[$index]);
                }

                // Create Transaction
                Transaction::create([
                    'order_id' => $order->id,
                    'balance' => $request->balance,
                    'paid_amount' => $request->paidAmount,
                    'payment_method' => $request->paymentMethod,
                    'transaction_amount' => $request->total_amount[array_key_last($request->total_amount)],
                    'transaction_date' => now()
                ]);
            });

            return redirect()->route('Order_details', ['id' => $orderId])
                         ->with('success', 'Product Order Successful');
        } catch (\Exception $e) {
            // Handle the exception
            return redirect()->back()->with('error', 'Order creation failed: ' . $e->getMessage());
        }
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

    public function order_details($id){

        $order = Order::with('orderdetail', 'orderdetail.pdt') // Adjust according to your relationships
                 ->findOrFail($id);

    return view('orders.order_details', compact('order'));

    }

    public function order_receipt($id){

        $order = Order::with('orderdetail', 'orderdetail.pdt') // Adjust according to your relationships
                 ->findOrFail($id);

        return view('reports.order_receipt', compact('order'));

    }
}
