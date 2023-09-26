@extends('layouts.dash')
@section('content')

    <!-- Modal -->
    <div class="modal fade" id="printMode" tabindex="-1" aria-hidden="true">
        @include('reports.receipt')
    </div>

    <div class="wrapper">
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">ORDER PRODUCTS</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Order</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->
                @include('inc.msg')
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-lg-flex align-items-center mb-4 gap-3">
                                    <div class="position-relative">
                                        <input type="text" class="form-control ps-5 radius-30" placeholder="Search Order">
                                        <span class="position-absolute top-50 product-show translate-middle-y"><i
                                                class="bx bx-search"></i></span>
                                    </div>
                                    <div class="ms-auto"><a href="javascript:;"
                                            class="btn btn-primary radius-30 mt-2 mt-lg-0 add_more"><i
                                                class="bx bxs-plus-square"></i>Add
                                            New Order</a>
                                    </div>

                                </div>
                                <form action="{{ route('orders.store') }}" method="POST">
                                    @csrf
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="table-light">
                                            <tr>

                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Disc %</th>
                                                <th>Total</th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody class="addMoreProduct">
                                            <tr>

                                                <td>1</td>
                                                <td>
                                                    <select name="product_id[]" id="product_id"
                                                        class="single-select product_id ">
                                                        <option value="">Select item</option>
                                                        @foreach ($products as $product)
                                                            <option data-price="{{ $product->price }}"
                                                                value="{{ $product->id }}">
                                                                {{ $product->product_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" name="quantity[]" id="quantity"
                                                        class="form-control quantity">
                                                </td>
                                                <td>
                                                    <input type="number" name="price[]" id="price"
                                                        class="form-control price">
                                                </td>
                                                <td>
                                                    <input type="number" name="discount[]" id="discount"
                                                        class="form-control discount">
                                                </td>
                                                <td>
                                                    <input type="number" name="total_amount[]" id="total_amount "
                                                        class="form-control total_amount">
                                                </td>
                                                <td>
                                                    <a class="btn btn-default"><i class="bx bxs-trash"></i></a>
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="bg-success p-4">
                                    <h2 class="text-center text-white"> Total:
                                        <b>#</b><b class="total"> <input type="hidden"  name="total"> 0.00</b>
                                    </h2>
                                </div>
                                <div class="table-responsive">
                                    <table class="table mb-0 table-striped">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label for="cutomer" class=""><b>Customer Name:</b></label>
                                                    <input type="name" name="customerName" id="customerName"
                                                        class="form-control customerName">
                                                </td>
                                                <td>
                                                    <label for="" class=""><b>Customer Mobile:</b></label>
                                                    <input type="number" name="customerMobile" id="customerMobile"
                                                        class="form-control customerMobile">
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <table class="table table-striped">

                                        <td class="p-1"><b>Payment Method:</b>
                                            <br>
                                            <select class="form-select" name="paymentMethod" id="paymentMethod" required>
                                                <option value="">Select Payment Method</option>
                                                <option value="Cash">Cash</option>
                                                <option value="BankTransfer">Bank Transfer</option>
                                                <option value="CreditCard">Credit Card</option>
                                            </select>
                                            {{-- <span class="form-check">
                                                <input class="form-check-input" type="checkbox" name="paymentMethod"
                                                    value="cash" id="paymentMethod">
                                                <label class="" for="paymentMethod"><i
                                                        class="bx bx-money text-success"></i>Cash</label>

                                            </span>
                                            <span class="form-check">
                                                <input class="form-check-input" type="checkbox" name="bankTransfer"
                                                    value="bankTransfer" id="bankTransfer">
                                                <label class="" for="bankTransfer"><i
                                                        class="bx bxs-bank text-danger"></i>Bank Transfer</label>

                                            </span>
                                            <span class="form-check">
                                                <input class="form-check-input" type="checkbox" name="creditCard"
                                                    value="creditCard" id="creditCard">
                                                <label class="" for="creditCard"><i
                                                        class="bx bxs-credit-card text-primary"></i>Credit Card</label>
                                            </span> --}}
                                        </td>
                                    </table>
                                    <div class="pb-4">
                                        <label for="payment"><b>Payment:</b></label>
                                        <input class="form-control" name="paidAmount" id="paidAmount" type="number" required />
                                    </div>
                                    <div class="pb-4">
                                        <label for="change"><b>Change:</b></label>
                                        <input class="form-control" name="balance" id="balance" type="number" required>
                                    </div>
                                    <div class="pb-4">
                                        <button type="submit" class="btn btn-primary w-100">Save</button>
                                    </div>
                                    <div class="pb-4">
                                        <button type="submit" class="btn btn-danger  w-100">Calculator</button>
                                    </div>
                                </div>
                            </form>
                                <button onclick="ReceiptContent('printMode')" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                data-bs-target="#print"><i class="bx bxs-printer" ></i>Print</button>

                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#print"><i class="bx bx-history" onclick="Receipt('print')"></i>History</button>

                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#print"><i class="bx bxs-printer" onclick="Receipt('print')"></i>Report</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    

@endsection

@section('script')

    <script>
        $('.add_more').on('click', function() {
            var product = $('.product_id').html();
            var numberofrow = ($('.addMoreProduct tr').length - 0) + 1;
            var tr = '<tr><td>' + numberofrow + '</td>' +
                '<td> <select class="product_id form-select" name="product_id[]">' + product +
                ' </select></td>' +
                '<td> <input type="number" name="quantity[]" class="form-control quantity"></td>' +
                '<td> <input type="number" name="price[]" class="form-control price"></td>' +
                '<td> <input type="number" name="discount[]" class="form-control discount"></td>' +

                '<td><input type="number" name="total_amount[]" class="form-control total_amount"></td>' +
                '<td><a class="btn btn-default delete"><i class="bx bxs-trash"></i></a></td>';
            $('.addMoreProduct').append(tr);
        });
        $('.addMoreProduct').delegate('.delete', 'click', function() {
            $(this).parent().parent().remove();
        })


        function TotalAmount() {

            var total = 0;
            $('.total_amount').each(function(i, e) {
                var amount = $(this).val() - 0;
                total += amount;
            });

            $('.total').html(total);
        }

        $('.addMoreProduct').delegate('.product_id', 'change', function() {
            var tr = $(this).parent().parent();
            var price = tr.find('.product_id option:selected').attr('data-price');
            tr.find('.price').val(price);
            var qty = tr.find('.quantity').val() - 0;
            var disc = tr.find('.discount').val() - 0;
            var price = tr.find('.price').val() - 0;
            var total_amount = (qty * price) - ((qty * price * disc) / 100);
            tr.find('.total_amount').val(total_amount);
            TotalAmount();
        });
        $('.addMoreProduct').delegate('.delete', 'click', function() {
            $(this).parent().parent().remove();
        })

        $('.addMoreProduct').delegate('.quantity , .discount', 'keyup', function() {
            var tr = $(this).parent().parent();
            var qty = tr.find('.quantity').val() - 0;
            var disc = tr.find('.discount').val() - 0;
            var price = tr.find('.price').val() - 0;
            var total_amount = (qty * price) - ((qty * price * disc) / 100);
            tr.find('.total_amount').val(total_amount);
            TotalAmount();
        })
        $('.addMoreProduct').delegate('.delete', 'click', function() {
            $(this).parent().parent().remove();
        });

        $('#paidAmount').keyup(function(){
            var total = $('.total').html();
            var paidAmount = $(this).val(); 
            var amount = paidAmount - total;
            $('#balance').val(amount).toFixed(2);
        });



        //Report printing Section
        function ReceiptContent(el){
            var data = '<input type="button" id="PrintReceiptButton class="PrintReceiptButton" style="display: block; bottom: 10px; width: 100%; border: none; background-color: #000; background-repeat: no-repeat; color: #fff; padding: 14px 28px; font-size: 16px; cursor:pointer; text-align: center" value="Print Receipt"" onClick="window.printMode()">';
            data += document.getElementById(el).innerHTML
            Receipt = window.open("", "myWin", "left=450, top=130, width=400, height=500");
            Receipt.screnX = 0;
            Receipt.screnY = 0;
            Receipt.document.write(data);
            Receipt.document.title = "Print Receipt"
            Receipt.focus();
            setTimeout(() => {
                Receipt.close(); 
            }, 8000);
        }

    </script>

@endsection
