@extends('layouts.dash')

@section('content')
<div class="wrapper">
    <div class="page-wrapper">
        <div class="page-content">
    <!-- Order Information Card -->
    <div class="card mb-4">
        <div class="text-right mb-4">
            <button class="btn btn-primary" onclick="printReceipt()">Print Receipt</button>
        </div>
        <div class="card-header">
            <i class="bi bi-person-fill"></i> Customer Information
        </div>
        <div class="card-body">
            <h5 class="card-title">Order #{{ $order->id }}</h5>
            <p class="card-text"><i class="bi bi-person-circle"></i> Name: {{ $order->name }}</p>
            <p class="card-text"><i class="bi bi-telephone"></i> Mobile: {{ $order->mobile }}</p>
            <p class="card-text"><i class="bi bi-calendar"></i> Order Date: {{ $order->created_at->format('m/d/Y') }}</p>
        </div>
    </div>

    <!-- Order Items Card -->
    <div class="card">
        <div class="card-header">
            <i class="bi bi-cart-fill"></i> Order Items
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderdetail as $detail)
                        <tr>
                            <td>{{ $detail->pdt->product_name }}</td>
                            <td>${{ number_format($detail->unit_price, 2) }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>${{ number_format($detail->amount, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    </div>
</div>
@endsection


<style>
    .card-header {
        background-color: #f8f9fa;
        font-weight: bold;
        color: #333;
    }
    .bi {
        margin-right: 0.5em;
    }
</style>



<script>
function printReceipt() {
    // Open a new window or tab with the URL of the receipt
    var receiptWindow = window.open("{{ route('order_receipt', $order->id) }}", 'ReceiptWindow', 'width=600,height=800');
    receiptWindow.print();
}
</script>

